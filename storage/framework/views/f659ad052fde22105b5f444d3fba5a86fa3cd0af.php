
<div class="todo" id="student_menu">
            <div class="todo-search" style="color:white">
              <h5>
                <?php echo e(Auth::user()->username); ?>

              </h5>
                <?php echo e(Auth::user()->korean_name); ?>

                <br>
                <?php echo e(Auth::user()->name); ?><br>
                <?php echo e(Auth::user()->contact_number); ?>

                <?php if(Auth::user()->contact_number1): ?>
                <br><?php echo e(Auth::user()->contact_number1); ?>

                <?php endif; ?>
            </div>
            <ul>
              <li <?php if(Request::segment(2) == "class"): ?>  class="todo-done" <?php endif; ?> >
                <div class="todo-icon fa fa-user"></div>
                <div class="todo-content">
                	<a href="<?php echo e(route('dashboard.class.index')); ?>" >
	                  	<h4 class="todo-name">
	                   	내 수업
	                  	</h4>
	                </a>
                </div>
              </li>
              <li <?php if(Request::segment(2) == "calendar"): ?>  class="todo-done" <?php endif; ?> >
                <div class="todo-icon fa fa-calendar"></div>
                <div class="todo-content">
                	<a href="<?php echo e(route('dashboard.calendar.index')); ?>" >
	                  	<h4 class="todo-name">
	                   	스케줄/코멘트
	                  	</h4>
	                </a>
                </div>
              </li>
               <li  <?php if(Request::segment(2) == "book"): ?>  class="todo-done" <?php endif; ?> >
                <div class="todo-icon fa fa-book"></div>
                <div class="todo-content">
                  <a href="<?php echo e(route('dashboard.book.index')); ?>">
                    <h4 class="todo-name">
                      교재보기 
                    </h4>
                  </a>
                </div>
              </li>
              <li  <?php if(Request::segment(2) == "rating"): ?>  class="todo-done" <?php endif; ?> >
                <div class="todo-icon fa fa-pie-chart"></div>
                <div class="todo-content">
                	<a href="<?php echo e(route('dashboard.rating.index')); ?>">
                		<h4 class="todo-name">
		                    월별평가
                    </h4>
		              </a>
                </div>
              </li>
              <li <?php if(Request::segment(2) == "proofreading"): ?>  class="todo-done" <?php endif; ?> >
                <div class="todo-icon fa fa-file-word-o"></div>
                <div class="todo-content">
                  <a href="<?php echo e(route('dashboard.proofreading.index')); ?>">
                    <h4 class="todo-name">
                      영작교정
                    </h4>
                  </a>
                </div>
              </li>
              <li <?php if(Request::fullUrl() == url("dashboard/message?from=teacher")): ?>  class="todo-done" <?php endif; ?> >
                <div class="todo-icon fa fa-comments"></div>
                <div class="todo-content">
                  <a href="<?php echo e(route('dashboard.message.index', ['from' => 'teacher'])); ?>">
                  <h4 class="todo-name">
                   강사와 대화 
                  </h4>
                  </a>
                </div>
              </li>
              <li <?php if(Request::segment(2) == "testimonial"): ?>  class="todo-done" <?php endif; ?> >
                <div class="todo-icon fa fa-rss"></div>
                <div class="todo-content">
                  <a href="<?php echo e(route('dashboard.testimonial.index')); ?>">
                  <h4 class="todo-name">
                   수강평가 
                  </h4>
                  </a>
                </div>
              </li>
              <li <?php if(Request::fullUrl() == url("dashboard/message?from=admin")): ?>  class="todo-done" <?php endif; ?>>
                <div class="todo-icon fa fa-question"></div>
                <div class="todo-content">
                  <a href="<?php echo e(route('dashboard.message.index', ['from' => 'admin'])); ?>">
                  <h4 class="todo-name">
                    1:1문의
                  </h4>
                  </a>
                </div>
              </li>
              <li >
                <div class="todo-icon fa fa-file"></div>
                <div class="todo-content">
                  <a href="<?php echo e(route('dashboard.certificate.index')); ?>">
                  <h4 class="todo-name">
                     확인서
                  </h4>
                  </a>
                </div>
              </li>
              <li >
                <div class="todo-icon fa fa-refresh"></div>
                <div class="todo-content">
                  <a href="<?php echo e(url('enrollment')); ?>" target="_blank">
                  <h4 class="todo-name">
                     수강등록
                  </h4>
                  </a>
                </div>
              </li>
            </ul>
          </div><!-- /.todo -->
