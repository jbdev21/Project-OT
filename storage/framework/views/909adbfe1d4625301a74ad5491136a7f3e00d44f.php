<?php $__env->startSection('student_side_menu'); ?>
	<?php echo $__env->make('partials.student_side_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="box padding-sm">
	<div class="row">
		<div class="col-sm-3 text-center">
			<a href="<?php echo e(route('dashboard.class.index')); ?>">
				<div class="well">
					<img src="<?php echo e(asset('image/talk.svg')); ?>" class="center-block img-responsive" style="width: 70%">
					<br>
					<?php echo app('translator')->getFromJson('label.my_class'); ?>
				</div>
			</a>
		</div>
		<div class="col-sm-3 text-center">
			<a href="<?php echo e(route('dashboard.calendar.index')); ?>">
				<div class="well">
					<img src="<?php echo e(asset('image/calendar.svg')); ?>" class="center-block img-responsive"style="width: 70%" >
					<br>
					<?php echo app('translator')->getFromJson('label.calendar_of_class'); ?>
				</div>
			</a>
		</div>
		<div class="col-sm-3 text-center">
			<a href="<?php echo e(route('dashboard.rating.index')); ?>">
				<div class="well">
					<img src="<?php echo e(asset('image/rating.svg')); ?>" class="center-block img-responsive"style="width: 70%" >
					<br>
					Rating
				</div>
			</a>
		</div>
		<div class="col-sm-3 text-center">
			<a href="<?php echo e(route('dashboard.book.index')); ?>">
				<div class="well">
					<img src="<?php echo e(asset('image/guide.svg')); ?>" class="center-block img-responsive"style="width: 70%" >
					<br>
					Books
				</div>
			</a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-3 text-center">
			<a href="">
				<div class="well">
					<img src="<?php echo e(asset('image/teacher.svg')); ?>" class="center-block img-responsive"style="width: 70%" >
					<br>
					Teachers
				</div>
			</a>
		</div>
		<div class="col-sm-3 text-center">
			<a href="">
				<div class="well">
					<img src="<?php echo e(asset('image/setting.svg')); ?>" class="center-block img-responsive"style="width: 70%" >
					<br>
					Setting
				</div>
			</a>
		</div>
		<div class="col-sm-3 text-center">
			<a href="">
				<div class="well">
					<img src="<?php echo e(asset('image/help.svg')); ?>" class="center-block img-responsive"style="width: 70%" >
					<br>
					Help
				</div>
			</a>
		</div>
		<div class="col-sm-3 text-center">
			<a href="">
				<div class="well">
					<img src="<?php echo e(asset('image/bug.svg')); ?>" class="center-block img-responsive"style="width: 70%" >
					<br>
					Report
				</div>
			</a>
		</div>

	</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>