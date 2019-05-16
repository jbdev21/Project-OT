<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/13/2017
 * Time: 11:32 AM
 */
?>


<?php $__env->startSection('content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                   <?php echo app('translator')->getFromJson('label.adding_new_blog'); ?>
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <div class="row">

                <form action="<?php echo e(route('admin.blog.store')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-sm-8">
                             <label for=""><?php echo app('translator')->getFromJson('label.title'); ?></label>
                              <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="col-sm-4">
                           <label for=""><?php echo app('translator')->getFromJson('label.status'); ?></label>
                          <select class="form-control" name="is_published">
                            <option value="1"> <?php echo app('translator')->getFromJson('label.publish'); ?></option>
                            <option value="0"> <?php echo app('translator')->getFromJson('label.draft'); ?></option>
                          </select>
                        </div>
                      </div>
                       
                      
                        <br>
                        <textarea  name="content" id="my-editor" rows="8" class="form-control"><?php echo old('message'); ?></textarea>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> <?php echo app('translator')->getFromJson('button.save'); ?></button>
                        <a href="<?php echo e(route('admin.blog.index')); ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> <?php echo app('translator')->getFromJson('button.cancel'); ?></a>
                    </div>

                </form>
            </div>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('editor'); ?>
  <?php echo $__env->make('partials.full-editor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>