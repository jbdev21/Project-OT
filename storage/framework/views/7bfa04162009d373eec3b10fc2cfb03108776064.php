<?php $__env->startSection('content'); ?>

<div class="page-heading" style="background-image: url('http://tortillastudio.com/wp-content/uploads/2016/05/blog_header.jpg');">
    <div class="container">
      <h1><?php echo app('translator')->getFromJson('label.enrollment'); ?></h1>
    </div>  
  </div>
<br>

<div class="container" style="min-height: 450px" >
			<br>
      <div class="stepwizard">
        <div class="stepwizard-row setup-panel" style="font-size: 20px;">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p> <?php echo app('translator')->getFromJson('label.course'); ?></p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-primary btn-circle">2</a>
                <p><?php echo app('translator')->getFromJson('label.date_&_time'); ?></p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-primary btn-circle">3</a>
                <p><?php echo app('translator')->getFromJson('label.payment'); ?></p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle">4</a>
                <p><?php echo app('translator')->getFromJson('label.finish'); ?></p>
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
                      <td><?php echo app('translator')->getFromJson('label.product'); ?></td>
                      <td><?php echo app('translator')->getFromJson('label.'. snake_case($course->coursetype->name)); ?></td>
                    </tr>
                    <tr>
                      <td width="35%"><?php echo app('translator')->getFromJson('label.price'); ?>:</td>
                      <td> <div class="price" > 
                            <?php if(Auth::user()->discount_amount): ?> 
                                <strike class="text-warning"><?php echo e(number_format(session('course_price.0'))); ?></strike> 
                                <?php echo e(number_format(get_discount(session('course_price.0')))); ?> 원  <small><?php echo e(Auth::user()->discount_reason); ?> </small>
                            <?php else: ?> 
                                <?php echo e(number_format(session('course_price.0'))); ?> 원
                            <?php endif; ?> 
                            
                            </div></td>
                    </tr>
                    <tr>
                      <td><?php echo app('translator')->getFromJson('label.minutes'); ?>:</td>
                      <td><?php echo e($course->minutes); ?> <?php echo app('translator')->getFromJson('label.min'); ?></td>
                    </tr>
                    <tr>
                      <td><?php echo app('translator')->getFromJson('label.months'); ?>:</td>
                      <td><?php echo e($months); ?> <?php echo app('translator')->getFromJson('label.months'); ?></td>
                    </tr>
                    <tr>
                      <td><?php echo app('translator')->getFromJson('label.sessions'); ?>:</td>
                      <td><?php echo e(session('number_of_session.0')); ?> <?php echo app('translator')->getFromJson('label.sessions'); ?></td>
                    </tr>
                    <tr>
                      <td> <?php echo app('translator')->getFromJson('label.days'); ?>:</td>
                      <td>
                        <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo app('translator')->getFromJson('label.'. str_limit($day->day_name, 3, '')); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?php echo app('translator')->getFromJson('label.postponed_credits'); ?>:</td>
                      <td><?php echo e($course->postponed_credit); ?> </td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-4">
                  <button data-toggle="modal" id="pay"
                    <?php if(!$is_desktop): ?>
                        onclick="doPay(document.form);"
                    <?php else: ?>
                      <?php if(setting('default_payment_gateway') == "nicepay"): ?>
                      onClick="nicepayStart();"
                      <?php endif; ?>
                    <?php endif; ?>
                    class="btn btn-success btn-lg btn-block">
                      <i class="fa fa-credit-card" style="font-size:40px;display:block; margin-bottom:5px;" ></i> <?php echo app('translator')->getFromJson('label.credi_card'); ?>
                  </button>
                  <br>
                  <br>
                  <a class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-briefcase" style="font-size:40px;display:block; margin-bottom:5px;"></i> <?php echo app('translator')->getFromJson('label.bank'); ?>
                  </a>
                
            </div>
          </div>
        </div>
      </div>
      <div class="spacer"></div>

