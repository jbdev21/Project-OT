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
                <h2><?php echo app('translator')->getFromJson('label.edit_student'); ?></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form action="<?php echo e(route('admin.student.update', $student->id)); ?>" method="post" data-parsley-validate class="form-horizontal">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username"><?php echo app('translator')->getFromJson('label.username'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="username" value="<?php echo e($student->username); ?>" name="username" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.name'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" name="name" required="required" value="<?php echo e($student->name); ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.korean_name'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" name="korean_name" value="<?php echo e($student->korean_name); ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('label.gender'); ?> *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <br>
                                <p>
                                    <?php echo app('translator')->getFromJson('label.male'); ?>:
                                    <input type="radio" <?php if($student->gender == "Male"): ?> checked  <?php endif; ?> class="flat" name="gender" id="genderM" value="Male" checked="" required /> &nbsp;&nbsp;&nbsp; <?php echo app('translator')->getFromJson('label.female'); ?>:
                                    <input type="radio" <?php if($student->gender == "Female"): ?> checked  <?php endif; ?> class="flat" name="gender" id="genderF" value="Female" />
                                </p>
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('label.contact_number'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="contact_number" value="<?php echo e($student->contact_number); ?>" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                    </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('label.contact_number1'); ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="contact_number1" value="<?php echo e($student->contact_number1); ?>" class="date-picker form-control col-md-7 col-xs-12" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('label.date_of_birth'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="dob" value="<?php echo e($student->dob); ?>" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> <?php echo app('translator')->getFromJson('label.discount'); ?>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <input name="discount_amount"  value="<?php echo e($student->discount_amount); ?>" class="date-picker form-control col-md-7 col-xs-12"  type="number">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input name="discount_type" value="fixed" <?php if($student->discount_type): ?> <?php if($student->discount_type == "fixed"): ?> checked <?php endif; ?>  <?php else: ?> checked <?php endif; ?> type="radio" value="<?php echo e($student->discount_type); ?>" value="fixed"> <?php echo app('translator')->getFromJson('label.fixed_amount'); ?> &nbsp;&nbsp;&nbsp;
                            <input name="discount_type" value="percentage"  <?php if($student->discount_type == "percentage"): ?> checked <?php endif; ?> type="radio" value="<?php echo e($student->discount_type); ?>" value="fixed"> <?php echo app('translator')->getFromJson('label.percentage'); ?>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> <?php echo app('translator')->getFromJson('label.discount_reason'); ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="discount_reason"  value="<?php echo e($student->discount_reason); ?>" class="date-picker form-control col-md-7 col-xs-12"  type="text">
                        </div>
                    </div>
                  
                    <br>
                     
                    <h2 class="text-center"><?php echo app('translator')->getFromJson('label.account_setting'); ?></h2>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('label.email'); ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="email" value="<?php echo e($student->email); ?>"class="form-control col-md-7 col-xs-12" type="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('label.password'); ?> <small>( <?php echo app('translator')->getFromJson('label.for_password_reset_only'); ?> )</small>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="password" class="date-picker form-control col-md-7 col-xs-12" type="password">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('label.remarks'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="remarks" id="my-editor" class="date-picker form-control col-md-7 col-xs-12"  type="text"><?php echo $student->remarks; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> <?php echo app('translator')->getFromJson('button.submit'); ?></button>
                            <a  href="<?php echo e(route('admin.student.index')); ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> <?php echo app('translator')->getFromJson('button.back'); ?></a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript" src="<?php echo e(asset('js/parsley.js')); ?>"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
      var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      }

      var editor_config = {
        path_absolute : "<?php echo e(url('/public')); ?>/",
        height : "250",
        selector: "textarea#my-editor",
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount  fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "paste"
        ],
        toolbar: " undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
          
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }

          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'S2 File Manager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
          });
        }
      };

    tinymce.init(editor_config);

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>