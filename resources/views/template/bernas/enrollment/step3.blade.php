@extends(theme('layout.app'))

@section('content')

<div class="page-heading" style="background-image: url('http://tortillastudio.com/wp-content/uploads/2016/05/blog_header.jpg');">
    <div class="container">
      <h1>@lang('label.enrollment')</h1>
    </div>  
  </div>
<br>

<div class="container" style="min-height: 450px" >
			<br>
      <div class="stepwizard">
        <div class="stepwizard-row setup-panel" style="font-size: 20px;">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p> @lang('label.course')</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-primary btn-circle">2</a>
                <p>@lang('label.date_&_time')</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-primary btn-circle">3</a>
                <p>@lang('label.payment')</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle">4</a>
                <p>@lang('label.finish')</p>
            </div>
            
        </div>
			</div>
			<br>
      <br>
      <br>
      <div class="row">
       
        <div class=" col-sm-12 animated slideInUp" style=" padding:30px; margin:5px; border-radius:15px; border: 2px solid #05b247;">
          <div class="row">
            <div class="col-sm-8">
                <table class="table" style="font-size: 18px;">
                    <tr>
                      <td>@lang('label.product')</td>
                      <td>@lang('label.'. snake_case($course->coursetype->name))</td>
                    </tr>
                    <tr>
                      <td width="35%">@lang('label.price'):</td>
                      <td> <div class="price" > 
                            @if(Auth::user()->discount_amount) 
                                <strike class="text-warning">{{number_format(session('course_price.0')) }}</strike> 
                                {{ number_format(get_discount(session('course_price.0'))) }} 원  <small>{{ Auth::user()->discount_reason }} </small>
                            @else 
                                {{number_format(session('course_price.0')) }} 원
                            @endif 
                            
                            </div></td>
                    </tr>
                    <tr>
                      <td>@lang('label.minutes'):</td>
                      <td>{{$course->minutes}} @lang('label.min')</td>
                    </tr>
                    <tr>
                      <td>@lang('label.months'):</td>
                      <td>{{$months}} @lang('label.months')</td>
                    </tr>
                    <tr>
                      <td>@lang('label.sessions'):</td>
                      <td>{{ session('number_of_session.0') }} @lang('label.sessions')</td>
                    </tr>
                    <tr>
                      <td> @lang('label.days'):</td>
                      <td>
                        @foreach($days as $day)
                            @lang('label.'. str_limit($day->day_name, 3, ''))
                        @endforeach
                      </td>
                    </tr>
                    <tr>
                      <td>@lang('label.postponed_credits'):</td>
                      <td> {{$course->postponed_credit * $months}}  연기</td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-4">
                  <button data-toggle="modal" id="pay"
                    @if(!$is_desktop)
                        onclick="doPay(document.form);"
                    @else
                      @if(setting('default_payment_gateway') == "nicepay")
                      onClick="nicepayStart();"
                      @endif
                    @endif
                    class="btn btn-success btn-lg btn-block">
                      <i class="fa fa-credit-card" style="font-size:40px;display:block; margin-bottom:5px;" ></i> @lang('label.credi_card')
                  </button>
                  <br>
                  <br>
                  <a class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-briefcase" style="font-size:40px;display:block; margin-bottom:5px;"></i> @lang('label.bank')
                  </a>
                
            </div>
          </div>
        </div>
      </div>
      <div class="spacer"></div>

