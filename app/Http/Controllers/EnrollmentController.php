<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\StudentEnrolled;
use App\Events\SessionDayCreated;
use Jenssegers\Agent\Agent;
use App\CourseType;
use App\Coupon;
use App\Course;
use App\Classer;
use App\ClassSession;
use App\Holiday;
use App\Day;
use App\Admin;
use App\User;
use Auth;
use Session;
use Lang;


class EnrollmentController extends Controller
{

    protected $isCreditCard;
    protected $is_reenroll;
    protected $class_id;
    protected $number_of_sessions;
    

    public function __construct()
    {
        $is_reenroll = false;
        $class_id = 0;
        $isCreditCard = false;
        date_default_timezone_set(setting('student_timezone'));
    }

    function step1()
    {
        Session::forget('coupon');
        Session::forget('freecoupon');
        $coursetypes = CourseType::all();
        $defaultCourse = Course::find(27);
        return view(theme('enrollment.step1'), compact('coursetypes', 'defaultCourse'));
    }

    function validateCoupon(Request $request)
    {
        Session::forget('number_of_sessions');
        Session::forget('freecoupon');

        $code = $request->code;
        $coupon = Coupon::where('code', $code)
                            ->where('classer_id', null)
                            ->whereDate('expiry','>=', date('Y-m-d'))
                            ->where('type', $request->type)->first();
        if($coupon)
        {
            if( $coupon->type == "discount" )
            {
                Session::push('coupon', $coupon);
                return 1;
            }else{
                $class_info = json_decode($coupon->class_info);
                
                $type = $class_info->courseType_id;
                $minute = $class_info->minutes;
                $days_in_week = $class_info->days_in_a_week;

                $course = Course::where('course_type_id', $type)->where('days_in_week', $days_in_week)->where('minutes', $minute)->first();
                $month = $class_info->months;

                if(isset($class_info->number_of_sessions))
                {
                    $sessions = $class_info->number_of_sessions > 0 ? $class_info->number_of_sessions : 0;
                }else{
                    $sessions = 0;
                }

                Session::push('freecoupon', $coupon);
                return route('enrollment.step2', [
                        'course' => $course->id, 
                        'month' => $month ? $month : 1, 
                        'sessions' => $sessions
                    ]);   
            }
                
        }else{
            return 0;
        }
    }


    function step1post(Request $request)
    {
 
        $type = $request->type;
        $minute = $request->minute;
        $days_in_week = $request->days_in_week;

        $course = Course::where('course_type_id', $type)->where('days_in_week', $days_in_week)->where('minutes', $minute)->first();
        $month = $request->months;
        
        return redirect()->route('enrollment.step2', ['course' => $course->id, 'month' => $month]);
    }

    public function step2(Request $request)
    {   
        
        //forget all the session for dublication
        Session::forget('course_id');
        Session::forget('course_months');
        Session::forget('course_price');
        Session::forget('course_credits');
        Session::forget('teacher');
        Session::forget('curriculum');
        Session::forget('number_of_session');

        $course_id = $request->course;
        $months = $request->month;

        $course = Course::where('id', $course_id)->first();
        $months = $request->month;

        

         if($months == 1){
            $initial_price = $course->price;
            $credits = $course->postponed_credits;
          }else if($months == 3 ){
            $initial_price = $course->three_price;
            $credits = $course->postponed_credits * 3;
          }else if($months == 6 ){
            $initial_price = $course->six_price;
            $credits = $course->postponed_credits * 6;
          }else if($months == 12 ){
            $initial_price = $course->twelve_price;
            $credits = $course->postponed_credits * 12;
          }

        if(session('coupon.0')){
            $price = $initial_price - session('coupon.0')->amount;
        }else{
            $price = $initial_price;
        }

       
        
        Session::push('course_id', $course_id);
        Session::push('course_months', $months);
        Session::push('course_price', $price);
        Session::push('course_credits', $credits);

        return view(theme('enrollment.step2'), compact('course', 'months', 'price'));
    }

