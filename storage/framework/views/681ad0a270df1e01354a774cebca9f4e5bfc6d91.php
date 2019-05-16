<?php $__env->startSection('content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    <?php echo app('translator')->getFromJson('label.editing_new_curriculum'); ?>
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                
                <form action="<?php echo e(route('admin.curriculum.update', $curriculum->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>

                    <div class="row">
                        <div class="col-sm-7">
                            <label for="title"><?php echo app('translator')->getFromJson('label.title'); ?></label>
                            <input type="text" name="name" value="<?php echo e($curriculum->name); ?>" id="title" class="form-control" required>
                            <br>
                            <p>
                                <label for="">Books</label>
                                <br>
                                <select name="books[]" id="select2" class="form-control" multiple='multiple'>
                                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if(in_array($book->id, $curriculum->books()->pluck('book_id')->toArray())): ?> selected <?php endif; ?> value="<?php echo e($book->id); ?>" ><?php echo e($book->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </p>
                            <br>
                        
                        </div>
                        <div class="col-sm-5">
                            <p>
                                <label for="">Picture</label>
                                <br>
                                <?php if($curriculum->picture): ?>
                                
                                    <label for="picture" class="btn btn-default btn-xs"><i class="fa fa-file-image-o"></i> Change Picture</label>
                                    <img id="blah" src="<?php echo e(asset($curriculum->picture)); ?>" alt="dummy Image"  class="img-responsive" >
                                
                                <?php else: ?>

                                    <label for="picture" class="btn btn-default btn-xs"><i class="fa fa-file-image-o"></i> Choose Picture</label>
                                <img id="blah" src="<?php echo e(asset('image/no-image.png')); ?>" alt="dummy Image"  class="img-responsive" >
                                
                                <?php endif; ?>
                                <input type="file" accept="image/*" style="display:none;"  name="picture" id="picture">
                            </p>
                        </div>
                        
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> <?php echo app('translator')->getFromJson('button.save_changes'); ?></button>
                        <a class="btn btn-default" href="<?php echo e(route('admin.curriculum.index')); ?>">
                        <i class="fa fa-reply-all"></i>
                            <?php echo app('translator')->getFromJson('button.back'); ?>
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
    <script>
        $(document).ready(function(){
            $('#select2').select2()

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#picture").change(function(){
                readURL(this);
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>