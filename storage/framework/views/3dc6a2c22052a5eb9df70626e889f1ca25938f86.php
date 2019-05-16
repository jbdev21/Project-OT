<?php $__env->startSection('content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php echo app('translator')->getFromJson('menu.teacher_profile'); ?>
            </div>
            <div class="row">
                <form action="<?php echo e(route('admin.teacherprofile.store')); ?>" method="post" enctype="multipart/form-data" >
                <?php echo e(csrf_field()); ?>

                <div class="row">
                            <div class="col-sm-7">
                                <p>
                                    <label for=""><?php echo app('translator')->getFromJson('label.teacher'); ?></label>
                                    <select name="admin_id" id="select2" class="form-control">
                                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </p>
                                <p>
                                    <label for=""><input type="checkbox" name="is_show"><?php echo app('translator')->getFromJson('label.show'); ?></label>
                                </p>
                                <p>
                                    <label for="">내용 1 (출신학교, 특징 등)</label>
                                    <textarea name="overview" id="" cols="30" class="form-control" rows="5"></textarea>
                                </p>
                                <p>
                                    <label for="">내용 2 (강사소개, 스크립트 등)</label>
                                    <textarea name="message" id="my-editor" cols="30" rows="10"></textarea>
                                </p>
                            </div>
                            <div class="col-sm-5">
                                <p>
                                    <label for=""><?php echo app('translator')->getFromJson('label.profile_image'); ?></label>
                                    <br>
                                    <label class="btn btn-xs btn-success" for="profile_image"><i class="fa fa-file-picture-o"></i> <?php echo app('translator')->getFromJson('label.select_image'); ?></label>
                                    <input required style="display:none;"  accept="image/*" type="file" id="profile_image" name="profile_image"><br>
                                    <img src="http://via.placeholder.com/100x100" class="img-responsive" alt="" id="profile" height="200px" width="200px">
                                </p>
                                <hr>
                                <p>
                                    <label for=""><?php echo app('translator')->getFromJson('label.background_image'); ?></label>
                                    <br>
                                    <label class="btn btn-xs btn-success" for="background_image"><i class="fa fa-file-picture-o"></i> <?php echo app('translator')->getFromJson('label.select_image'); ?></label>
                                    <br>
                                    <input required style="display:none;"  accept="image/*" type="file" id="background_image" name="background_image">
                                    <?php if(is_desktop()): ?>
                                        <img src="http://via.placeholder.com/400x200"  style="width:400px; height:200px;"  alt="" id="background">
                                    <?php else: ?>
                                        <img src="http://via.placeholder.com/400x200" class="img-responsive" alt="" id="background">
                                    <?php endif; ?> 
                                </p>
                                <hr>

                                <div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#upload" aria-controls="upload" role="tab" data-toggle="tab">Upload</a></li>
                                        <li role="presentation"><a href="#url" aria-controls="url" role="tab" data-toggle="tab">URL</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="upload">
                                            <br>
                                            <input accept="audio/*"  type="file" id="audio_file" name="audio_file">
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="url">
                                            <br>
                                            <input type="text" class="form-control" placeholder=" Audio file URL" name="audio_url">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>

                                <br>
                                <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> <?php echo app('translator')->getFromJson('button.save'); ?></button>
                                <a href="<?php echo e(route('admin.teacherprofile.index')); ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> <?php echo app('translator')->getFromJson('button.cancel'); ?></a>
                            </div>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>    


<?php $__env->startSection('scripts'); ?>
    
    <script>

        function readURL(input, holder) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#' + holder).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        
        $("#background_image").change(function(){
            readURL(this, 'background');
        });

        $("#profile_image").change(function(){
            readURL(this, 'profile');
        });

     

</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('editor'); ?>
  <?php echo $__env->make('partials.full-editor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>