    public function step2Save(Request $request)
    {
       
        $this->validate($request, array(
            'start_date' => 'required|date|string',
            'time' => 'required',
        ));

        //clearing session data
        Session::forget('selectedCourse.start_date');
        Session::forget('selectedCourse.time');
        Session::forget('selectedCourse.days');
        Session::forget('teacher');
        Session::forget('curriculum');
        Session::forget('number_of_session');

        $start_date = date('Y-m-d', strtotime($request->start_date));

        $time = date('H:i', strtotime($request->time));
        $days = $request->days;

        Session::push('selectedCourse.start_date', $start_date);
        Session::push('selectedCourse.time', $time);
        Session::push('selectedCourse.days', $days);

       
        
        Session::push('number_of_session', $request->number_of_sessions);
        Session::push('teacher', $request->teacher);
        Session::push('curriculum', $request->curriculum);
       
        if(session('freecoupon.0'))
        {
            $this->isCreditCard = false;
            $class = $this->save();
            
            $class = Classer::find($class->id);
    
            $class->status = "pending";
            $class->payment_method = 'bank';
        
            $class->save();

            return redirect()->route('dashboard.class.index');

        }else{
            return redirect()->route('enrollment.step3');
        }
        
    }

    function step3(Request $request)
    {
       
        Session::forget('reenroll.class_id');
        Session::forget('reenroll.is_reenroll');
        
        if($request->class)
        {
            Session::push('reenroll.class_id', $request->class);
            Session::push('reenroll.is_reenroll', true);
            $class_info = Classer::find($request->class);
            $time = date('H:i', strtotime($class_info->time));
            Session::push('selectedCourse.time', $time);
            Session::push('number_of_session', $class_info->total_sessions);
            $class_info->course_id;
            $months = $class_info->num_months;
            $course = Course::where('id', $class_info->course_id)->withTrashed()->first();
            
            $num_months = $class_info->num_months;
            $days = $class_info->day;
            if(Auth::user()->discount_amount)
            { 
               $price = get_discount($class_info->payment_price);
            }else{
               $price = $class_info->payment_price;
            }
            Session::push('course_price', $price);
        }else{
            Session::forget('reenroll');
            $course_id = session('course_id.0');
            $months = session('course_months.0');
            $months = $months;
            $course = Course::where('id', $course_id)->first();

            $num_months = session('course_months.0');
            $days = Day::find(session('selectedCourse.days.0'));
            
            if($num_months == 1){
                if(Auth::user()->discount_amount)
                { 
                    $price = get_discount($course->price);
                }else{
                    $price = $course->price;
                }
            }else if($num_months == 3 ){
                if(Auth::user()->discount_amount)
                { 
                    $price = get_discount($course->three_price);
                }else{
                    $price = $course->three_price;
                }
            }else if($num_months == 6 ){
                if(Auth::user()->discount_amount)
                { 
                    $price = get_discount($course->six_price);
                }else{
                    $price = $course->six_price;
                }
            }else if($num_months == 12 ){
                if(Auth::user()->discount_amount)
                { 
                    $price = get_discount($course->twelve_price);
                }else{
                    $price = $course->twelve_price;
                }
            }  

            

        }
    
        
        $product_name = $this->productgenarator($course->coursetype->name, $course->minutes, $days,  $months);     
        
        
        if(setting('default_payment_gateway') == "nicepay")
        {
            $nicepay['merchantKey']      = setting('nicepay_merchant_key');
            $nicepay['merchantID']       = setting("nicepay_merchant_id");                           // 상점아이디merchantID       = "nicepay00m";                         
            $nicepay['goodsCnt']         = "1";                                    // 결제상품개수goodsCnt         = "1";                                
            $nicepay['goodsName']        = $product_name;                           // 결제상품명goodsName        = "나이스페이";                          
            $nicepay['price']            = $price;                                 // 결제상품금액	price            = "1004";                                
            $nicepay['buyerName']        = "Sample";                               // 구매자명buyerName        = "나이스";                             
            $nicepay['buyerTel']         = "01000000000";                          // 구매자연락처buyerTel         = "01000000000";                         
            $nicepay['buyerEmail']       = "bernaswebdevelopment@gmail.com";                      // 구매자메일주소 Buyer email addressbuyerEmail       = "happy@day.co.kr";                      
            $nicepay['moid']             =  time();                      // 상품주문번호 Item Order Numbermoid             = "mnoid1234567890";                      
        }

        $agent = new Agent;
        $is_desktop = $agent->isDesktop();

        if(session('coupon')){
            $price = $price - session('coupon.0')->amount;
        }
        
        
     
        return view(theme('enrollment.step3'), compact('course', 'months', 'price','days', 'product_name', 'is_desktop'));
    }


