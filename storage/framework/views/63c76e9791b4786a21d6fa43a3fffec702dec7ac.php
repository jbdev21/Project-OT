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
    <script type="text/javascript">
        var baseUrl = "<?php echo e(url('/')); ?>";
        var userLogged = <?php echo Auth::user(); ?>  
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
    <link href="<?php echo e(asset('css/admin_custom.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('styles'); ?>
    <style type="text/css">
      .times li{
        padding: 13px 15px 12px;
      }

      .times li iframe{
        padding-top:4px;
      }


      [v-cloak]{
        display:none;
      }

    </style>
</head>
  </head>

  <body class="nav-md"  onclick="removetabNoti()">
    <div class="container body" id="app">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
             <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo e(url('teacher/dashboard')); ?>" class="site_title"><i class="fa fa-paw"></i> <span><?php echo e(setting('site_title', 'LMS')); ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <?php if(Auth::user()->gender == "Female"): ?>
                  <img src="<?php echo e(asset('/image/girl-1.png')); ?>" style="width: 70%;" alt="..." class="img-circle profile_img">
                <?php else: ?>
                  <img src="<?php echo e(asset('/image/man-1.png')); ?>" style="width: 70%;" alt="..." class="img-circle profile_img">
                <?php endif; ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo e(Auth::user()->name); ?></h2>
              </div>
              <div class="profile_info">
                <h2>
                  Phil.
                    <iframe src="http://free.timeanddate.com/clock/i683n9tu/n145/fcfff/tct/pct/ahl/avt/th2" frameborder="0" width="114" height="18" allowTransparency="true"></iframe>

                </h2>
                <br>
                <h2>
                  Kor.
                  <iframe src="http://free.timeanddate.com/clock/i683n9tu/n235/fcfff/tct/pct/ahl/avt/th2" frameborder="0" width="114" height="18" allowTransparency="true"></iframe>
 
                </h2>
                
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Class Manager</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo e(route('teacher.dashboard')); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a><i class="fa fa-edit"></i> Class <span v-cloak class="badge bg-green v-cloak--hidden" v-if="total_badge > 0">{{ total_badge }}</span> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"  style="display:block">
                      <li><a href="<?php echo e(route('teacher.session.today')); ?>">Today' Session</a></li>
                      
                      <li><a href="<?php echo e(route('teacher.classer.index')); ?>">All Class <span v-cloak class="badge bg-green v-cloak--hidden" v-if="newClass > 0">{{ newClass }}</span></a></li>
                      <li><a href="<?php echo e(route('teacher.subclass.index')); ?>">Sub-Class <span v-cloak class="badge bg-green v-cloak--hidden" v-if="newSubClass > 0">{{ newSubClass }}</span></a></li>
                      <li><a href="<?php echo e(route('teacher.calendar')); ?>">Class Calendar</a> </li>
                   
                    </ul>
                  </li>
                  <li><a href="<?php echo e(route('teacher.leveltest.index')); ?>"><i class="fa fa-user"></i> Level Test <span v-cloak class="badge bg-green v-cloak--hidden" v-if="newLeveltest > 0">{{ newLeveltest }}</span></a> </li>
                  <li><a href="<?php echo e(route('teacher.comment.index')); ?>"> <i class="fa fa-bar-chart-o"></i> Monthly Comments</a> </li>
                  <li><a href="<?php echo e(route('teacher.proofreading.index')); ?>"><i class="fa fa-check"></i> Proofreading <span v-cloak class="badge bg-green" v-if="newProofReading > 0">{{ newProofReading }}</span></a> </li>
                   <li><a href="<?php echo e(route('teacher.message.index')); ?>"><i class="fa fa-comments"></i> Messages <span v-cloak  class="badge bg-green v-cloak--hidden" v-if="newMessage > 0">{{ newMessage }}</span></a></li>
                
                </ul>
              </div>
             

            </div>
     
            <div class="sidebar-footer hidden-small text-center">
          

            </div>
      
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php if(Auth::user()->gender == "Female"): ?>
                    <img src="<?php echo e(asset('/image/girl-1.png')); ?>" alt="...">
                    <?php else: ?>
                    <img src="<?php echo e(asset('/image/man-1.png')); ?>" alt="...">
                    <?php endif; ?> <?php echo e(Auth::user()->name); ?>

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo e(route('teacher.profile.index')); ?>"> Profile</a></li>
                    <li><a href="<?php echo e(route('teacher.profile.changepassword')); ?>"> Change Password</a></li>
                    <li><a href="#"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    ><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
                      <?php echo e(csrf_field()); ?>

                    </form>
                  </ul>
                </li>
                <notification></notification>
                
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
                <?php if(Request::segment(2) == "leveltest"): ?>
                    <h3>LEVEL TEST MANAGER</h3>
                <?php elseif(Request::segment(2) == "subclass"): ?>
                    <h3>SUB CLASS MANAGER</h3>
                <?php else: ?>
                    <h3><?php echo e(strtoupper(Request::segment(2))); ?> MANAGER</h3>
                <?php endif; ?>
              </div>

            </div>

            <div class="clearfix"></div>
            <?php echo $__env->make('partials.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="clearfix"></div>
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
    
    <script type="text/javascript" src="<?php echo e(asset('js/teacher.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-progressbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/gentalella.min.js')); ?>"></script>
    <script>
      function resizeIframe(obj) {
        obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
      }
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo $__env->yieldContent('editor'); ?>
  </body>
</html>