</div>
    <?php if(!$is_desktop): ?>
      <form method="post" action="https://www.allthegate.com/payment/mobilev2/intro.jsp" name="form" style="display:none">
          <?php echo e(csrf_token()); ?>

          <input type="text" name="OrdNo" value="<?php echo e(time()); ?>"/>
          <input type="text" name="ProdNm"  value="<?php echo e($product_name); ?>"/>
          <input type="text" name="Amt" value="<?php echo e($price); ?>"/>
          <input type="text" name="DutyFree" value="0"/>
          <input type="text" name="OrdNm"  value="<?php echo e(Auth::user()->korean_name); ?>"/>
          <input type="text" name="StoreNm"  value="<?php echo e(config('app.name')); ?>"/>
          <input type="text" name="OrdPhone"  value="<?php echo e(Auth::user()->contact_number); ?>"/>
          <input type="text" name="UserEmail"  value="<?php echo e(Auth::user()->email); ?>"/>
          <select name="Job">
                    <option value="card">CARD NORMAL</option>
                </select>
          <input type="text" name="StoreId" maxlength="20" value="<?php echo e(setting('ags_store_id')); ?>"/>
          <input type="text"  name="MallUrl" value="<?php echo e(url('/')); ?>"/>
          <input type="text"  name="UserId" maxlength="20" value="<?php echo e(Auth::user()->username); ?>">
          <input type="text"  name="OrdAddr" value="Online Class">
          <input type=hidden name="RcpNm"	value="<?php echo e(Auth::user()->username); ?>">
          <input type=hidden name="RcpPhone" value="<?php echo e(Auth::user()->contact_number); ?>">
          <input type=hidden name="DlvAddr" value="Online Class">
          <input type=hidden name="Remark" 	value="<?php echo e(Auth::user()->korean_name); ?>">
          <input type="text"  name="RtnUrl" value="<?php echo e(url('enrollment/creditcard')); ?>">

          <input type="text"  name="AppRtnScheme" value="">
          <input type="text"  name="Column1" maxlength="200" value="">
          <input type="text"  name="Column2" maxlength="200" value="">
          <input type="text"  name="Column3" maxlength="200" value="">
          <input type="text" name="MallPage" maxlength="100" value="<?php echo e(url('enrollment/reciept')); ?>">
          <input type=text name="VIRTUAL_DEPODT" maxlength=8 value="">
          <input type="text" name="HP_ID" maxlength="10" value="">
          <input type="text" name="HP_PWD" maxlength="10" value="">
          <input type="text" name="HP_SUBID" maxlength="10" value="">
          <input type="text" name="ProdCode" maxlength="10" value="">
          <select name="HP_UNITType">
              <option value="1" selected>
          </select>
          <input type="text"  name="CancelUrl" value="<?php echo e(url('enrollment/step3')); ?>">
          <input type="text" name="SubjectData" value="금액">
          <input type="hidden" name="DeviId" value="9000400001">            
          <input type="hidden" name="QuotaInf" value="0:2:3">         
          <input type="hidden" name="NointInf" value="NONE">
      </form>
    <?php else: ?>
      <?php if(setting('default_payment_gateway') == "nicepay"): ?>
            <?php 
              $ediDate =  date("YmdHis");
              $hashData = bin2hex(hash('sha256', $ediDate . trim(setting('nicepay_merchant_id')) . $price. trim(setting('nicepay_merchant_key'))  , true));
             ?>
            <form name="payForm" style="display:none" method="post" action="<?php echo e(route('enrollment.creditcard')); ?>">
                <?php echo e(csrf_field()); ?>

                <input name="PayMethod" value="CARD">
                <input type="text" name="GoodsName" value="<?php echo e($product_name); ?>">
                <input type="text" name="GoodsCnt" value="1">
                <input type="text" name="Amt" value="<?=$price?>">
                <input type="text" name="BuyerName" value="<?php echo e(Auth::user()->username); ?>">
                <input type="text" name="BuyerTel" value="<?php echo e(Auth::user()->contact_number); ?>">
                <input type="text" name="Moid" value="<?php echo e(time()); ?>">
                <input type="text" name="MID" value="<?php echo e(setting('nicepay_merchant_id')); ?>">
                <input type="text" name="UserIP" value="<?php echo e($_SERVER['REMOTE_ADDR']); ?>"/>                       
                
                <!-- ¿É¼Ç -->
                <input type="hidden" name="VbankExpDate" id="vExp"/>                          
                <input type="hidden" name="BuyerEmail" value="<?php echo e(Auth::user()->email); ?>"/>            			  
                <input type="hidden" name="TransType" value=""/>                             
                
                <!-- º¯°æ ºÒ°¡´É -->
                <!-- <input type="hidden" name="SocketYN" value="Y"/>                       -->
                <!-- <input type="hidden" name="MallIP" value="<?php echo e($_SERVER['REMOTE_ADDR']); ?>"/>              -->
                <input type="hidden" name="EncodeParameters" value=""/>                       
                <input type="hidden" name="EdiDate" value="<?php echo e($ediDate); ?>"/>                  
                <input type="hidden" name="EncryptData" value="<?php echo e($hashData); ?>"/>            <!-- ÇØ½¬°ª	-->
                <input type="hidden" name="TrKey" value=""/>                                 
                    
            </form>
      <?php endif; ?>
      <?php if(setting('default_payment_gateway') == "allthegate"): ?>
      <div class="modal fade" style="margin-top:40px;" id="modal-ags" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-ags">
        <div class="modal-dialog" role="document">
          <div class="modal-content"  style="border-radius:0px;">
            <div class="modal-header" style="background-color:#5cb85c; color:white;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel-ags"><?php echo app('translator')->getFromJson('label.credit_card'); ?></h4>
            </div>
            <div class="modal-body" style="border-radius:0px;">
              <form class="frmAGS_pay" name="frmAGS_pay" id="frmAGS_pay" action="<?php echo e(route('enrollment.creditcard')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="checkbox" name=call_method value="iframe" checked>
                <input type="hidden" name=payment_method value="bank">
                <input type="text" name=JOB value="onlycard">
                <input type="text" name=StoreId maxlength="20" value="<?php echo e(setting('ags_store_id')); ?>">
                <input type="text" name=OrdNo value="<?php echo e(time()); ?>">
                <input type="text" name=Amt value="<?php echo e($price); ?>">
                <input type="text" name=StoreNm value="<?php echo e(config('app.name')); ?>">
                <input type="text" name=MallUrl value="Class" value="<?php echo e(url('')); ?>">
                <input type=hidden name=ProdNm value="<?php echo e($product_name); ?>">
                <input type=hidden name=UserEmail value="<?php echo e(Auth::user()->email); ?>">
                <input type="text" name=ags_logoimg_url value="<?php echo e(asset('site/img/logo1.png')); ?>">
                <input type="text" name=SubjectData value="">
                <input type="text" name=UserId value="<?php echo e(Auth::user()->username); ?>">
        
                <input type="text" name=OrdNm value="<?php echo e(Auth::user()->korean_name); ?>">
                <input type="text" name=OrdPhone value="<?php echo e(Auth::user()->contact_number); ?>">
                <input type="text" name=OrdAddr value="">
                  <input type=hidden name=Flag value="true">        <!-- ½ºÅ©¸³Æ®°áÁ¦»ç¿ë±¸ºÐÇÃ·¡±× -->
                  <input type=hidden name=AuthTy value="">    
                  <input type=hidden name=SubTy value="">     
                  <input type=hidden name=AGS_HASHDATA value="<?php echo e(md5(setting('ags_store_id') . time() . $price)); ?>"> 

                <input type=hidden name=RcpNm	value="<?php echo e(Auth::user()->username); ?>">
                <input type=hidden name=RcpPhone value="<?php echo e(Auth::user()->contact_number); ?>">
                <input type=hidden name=DlvAddr value="Online Class">
                <input type=hidden name=Remark 	value="<?php echo e(Auth::user()->korean_name); ?>">
                <input type=hidden name=CardSelect 	value="">

                <input type=hidden name=DeviId value="">			<!-- (신용카드공통)		단말기아이디 -->
                <input type=hidden name=QuotaInf value="0">			<!-- (신용카드공통)		일반할부개월설정변수 -->
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
      <?php endif; ?>
  

    <?php endif; ?>

    <div class="modal fade" style="margin-top:40px;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content"  style="border-radius:0px;">
          <div class="modal-header" style="background-color:#5cb85c; color:white;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->getFromJson('label.bank_information'); ?></h4>
          </div>
          <div class="modal-body" style="border-radius:0px;">

            <form class="" action="<?php echo e(route('enrollment.bank')); ?>" method="post" id="bank_form">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="payment_method" value="bank">
                <table class="table table-hover table-striped"  style="font-size: 18px;">
                  <tr>
                    <td width="30%"><b><?php echo app('translator')->getFromJson('label.bank_name'); ?></b></td>
                    <td>: <?php echo e(setting('bank_name')); ?></td>
                  </tr>
                  <tr>
                    <td><b><?php echo app('translator')->getFromJson('label.bank_account_number'); ?></b></td>
                    <td>: <?php echo e(setting('bank_account_number')); ?></td>
                  </tr>
                  <tr>
                    <td><b><?php echo app('translator')->getFromJson('label.bank_account_holder_name'); ?></b></td>
                    <td>: <?php echo e(setting('bank_account_holder_name')); ?></td>
                  </tr>
                </table>
                <table class="table table-striped">
                  <tr>
                    <td width="30%"><b><?php echo app('translator')->getFromJson('label.date_of_payment'); ?></b></td>
                    <td>
                        <input type="text" name="date_of_payment" id="date_of_payment" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td><b><?php echo app('translator')->getFromJson('label.payor_name'); ?></b></td>
                    <td>
                        <input type="text" name="payor_name" value="<?php echo e(Auth::user()->korean_name); ?>" class="form-control">
                    </td>
                  </tr>
                </table>
                <button type="button" onclick="$('#bank_form').submit(); this.disabled = true"  id="bank_submit_btn"  class="btn btn-success btn-lg center-block"><?php echo app('translator')->getFromJson('button.submit'); ?></button>
            </form>
          </div>
        </div>
      </div>
    </div>

   