    private function productgenarator($course_type, $minutes, $days, $months)
    {   
       
        $product_shortcut = '';
        
        $product_shortcut .= Lang::get('label.'. strtolower(snake_case($course_type)));
        $product_shortcut .= " " . $minutes .Lang::get('label.min'). ' 주'. count($days). '회 ' . $months. '개월';

        return $product_shortcut;
    }



    function bank(Request $request){
        $this->isCreditCard = false;
        $class = $this->save();
        $class = Classer::find($class->id);
  
        $class->status = "pending";
        $class->payment_method = 'bank';
        $class->date_of_payment = $request->date_of_payment;
        $class->payor_name = $request->payor_name;
      
        $class->save();

        return redirect()->route('enrollment.reciept', $class->class_code);
    }

    
    function get_trim($str){
		return iconv("UTF-8", "EUC-KR", trim($str));
    }
    

    
    function agsPay(Request $request)
    {
        $ags = new \AgsPay40;

        foreach($_POST as $key => $row) $_POST[$key] = iconv("UTF-8", "EUC-KR", $row);

        $ags->SetValue("AgsPayHome", config_path('Logs') );
        $ags->SetValue("StoreId", trim(setting('ags_store_id')) );   
        $ags->SetValue("log","true");              
        $ags->SetValue("logLevel","INFO");           
        $ags->SetValue("UseNetCancel","true");         
        $ags->SetValue("Type", "Pay");             
        $ags->SetValue("RecvLen", 7);              
        
        $ags->SetValue("AuthTy",trim($request->AuthTy));     
        $ags->SetValue("SubTy",trim($request->SubTy));     
        $ags->SetValue("OrdNo",trim($request->OrdNo));     
        $ags->SetValue("Amt",trim($request->Amt));       
        $ags->SetValue("UserEmail",trim($request->UserEmail)); 
        $ags->SetValue("ProdNm", $this->get_trim($request->ProdNm));     
        $AGS_HASHDATA = $request->AGS_HASHDATA;
;   

        /*½Å¿ëÄ«µå&°¡»ó°èÁÂ»ç¿ë*/
        $ags->SetValue("MallUrl",trim($request->MallUrl));   //MallUrl(¹«ÅëÀåÀÔ±Ý) - »óÁ¡ µµ¸ÞÀÎ °¡»ó°èÁÂÃß°¡
        $ags->SetValue("UserId",trim($request->UserId));     //È¸¿ø¾ÆÀÌµð


        /*½Å¿ëÄ«µå»ç¿ë*/
        $ags->SetValue("OrdNm", $this->get_trim($request->OrdNm));     //ÁÖ¹®ÀÚ¸í
        $ags->SetValue("OrdPhone",trim($request->OrdPhone));   //ÁÖ¹®ÀÚ¿¬¶ôÃ³
        $ags->SetValue("OrdAddr",$this->get_trim($request->OrdAddr));   //ÁÖ¹®ÀÚÁÖ¼Ò °¡»ó°èÁÂÃß°¡
        $ags->SetValue("RcpNm",$this->get_trim($request->RcpNm));     //¼ö½ÅÀÚ¸í
        $ags->SetValue("RcpPhone",trim($request->RcpPhone));   //¼ö½ÅÀÚ¿¬¶ôÃ³
        $ags->SetValue("DlvAddr",$this->get_trim($request->DlvAddr));   //¹è¼ÛÁöÁÖ¼Ò
        $ags->SetValue("Remark",$this->get_trim($request->Remark));     //ºñ°í
        $ags->SetValue("DeviId",trim($request->DeviId));     //´Ü¸»±â¾ÆÀÌµð
        $ags->SetValue("AuthYn",trim($request->AuthYn));     //ÀÎÁõ¿©ºÎ
        $ags->SetValue("Instmt",trim($request->Instmt));     
        $ags->SetValue("UserIp",$request->ip());    //회원 IP   

        /*½Å¿ëÄ«µå(ISP)*/
        $ags->SetValue("partial_mm",trim($request->partial_mm));   //ÀÏ¹ÝÇÒºÎ±â°£
        $ags->SetValue("noIntMonth",trim($request->noIntMonth));   //¹«ÀÌÀÚÇÒºÎ±â°£
        $ags->SetValue("KVP_CURRENCY",trim($request->KVP_CURRENCY)); //KVP_ÅëÈ­ÄÚµå
        $ags->SetValue("KVP_CARDCODE",trim($request->KVP_CARDCODE)); //KVP_Ä«µå»çÄÚµå
        $ags->SetValue("KVP_SESSIONKEY",$request->KVP_SESSIONKEY); //KVP_SESSIONKEY
        $ags->SetValue("KVP_ENCDATA",$request->KVP_ENCDATA);     //KVP_ENCDATA
        $ags->SetValue("KVP_CONAME",$this->get_trim($request->KVP_CONAME));   //KVP_Ä«µå¸í
        $ags->SetValue("KVP_NOINT",trim($request->KVP_NOINT));   //KVP_¹«ÀÌÀÚ=1 ÀÏ¹Ý=0
        $ags->SetValue("KVP_QUOTA",trim($request->KVP_QUOTA));   //KVP_ÇÒºÎ°³¿ù

        /*½Å¿ëÄ«µå(¾È½É)*/
        $ags->SetValue("CardNo",trim($request->CardNo));     //Ä«µå¹øÈ£
        $ags->SetValue("MPI_CAVV",$request->MPI_CAVV);     //MPI_CAVV
        $ags->SetValue("MPI_ECI",$request->MPI_ECI);       //MPI_ECI
        $ags->SetValue("MPI_MD64",$request->MPI_MD64);     //MPI_MD64

        /*½Å¿ëÄ«µå(ÀÏ¹Ý)*/
        $ags->SetValue("ExpMon",trim($request->ExpMon));       //À¯È¿±â°£(¿ù)
        $ags->SetValue("ExpYear",trim($request->ExpYear));     //À¯È¿±â°£(³â)
        $ags->SetValue("Passwd",trim($request->Passwd));       //ºñ¹Ð¹øÈ£
        $ags->SetValue("SocId",trim($request->SocId));       //ÁÖ¹Îµî·Ï¹øÈ£/»ç¾÷ÀÚµî·Ï¹øÈ£

        /*°èÁÂÀÌÃ¼»ç¿ë*/
        $ags->SetValue("ICHE_OUTBANKNAME",trim($request->ICHE_OUTBANKNAME));   //ÀÌÃ¼ÀºÇà¸í
        $ags->SetValue("ICHE_OUTACCTNO",trim($request->ICHE_OUTACCTNO));     //ÀÌÃ¼°èÁÂ¹øÈ£
        $ags->SetValue("ICHE_OUTBANKMASTER",trim($request->ICHE_OUTBANKMASTER)); //ÀÌÃ¼°èÁÂ¼ÒÀ¯ÁÖ
        $ags->SetValue("ICHE_AMOUNT",trim($request->ICHE_AMOUNT));       //ÀÌÃ¼±Ý¾×

        /*ÇÚµåÆù»ç¿ë*/
        $ags->SetValue("HP_SERVERINFO",trim($request->HP_SERVERINFO)); //SERVER_INFO(ÇÚµåÆù°áÁ¦)
        $ags->SetValue("HP_HANDPHONE",trim($request->HP_HANDPHONE));   //HANDPHONE(ÇÚµåÆù°áÁ¦)
        $ags->SetValue("HP_COMPANY",trim($request->HP_COMPANY));     //COMPANY(ÇÚµåÆù°áÁ¦)
        $ags->SetValue("HP_ID",trim($request->HP_ID));         //HP_ID(ÇÚµåÆù°áÁ¦)
        $ags->SetValue("HP_SUBID",trim($request->HP_SUBID));       //HP_SUBID(ÇÚµåÆù°áÁ¦)
        $ags->SetValue("HP_UNITType",trim($request->HP_UNITType));   //HP_UNITType(ÇÚµåÆù°áÁ¦)
        $ags->SetValue("HP_IDEN",trim($request->HP_IDEN));       //HP_IDEN(ÇÚµåÆù°áÁ¦)
        $ags->SetValue("HP_IPADDR",trim($request->HP_IPADDR));     //HP_IPADDR(ÇÚµåÆù°áÁ¦)

        /*ARS»ç¿ë*/
        $ags->SetValue("ARS_NAME",trim($request->ARS_NAME));       //ARS_NAME(ARS°áÁ¦)
        $ags->SetValue("ARS_PHONE",trim($request->ARS_PHONE));     //ARS_PHONE(ARS°áÁ¦)

        /*°¡»ó°èÁÂ»ç¿ë*/
        $ags->SetValue("VIRTUAL_CENTERCD",trim($request->VIRTUAL_CENTERCD)); //ÀºÇàÄÚµå(°¡»ó°èÁÂ)
        $ags->SetValue("VIRTUAL_DEPODT",trim($request->VIRTUAL_DEPODT));   //ÀÔ±Ý¿¹Á¤ÀÏ(°¡»ó°èÁÂ)
        $ags->SetValue("ZuminCode",trim($request->ZuminCode));       //ÁÖ¹Î¹øÈ£(°¡»ó°èÁÂ)
        $ags->SetValue("MallPage",trim($request->MallPage));         //»óÁ¡ ÀÔ/Ãâ±Ý Åëº¸ ÆäÀÌÁö(°¡»ó°èÁÂ)
        $ags->SetValue("VIRTUAL_NO",trim($request->VIRTUAL_NO));       //°¡»ó°èÁÂ¹øÈ£(°¡»ó°èÁÂ)

        /*¿¡½ºÅ©·Î»ç¿ë*/
        $ags->SetValue("ES_SENDNO",trim($request->ES_SENDNO));       //¿¡½ºÅ©·ÎÀü¹®¹øÈ£

        /*°èÁÂÀÌÃ¼(¼ÒÄÏ) °áÁ¦ »ç¿ë º¯¼ö*/
        $ags->SetValue("ICHE_SOCKETYN",trim($request->ICHE_SOCKETYN));     //°èÁÂÀÌÃ¼(¼ÒÄÏ) »ç¿ë ¿©ºÎ
        $ags->SetValue("ICHE_POSMTID",trim($request->ICHE_POSMTID));       //°èÁÂÀÌÃ¼(¼ÒÄÏ) ÀÌ¿ë±â°üÁÖ¹®¹øÈ£
        $ags->SetValue("ICHE_FNBCMTID",trim($request->ICHE_FNBCMTID));     //°èÁÂÀÌÃ¼(¼ÒÄÏ) FNBC°Å·¡¹øÈ£
        $ags->SetValue("ICHE_APTRTS",trim($request->ICHE_APTRTS));       //°èÁÂÀÌÃ¼(¼ÒÄÏ) ÀÌÃ¼ ½Ã°¢
        $ags->SetValue("ICHE_REMARK1",trim($request->ICHE_REMARK1));       //°èÁÂÀÌÃ¼(¼ÒÄÏ) ±âÅ¸»çÇ×1
        $ags->SetValue("ICHE_REMARK2",trim($request->ICHE_REMARK2));       //°èÁÂÀÌÃ¼(¼ÒÄÏ) ±âÅ¸»çÇ×2
        $ags->SetValue("ICHE_ECWYN",trim($request->ICHE_ECWYN));         //°èÁÂÀÌÃ¼(¼ÒÄÏ) ¿¡½ºÅ©·Î¿©ºÎ
        $ags->SetValue("ICHE_ECWID",trim($request->ICHE_ECWID));         //°èÁÂÀÌÃ¼(¼ÒÄÏ) ¿¡½ºÅ©·ÎID
        $ags->SetValue("ICHE_ECWAMT1",trim($request->ICHE_ECWAMT1));       //°èÁÂÀÌÃ¼(¼ÒÄÏ) ¿¡½ºÅ©·Î°áÁ¦±Ý¾×1
        $ags->SetValue("ICHE_ECWAMT2",trim($request->ICHE_ECWAMT2));       //°èÁÂÀÌÃ¼(¼ÒÄÏ) ¿¡½ºÅ©·Î°áÁ¦±Ý¾×2
        $ags->SetValue("ICHE_CASHYN",trim($request->ICHE_CASHYN));       //°èÁÂÀÌÃ¼(¼ÒÄÏ) Çö±Ý¿µ¼öÁõ¹ßÇà¿©ºÎ
        $ags->SetValue("ICHE_CASHGUBUN_CD",trim($request->ICHE_CASHGUBUN_CD)); //°èÁÂÀÌÃ¼(¼ÒÄÏ) Çö±Ý¿µ¼öÁõ±¸ºÐ
        $ags->SetValue("ICHE_CASHID_NO",trim($request->ICHE_CASHID_NO));     //°èÁÂÀÌÃ¼(¼ÒÄÏ) Çö±Ý¿µ¼öÁõ½ÅºÐÈ®ÀÎ¹øÈ£

        /*°èÁÂÀÌÃ¼-ÅÚ·¡¹ðÅ·(¼ÒÄÏ) °áÁ¦ »ç¿ë º¯¼ö*/
        $ags->SetValue("ICHEARS_SOCKETYN", trim($request->ICHEARS_SOCKETYN));  //ÅÚ·¹¹ðÅ·°èÁÂÀÌÃ¼(¼ÒÄÏ) »ç¿ë ¿©ºÎ
        $ags->SetValue("ICHEARS_ADMNO", trim($request->ICHEARS_ADMNO));      //ÅÚ·¹¹ðÅ·°èÁÂÀÌÃ¼ ½ÂÀÎ¹øÈ£       
        $ags->SetValue("ICHEARS_POSMTID", trim($request->ICHEARS_POSMTID));    //ÅÚ·¹¹ðÅ·°èÁÂÀÌÃ¼ ÀÌ¿ë±â°üÁÖ¹®¹øÈ£
        $ags->SetValue("ICHEARS_CENTERCD", trim($request->ICHEARS_CENTERCD));  //ÅÚ·¹¹ðÅ·°èÁÂÀÌÃ¼ ÀºÇàÄÚµå      
        $ags->SetValue("ICHEARS_HPNO", trim($request->ICHEARS_HPNO));      //ÅÚ·¹¹ðÅ·°èÁÂÀÌÃ¼ ÈÞ´ëÆù¹øÈ£  

        $ags->startPay();

        if($ags->GetResult("rSuccYn") == "y")
        {
            return true;
        }

        return false;
    }

