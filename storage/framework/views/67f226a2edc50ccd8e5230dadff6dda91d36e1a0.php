<?php $__env->startSection('student_side_menu'); ?>
	<?php echo $__env->make('partials.student_side_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(is_desktop()): ?>
	<div class="box padding-sm small-text">
			<h6>내 수업</h6>
		<div class="table-responsive">  
		<table class="table">
			<thead>
				<tr>
					<th><?php echo app('translator')->getFromJson('label.type'); ?></th>
					<th><?php echo app('translator')->getFromJson('label.day'); ?></th>
					<th><?php echo app('translator')->getFromJson('label.time'); ?></th>
					<th><?php echo app('translator')->getFromJson('label.minute'); ?></th>
					<th><?php echo app('translator')->getFromJson('label.teacher'); ?></th>
					<th><?php echo app('translator')->getFromJson('label.session'); ?></th>
					<th><?php echo app('translator')->getFromJson('label.duration'); ?></th>
					<th>수강상태</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $__empty_1 = true; $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<tr>
						<td><?php echo app('translator')->getFromJson('label.' .snake_case($class->type)); ?></td>
						<td>
							<?php $__currentLoopData = $class->day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo app('translator')->getFromJson('label.' . strtolower(str_limit($day->day_name, 3, ''))); ?>  
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
						<td><?php echo e(date('h:iA',strtotime($class->time))); ?></td>
						<td><?php echo e($class->minutes); ?>min.</td>
						<td>
							<?php if($class->admin): ?>
								<?php echo e($class->admin->name); ?>

							<?php endif; ?>
						</td>
						<td>
							<?php 
								$remaining = count($class->getRemainingSession());
								$total = $class->total_sessions;
								echo $remaining . '/' . $total;
							 ?>
						</td>
						<td>
						<?php 
							$first_session = $class->getFirstSession();

							if($first_session){
								$last_session = $class->getLastSession();
								echo date_formater('date_format', $first_session->date_time). ' - ' . date_formater('date_format', $last_session->date_time);
							}

						 ?>
						</td>
						<td>
							<?php if($class->status == "pending"): ?>
								대기
							<?php elseif($class->status == "ongoing"): ?>
								진행
							<?php else: ?>
								<span style="color:red">종료</span>
							<?php endif; ?>
						</td>
						<td align="right">
							<?php if($class->status != 'pending'): ?>
							<?php 
								$near_session = $class->classSession()->whereDate('date_time', '>=', date('Y-m-d'))->first();
							 ?>
							
							<a href="<?php echo e(url('enrollment/step3?class=' .$class->id)); ?>" tartget="_blank" class="btn btn-primary  btn-xs"><i class="fa fa-refresh"></i> 재수강등록</a>
							<a href="<?php echo e(route('dashboard.class.show', $class->id)); ?><?php if($near_session): ?>?session=<?php echo e($near_session->id); ?> <?php endif; ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo app('translator')->getFromJson('button.view'); ?></a>
							<?php else: ?>
								<button class="btn btn-danger btn-xs" type="button" disabled name="button"> <?php echo app('translator')->getFromJson('button.pending'); ?></button>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<tr>
						<td colspan="5" align="center"> <?php echo app('translator')->getFromJson('label.no_class'); ?></td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
		</div>
	</div>
<?php else: ?>
	<h6 class="mobile-title">내 수업</h6>
	<?php $__empty_1 = true; $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	
		<div class="box-list">
			<?php if($class->status != 'pending'): ?>
				<div class="dropdown pull-right">
					<a href="#" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-ellipsis-h"></i>
					</a>
					<ul class="dropdown-menu" aria-labelledby="dLabel">
						<li>
							<a href="<?php echo e(url('enrollment/step3?class=' .$class->id)); ?>"><i class="fa fa-refresh"></i> 재수강등록</a>
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			<?php endif; ?>
		<div class="row sm-gutters">
			<div class="col-xs-3">
				<?php 
					$near_session = $class->classSession()->whereDate('date_time', '>=', date('Y-m-d'))->first();
				 ?>
				<?php if($class->status != 'pending'): ?>
					
			
					<a href="<?php echo e(route('dashboard.class.show', $class->id)); ?><?php if($near_session): ?>?session=<?php echo e($near_session->id); ?> <?php endif; ?>" class="time btn btn-success btn-block">
						<?php echo e(date('h:i',strtotime($class->time))); ?>

						<br>
						<span style="font-size: 15px;">
							<?php echo e(date('A',strtotime($class->time))); ?>

						</span>
					</a>
				<?php else: ?>
					<a href="#" class="time btn btn-success btn-block disabled">
						<?php echo e(date('h:i',strtotime($class->time))); ?>

						<br>
						<span style="font-size: 15px;">
							<?php echo e(date('A',strtotime($class->time))); ?>

						</span>
					</a>
				<?php endif; ?>
			</div>
			<div class="col-xs-9">
				<div class="content">
					<a href="<?php echo e(route('dashboard.class.show', $class->id)); ?><?php if($near_session): ?>?session=<?php echo e($near_session->id); ?> <?php endif; ?>" >
						<?php echo app('translator')->getFromJson('label.' .snake_case($class->type)); ?>
						<br>
						<small>
						<?php if($class->admin): ?>
							<i class="fa fa-user"></i> <?php echo e($class->admin->name); ?>

						<?php else: ?>
							배정대기
						<?php endif; ?>
						| <?php echo e($class->minutes); ?>min.
						| <?php $__currentLoopData = $class->day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php echo app('translator')->getFromJson('label.' . strtolower(str_limit($day->day_name, 3, ''))); ?>  
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</small>
					</a>
				</div>
				
			</div>
		</div>
		
				
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>