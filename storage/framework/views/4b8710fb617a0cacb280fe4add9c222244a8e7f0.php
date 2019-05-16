<?php $__env->startSection('student_side_menu'); ?>
	<?php echo $__env->make('partials.student_side_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(is_desktop()): ?>
        <div class="box padding-sm">
            <class-show modalshow="<?php echo e(Request::get('modal')); ?>" credits="<?php echo e($class->postponed_credits); ?>" today="<?php echo e(Request::get('session')); ?>" classid="<?php echo e($class->id); ?>" <?php if($latest_session): ?> sessionurl="<?php echo e(video_url($latest_session->id, 'student')); ?>" <?php endif; ?>></class-show>
        </div>
    <?php else: ?>
        <div class="container">
            <class-show-mobile modalshow="<?php echo e(Request::get('modal')); ?>" credits="<?php echo e($class->postponed_credits); ?>" today="<?php echo e(Request::get('session')); ?>" classid="<?php echo e($class->id); ?>" <?php if($latest_session): ?> sessionurl="<?php echo e(video_url($latest_session->id, 'student')); ?>" <?php endif; ?>></class-show-mobile>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
    <style type="text/css">
        .fa-star{
            color:#7dba19;
            font-size: 18px;
        }

      
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
    <script>
    	$(document).ready(function(){
            
            $(document).on('click', '.tr_days', function(){

                $('.tr_days').removeClass('activetr')
                $(this).addClass('activetr')

            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>