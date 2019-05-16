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
            <div class="x_title">
                Class Code: <?php echo e($class->class_code); ?>

            </div>
            <div class="row">
                <div class="col-sm-3">
                        <h2 class=""><?php echo e($class->user->username); ?></h2>
                        <div class="row">

                            <div class="col-xs-12">
                                <label>
                                    <?php if($class->user): ?>
                                    <?php echo e($class->user->korean_name); ?>

                                    <br>
                                    <?php echo e($class->user->name); ?>

                                    <br>
                                  

                                </label>
                                <br>
                                
                                <?php echo e($class->user->email); ?>

                                  <?php endif; ?>

                            </div>


                        </div>

                    <hr>

                    <h5 class="">Class Information</h5>
                    <table class="table">
                        <tr>
                            <td>Teacher:</td>
                            <td>
                                <?php if($class->admin): ?>
                                    <?php echo e($class->admin->name); ?>

                                <?php else: ?>
                                    <small style="color:Red"> No Teacher Assigned</small>
                                    <button class="btn btn-xs btn-primary"><i class="fa fa-thumb-tack"></i> Assign</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Class Type:</td>
                            <td> <?php echo e($class->type); ?></td>
                        </tr>
                        <tr>
                            <td>Class Days:</td>
                            <td><?php $__currentLoopData = $class->day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $days): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($days->day_name); ?><Br> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                        </tr>
                        <tr>
                            <td>Time:</td>
                            <td><?php echo e(date_formater('time_format', $class->time)); ?></td>
                        </tr>
                        <tr>
                            <td>Minute per Class:</td>
                            <td><?php echo e($class->minutes); ?><small>mins.</small></td>
                        </tr>
                        <tr>

                            <td>Number of Months:</td>
                            <td><?php echo e($class->num_months); ?> <small>mos.</small></td>
                        </tr>
                        <tr>
                            <td>Number of Session:</td>
                            <td>
                                <?php echo e(count($class->classSession()->where('status','ready')->get())); ?> / <?php echo e($class->total_sessions); ?>

                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-9">
                        <div id="calendar_bernas"></div>
                </div>


                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


    <script src="https://cdn.jsdelivr.net/momentjs/2.18.1/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
    <script>

        $(document).ready(function() {
            $('.select').select2();
            // page is now ready, initialize the calendar...
            var data = '<?php echo $class_sessions; ?>';
            var json = JSON.parse(data);
            $('#calendar_bernas').fullCalendar({
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

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.teacher', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>