    function nicepay(Request $request)
    {
        $nicepayWEB = new \NicePayWEB();
        $httpRequestWrapper = new \NicePayHttpServletRequestWrapper($_REQUEST);
        $_REQUEST = $httpRequestWrapper->getHttpRequestMap();
        $payMethod = "CARD";
        $merchantKey = setting('nicepay_merchant_key');

        $nicepayWEB->setParam("NICEPAY_LOG_HOME", config_path('Logs') );             // 로그 디렉토리 설정
        $nicepayWEB->setParam("APP_LOG","1");                           // 어플리케이션로그 모드 설정(0: DISABLE, 1: ENABLE)
        $nicepayWEB->setParam("EncFlag","S");                           // 암호화플래그 설정(N: 평문, S:암호화)
        $nicepayWEB->setParam("SERVICE_MODE", "PY0");                   // 서비스모드 설정(결제 서비스 : PY0 , 취소 서비스 : CL0)
        $nicepayWEB->setParam("Currency", "KRW");                       // 통화 설정(현재 KRW(원화) 가능)
        $nicepayWEB->setParam("CHARSET", "UTF8");                       // 인코딩
        $nicepayWEB->setParam("PayMethod",$payMethod);                  // 결제방법
        $nicepayWEB->setParam("LicenseKey",$merchantKey);               // 상점키

        /*
        *******************************************************
        * <결제 결과 필드>
        * 아래 응답 데이터 외에도 전문 Header와 개별부 데이터 Get 가능
        *******************************************************
        */
        $responseDTO    = $nicepayWEB->doService($_REQUEST);
        $resultCode     = $responseDTO->getParameter("ResultCode");

        if($request->PayMethod == "CARD")
        {
           return  $resultCode == "3001" ? true : false;   
        }
    }

