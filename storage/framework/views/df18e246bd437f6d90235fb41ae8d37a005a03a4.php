<?php $__env->startSection('content'); ?>
	<div class="page-heading" style="background-image: url('http://tortillastudio.com/wp-content/uploads/2016/05/blog_header.jpg');">
		<div class="container">
			<h1 style="color: #fff;"><?php echo app('translator')->getFromJson('label.teacher'); ?></h1>
		</div>	
	</div>
	<br>
	<div class="container">
			<div class="owl-carousel owl-theme">
				<?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($loop->iteration % 2 != 0): ?>
                		<div class="item">
					<?php endif; ?>

						<div class="card hovercard" <?php if($loop->iteration % 2 != 0): ?> style="min-height:630px;" <?php endif; ?> >
	                      <div class="cardheader" style="background-image:url('<?php echo e(asset('background/'. $profile->background_image)); ?>')">
	                          
	                      </div>
	                      <div class="avatar">
	                          <img alt="" class="center-block" src="<?php echo e(asset('profile/'. $profile->profile_image)); ?>">
	                      </div>
	                      <div class="info">
	                          <div class="title">
	                              <a  href="<?php echo e(route('teacher.show', $profile->admin->username)); ?>">
	                                <?php echo e($profile->admin->name); ?>

	                              </a>
								  	<?php if($profile->audio_file): ?>
										<audio controls controlsList="nodownload">
												<source  src="<?php echo e(asset('audio/'. $profile->audio_file)); ?>" type="audio/mpeg">
												Your browser does not support the audio element.
										</audio>
									<?php endif; ?>
	                          </div>
							  <div style="text-align:left"><?php echo e($profile->overview); ?></div>
							  <hr>
	                          <div style="text-align:left">
	                            <?php echo str_limit($profile->message,250); ?>

	                          </div>
	                      </div>
	                      <div class="bottom">

	                       		<a  href="<?php echo e(route('teacher.show', $profile->admin->username)); ?>" class="btn btn-primary" style="border-radius: 0px; width: auto;"><i class="fa fa-info-circle"></i> Details</a>
	                      </div>
						  </div>

					<?php if($loop->iteration % 2 == 0): ?>
						</div>
					<?php endif; ?>
					
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
	
		
	</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.owl-carousel').owlCarousel({
			   	loop:true,
			    margin:10,
				autoplayTimeout:5000,
			    responsiveClass:true,
				rows: true,
				rowsCount: 2,
			    responsive:{
			        0:{
			            items:1,
			            nav:true
			        },
			        600:{
			            items:3,
			            nav:false
			        },
			        1000:{
			            items:3,
			            nav:true,
			            loop:false
			        }
			    }
			});
		})
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(theme('layout.app'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>