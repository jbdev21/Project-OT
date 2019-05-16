<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/gentalella.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/admin_login.css')); ?>" rel="stylesheet">
</head>

<body style="background:#F7F7F7;">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form action="<?php if(Request::segment(1) == 'admin'): ?>  <?php echo e(route('admin.login.post')); ?> <?php else: ?> <?php echo e(route('teacher.login.post')); ?> <?php endif; ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <h1><?php echo app('translator')->getFromJson('label.log_in_form'); ?></h1>
                        <?php echo $__env->make('partials.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div>
                            <input name="username" type="text" class="form-control" placeholder="<?php echo app('translator')->getFromJson('label.username'); ?>" value="<?php echo e(old('username')); ?>" required="" />

                        </div>
                        <div>
                            <input name="password" type="password" class="form-control" placeholder="<?php echo app('translator')->getFromJson('label.password'); ?>" required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit"><?php echo app('translator')->getFromJson('button.login'); ?></button>
                            <a class="reset_pass" href="<?php echo e(route('admin.password.request')); ?>"><?php echo app('translator')->getFromJson('button.lost_your_password'); ?></a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                           
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <a href="<?php echo e(url('/')); ?>"><h1><i class="fa fa-paw" style="font-size: 26px;"></i><?php echo e(config('app.name')); ?></h1></a>

                                <p>©<?php echo e(date('Y')); ?> All Rights Reserved. <?php echo e(setting('site_title')); ?> <br>
                                 Sunday2Pm</p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>