    function agsMobile(Request $request)
    {
        $agsMobile = new \AGSMobile(setting('ags_store_id'), $request->tracking_id, $request->transaction, '/logs');
        $agsMobile->setLogging(true); 
        $result = $agsMobile->approve();
        if($result['status'] == "ok")
        {
            return true;
        }
    }

    function creditcard(Request $request)
    {
       
        $agent = new Agent;
        $is_desktop = $agent->isDesktop();
        if($is_desktop){
            if(setting('dafault_payment_gateway') == "nicepay")
            {
                if($this->nicepay($request)){
                    return "Success"; 
                    $class = $this->save();
                    $class = Classer::find($class->id);
                    $class->status = "pending";
                    $class->payment_method = 'creditcard';
                    
                    $class->save();
                    return view(theme('enrollment.reciept'), compact('class','ags_result'));   
                }else{
                    return "Failed";
                }
            }else{
                $agsPay = $this->agsPay($request);
                if($agsPay){
                    $class = $this->save();
                    $class = Classer::find($class->id);
                    $class->status = "pending";
                    $class->payment_method = 'creditcard';
                    
                    $class->save();
                    return view(theme('enrollment.reciept'), compact('class','ags_result'));   
                }
            }
        }else{
            $mobile = $this->agsMobile($request);
            if($mobile){

                $class = $this->save();
                $class = Classer::find($class->id);
                $class->status = "pending";
                $class->payment_method = 'creditcard';
                
                $class->save();
                return view(theme('enrollment.reciept'), compact('class','ags_result'));   
            }
        }
    
        //saving classes
        // $class = $this->save();
        // $class = Classer::find($class->id);
        // $class->status = "pending";
        // $class->payment_method = 'creditcard';
        
        // $class->save();
        // return view(theme('enrollment.reciept'), compact('class','ags_result'));   
        
        // $ags_reciept_url = 'https://www.allthegate.com/customer/receiptLast3.jsp/' .
        //                     '?sRetailer_id' . $request['StoreId'] .
        //                     "&approve=" . $request['rApprNo']  .
        //                     "&send_no=" . $request['ES_SENDNO'] .  
        //                     "&send_dt=" . $request['rApprTm'];

        //return view(theme('enrollment.reciept'), compact('class','ags_result', 'ags_reciept_url'));    
        
    }


