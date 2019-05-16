<?php $__env->startSection('content'); ?>
	<div class="page-heading" style="background-image: url('<?php echo e(asset('image/image/teacher.jpg')); ?>');">
		<div class="container">
			<h1 style="color: #fff;">공지사항</h1>
		</div>	
	</div>
	<div class="container">
		<!-- <?php echo $__env->make(theme('partials.tab-menu'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<h3><?php echo app('translator')->getFromJson('label.notice'); ?></h3> -->
				<br>
				<?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="notice-box">
						<span class="pull-right"><?php echo e(date('Y-m-d', strtotime($notice->created_at))); ?></span>
						<h3><a href="<?php echo e(route('notice.show', $notice->slug)); ?>"><?php echo e($notice->title); ?></a> </h3>
						
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make(theme('layout.app'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>