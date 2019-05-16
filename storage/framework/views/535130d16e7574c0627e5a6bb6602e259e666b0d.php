<?php $__env->startSection('content'); ?>
	<div class="page-heading" style="background-image: url('<?php echo e(asset('image/image/teacher.jpg')); ?>');">
		<div class="container">
			<h1 style="color: #fff;">공지사항</h1>
		</div>	
	</div>
	<div class="container">
		
				<h2><?php echo e($notice->title); ?></h2>

        		<small><?php echo e(date_formater('datetime_format',$notice->created_at)); ?></small>
        		<br>
        		<br>
        		<div class="main-content">
        		    <?php echo $notice->message; ?>

                </div>   

        		<div class="spacer"></div>
                <div class="pull-right">
                    <div class="btn-group" role="group" aria-label="...">
                        <?php if($previous): ?>
                            <a class="btn btn-primary" href="<?php echo e(route( 'notice.show', $previous->slug)); ?>"><span class="fa fa-chevron-left"></span> 이전</a> 
                        <?php endif; ?>

                        <?php if($previous AND !$next OR !$previous AND $next): ?>
                            <a class="btn btn-primary" href="<?php echo e(url('notice')); ?>"> 목록 </a>
                        <?php endif; ?>

                        <?php if($previous AND $next): ?>
                             <a class="btn btn-primary" href="<?php echo e(url('notice')); ?>"> 목록 </a> 
                        <?php endif; ?> 
                        <?php if($next): ?>
                            <a class="btn btn-primary" href="<?php echo e(route( 'notice.show', $next->slug)); ?>">다음 <span class="fa fa-chevron-right"></span> </a>
                        <?php endif; ?>
                    </div>
                </div>
			
				<br>
				<br>	
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
            $('.main-content img').addClass('img-responsive');
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(theme('layout.app'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>