    public function save()
    {
        ini_set('memory_limit', '1024M');
        if(session('reenroll.is_reenroll.0')){

            $class_info = Classer::find(session('reenroll.class_id.0'));
            $last_session = $class_info->classSession()->orderBy('id','DESC')->first();
            //get Start Date
            $start_date = date("Y-m-d", strtotime("+1 day", strtotime($last_session->date_time)));
            
            $time = $class_info->time;
            
            $days[] = $class_info->day()->pluck('day_number')->toArray();
            
            $num_months = $class_info->num_months;

            $course_id = $class_info->course_id;

            $course = Course::find($class_info->course_id);
            $status = "ongoing";
            $teacher = null;
            $curriculum = null;
            
            $class_teacher = $class_info->admin_id;

             if(Auth::user()->discount_amount)
            { 
               $price = get_discount($class_info->payment_price);
            }else{
               $price = $class_info->payment_price;
            }

            $note = "";

        }else{
            $start_date = session('selectedCourse.start_date.0');
            $time = session('selectedCourse.time.0');
            $days = session('selectedCourse.days');
            $num_months = session('course_months.0');
            $course_id = session('course_id.0');
            $course = Course::where('id', $course_id)->first();
            $teacher = session('teacher.0');
            $curriculum = session('curriculum.0');
            $status = "pending";
            $class_teacher = null;
        
            // if($num_months == 1){
            //     $price = $course->price;
            // }else if($num_months == 3 ){
            //     $price = $course->three_price;
            // }else if($num_months == 6 ){
            //     $price = $course->six_price;
            // }else if($num_months == 12 ){
            //     $price = $course->twelve_price;
            // }
            if(!session('freecoupon')){
                if($num_months == 1){
                    if(Auth::user()->discount_amount)
                    { 
                        $price = get_discount($course->price);
                    }else{
                        $price = $course->price;
                    }
                }else if($num_months == 3 ){
                    if(Auth::user()->discount_amount)
                    { 
                        $price = get_discount($course->three_price);
                    }else{
                        $price = $course->three_price;
                    }
                }else if($num_months == 6 ){
                    if(Auth::user()->discount_amount)
                    { 
                        $price = get_discount($course->six_price);
                    }else{
                        $price = $course->six_price;
                    }
                }else if($num_months == 12 ){
                    if(Auth::user()->discount_amount)
                    { 
                        $price = get_discount($course->twelve_price);
                    }else{
                        $price = $course->twelve_price;
                    }
                }  
            }


            $note = "";
        }

        if(session('coupon')){
            $price = $price - session('coupon.0')->amount;
        }
        

        $classer = new Classer();
        $classer->class_code = time();
        $classer->user_id = Auth::user()->id;
        $classer->course_id = $course_id;
        $classer->type = $course->coursetype->name;
        $classer->start_date = date('Y-m-d', strtotime($start_date));
        $classer->time = date('H:i', strtotime($time));
        $classer->payment_price = session('freecoupon') ? 0 : $price;
        $classer->total_sessions = session('number_of_session.0');
        $classer->minutes = $course->minutes;
        $classer->num_months = $num_months;
        $classer->postponed_credits = $course->postponed_credit * $num_months;

        $classer->status = $status;
        if($class_teacher)
        {
            $classer->admin_id = $class_teacher;
        }

        $classer->days_in_week = $course->days_in_week;

        if(count($teacher)){
            $note .= "Teacher: " . $teacher . "<br>";
        }

        if(count($curriculum)){
            $note .= "Curriculum: " . $curriculum;
        }

        $classer->note = $note;
        
        $classer->save();

        $class_id = $classer->id;

        if(session('coupon'))
        {
            $coupon = Coupon::find(session('coupon.0')->id);
            $coupon->classer_id = $class_id;
            $coupon->save();
        }

        if(session('freecoupon'))
        {
            $coupon = Coupon::find(session('freecoupon.0')->id);
            $coupon->classer_id = $class_id;
            $coupon->save();
        }
        

        $classer->day()->attach($days[0]);

        $total_session = session('number_of_session.0');
        $date = date("Y-m-d", strtotime($start_date));
        $loop = true;
        $found_date = 1;
        $i = 0;
        while ($loop) {
            if ($found_date <= $total_session) {
                $added_date = date("Y-m-d", strtotime("+$i day", strtotime($date)));
                $day_num = date('N', strtotime($added_date));
                if (in_array($day_num, $days[0])) {
                    if (!in_array($added_date, arrayHolidayDates())) {
                        $found_date++;
                        $date_time = $added_date . " " . date('H:i', strtotime($time));
                        $class_session = new ClassSession;
                        $class_session->date_time = $date_time;
                        $class_session->status = 'ready';
                        $class_session->classer_id = $class_id;
                        
                        if($class_teacher)
                        {
                            $class_session->admin_id = $class_teacher;
                        }
                        
                        $class_session->save();
                        
                        event( new SessionDayCreated($class_session));
                    }
                }
            } else {
                $loop = false;
                break;
            }
            
            $i++;
        }
        
        // forget all sessions
        Session::forget('selectedCourse.start_date');
        Session::forget('selectedCourse.time');
        Session::forget('selectedCourse.days');
        Session::forget('course_months');
        Session::forget('course_id');
        Session::forget('course_months');
        Session::forget('course_price');
        Session::forget('reenroll.class_id');
        Session::forget('reenroll.is_reenroll');
        Session::forget('coupon');
        Session::forget('number_of_session');
        
        //get all admins
        $admins = Admin::where('type', 'administrator')->get();
        
        Session::push('enrolled_classer_id', $class_id);

        
        return $classer;
    }

    

    function reciept($code)
    {
        $class = Classer::where('class_code', $code)->first();
        
        $product_name = $this->productgenarator($class->course->courseType->name, $class->minutes, $class->days_in_weeky,  $class->num_months);
        
        if(count($class))
        {
          return view(theme('enrollment.reciept'), compact('class', 'product_name'));
        }else{
          return redirect()->route('enrollment.step1');
        }
    }

}
