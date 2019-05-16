<?php $__env->startSection('content'); ?>
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="position: relative;">
				  <!-- Indicators -->
				  <!-- <ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol> -->

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				    <div class="item active">
				    	<div class="jumbotron" style="background-image:url('<?php echo e(asset('image/bg/bg1.png')); ?>'); background-size:cover; background-position:center;  color:white;">
      						<div class="container">
						      <div class="row">
						      	<div class="col-sm-7">
									<img src="<?php echo e(asset('image/bg/overlay.png')); ?>" alt="" class="img-responsive">

						      	</div>
								<div class="col-sm-5 text-left">
									<div class="embed-responsive embed-responsive-16by9">
									  	<iframe width="751" height="578" src="https://www.youtube.com/embed/PMQa3eG42wA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
									</div>
									<br>
									<div class="embed-responsive embed-responsive-16by9">
									  	<iframe width="751" height="578" src="https://www.youtube.com/embed/mGZ-C2bYJb4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
									</div>
										
										<p style="font-size:13px;">※ 영상의 저작권은 각 크리에이터 소유임</p>
										
								</div>
								</div>
						      </div>
							</div>
						</div>
				    </div>
				    <!-- <div class="item">
				      <div class="jumbotron" style="background-image:url('https://i.ytimg.com/vi/8U1vaTPypvE/maxresdefault.jpg'); background-position:top; color:black">
      						<div class="container">
						      <div class="row">
						      	<div class="col-sm-5 text-left">
						      		<h2>민족문화의</h2>
						      		<p>및 민족문화의 창달에 노력하여 대통령으로서의 직책을 성실히 수행할 것을 국민 앞에 엄숙히 선서합니다</p>
						      	</div>
						      </div>
							</div>
						</div>
				    </div>
				    <div class="item">
				      <div class="jumbotron" style="background-image:url('<?php echo e(asset('image/bg/bg1.png')); ?>');background-size:cover; background-position:center;  color:white;">
      						<div class="container">
						      <div class="row">
						      	<div class="col-sm-5 text-left">
						      		<h2>민족문화의</h2>
						      		<p>및 민족문화의 창달에 노력하여 대통령으로서의 직책을 성실히 수행할 것을 국민 앞에 엄숙히 선서합니다</p>
						      	</div>
						      	<div class="col-sm-7">
						      		<img src="<?php echo e(asset('site/img/global-networking-responsive-img.png')); ?>" class="img-reponsive">
						      	</div>
						      </div>
							</div>
						</div>
				    </div>
				  </div> -->
			</div>
		<div class="container">
		<br>
		<br>
			<div class="row featurite visible-xs">
				<div class="col-xs-4 text-center">
							<a href="<?php echo e(route('page', 'videoclass')); ?>">
								<img style="" src="<?php echo e(asset('image/icons/video_class.png')); ?>" class="img-reponsive center-block ">
								화상영어
							</a>
						</div>	
						<div class="col-xs-4  text-center">
							<a href="<?php echo e(route('page', 'phoneclass')); ?>">
								<img style="" src="<?php echo e(asset('image/icons/phone_class.png')); ?>" class="img-reponsive center-block">
								전화영어
							</a>
						</div>
						<div class="col-xs-4  text-center">
							<a href="<?php echo e(url('leveltest/register')); ?>">
								<img style="" src="<?php echo e(asset('image/icons/freeLVT.png')); ?>" class="img-reponsive center-block">
								무료체험
							</a>
						</div>
						<div class="text-center col-xs-4">
							<a href="<?php echo e(route('testimonial')); ?>">
								<img  src="<?php echo e(asset('image/icons/testimonials.png')); ?>" style="width:68%;" class="img-reponsive center-block">
								수업후기 
							</a>
						</div>
						<div class="text-center col-xs-4">
							<a href="<?php echo e(route('teacher')); ?>">
								<img  src="<?php echo e(asset('image/icons/teachers.png')); ?>" style="width:68%;" class="img-reponsive center-block">
								강사소개 
							</a>
						</div>
						<div  class="col-xs-4 text-center">
							<a href="<?php echo e(route('dashboard.class.index')); ?>" >
								<img style="" src="<?php echo e(asset('image/icons/myPage.png')); ?>" class="img-reponsive center-block">
								마이메뉴
							</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="<?php echo e(route('faq')); ?>">
								<img style="" src="<?php echo e(asset('image/icons/QnA.png')); ?>" class="img-reponsive center-block">
								FAQ
							</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="<?php echo e(route('blog')); ?>">
								<img style="" src="<?php echo e(asset('image/icons/blog.png')); ?>" class="img-reponsive center-block">
								블로그 
							</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="<?php echo e(url('enrollment')); ?>">
								<img style="" src="<?php echo e(asset('image/icons/register.png')); ?>" class="img-reponsive center-block">
								수강신청
							</a>
						</div>

			</div>

			<div class="row featurite hidden-xs">
				<div class="col-sm-4">
					<h4 class="text-center ">
						수업소개
					</h4>
					<!-- <img style="width:50px" src="<?php echo e(asset('image/icons/video_class.png')); ?>" class="img-reponsive center-block "> -->
					<div class="row animated slideInLeft ">
						<div class="col-xs-4 text-center">
							<a href="<?php echo e(route('page', 'videoclass')); ?>">
								<img style="" src="<?php echo e(asset('image/icons/video_class.png')); ?>" class="img-reponsive center-block ">
								화상영어
							</a>
						</div>	
						<div class="col-xs-4  text-center">
							<a href="<?php echo e(route('page', 'phoneclass')); ?>">
								<img style="" src="<?php echo e(asset('image/icons/phone_class.png')); ?>" class="img-reponsive center-block">
								전화영어
							</a>
						</div>
						<div class="col-xs-4  text-center">
							<a href="<?php echo e(url('leveltest/register')); ?>">
								<img style="" src="<?php echo e(asset('image/icons/freeLVT.png')); ?>" class="img-reponsive center-block">
								무료체험
							</a>
						</div>
					</div> 
				</div>
				<div class="col-sm-4 faturite-div" style="border-left:1px solid #ccc; border-right:1px solid #ccc">
					
					<h4 class="text-center">
						수업안내 
					</h4>
					<!-- <img style="width:50px" src="<?php echo e(asset('image/icons/testimonials.png')); ?>" class="img-reponsive center-block "> -->
					<div class="row animated slideInUp ">
						<div class="text-center col-xs-4">
							<a href="<?php echo e(route('testimonial')); ?>">
								<img  src="<?php echo e(asset('image/icons/testimonials.png')); ?>" class="img-reponsive center-block">
								수업후기 
							</a>
						</div>
						<div class="text-center col-xs-4">
							<a href="<?php echo e(url('enrollment')); ?>">
								<img src="<?php echo e(asset('image/icons/register.png')); ?>" style=" width: 90%;margin-top: 10px;" class="img-reponsive center-block">
								수강신청
							</a>
						</div>
						<div class="text-center col-xs-4">
							<a href="<?php echo e(route('teacher')); ?>">
								<img  src="<?php echo e(asset('image/icons/teachers.png')); ?>" class="img-reponsive center-block">
								강사소개 
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					
					<h4 class="text-center">
						고객센터
					</h4>
					<!-- <img style="width:50px" src="<?php echo e(asset('image/icons/myPage.png')); ?>" class="img-reponsive center-block "> -->
					<div class="row  animated slideInRight ">
						<div  class="col-xs-4 text-center">
							<a href="<?php echo e(route('dashboard.class.index')); ?>" >
								<img style="" src="<?php echo e(asset('image/icons/myPage.png')); ?>" class="img-reponsive center-block">
								마이메뉴
							</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="<?php echo e(route('faq')); ?>">
								<img style="" src="<?php echo e(asset('image/icons/QnA.png')); ?>" class="img-reponsive center-block">
								FAQ
							</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="<?php echo e(route('blog')); ?>">
								<img style="" src="<?php echo e(asset('image/icons/blog.png')); ?>" class="img-reponsive center-block">
								블로그 
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<div style="background-color: #f7f7f7; color:black;">
			<div class="container">
				<div class="row" style="padding: 30px; padding-top: 40px">
					<div class="col-sm-8">
						<div>
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab"><?php echo app('translator')->getFromJson('label.notice'); ?></a></li>
								<li role="presentation"><a href="#blog" aria-controls="blog" role="tab" data-toggle="tab"><?php echo app('translator')->getFromJson('label.blog'); ?></a></li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="notice">
									<table class="table table-hovered notice-table borderless">
									<a href="<?php echo e(url('notice')); ?>"  class="pull-right"> 더보기</a>
										<?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td>
													<a href="<?php echo e(route('notice.show', $notice->slug)); ?>">
														<?php echo e($notice->title); ?>

													</a>
												</td>
												<td align="right"><?php echo e(date_formater('date_format', $notice->created_at)); ?></td>
											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</table>
								</div>
								<div role="tabpanel" class="tab-pane" id="blog">
									<a href="<?php echo e(url('blog')); ?>"  class="pull-right"> 더보기</a>
									<table class="table table-hovered notice-table borderless">
										<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td>
													<a href="<?php echo e(route('blog.show', $blog->slug)); ?>">
														<?php echo e($blog->title); ?>

													</a>
												</td>
												<td align="right"><?php echo e(date_formater('date_format', $blog->created_at)); ?></td>
											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</table>
								</div>
							</div>
						</div>
						
					</div>
					<div class="col-sm-4 text-center">
						<br>
						<h4 class="line" style="margin-top:20px;"><span>CONTACT US</span></h4>
						<h1 class="text-success">1661-5350</h1>
						<p class="text-left" style="padding-left:20%;">
						수업 : 6am~12pm(자정) <br>
						상담 : 11pm~7pm <br>
						점심 : 12pm~1pm <br>
						카톡 : <a href="https://goo.gl/llxni9" target="_blank">happybd512 </a><br>
							
						</p>
						<hr>
					</div>
				</div>
			</div>
		</div>
		<?php if( count($banners) > 0): ?>
		<div class="spacer"></div>
		<div class="container">
			<div class="row"  style="padding: 30px; padding-top: 10px">
				<?php if(count($banners) >  1): ?>
					<?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-sm-6">
							<img src="<?php echo e(asset('banners/' . $banner->path)); ?>" class="img-reponsive animated pulse">
							<br>
							<br>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
					<div class="col-sm-6 col-sm-offset-3">
						<img src="<?php echo e(asset('banners/' . $banners[0]->path)); ?>" class="img-reponsive animated pulse">
						<br>
						<br>
					</div>	
				<?php endif; ?>
			</div>
		</div>	
		<?php endif; ?>
	

	<?php if(count($popup)): ?>
		<?php if($popup->display_load == "every_load"): ?>
			<div class="modal fade" tabindex="-1" role="dialog" id="popup">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="background-color:<?php echo e($popup->background_color); ?>; border-radius:10px;">
					<div class="modal-body" >
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<!-- <h3 style="color:<?php echo e($popup->title_color); ?>"><?php echo e($popup->title); ?></h3> -->
						<p style="color:<?php echo e($popup->text_color); ?>">
							<?php echo $popup->description; ?>

						</p>
						<?php if($popup->button_text): ?>
						<div class="text-center">
							<a href="<?php echo e($popup->button_link); ?>"  class="btn" style="background-color:<?php echo e($popup->button_color); ?>; color:<?php echo e($popup->button_text_color); ?>"> <?php echo e($popup->button_text); ?></a>
						</div>
						<?php endif; ?>
					</div>
					
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		<?php else: ?>
			<?php if(count(session('popup')) < 1): ?>
				<div class="modal fade" tabindex="-1" role="dialog" id="popup">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="background-color:<?php echo e($popup->background_color); ?>; border-radius:10px;">
					<div class="modal-body" >
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<!-- <h3 style="color:<?php echo e($popup->title_color); ?>"><?php echo e($popup->title); ?></h3> -->
						<p style="color:<?php echo e($popup->text_color); ?>">
							<?php echo $popup->description; ?>

						</p>
						<?php if($popup->button_text): ?>
						<div class="text-center">
							<a href="<?php echo e($popup->button_link); ?>"  class="btn" style="background-color:<?php echo e($popup->button_color); ?>; color:<?php echo e($popup->button_text_color); ?>"> <?php echo e($popup->button_text); ?></a>
						</div>
						<?php endif; ?>
					</div>
					
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<?php endif; ?>
		<?php endif; ?>

	<?php endif; ?>
	<?php if(count($noti_top)): ?>
			<?php $__env->startSection('top-noti'); ?>
				<?php if($noti_top->display_load == "every_load"): ?>
					<div class="top-noti" style="background-color:<?php echo e($noti_top->background_color); ?>">
						<div class="container ">
							<a type="button" id="close-top-noti" class="close"><span aria-hidden="true">&times;</span></a>
							<!-- <label for="" style="color:<?php echo e($noti_top->title_color); ?>"><?php echo e($noti_top->title); ?></label>  -->
							<span style="color:<?php echo e($noti_top->text_color); ?>"><?php echo $noti_top->description; ?></span>
							<?php if($noti_top->button_text): ?>
							<a href="<?php echo e($noti_top->button_link); ?>"  class="btn" style="background-color:<?php echo e($noti_top->button_color); ?>; color:<?php echo e($noti_top->button_text_color); ?>"> <?php echo e($noti_top->button_text); ?></a>
							<?php endif; ?>
						</div>
					</div>
				<?php else: ?>
					<?php if(count(session('noti_top')) < 1): ?>
						<div class="top-noti" style="background-color:<?php echo e($noti_top->background_color); ?>">
							<div class="container ">
								<a type="button" id="close-top-noti" class="close"><span aria-hidden="true">&times;</span></a>
								<!-- <label for="" style="color:<?php echo e($noti_top->title_color); ?>"><?php echo e($noti_top->title); ?></label> --> 
								<span style="color:<?php echo e($noti_top->text_color); ?>"><?php echo $noti_top->description; ?></span>
								<?php if($noti_top->button_text): ?>
								<a href="<?php echo e($noti_top->button_link); ?>"  class="btn" style="background-color:<?php echo e($noti_top->button_color); ?>; color:<?php echo e($noti_top->button_text_color); ?>"> <?php echo e($noti_top->button_text); ?></a>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			<?php $__env->stopSection(); ?>
	<?php endif; ?>

	<?php 
		if(count($popup))
		{
			if($popup->display_load == "first_load" AND !Session::has('popup'))
			{
				Session::push('popup', $popup->id);
			}
		}

		if(count($noti_top))
		{
			if($noti_top->display_load == "first_load")
			{
				Session::push('noti_top', $noti_top->id);
			}
		}
	 ?>

  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('styles'); ?>
		<style>
			.top-noti{
				padding:10px;
			}

			.top-noti .container{
				position:relative;
			}

			.top-noti .close{
				position:absolute;
				right:0;
				top:0;
				background-color:white;
				padding:5px 10px 5px 10px;
				border-radius:50px;
				color:black;
				z-index:999;
			}
		</style>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('scripts'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
		$('#popup').modal('show')

		$('#close-top-noti').click(function(){
			$('.top-noti').fadeOut();
		})
	</script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make(theme('layout.app'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>