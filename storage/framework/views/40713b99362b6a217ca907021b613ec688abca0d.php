<?php $__env->startSection('content'); ?>
<div class="page-heading" style="background-image:url('<?php echo e(asset('image/bg/loginbar.jpg')); ?>'); background-size: cover; height: 230px;">
    <div class="container">
      <h1><?php echo app('translator')->getFromJson('label.log_in_form'); ?></h1>
    </div>  
  </div>
<div class="spacer"></div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-offset-3">
           <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo e(csrf_field()); ?>

                <label for="username" class="col-form-label text-md-right"><?php echo app('translator')->getFromJson('label.username'); ?></label>
                <input id="username" type="text" class="form-control input-lg <?php echo e($errors->has('username') ? ' is-invalid' : ''); ?>" name="username" value="<?php echo e(old('username')); ?>" required autofocus>
                <br>
                                           
                <label for="password" class="col-form-label text-md-right"><?php echo app('translator')->getFromJson('label.password'); ?></label>
                <input id="password" type="password" class="form-control  input-lg <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                   
                <br>

                <label>
                    <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> &nbsp;&nbsp; <?php echo app('translator')->getFromJson('label.remember_me'); ?>
                </label>
                <br>
                <?php if($errors->has('username')): ?>
                    <span class="invalid-feedback">
                        <strong style="color: red;"><?php echo e($errors->first('username')); ?></strong>
                    </span>
                <?php endif; ?>

                <?php if($errors->has('password')): ?>
                        <span class="invalid-feedback">
                            <strong style="color: red;"><?php echo e($errors->first('password')); ?></strong>
                        </span>
                <?php endif; ?>
                <hr>
                 <div class="row">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success btn-block">
                           <?php echo app('translator')->getFromJson('button.login'); ?>
                        </button>
                        <br>
                    </div>
                    <div class="col-sm-6">
                        <a type="submit" href="<?php echo e(route('register')); ?>" class="btn btn-success btn-block">
                            <?php echo app('translator')->getFromJson('button.register'); ?>
                        </a>
                    </div>
                 </div>                        
                

                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                    <small>
                       <?php echo app('translator')->getFromJson('label.forget_password'); ?>
                    </small>
                </a>
        </form>
                    
              
        </div>
    </div>
    <div class="spacer"></div>
    <div class="spacer"></div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(theme('layout.app'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>