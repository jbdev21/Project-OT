<?php
/**
 * User: JOFIE BERNAS
 * Date: 1/4/2018
 */
?>


<?php $__env->startSection('content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
               <label><?php echo app('translator')->getFromJson('menu.create_class'); ?></label>
            </div>
            <div class="x_content">
            	<br>
               <createclass 
               url="<?php echo e(route('admin.classer.store')); ?>" token="<?php echo e(csrf_token()); ?>" 
               today="<?php echo e(date('Y-m-d')); ?>"
               label-username = "<?php echo app('translator')->getFromJson('label.username'); ?>"
               label-teacher = "<?php echo app('translator')->getFromJson('label.teacher'); ?>"
               label-course = "<?php echo app('translator')->getFromJson('label.course'); ?>"
               label-minutes = "<?php echo app('translator')->getFromJson('label.minutes'); ?>"
               label-months = "<?php echo app('translator')->getFromJson('label.months'); ?>"
               label-selectdays = "<?php echo app('translator')->getFromJson('label.select_days'); ?>"
               label-daysperweek = "<?php echo app('translator')->getFromJson('label.days_per_week'); ?>"
               label-startdate = "<?php echo app('translator')->getFromJson('label.start_date'); ?>"
               label-starttime = "<?php echo app('translator')->getFromJson('label.start_time'); ?>"
               label-status = "<?php echo app('translator')->getFromJson('label.status'); ?>"
               label-pending = "<?php echo app('translator')->getFromJson('label.pending'); ?>"
               label-paid = "<?php echo app('translator')->getFromJson('label.paid'); ?>"
               > 
               </createclass>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('site/css/bootstrap-datetimepicker.min.css')); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
	<script src="<?php echo e(asset('site/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('site/js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/parsley.js')); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
            $('#select2').select2();
            $('.select').select2();

            $('#datepicker').datetimepicker({
                format: 'YYYY/MM/DD',
                //minDate: new Date(),
                defaultDate: new Date()
            });
        })


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>