<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/24/2017
 * Time: 6:29 PM
 */
?>


<?php $__env->startSection('content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php echo app('translator')->getFromJson('label.profile'); ?>
            </div>

            <div class="x_content">
              	<div class="row">
              		<div class="col-sm-6 col-sm-offset-3">
              			<form action="<?php echo e(route('admin.profile.update', $user->id)); ?>" method="post" enctype="multipart/form-data">
	              			<?php echo e(csrf_field()); ?>

	              			<?php echo e(method_field('PUT')); ?>

	              			<p>
		                    	<label><?php echo app('translator')->getFromJson('label.username'); ?></label>
		                    	<input readonly type="text" class="form-control" name="username" value="<?php echo e($user->username); ?>">
	                    	</p>
	                    	<p>
		                    	<label><?php echo app('translator')->getFromJson('label.email'); ?></label>
		                    	<input type="text" class="form-control" name="email" value="<?php echo e($user->email); ?>">
	                    	</p>
	                    	<p>
		                    	<label><?php echo app('translator')->getFromJson('label.name'); ?></label>
		                    	<input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>">
	                    	</p>
	                    	<!-- <p>
		                    	<label><?php echo app('translator')->getFromJson('label.gender'); ?></label>
		                    	<select type="text" class="form-control" name="gender">
		                    		<option value="Male"> <?php echo app('translator')->getFromJson('label.male'); ?></option>
		                    		<option value="Female" <?php if($user->gender =="Female"): ?> selected <?php endif; ?> > <?php echo app('translator')->getFromJson('label.female'); ?></option>
		                    	</select>
	                    	</p> -->
	                    	<p>
		                    	<label><?php echo app('translator')->getFromJson('label.contact_number'); ?></label>
		                    	<input type="text" class="form-control" name="contact_number" value="<?php echo e($user->contact_number); ?>">
	                    	</p>
							<p>
								<br>
								<label for=""><?php echo app('translator')->getFromJson('label.profile_image'); ?></label>
                                    <br>
                                    <label class="btn btn-xs btn-default" for="profile_image"><i class="fa fa-file-picture-o"></i> <?php echo app('translator')->getFromJson('label.select_image'); ?></label>
                                    <input required style="display:none;"  accept="image/*" type="file" id="profile_image" name="profile_image"><br>
									<?php if($user->image): ?>
                                    	<img src="<?php echo e(asset('profile/'. $user->image)); ?>" class="img-responsive" alt="" id="profile" height="200px" width="200px">
									<?php else: ?>
                                    	<img src="http://via.placeholder.com/100x100" class="img-responsive" alt="" id="profile" height="200px" width="200px">
									<?php endif; ?>
								
							</p>
	                    	<br>
	                    	<button class="btn btn-success" type="submit"><?php echo app('translator')->getFromJson('button.save'); ?></button>
                    	
                    	</form>
                  	</div>
              	</div> 
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


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>