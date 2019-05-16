<?php $__env->startSection('content'); ?>
    <div class="page-heading" style="background-image: url('https://cdn.ila-france.com/wp-content/uploads/2017/01/french-test-1750x660-1.jpg'); background-position: center;">
		<div class="container">
			<h2><?php echo app('translator')->getFromJson('label.level_test'); ?></h2>
		</div>	
	</div>
    <br>
    <div class="container web-board">
        <ul class="nav nav-tabs" role="tablist" style="">
            <li role="presentation" class="active">
              <a href="#register" aria-controls="register" role="tab" data-toggle="tab">
                무료체험 신청
              </a>
            </li>
            <li role="presentation">
              <a href="#logintest" aria-controls="logintest"   role="tab" data-toggle="tab">
               체험수업 진행 및 결과보기
              </a>
            </li>
            <li role="presentation">
                <a href="http://ontalk.co.kr/notice/1536823795"  aria-controls="logintest" >체험수업 진행방법 확인</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="register">
                <form action="<?php echo e(route('leveltest.store')); ?>" id="leveltest_from" method="post">
                    <div class="row" id="form-div">
                        <?php echo e(csrf_field()); ?>

                        <div class="col-sm-6">
                            <label> <?php echo app('translator')->getFromJson('label.korean_name'); ?></label>
                            <input class="form-control" required name="korean_name">
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <label><?php echo app('translator')->getFromJson('label.english_name'); ?></label>
                            <input required class="form-control" name="name">
                            <br>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group" id="checkmobile-div" >
                            <label  class="control-label"><?php echo app('translator')->getFromJson('label.contact_number'); ?> <small id="in-use-message" style="display: none;">&nbsp;&nbsp;  * 등록된 번호 입니다</small></label>
                            <input required class="form-control" name="mobile" id="checkmobile">
                            
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <label><?php echo app('translator')->getFromJson('label.class_type'); ?></label>
                            <select required class="form-control" name="type">
                            <option value="Video"><?php echo app('translator')->getFromJson('label.video_class'); ?></option>
                            <option value="Phone"><?php echo app('translator')->getFromJson('label.phone_class'); ?></option>
                            </select>
                            <br>
                        </div>
                        <div class="col-sm-6">
                        <label><?php echo app('translator')->getFromJson('label.date'); ?></label>
                        <div class="form-group" name="date">
                            <div class='input-group date' id='datepicker'>
                                <input required type='text' name="date" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <label><?php echo app('translator')->getFromJson('label.time'); ?></label>
                            <br>
                            <select required type='text' name="time" style="width: 100%" class="form-control" >
                                    <optgroup label="Morning Class"></optgroup>
                                    <option value="6:00AM">6:00 AM</option>
                                    <option value="6:10AM">6:10 AM</option>
                                    <option value="6:20AM">6:20 AM</option>
                                    <option value="6:30AM">6:30 AM</option>
                                    <option value="6:40AM">6:40 AM</option>
                                    <option value="6:50AM">6:50 AM</option>
                                    <option value="7:00AM">7:00 AM</option>
                                    <option value="7:10AM">7:10 AM</option>
                                    <option value="7:20AM">7:20 AM</option>
                                    <option value="7:30AM">7:30 AM</option>
                                    <option value="7:30AM">7:30 AM</option>
                                    <option value="8:00AM">8:00 AM</option>
                                    <option value="8:10AM">8:10 AM</option>
                                    <option value="8:20AM">8:20 AM</option>
                                    <option value="8:30AM">8:30 AM</option>
                                    <option value="8:40AM">8:40 AM</option>
                                    <option value="8:50AM">8:50 AM</option>
                                    <option value="9:00AM">9:00 AM</option>
                                    <option value="9:10AM">9:10 AM</option>
                                    <option value="9:20AM">9:20 AM</option>
                                    <option value="9:30AM">9:30 AM</option>
                                    <option value="9:40AM">9:40 AM</option>
                                    <option value="9:50AM">9:50 AM</option>
                                    <option value="10:00AM">10:00 AM</option>
                                    <option value="10:10AM">10:10 AM</option>
                                    <option value="10:20AM">10:20 AM</option>
                                    <option value="10:30AM">10:30 AM</option>
                                    <option value="10:40AM">10:40 AM</option>
                                    <option value="10:50AM">10:50 AM</option>
                                    <option value="11:00AM">11:00 AM</option>
                                    <option value="11:10AM">11:10 AM</option>
                                    <option value="11:20AM">11:20 AM</option>
                                    <option value="11:30AM">11:30 AM</option>
                                    <option value="11:40AM">11:40 AM</option>
                                    <option value="11:50AM">11:50 AM</option>
                                    <option value="12:00AM">12:00 AM</option>
                                    <optgroup label="Afternoon Class"></optgroup>
                                    <option value="12:10PM">12:10 PM</option>
                                    <option value="12:20PM">12:20 PM</option>
                                    <option value="12:30PM">12:30 PM</option>
                                    <option value="12:40PM">12:40 PM</option>
                                    <option value="12:50PM">12:50 PM</option>
                                    <option value="01:00PM">01:00 PM</option>
                                    <option value="01:10PM">01:10 PM</option>
                                    <option value="01:20PM">01:20 PM</option>
                                    <option value="01:30PM">01:30 PM</option>
                                    <option value="01:40PM">01:40 PM</option>
                                    <option value="01:50PM">01:50 PM</option>
                                    <option value="02:00PM">02:00 PM</option>
                                    <option value="02:10PM">02:10 PM</option>
                                    <option value="02:20PM">02:20 PM</option>
                                    <option value="02:30PM">02:30 PM</option>
                                    <option value="02:40PM">02:40 PM</option>
                                    <option value="02:50PM">02:50 PM</option>
                                    <option value="03:00PM">03:00 PM</option>
                                    <option value="03:10PM">03:10 PM</option>
                                    <option value="03:20PM">03:20 PM</option>
                                    <option value="03:30PM">03:30 PM</option>
                                    <option value="03:40PM">03:40 PM</option>
                                    <option value="03:50PM">03:50 PM</option>
                                    <option value="04:00PM">04:00 PM</option>
                                    <option value="04:10PM">04:10 PM</option>
                                    <option value="04:20PM">04:20 PM</option>
                                    <option value="04:30PM">04:30 PM</option>
                                    <option value="04:40PM">04:40 PM</option>
                                    <option value="04:50PM">04:50 PM</option>
                                    <option value="05:00PM">05:00 PM</option>
                                    <optgroup label="Night Class"></optgroup>
                                    <option value="06:00PM">06:00 PM</option>
                                    <option value="06:10PM">06:10 PM</option>
                                    <option value="06:20PM">06:20 PM</option>
                                    <option value="06:30PM">06:30 PM</option>
                                    <option value="06:40PM">06:40 PM</option>
                                    <option value="06:50PM">06:50 PM</option>
                                    <option value="07:00PM">07:00 PM</option>
                                    <option value="07:10PM">07:10 PM</option>
                                    <option value="07:20PM">07:20 PM</option>
                                    <option value="07:30PM">07:30 PM</option>
                                    <option value="07:40PM">07:40 PM</option>
                                    <option value="07:50PM">07:50 PM</option>
                                    <option value="08:00PM">08:00 PM</option>
                                    <option value="08:10PM">08:10 PM</option>
                                    <option value="08:20PM">08:20 PM</option>
                                    <option value="08:30PM">08:30 PM</option>
                                    <option value="08:40PM">08:40 PM</option>
                                    <option value="08:50PM">08:50 PM</option>
                                    <option value="09:00PM">09:00 PM</option>
                                    <option value="09:10PM">09:10 PM</option>
                                    <option value="09:20PM">09:20 PM</option>
                                    <option value="09:30PM">09:30 PM</option>
                                    <option value="09:40PM">09:40 PM</option>
                                    <option value="09:50PM">09:50 PM</option>
                                    <option value="10:00PM">10:00 PM</option>
                                    <option value="10:10PM">10:10 PM</option>
                                    <option value="10:20PM">10:20 PM</option>
                                    <option value="10:30PM">10:30 PM</option>
                                    <option value="10:40PM">10:40 PM</option>
                                    <option value="10:50PM">10:50 PM</option>
                                    <option value="11:00PM">11:00 PM</option>
                                    <option value="11:10PM">11:10 PM</option>
                                    <option value="11:20PM">11:20 PM</option>
                                    <option value="11:30PM">11:30 PM</option>
                                    <option value="11:40PM">11:40 PM</option>
                                    <option value="11:50PM">11:50 PM</option>
                                </select>
                                <br>
                        </div>

                        <div class="col-sm-6">
                        <label for="">연령대 </label>
                        <select name="age_group" class="form-control">
                            <option value="Elementary or below">초등학생 또는 이하연령</option>
                            <option value="Teenager">중고등학생 </option>
                            <option value="Adult">성인 </option>
                        </select>
                        <br>
                        </div>
                        <div class="col-sm-6">
                        <label for="">셀프 레벨링 </label>
                            <select name="self_assesment" class="form-control">
                                <option value="LV1/4 Starter">LV1/4 시작레벨 (알파벳 읽기 가능)</option>
                                <option value="LV2/4 Can Read Word">LV2/4 준초급 (단어형태 읽기 가능)  </option>
                                <option value="LV3/4 Can Speak Little">LV3/4 초급(천천히 대화 가능) </option>
                                <option value="LV4/4 Can Communicate">LV4/4 중급이상 (일상대화 가능)  </option>
                            </select>
                            <br>
                        </div>
                        
                    </div> 
                    <br>
                    <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button type="submit" class="btn btn-success btn-lg register_submit btn-block" disabled="true"><?php echo app('translator')->getFromJson('button.confirm'); ?></button>
                    </div>
                    </div>
                </form>
                <div class="text-center" id="success" style="display: none;"> 
                  <br>
                    <div class="check_mark">
                        <div class="sa-icon sa-success animate">
                        <span class="sa-line sa-tip animateSuccessTip"></span>
                        <span class="sa-line sa-long animateSuccessLong"></span>
                        <div class="sa-placeholder"></div>
                        <div class="sa-fix"></div>
                        </div>
                    </div>

                    <h3> <?php echo app('translator')->getFromJson('label.registration_success'); ?></h3>
                    <br>

                    <div class="text-center">
                        <a href="http://ontalk.co.kr/notice/1536823795" class="btn btn-warning btn-lg"   aria-label="Close">체험수업 진행방법 확인</a>
                    </div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="logintest">
              <br>
                <div class="text-center">
                    <div class="row">
                        <br>
                        <div class="col-sm-4 col-sm-offset-4">
                        <form action="<?php echo e(route('leveltest.login')); ?>" method="post" id="leveltest-login">
                            <?php echo e(csrf_field()); ?> 
                            <label>
                            등록하신 전화번호로 로그인 <br>
                            (체험수업은 회원가입 불필요 합니다)
                            </label>
                            <br>
                            <br>
                            <div class="form-group" id="leveltest-login-div" >
                                <input type="text" name="mobile" class="form-control mobile" required>
                                <label class="control-label"> ※ 전화번호 숫자만 입력</label> 
                            </div> 
                            <br>
                            <br>
                            <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button type="submit" class="btn btn-success btn-lg btn-block"><?php echo app('translator')->getFromJson('button.login'); ?></button>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <style>
        .web-board {
            padding: 30px;
            padding-top: 40px;
        }

        @media (min-width: 481px) and (max-width: 767px) {
            .web-board {
                padding: 5px;
            }

            .web-board .container {
                padding: 5px;
            }
        }

        @media (min-width: 320px) and (max-width: 480px) {
            .web-board {
                padding: 5px;
            }

            .web-board .container {
                padding: 5px;
            }
        }

        @media (min-width: 481px) and (max-width: 767px) {
            .web-board .nav-tabs li a {
                padding: 5px;
            }

            .web-board .nav-tabs li a .postponed {
                font-size: 12px;
            }

            .web-board .nav-tabs li a span {
                font-size: 8px;
                padding: 3px;
            }
        }

        @media (min-width: 320px) and (max-width: 480px) {
            .web-board .nav-tabs li a {
                padding: 5px;
            }

            .web-board .nav-tabs li a .postponed {
                font-size: 11px;
            }

            .web-board .nav-tabs li a span {
                font-size: 8px;
                padding: 3px;
            }
        }
      
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('site/js/jquery.mask.min.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#checkmobile').change(function(){
                var mobile = $(this).val();
                if(mobile.length){
                    $.get('<?php echo e(url('/api/validatemobile')); ?>/' + mobile, function(data){
                        console.log(data)
                        if(data != 0){
                            $('#checkmobile-div').addClass('has-error')
                            $('.register_submit').prop('disabled', true)
                            $('#in-use-message').show('fast')
                        }else{
                            $('.register_submit').prop('disabled', false)
                            $('#checkmobile-div').removeClass('has-error')
                            $('#in-use-message').hide('fast')
                        }
                    })
                }
            })

            $('#leveltest-login').submit(function(e){
                e.preventDefault();
                $('#leveltest-login-div').removeClass('has-error') 
                var url = $(this).attr('action');
                var data = $(this).serialize();

                $.post(url, data, function(data){
                     if(data.status){
                        window.open('<?php echo e(url('/leveltest')); ?>', '_self')
                    }else{
                        $('#leveltest-login-div').addClass('has-error') 
                    } 
                })
                // axios.post(url, data)
                //     .then( response => {
                //         if(response.data.status){
                //             window.open('<?php echo e(url('/leveltest')); ?>', '_self')
                //         }else{
                //             $('#leveltest-login-div').addClass('has-error') 
                //         } 
                //     })
                //     .catch( error => {
                //         console.log(error)
                //     })
            })

            $('#leveltest_from').submit(function(e){
                e.preventDefault()
                var url = '<?php echo e(route('leveltest.store')); ?>'
                var data = $(this).serialize();
                $.post(url, data, function(data){
                    $('#leveltest_from').hide();
                    $('#success').show();
                    // setTimeout(function() {
                    //     $("#success").hide();
                    //     $('#leveltest_from').fadeIn('slow');
                    //     $('#leveltest_from').trigger('reset');
                    // }, 2000);
                })
            })

            $('#datepicker').datetimepicker({
                format: 'YYYY/MM/DD',
                minDate: new Date(),
                defaultDate: new Date()
                });

            $('#select2').select2();
            
            $('#checkmobile').mask('000 0000 000Z', {translation:  {'Z': {pattern: /[0-9]/, optional: true}}});
            
            $('.mobile').mask('000 0000 000Z', {translation:  {'Z': {pattern: /[0-9]/, optional: true}}});

        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(theme('layout.app'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>