</div>
    @if(!$is_desktop)
      <form method="post" action="https://www.allthegate.com/payment/mobilev2/intro.jsp" name="form" style="display:none">
          {{ csrf_token() }}
          <input type="text" name="OrdNo" value="{{ time() }}"/>
          <input type="text" name="ProdNm"  value="{{ $product_name }}"/>
          <input type="text" name="Amt" value="{{ $price }}"/>
          <input type="text" name="DutyFree" value="0"/>
          <input type="text" name="OrdNm"  value="{{ Auth::user()->korean_name }}"/>
          <input type="text" name="StoreNm"  value="{{ config('app.name') }}"/>
          <input type="text" name="OrdPhone"  value="{{Auth::user()->contact_number}}"/>
          <input type="text" name="UserEmail"  value="{{Auth::user()->email}}"/>
          <select name="Job">
                    <option value="card">CARD NORMAL</option>
                </select>
          <input type="text" name="StoreId" maxlength="20" value="{{setting('ags_store_id')}}"/>
          <input type="text"  name="MallUrl" value="{{ url('/') }}"/>
          <input type="text"  name="UserId" maxlength="20" value="{{ Auth::user()->username }}">
          <input type="text"  name="OrdAddr" value="Online Class">
          <input type=hidden name="RcpNm"	value="{{Auth::user()->username}}">
          <input type=hidden name="RcpPhone" value="{{Auth::user()->contact_number}}">
          <input type=hidden name="DlvAddr" value="Online Class">
          <input type=hidden name="Remark" 	value="{{Auth::user()->korean_name}}">
          <input type="text"  name="RtnUrl" value="{{ url('enrollment/creditcard') }}">

          <input type="text"  name="AppRtnScheme" value="">
          <input type="text"  name="Column1" maxlength="200" value="">
          <input type="text"  name="Column2" maxlength="200" value="">
          <input type="text"  name="Column3" maxlength="200" value="">
          <input type="text" name="MallPage" maxlength="100" value="{{ url('enrollment/reciept') }}">
          <input type=text name="VIRTUAL_DEPODT" maxlength=8 value="">
          <input type="text" name="HP_ID" maxlength="10" value="">
          <input type="text" name="HP_PWD" maxlength="10" value="">
          <input type="text" name="HP_SUBID" maxlength="10" value="">
          <input type="text" name="ProdCode" maxlength="10" value="">
          <select name="HP_UNITType">
              <option value="1" selected>
          </select>
          <input type="text"  name="CancelUrl" value="{{ url('enrollment/step3') }}">
          <input type="text" name="SubjectData" value="금액">
          <input type="hidden" name="DeviId" value="9000400001">            
          <input type="hidden" name="QuotaInf" value="0:2:3">         
          <input type="hidden" name="NointInf" value="NONE">
      </form>
    @else
      @if(setting('default_payment_gateway') == "nicepay")
            @php
              $ediDate =  date("YmdHis");
              $hashData = bin2hex(hash('sha256', $ediDate . trim(setting('nicepay_merchant_id')) . $price. trim(setting('nicepay_merchant_key'))  , true));
            @endphp
            <form name="payForm" style="display:none" method="post" action="{{route('enrollment.creditcard')}}">
                {{ csrf_field() }}
                <input name="PayMethod" value="CARD">
                <input type="text" name="GoodsName" value="{{ $product_name }}">
                <input type="text" name="GoodsCnt" value="1">
                <input type="text" name="Amt" value="<?=$price?>">
                <input type="text" name="BuyerName" value="{{Auth::user()->username}}">
                <input type="text" name="BuyerTel" value="{{Auth::user()->contact_number}}">
                <input type="text" name="Moid" value="{{time()}}">
                <input type="text" name="MID" value="{{ setting('nicepay_merchant_id') }}">
                <input type="text" name="UserIP" value="{{ $_SERVER['REMOTE_ADDR'] }}"/>                       
                
                <!-- ¿É¼Ç -->
                <input type="hidden" name="VbankExpDate" id="vExp"/>                          
                <input type="hidden" name="BuyerEmail" value="{{Auth::user()->email}}"/>            			  
                <input type="hidden" name="TransType" value=""/>                             
                
                <!-- º¯°æ ºÒ°¡´É -->
                <!-- <input type="hidden" name="SocketYN" value="Y"/>                       -->
                <!-- <input type="hidden" name="MallIP" value="{{ $_SERVER['REMOTE_ADDR'] }}"/>              -->
                <input type="hidden" name="EncodeParameters" value=""/>                       
                <input type="hidden" name="EdiDate" value="{{ $ediDate  }}"/>                  
                <input type="hidden" name="EncryptData" value="{{ $hashData }}"/>            <!-- ÇØ½¬°ª	-->
                <input type="hidden" name="TrKey" value=""/>                                 
                    
            </form>
      @endif
      @if(setting('default_payment_gateway') == "allthegate")
      <div class="modal fade" style="margin-top:40px;" id="modal-ags" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-ags">
        <div class="modal-dialog" role="document">
          <div class="modal-content"  style="border-radius:0px;">
            <div class="modal-header" style="background-color:#5cb85c; color:white;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel-ags">@lang('label.credit_card')</h4>
            </div>
            <div class="modal-body" style="border-radius:0px;">
              <form class="frmAGS_pay" name="frmAGS_pay" id="frmAGS_pay" action="{{route('enrollment.creditcard')}}" method="post">
                {{ csrf_field()}}
                <input type="checkbox" name=call_method value="iframe" checked>
                <input type="hidden" name=payment_method value="bank">
                <input type="text" name=JOB value="onlycard">
                <input type="text" name=StoreId maxlength="20" value="{{setting('ags_store_id')}}">
                <input type="text" name=OrdNo value="{{ time() }}">
                <input type="text" name=Amt value="{{$price}}">
                <input type="text" name=StoreNm value="{{config('app.name')}}">
                <input type="text" name=MallUrl value="Class" value="{{url('')}}">
                <input type=hidden name=ProdNm value="{{$product_name}}">
                <input type=hidden name=UserEmail value="{{Auth::user()->email}}">
                <input type="text" name=ags_logoimg_url value="{{asset('site/img/logo1.png')}}">
                <input type="text" name=SubjectData value="">
                <input type="text" name=UserId value="{{Auth::user()->username}}">
        
                <input type="text" name=OrdNm value="{{Auth::user()->korean_name}}">
                <input type="text" name=OrdPhone value="{{Auth::user()->contact_number}}">
                <input type="text" name=OrdAddr value="">
                  <input type=hidden name=Flag value="true">        <!-- ½ºÅ©¸³Æ®°áÁ¦»ç¿ë±¸ºÐÇÃ·¡±× -->
                  <input type=hidden name=AuthTy value="">    
                  <input type=hidden name=SubTy value="">     
                  <input type=hidden name=AGS_HASHDATA value="{{ md5(setting('ags_store_id') . time() . $price)  }}"> 

                <input type=hidden name=RcpNm	value="{{Auth::user()->username}}">
                <input type=hidden name=RcpPhone value="{{Auth::user()->contact_number}}">
                <input type=hidden name=DlvAddr value="Online Class">
                <input type=hidden name=Remark 	value="{{Auth::user()->korean_name}}">
                <input type=hidden name=CardSelect 	value="">

                <input type=hidden name=DeviId value="">			<!-- (신용카드공통)		단말기아이디 -->
                <input type=hidden name=QuotaInf value="0:2:3">			<!-- (신용카드공통)		일반할부개월설정변수 -->
                <input type=hidden name=NointInf value="NONE">		<!-- (신용카드공통)		무이자할부개월설정변수 -->
                <input type=hidden name=AuthYn value="">			<!-- (신용카드공통)		인증여부 -->
                <input type=hidden name=Instmt value="">			<!-- (신용카드공통)		할부개월수 -->
                <input type=hidden name=partial_mm value="">		<!-- (ISP사용)			일반할부기간 -->
                <input type=hidden name=noIntMonth value="">		<!-- (ISP사용)			무이자할부기간 -->
                <input type=hidden name=KVP_RESERVED1 value="">		<!-- (ISP사용)			RESERVED1 -->
                <input type=hidden name=KVP_RESERVED2 value="">		<!-- (ISP사용)			RESERVED2 -->
                <input type=hidden name=KVP_RESERVED3 value="">		<!-- (ISP사용)			RESERVED3 -->
                <input type=hidden name=KVP_CURRENCY value="">		<!-- (ISP사용)			통화코드 -->
                <input type=hidden name=KVP_CARDCODE value="">		<!-- (ISP사용)			카드사코드 -->
                <input type=hidden name=KVP_SESSIONKEY value="">	<!-- (ISP사용)			암호화코드 -->
                <input type=hidden name=KVP_ENCDATA value="">		<!-- (ISP사용)			암호화코드 -->
                <input type=hidden name=KVP_CONAME value="">		<!-- (ISP사용)			카드명 -->
                <input type=hidden name=KVP_NOINT value="">			<!-- (ISP사용)			무이자/일반여부(무이자=1, 일반=0) -->
                <input type=hidden name=KVP_QUOTA value="">			<!-- (ISP사용)			할부개월 -->
                <input type=hidden name=CardNo value="">			<!-- (안심클릭,일반사용)	카드번호 -->
                <input type=hidden name=MPI_CAVV value="">			<!-- (안심클릭,일반사용)	암호화코드 -->
                <input type=hidden name=MPI_ECI value="">			<!-- (안심클릭,일반사용)	암호화코드 -->
                <input type=hidden name=MPI_MD64 value="">			<!-- (안심클릭,일반사용)	암호화코드 -->
                <input type=hidden name=ExpMon value="">			<!-- (일반사용)			유효기간(월) -->
                <input type=hidden name=ExpYear value="">			<!-- (일반사용)			유효기간(년) -->
                <input type=hidden name=Passwd value="">			<!-- (일반사용)			비밀번호 -->
                <input type=hidden name=SocId value="">				<!-- (일반사용)			주민등록번호/사업자등록번호 -->
              </form>
            </div>
          </div>
        </div>
      </div>
      @endif
  

    @endif

    <div class="modal fade" style="margin-top:40px;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content"  style="border-radius:0px;">
          <div class="modal-header" style="background-color:#5cb85c; color:white;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">@lang('label.bank_information')</h4>
          </div>
          <div class="modal-body" style="border-radius:0px;">

            <form class="" action="{{route('enrollment.bank')}}" method="post" id="bank_form">
              {{ csrf_field()}}
              <input type="hidden" name="payment_method" value="bank">
                <table class="table table-hover table-striped"  style="font-size: 18px;">
                  <tr>
                    <td width="30%"><b>@lang('label.bank_name')</b></td>
                    <td>: {{ setting('bank_name')}}</td>
                  </tr>
                  <tr>
                    <td><b>@lang('label.bank_account_number')</b></td>
                    <td>: {{ setting('bank_account_number')}}</td>
                  </tr>
                  <tr>
                    <td><b>@lang('label.bank_account_holder_name')</b></td>
                    <td>: {{setting('bank_account_holder_name')}}</td>
                  </tr>
                </table>
                <table class="table table-striped">
                  <tr>
                    <td width="30%"><b>@lang('label.date_of_payment')</b></td>
                    <td>
                        <input type="text" name="date_of_payment" id="date_of_payment" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td><b>@lang('label.payor_name')</b></td>
                    <td>
                        <input type="text" name="payor_name" value="{{ Auth::user()->korean_name }}" class="form-control">
                    </td>
                  </tr>
                </table>
                <button type="button" onclick="$('#bank_form').submit(); this.disabled = true"  id="bank_submit_btn"  class="btn btn-success btn-lg center-block">@lang('button.submit')</button>
            </form>
          </div>
        </div>
      </div>
    </div>

   


