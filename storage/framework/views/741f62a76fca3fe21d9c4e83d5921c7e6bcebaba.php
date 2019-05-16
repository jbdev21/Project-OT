<?php $__env->startSection('content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php echo app('translator')->getFromJson('menu.1:1'); ?>
            </div>
            <a href="<?php echo e(route('admin.message.index')); ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> <?php echo app('translator')->getFromJson('button.back'); ?></a>

            <div class="row">
            	<div class="col-sm-8 col-sm-offset-2">
            		<h4>
            	  <?php echo e($message->user->username); ?>

            	
            	<br>
            	<small><?php echo e($message->user->korean_name); ?></small>
              </h4>
            		<?php echo $message->message; ?>

            <hr>
            	</div>
            </div>
            <div class="row">
            	<div class="col-sm-6 col-sm-offset-3">
            		<?php $__empty_1 = true; $__currentLoopData = $message->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						      <div class="block_content">
                    <div class="well">
                        <h2 class="title">
                          <?php echo e($reply->admin->name); ?>

                        </h2>
                          <div class="byline">
                            <span><?php echo e(date_formater('date_time_format', $reply->created_at)); ?></span>
                          </div>
                            <p class="excerpt">
                              <?php echo $reply->message; ?>

                            </p>
                            <form id="form-<?php echo e($reply->id); ?>" method="post" action="<?php echo e(route('admin.message.destroy', $reply->id)); ?>">
                              <?php echo e(csrf_field()); ?>

                              <?php echo e(method_field('DELETE')); ?>

                              <input type="hidden" name="message_id" value="<?php echo e($message->id); ?>">
                            </form>
                            <a href="#" type="button" onclick="if(confirm('Are you sure to delete this reply?')) { $(' #form-<?php echo e($reply->id); ?>').submit() }"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                  			   
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    	<br>
                    <?php endif; ?>

                     <form action="<?php echo e(route('admin.message.update', $message->id)); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                        
                        <textarea  name="message" id="my-editor" rows="8" class="form-control"><?php echo old('message'); ?></textarea>
                        <br>
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> <?php echo app('translator')->getFromJson('button.submit'); ?></button>
                    </form>
            	</div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
       <script src="<?php echo e(asset('js/tinymce-lang/ko_kr.js')); ?>"></script>
    <script>
      var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      }

      var editor_config = {
        language : 'ko_KR',
        height : "250",
        selector: "textarea#my-editor",
        menubar: false,
        branding:false,
        themes: "modern",
        forced_root_block : false,
        plugins: [
          "advlist autolink lists link  charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime  nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = '/media?field_name=' + field_name;
          
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }

          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Media Manager',
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