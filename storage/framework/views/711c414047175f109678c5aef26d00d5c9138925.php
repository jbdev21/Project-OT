<!-- Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h2 class="text-center">Login</h2>
         <form method="POST" action="<?php echo e(route('login')); ?>" id="login">
                <?php echo e(csrf_field()); ?>

                <div class="alert alert-danger" style="display: none" id="login-message"></div>
                <label for="username" class="col-form-label text-md-right"><?php echo app('translator')->getFromJson('label.username'); ?></label>
                <input id="username" type="text" class="form-control<?php echo e($errors->has('username') ? ' is-invalid' : ''); ?>" name="username" value="<?php echo e(old('username')); ?>" required autofocus>
                <?php if($errors->has('username')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('username')); ?></strong>
                    </span>
                <?php endif; ?>
                <br>
                                           
                <label for="password" class="col-form-label text-md-right"><?php echo app('translator')->getFromJson('label.password'); ?></label>
                <input id="password" type="password" placeholder="비밀번호 (최소6자리 이상 영문,숫자)" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                    <?php if($errors->has('password')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                <br>

                <label>
                    <input type="checkbox" id="remember" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> &nbsp;&nbsp; <?php echo app('translator')->getFromJson('label.remember_me'); ?>
                </label>
                <hr>
                 <div class="row">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success btn-block">
                            <?php echo app('translator')->getFromJson('button.login'); ?>
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <a type="submit" href="<?php echo e(route('register')); ?>"  class="btn btn-success btn-block">
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
  </div>
</div>