@endsection
@section('styles')
  @if(!is_desktop())
    <link rel="stylesheet" href="{{asset('site/css/import.css')}}" />
    <link rel="stylesheet" href="{{asset('site/css/common.css')}}" />
    <link rel="stylesheet" href="{{asset('site/css/layout.css')}}" />
  @endif
@endsection
@section('scripts')
  @if(!$is_desktop)
    <script type="text/javascript" charset="euc-kr" src="https://www.allthegate.com/payment/mobilev2/csrf/csrf.real.js"></script> 
    <script type="text/javascript" charset="euc-kr">
        function doPay(form) {
            
            if(form.DeviId.value == "9000400002") {
              form.NointInf.value = "ALL";
            }
              
            AllTheGate.pay(document.form);
            return false;
        
        }
    </script>
  @else
     
      @if(setting('default_payment_gateway') == "allthegate")
        <script type="text/javascript" src="https://www.allthegate.com/plugin/jquery-1.11.1.js"></script>
        <script language=javascript src="https://www.allthegate.com/plugin/AGSWallet_New.js"></script>
        <script type="text/javascript" src="https://www.allthegate.com/payment/webPay/js/ATGClient_new.js"></script>
        <script type="text/javascript" src="{{ asset('js/allthegate.js') }}"></script>
      @endif

      @if(setting('default_payment_gateway') == "nicepay")
        <script src="https://web.nicepay.co.kr/flex/js/nicepay_tr_utf.js" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('js/nicepay.js') }}"></script>
      @endif

  @endif
  
  <script src="{{asset('site/js/bootstrap-datetimepicker.min.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
          $('#date_of_payment').datetimepicker({
              format: 'YYYY/MM/DD',
              minDate: new Date(),
              defaultDate: new Date()
          });
      })
  </script>
@endsection