<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
  <?php if(!is_desktop()): ?>
    <link rel="stylesheet" href="<?php echo e(asset('site/css/import.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('site/css/common.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('site/css/layout.css')); ?>" />
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
  <?php if(!$is_desktop): ?>
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
  <?php else: ?>
     
      <?php if(setting('default_payment_gateway') == "allthegate"): ?>
        <script type="text/javascript" src="https://www.allthegate.com/plugin/jquery-1.11.1.js"></script>
        <script language=javascript src="https://www.allthegate.com/plugin/AGSWallet_New.js"></script>
        <script type="text/javascript" src="https://www.allthegate.com/payment/webPay/js/ATGClient_new.js"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/allthegate.js')); ?>"></script>
      <?php endif; ?>

      <?php if(setting('default_payment_gateway') == "nicepay"): ?>
        <script src="https://web.nicepay.co.kr/flex/js/nicepay_tr_utf.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/nicepay.js')); ?>"></script>
      <?php endif; ?>

  <?php endif; ?>
  
  <script src="<?php echo e(asset('site/js/bootstrap-datetimepicker.min.js')); ?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
          $('#date_of_payment').datetimepicker({
              format: 'YYYY/MM/DD',
              minDate: new Date(),
              defaultDate: new Date()
          });

      var openwin = window.open("AGS_progress.html","popup","width=300,height=160");
      openwin.close();

      })
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(theme('layout.app'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>