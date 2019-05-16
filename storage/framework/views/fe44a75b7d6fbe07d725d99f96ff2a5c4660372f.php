<?php
/**
 * User: JOFIE BERNAS
 * Date: 1/4/2018
 */
?>


<?php $__env->startSection('content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo app('translator')->getFromJson('label.edit_teacher'); ?></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form action="<?php echo e(route('admin.teacher.update', $teacher->id)); ?>" method="post" data-parsley-validate class="form-horizontal">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username"><?php echo app('translator')->getFromJson('label.username'); ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="username" value="<?php echo e($teacher->username); ?>" name="username" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.name'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" value="<?php echo e($teacher->name); ?>" name="name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('label.gender'); ?> *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <br>
                                <p>
                                <?php echo app('translator')->getFromJson('label.male'); ?>:
                                    <input <?php if($teacher->gender == "Male"): ?> checked <?php endif; ?> type="radio" class="flat" name="gender" id="genderM" value="Male" checked="" required /> &nbsp;&nbsp;&nbsp; <?php echo app('translator')->getFromJson('label.female'); ?>:
                                    <input <?php if($teacher->gender == "Female"): ?> checked <?php endif; ?> type="radio" class="flat" name="gender" id="genderF" value="Female" />
                                </p>
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('label.contact_number'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="contact_number" value="<?php echo e($teacher->contact_number); ?>" class="date-picker form-control col-md-7 col-xs-12"  type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('label.birth_date'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="dob" value="<?php echo e($teacher->dob); ?>" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date">
                        </div>
                    </div>
                    <br>
                    <h2 class="text-center"><?php echo app('translator')->getFromJson('label.account_setting'); ?></h2>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('label.email_address'); ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="email" value="<?php echo e($teacher->email); ?>"class="form-control col-md-7 col-xs-12" type="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('label.password'); ?> <small>(for password reset)</small> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="password" class="date-picker form-control col-md-7 col-xs-12"  type="password">
                        </div>
                    </div>
                  
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-default"><i class="fa fa-save"></i><?php echo app('translator')->getFromJson('button.save'); ?></button>
                            <a href="<?php echo e(route('admin.teacher.index')); ?>"  class="btn btn-default"><i class="fa fa-reply-all"></i> <?php echo app('translator')->getFromJson('button.cancel'); ?></a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript" src="<?php echo e(asset('js/parsley.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>