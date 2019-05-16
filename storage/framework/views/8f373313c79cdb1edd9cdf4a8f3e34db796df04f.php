<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" id="fav" type="image/png" href="<?php echo e(asset('site/img/favicon.png')); ?>"/>
    <title><?php echo e(setting('site_title', 'LMS')); ?></title>
    <script>
      
      const userLogged = <?php echo Auth::user(); ?>

      var tabNoti = 0;
      var site_title = "<?php echo e(setting('site_title', 'LMS')); ?>"
      var fav = "<?php echo e(asset('site/img/favicon.png')); ?>"
      function addtabNoti()
      {
        tabNoti++;
        document.title = "(" +  tabNoti + ") " + site_title
        document.getElementById('fav').href = "<?php echo e(asset('site/img/favicon1.png')); ?>";
      }

      function removetabNoti()
      {
        document.title = site_title
        document.getElementById('fav').href = fav;
      }
    </script>
    <!-- Styles -->
  
    <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
    <style type="text/css">
      .times{
        margin-top:13px;
      }

      .times li iframe{
         position:relative;
         top:4px;
      }

      .times li{
        margin-right:20px;
      }

      [v-cloak]{
        display:none;
      }

    </style>
    <script type="text/javascript">
        const baseUrl = '<?php echo e(url('/')); ?>'
    </script>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
  </head>

  <body class="nav-md unresponsive" onclick="removetabNoti()">
    <div class="container body" id="app">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo e(route('admin.dashboard')); ?>" class="site_title"><i class="fa fa-paw"></i> <span><?php echo e(setting('site_title', 'LMS')); ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                  <?php if(Auth::user()->image): ?>
                  <img src="<?php echo e(asset('profile/'. Auth::user()->image)); ?>" alt="..." class="img-circle profile_img">

                  <?php else: ?>
                  <img src="<?php echo e(asset('/image/admin-profile.png')); ?>" alt="..." class="img-circle profile_img">
                  <?php endif; ?>
            
              </div>
              <div class="profile_info">
                <span> 안녕하세요,</span>
                <h2><?php echo e(Auth::user()->name); ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!-- <h3><?php echo app('translator')->getFromJson('label.general'); ?></h3> -->
                <ul class="nav side-menu">
                  <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-home"></i> <?php echo app('translator')->getFromJson('menu.dashboard'); ?></a></li>
                  <li class="active"><a><i class="fa fa-edit"></i> <?php echo app('translator')->getFromJson('menu.class_manager'); ?> <class-general-badge></class-general-badge> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display:block">
                      <li><a href="<?php echo e(route('admin.classer.today')); ?>"><?php echo app('translator')->getFromJson('menu.today_session'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.classer.index')); ?>"> 진행중 수업</a></li>
                      <li>
                          <a href="<?php echo e(route('admin.classer.new')); ?>">
                           <?php echo app('translator')->getFromJson('menu.new_enrolled_class'); ?>
                          <class-badge></class-badge> 
                          </a> 
                      </li>
                      <li><a href="<?php echo e(route('admin.classer.create')); ?>"><?php echo app('translator')->getFromJson('menu.create_class'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.classer.postponed')); ?>"><?php echo app('translator')->getFromJson('menu.postponed_class'); ?> <postponed-badge></postponed-badge></a></li>
                      <li><a href="<?php echo e(route('admin.classer.all')); ?>">전체수업</a></li>
                      <li><a href="<?php echo e(route('admin.classer.ended')); ?>"> <?php echo app('translator')->getFromJson('menu.ended_class'); ?></a></li>
                      
                      <?php if(setting('default_video_vitual_room') == 'braincert' ): ?>
                        <li>
                          <a href="<?php echo e(route('admin.classer.failedRequest')); ?>">
                            <?php echo app('translator')->getFromJson('menu.braincert_faild_request'); ?> <span v-show="failedBraincertRequest > 0 " class="badge bg-green"> {{ failedBraincertRequest }}</span>
                          </a>
                        </li>
                      <?php endif; ?>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list"></i> <?php echo app('translator')->getFromJson('menu.leveltest'); ?> <span v-cloak v-show="newLeveltestAll > 0" class="badge bg-green" id="leveltest-badge">{{ newLeveltestAll }}</span> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo e(route('admin.leveltest.index')); ?>"><?php echo app('translator')->getFromJson('menu.leveltest'); ?> <span v-cloak v-show="newLeveltestpending > 0" class="badge bg-green" id="leveltest-badge">{{ newLeveltestpending }}</span></a></li>
                      <li><a href="<?php echo e(route('admin.leveltest.new')); ?>"><?php echo app('translator')->getFromJson('menu.new_level_test'); ?> <leveltest-badge></leveltest-badge></a>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> <?php echo app('translator')->getFromJson('menu.student_manager'); ?> <student-menu-badge></student-menu-badge>  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo e(route('admin.student.create')); ?>"><?php echo app('translator')->getFromJson('menu.create_student'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.student.index')); ?>"><?php echo app('translator')->getFromJson('menu.all_student'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.comment.index')); ?>"><?php echo app('translator')->getFromJson('menu.monthly_comment'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.proofreading.new')); ?>"><?php echo app('translator')->getFromJson('menu.new_proofreading'); ?> <proofreading-badge></proofreading-badge></a></li>
                      <li><a href="<?php echo e(route('admin.proofreading.index')); ?>"><?php echo app('translator')->getFromJson('menu.proofreading'); ?> <proofreading-noreplay-badge></proofreading-noreplay-badge></a></li>
                      <li><a href="<?php echo e(route('admin.message.index')); ?>"><?php echo app('translator')->getFromJson('menu.1:1'); ?> <new-message-badge></new-message-badge> </a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-female"></i> <?php echo app('translator')->getFromJson('menu.teacher_manager'); ?> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="<?php echo e(route('admin.teacher.create')); ?>"><?php echo app('translator')->getFromJson('menu.create_teacher'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.teacher.index')); ?>"><?php echo app('translator')->getFromJson('menu.all_teacher'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.teacherprofile.index')); ?>"><?php echo app('translator')->getFromJson('menu.teacher_profile'); ?></a></li>
                      
                    
                    </ul>
                </li>
                  <li><a><i class="fa fa-list"></i> <?php echo app('translator')->getFromJson('menu.course_manager'); ?> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo e(route('admin.course.create')); ?>"><?php echo app('translator')->getFromJson('menu.create_course'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.course.index')); ?>"><?php echo app('translator')->getFromJson('menu.all_course'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.coursetype.index')); ?>"><?php echo app('translator')->getFromJson('menu.course_type'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.coupon.index')); ?>"><?php echo app('translator')->getFromJson('menu.coupon'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.coupon.unused')); ?>"><?php echo app('translator')->getFromJson('label.unused'); ?></a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-book"></i><?php echo app('translator')->getFromJson('menu.book_manager'); ?> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo e(route('admin.book.create')); ?>"><?php echo app('translator')->getFromJson('menu.create_book'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.book.index')); ?>"><?php echo app('translator')->getFromJson('menu.all_book'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.curriculum.index')); ?>"><?php echo app('translator')->getFromJson('menu.curriculum'); ?></a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-pencil"></i><?php echo app('translator')->getFromJson('menu.content_manager'); ?> <inquiry-badge></inquiry-badge>  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo e(route('admin.notice.index')); ?>"><?php echo app('translator')->getFromJson('menu.notice'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.faq.index')); ?>"><?php echo app('translator')->getFromJson('menu.faq'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.inquiry.index')); ?>"><?php echo app('translator')->getFromJson('menu.1_1_inquiry'); ?> <span v-cloak class="badge bg-green" v-show="newInquiry > 0"> {{ newInquiry }}</span> </a></li>
                      <li><a href="<?php echo e(route('admin.blog.index')); ?>"><?php echo app('translator')->getFromJson('menu.blog'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.testimonial.index')); ?>"><?php echo app('translator')->getFromJson('menu.testimonial'); ?>  <span  v-cloak v-show="newTestimonial > 0 " class="badge bg-green"> {{ newTestimonial }}</span></a></li>
                      <li><a href="<?php echo e(route('admin.popup.index')); ?>"><?php echo app('translator')->getFromJson('menu.popup'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.banner.index')); ?>"><?php echo app('translator')->getFromJson('menu.banner'); ?></a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-calendar"></i><?php echo app('translator')->getFromJson('menu.holiday_manager'); ?> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo e(route('admin.holiday.create')); ?>"><?php echo app('translator')->getFromJson('menu.create_holiday'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.holiday.index')); ?>"><?php echo app('translator')->getFromJson('menu.all_holiday'); ?></a></li>
                    </ul>
                  </li>
                  </li>
                   <li><a><i class="fa fa-gears"></i><?php echo app('translator')->getFromJson('menu.setting'); ?> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo e(route('admin.setting.general')); ?>"><?php echo app('translator')->getFromJson('menu.general'); ?></a></li>
                      <!-- <li><a href="<?php echo e(route('admin.setting.general')); ?>"><?php echo app('translator')->getFromJson('menu.class_&_session'); ?></a></li> -->
                      <!-- <li><a href="<?php echo e(route('admin.setting.notification')); ?>"><?php echo app('translator')->getFromJson('menu.notification'); ?></a></li> -->
                      <!-- <li><a href="<?php echo e(route('admin.setting.queuing')); ?>"><?php echo app('translator')->getFromJson('menu.queuing'); ?></a></li> -->
                      <li><a href="<?php echo e(route('admin.setting.payment')); ?>"><?php echo app('translator')->getFromJson('menu.payment_gateway'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.setting.video')); ?>"><?php echo app('translator')->getFromJson('menu.virtual_classroom'); ?></a></li>
                      <li><a href="<?php echo e(route('admin.setting.system')); ?>"><?php echo app('translator')->getFromJson('menu.system'); ?></a></li>
                    </ul>
                  </li>
                </ul>
              </div>
             

            </div>
     
            <!-- <div class="sidebar-footer hidden-small text-center">
           		Developed by Jofie Bernas
            </div> -->
      
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle" style="z-index:999999"><i class="fa fa-bars"></i></a>
              </div>
              <?php if(is_desktop()): ?>
              <ul class="nav navbar-nav times">
                <li>  
                    Kor: <iframe src="http://free.timeanddate.com/clock/i67jkhfo/n235/tct/pct/th1" frameborder="0" width="57" height="18" allowTransparency="true"></iframe>
                 </li>
                <li>
                      Phil: <iframe src="http://free.timeanddate.com/clock/i67jkghf/n145/tct/pct/th1" frameborder="0" width="57" height="18" allowTransparency="true"></iframe>
                 </li>
              </ul>
              <?php endif; ?>
              <ul class="nav navbar-nav navbar-right">
                <?php if(!is_desktop()): ?>
                <li>
                <a href="<?php echo e(route('admin.student.index')); ?>"><?php echo app('translator')->getFromJson('menu.all_student'); ?></a>
                </li>
                <li><a href="<?php echo e(route('admin.classer.index')); ?>">진행중 수업</a></li>
                <?php endif; ?>
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <?php if(Auth::user()->image): ?>
                       <img src="<?php echo e(asset('profile/'. Auth::user()->image)); ?>" alt="..." >
                      <?php else: ?>
                        <img src="<?php echo e(asset('/image/admin-profile.png')); ?>" alt="..." >
                      <?php endif; ?>
                     
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo e(route('admin.profile.index')); ?>"> <?php echo app('translator')->getFromJson('button.profile'); ?></a></li>
                    <li><a href="<?php echo e(route('admin.profile.changepassword')); ?>"> <?php echo app('translator')->getFromJson('button.change_password'); ?></a></li>
                    <li><a href="#"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                      ><i class="fa fa-sign-out pull-right"></i> <?php echo app('translator')->getFromJson('button.logout'); ?></a></li>
                     <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                  </ul>
                </li>
                <notification></notification>
                <?php if(is_desktop()): ?>
                <li>
                <a href="<?php echo e(route('admin.student.index')); ?>"><?php echo app('translator')->getFromJson('menu.all_student'); ?></a>
                </li>
                <li><a href="<?php echo e(route('admin.classer.index')); ?>">진행중 수업</a></li>
                <?php endif; ?>
                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <!-- <h3>
                  <?php if(Request::segment(2) == "leveltest"): ?>
                    <?php echo app('translator')->getFromJson('label.level_test'); ?> <?php echo app('translator')->getFromJson('label.manager'); ?>
                  <?php elseif(Request::segment(2) == "subclass"): ?>
                    <?php echo app('translator')->getFromJson('label.sub_class'); ?> <?php echo app('translator')->getFromJson('label.manager'); ?>
                  <?php elseif(Request::segment(2) == "classer"): ?>
                    <?php echo app('translator')->getFromJson('label.class'); ?> <?php echo app('translator')->getFromJson('label.manager'); ?>
                  <?php elseif(Request::segment(2) == "dashboard"): ?>
                        
                  <?php else: ?>
                    <?php echo app('translator')->getFromJson('label.' . Request::segment(2)); ?> <?php echo app('translator')->getFromJson('label.manager'); ?>
                  <?php endif; ?>
              </h3> -->
              <br>
              </div>

            </div>

            <div class="clearfix"></div>
            <div class="container">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <?php echo $__env->make('partials.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <?php echo $__env->make('partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
              </div>
              
            </div>
           
              <?php echo $__env->yieldContent('content'); ?>


            
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           Reserved &copy<?php echo e(date('Y')); ?>  |  <a href="<?php echo e(url('/')); ?>"><?php echo e(setting('site_title', 'LMS')); ?></a> v1.0
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      
    </div>
    
     <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="<?php echo e(asset('js/tinymce-lang/ko_KR.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/app.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('js/admin.js')); ?>"></script>
    <script src="/js/lang.js"></script>
    <script>
      $(document).ready(function(){
        var new_classes;

        axios.get('<?php echo e(url('admin/get_new_class')); ?>')
          .then( (response) => {
            new_classes = response.data;
          })

         
      })
    </script>
   
    <?php echo $__env->yieldContent('editor'); ?>
    <?php echo $__env->yieldContent('scripts'); ?>
    
  </body>
</html>
