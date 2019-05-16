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
                Calendar of Class 
                <span class="pull-right">
                    Present: <span style="background-color: <?php echo e(setting('present_color')); ?>">&nbsp;&nbsp;&nbsp;&nbsp;</span> &nbsp;&nbsp;
                    Postponed: <span style="background-color: <?php echo e(setting('postponed_color')); ?>">&nbsp;&nbsp;&nbsp;&nbsp;</span> &nbsp;&nbsp;
                    Absent: <span style="background-color: <?php echo e(setting('absend_color')); ?>">&nbsp;&nbsp;&nbsp;&nbsp;</span>  
                    Holiday: <span style="background-color: <?php echo e(setting('holiday_color')); ?>">&nbsp;&nbsp;&nbsp;&nbsp;</span>  
                </span>
            </div>
            <div class="row">
               
                <div class="col-sm-12">
                    
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
            var data = '<?php echo $sessions; ?>';
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

           

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teacher', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>