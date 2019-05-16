<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/24/2017
 * Time: 6:29 PM
 */
?>


<?php $__env->startSection('content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
      
        <div class="x_panel">
            <?php if(is_desktop()): ?>
                <table class="table">
                    <tr>
                        <th rowspan="2" width="10%">
                            <a href="<?php echo e(route('admin.classer.index')); ?>" class="btn btn-default  btn-block"><i class="fa fa-ban"></i> <?php echo app('translator')->getFromJson('button.back'); ?></a>
                            
                            <a class="btn btn-success btn-block" href="<?php echo e(route('admin.classer.edit', $class->id)); ?>"><i class="fa fa-eye"></i> 수강변경</a>
                        </th>
                        <th><?php echo app('translator')->getFromJson('label.username'); ?></th>
                        <th><?php echo app('translator')->getFromJson('label.korean_name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('label.english_name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('label.contact_number'); ?></th>
                        <th><?php echo app('translator')->getFromJson('label.class_type'); ?></th>
                        <th><?php echo app('translator')->getFromJson('label.time'); ?></th>
                        <th><?php echo app('translator')->getFromJson('label.min'); ?></th>
                        <th><?php echo app('translator')->getFromJson('label.days'); ?></th>
                        <th><?php echo app('translator')->getFromJson('label.teacher'); ?></th>
                        <th><?php echo app('translator')->getFromJson('label.duration'); ?></th>
                        <th><?php echo app('translator')->getFromJson('label.number_of_sessions'); ?></th>
                        <th><?php echo app('translator')->getFromJson('label.price'); ?></th>
                        <th><?php echo app('translator')->getFromJson('label.payment_method'); ?></th>
                        <?php if($class->note): ?>
                        <th></th>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td><?php echo e($class->user->username); ?></td>
                        <td><?php echo e($class->user->korean_name); ?></td>
                        <td><?php echo e($class->user->name); ?></td>
                        <td>
                            <?php echo e($class->user->contact_number); ?>

                            <?php if($class->user->contact_number1): ?>
                            <br>     <?php echo e($class->user->contact_number1); ?>

                            <?php endif; ?>
                        </td>
                        <td><?php echo e($class->type); ?></td>
                        <td><?php echo e(date_formater('time_format', $class->time)); ?></td>
                        <td><?php echo e($class->minutes); ?><?php echo app('translator')->getFromJson('label.min'); ?></td>
                        <td>
                            <?php $__currentLoopData = $class->day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $days): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo app('translator')->getFromJson('label.'. strtolower(str_limit($days->day_name, 3, ""))); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>
                            <?php if($class->admin): ?>
                                <?php echo e($class->admin->name); ?>

                            <?php else: ?>
                                <small style="color:Red"> <?php echo app('translator')->getFromJson('label.no_teacher_assigned'); ?> </small> 
                                <a href="<?php echo e(route('admin.classer.edit', $class->id)); ?>" class="btn btn-xs btn-primary"><i class="fa fa-thumb-tack"></i> <?php echo app('translator')->getFromJson('button.assign'); ?></a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php 
                            if($class->getFirstSession())
                            {
                                $first_session = $class->getFirstSession();
                                $last_session = $class->getLastSession();
                                echo date_formater('date_format', $first_session->date_time). ' - ' . date_formater('date_format', $last_session->date_time);
                            }
                             ?>
                        </td>
                        <td>
                            <?php if($class->classSession): ?>
                               <?php 
                                $total = count($class->getRemainingSession()) ? count($class->getRemainingSession()) : "<span style='color:red'>". count($class->getRemainingSession()) ."</span>" ;
                                $total .= '/' . $class->total_sessions;
                                echo  $total;
                                ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo e(number_format($class->payment_price)); ?><?php echo app('translator')->getFromJson('label.won'); ?>
                        </td>
                        <td align="center">
                            <?php if($class->payment_method == "bank"): ?> <img class="img-responsive" src="<?php echo e(asset('image/icons/bank.png')); ?>"> <?php else: ?> <img class="img-responsive" src="<?php echo e(asset('image/icons/credit-card.png')); ?>"> <?php endif; ?>
                        </td>
                        <?php if($class->note): ?>
                        <td>
                            <a tabindex="0" data-placement="left" class="btn btn-xs btn-default"  role="button" data-toggle="popover" data-trigger="focus" title="<?php echo app('translator')->getFromJson('label.note'); ?>" data-content="<?php echo $class->note; ?>" data-html="true">?</a>
                        </td>
                        <?php endif; ?>
                    </tr>
                </table>
            <?php else: ?>
                <a href="<?php echo e(route('admin.classer.index')); ?>" class="btn btn-default  btn-block"><i class="fa fa-ban"></i> <?php echo app('translator')->getFromJson('button.back'); ?></a>
                <a href="<?php echo e(route('admin.classer.edit', $class->id)); ?>" class="btn btn-success btn-block"><i class="fa fa-eye"></i> 수강변경</a>
            <?php endif; ?> 

            <?php if(is_desktop()): ?>
                <class-show  classid="<?php echo e($class->id); ?>" postponed_credits="<?php echo e($class->postponed_credits); ?>" today="<?php echo e(Request::get('session')); ?>" rangedefault="<?php if($class->getLastSession()): ?> <?php echo e(date('m/d/Y')); ?> - <?php echo e(date('m/d/Y', strtotime($class->getLastSession()->date_time))); ?> <?php endif; ?>" defaultsession="<?php echo e(Request::get('session')); ?>" bookid="<?php echo e($class->book_id); ?>" studentid="<?php echo e($class->user_id); ?>" ></class-show>
            <?php else: ?>
                <class-show-mobile classid="<?php echo e($class->id); ?>" today="<?php echo e(Request::get('session')); ?>" rangedefault="<?php if($class->getLastSession()): ?> <?php echo e(date('m/d/Y')); ?> - <?php echo e(date('m/d/Y', strtotime($class->getLastSession()->date_time))); ?> <?php endif; ?>" defaultsession="<?php echo e(Request::get('session')); ?>" bookid="<?php echo e($class->book_id); ?>" studentid="<?php echo e($class->user_id); ?>" ></class-show-mobile>
            <?php endif; ?>
            
        </div>
      
    </div>


    



<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('css/daterangepicker.css')); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <style>
        .x_panel{
            font-size:1em;
        }

        .info-tr{
            border:2px solid #1abb9c !important;
        }

       
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
   
    <script src="https://cdn.jsdelivr.net/momentjs/2.18.1/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/locale/ko.js"></script>
    <script src="<?php echo e(asset('js/daterangepicker.js')); ?>"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
    
   
    <script>
            $('[data-toggle="popover"]').popover()
            var data = '<?php echo $holidays; ?>';
            var json = JSON.parse(data);
            $('#calendar_bernas').fullCalendar({
                lang: 'ko',
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listMonth'
                },
                defaultDate: '<?php echo e(date('Y-m-d')); ?>',
              
                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours

                events: json,

            })
        $(document).ready(function() {
            
     
            $("#checkAll").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $(document).on('click', '.tr_days', function(){
                $('.tr_days').removeClass('activetr')
                $(this).addClass('activetr')
            })

            $('.select').select2();
            
            $('.edit-postponed').click(function(){
                var id = $(this).data('id');
                var datess = $(this).data('date');
                var reason = $(this).data('reason');
                var edit_deduction = $(this).data('deduction')
                $('#edit_reason').val(reason);
                $("#edit_id").val(id);
                $('#edit_date').val(datess);

                if(edit_deduction == 1){
                    $('#edit_credit_1').prop('checked', true);
                    $('#edit_deduction').val(1);
                }else{
                    $('#edit_credit_0').prop('checked', true);
                    $('#edit_deduction').val(0);
                }

                $('.add-postpone-div').hide();
                $('.edit-postpone-div').fadeIn();
            });

            $('.close-edit').click(function(){
                $('.add-postpone-div').fadeIn();
                $('.edit-postpone-div').hide();
            })

             $("#reservation").daterangepicker({
                minDate: <?php echo e(date('Y-m-d')); ?>,
                opens: 'left',
                
             }, function (startDate, endDate, period) {
              $(this).val(startDate.format('L') + ' – ' + endDate.format('L'))
            });

            $('#tab-range-btn').click(function(){
                $('#type').val('range')
            })

            $('#tab-date-btn').click(function(){
                $('#type').val('date')
            })

        });
    
      var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      }

      var editor_config = {
        height : "200",
        selector: "textarea.my-editor",
        forced_root_block :false,
        branding:false,
        menubar:"",
        language : 'ko_KR',
        rooElement: false,
        plugins: [
          ""
        ],
       // toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
       toolbar: false, 
       relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
          
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }

          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'S2 File Manager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
          });
        }
      };

    tinymce.init(editor_config);

           
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>