<?php $__env->startSection('content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12" id="app">
        <div class="x_panel">
            <div class="x_title">
               
            </div>

            <div class="x_content">
                <div class="row">
                    <div class="col-sm-4">
                        <h2><?php echo e($leveltest->name); ?></h2>
                        <table class="table">
                            <tr>
                                <td>Korean:</td>
                                <td><b><?php echo e($leveltest->korean_name); ?></b></td>
                            </tr>
                             <tr>
                                <td>Type:</td>
                                <td><b><?php echo e(ucfirst($leveltest->type)); ?></b></td>
                            </tr>
                           
                        </table>
                          
                    </div>
                    <div class="col-sm-4">
                    <br>
                    <br>
                         <table class="table">
                            <tr>
                                <td>Time:</td>
                                <td><b><?php echo e($leveltest->time); ?></b></td>
                            </tr>
                            <tr>
                                <td>Date:</td>
                                <td><b><?php echo e(date_formater('date_format', $leveltest->date)); ?></b></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-4">
                    <br>
                    <br>
                        <?php if($leveltest->type == "Video"): ?>
                            <a href="<?php echo e(leveltest_video_url($leveltest->id, 'teacher')); ?>" class="btn btn-success btn-lg " target="_blank"><i class="fa fa-video-camera"></i> Start LevelTest</a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('teacher.leveltest.index')); ?>" class="btn btn-warning btn-lg "><i class="fa fa-ban"></i> Back</a>
                    </div>
                </div>
                <div class="row">
                                <div class="col-sm-6">
                                    <form action="<?php echo e(route('teacher.leveltest.addmistake', $leveltest->id)); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <label for="">Mistake and Correction</label>
                                        <input name="mistake" type="text" placeholder="Mistake" class="form-control" required>
                                        <br>
                                        <input name="correction" type="text" placeholder="Correction" class="form-control" required>
                                        <br>
                                        <button type="submit" class="btn btn-primary"> Add</button>
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                <br>
                                    <?php $__currentLoopData = $leveltest->level_test_mistake; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mistake): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="well" style="padding:10px; position:relative;">
                                            <form id="form-<?php echo e($mistake->id); ?>" style="display:none" action="<?php echo e(route('teacher.leveltest.deletemistake', $mistake->id)); ?>" method="post">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                            <a style="position:absolute; top: 5px; right:10px; color:red; cursor:pointer" onclick="if(confirm('Are you sure to delete?')){  $('#form-<?php echo e($mistake->id); ?>').submit();  }">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <span class="text-danger">
                                                <?php echo e($mistake->mistake); ?>

                                            </span>
                                            <br>
                                            <span class="text-success">
                                                <?php echo e($mistake->correction); ?>

                                            </span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <br>
                        
                        <form action="<?php echo e(route('teacher.leveltest.update', $leveltest->id)); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>

                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Status</label>
                                    <select class="form-control" <?php if(date('Y-m-d',strtotime($leveltest->date_time)) > date('Y-m-d')): ?> disabled readonly <?php endif; ?> name="status">
                                        <option value="present" <?php if($leveltest->status =="present"): ?> selected <?php endif; ?> > Present</option>
                                        <option value="absent" <?php if($leveltest->status =="absent"): ?> selected <?php endif; ?>> Absent</option>
                                    </select>
                                    <br>
                                </div>    
                                <div class="col-sm-6">
                                    <label>Book</label>
                                    <select name="book_id" class="form-control">
                                        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($leveltest->book_id == $book->id): ?> selected <?php endif; ?> value="<?php echo e($book->id); ?>"> <?php echo e($book->title); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>    
                            </div>
                            
                            <label>Overall Comment </label>
                            <div class="star-rating">
                                <div class="star-rating__wrap">
                                    <?php for($i=10; $i > 0; $i--): ?>
                                        <input <?php if($leveltest->rate <= $i): ?> checked <?php endif; ?>  class="star-rating__input" id="star-rating-overall-<?php echo e($i); ?>" type="radio" name="rate" value="<?php echo e($i); ?>">
                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-overall-<?php echo e($i); ?>" title="<?php echo e($i); ?> out of 10 stars"></label>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <textarea  class="form-control" name="comment" id="editor" style="resize: none" rows="8" required><?php echo $leveltest->comment; ?></textarea>
                            <hr>
                            
                            <label for="input-1" class="control-label">Listening</label>
                            <div class="star-rating">
                                <div class="star-rating__wrap">
                                    <?php for($i=10; $i > 0; $i--): ?>
                                        <input <?php if($leveltest->comprehension <= $i): ?> checked <?php endif; ?> class="star-rating__input" id="star-rating-comprehension-<?php echo e($i); ?>" type="radio" name="comprehension" value="<?php echo e($i); ?>">
                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-comprehension-<?php echo e($i); ?>" title="<?php echo e($i); ?> out of 10 stars"></label>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <textarea  class="form-control" name="comprehension_comment" id="editor2" style="resize: none" rows="8" required><?php echo $leveltest->comprehension_comment; ?></textarea>
                            
                            <hr>
                            <label for="input-1" class="control-label">Speaking</label>
                            <div class="star-rating">
                                <div class="star-rating__wrap">
                                    <?php for($i=10; $i > 0; $i--): ?>
                                        <input  <?php if($leveltest->fluency <= $i): ?> checked <?php endif; ?> class="star-rating__input" id="star-rating-fluency-<?php echo e($i); ?>" type="radio" name="fluency" value="<?php echo e($i); ?>">
                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-fluency-<?php echo e($i); ?>" title="<?php echo e($i); ?> out of 10 stars"></label>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <textarea  class="form-control" name="fluency_comment" id="editor4" style="resize: none" rows="8" required><?php echo $leveltest->fluency_comment; ?></textarea>
                            
                            <hr>
                            <label for="input-1" class="control-label">Pronounciation</label>
                            <div class="star-rating">
                                <div class="star-rating__wrap">
                                    <?php for($i=10; $i > 0; $i--): ?>
                                        <input <?php if($leveltest->pronounciation <= $i): ?> checked <?php endif; ?>  class="star-rating__input" id="star-rating-pronounciation-<?php echo e($i); ?>" type="radio" name="pronounciation" value="<?php echo e($i); ?>">
                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-pronounciation-<?php echo e($i); ?>" title="<?php echo e($i); ?> out of 10 stars"></label>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <textarea  class="form-control" name="pronounciation_comment" id="editor3" style="resize: none" rows="8" required><?php echo $leveltest->pronounciation_comment; ?></textarea>

                            <hr>


                            <label for="input-1" class="control-label">Vocabulary</label>
                            <div class="star-rating">
                                <div class="star-rating__wrap">
                                    <?php for($i=10; $i > 0; $i--): ?>
                                        <input  <?php if($leveltest->vocabulary <= $i): ?> checked <?php endif; ?> class="star-rating__input" id="star-rating-vocabulary-<?php echo e($i); ?>" type="radio" name="vocabulary" value="<?php echo e($i); ?>">
                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-vocabulary-<?php echo e($i); ?>" title="<?php echo e($i); ?> out of 10 stars"></label>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <textarea  class="form-control" name="vocabulary_comment" id="editor5" style="resize: none" rows="8" required><?php echo $leveltest->vocabulary_comment; ?></textarea>
                            <hr>

                            <label for="input-1" class="control-label">Grammar</label>
                            <div class="star-rating">
                                <div class="star-rating__wrap">
                                    <?php for($i=10; $i > 0; $i--): ?>
                                        <input <?php if($leveltest->grammar <= $i): ?> checked <?php endif; ?> class="star-rating__input" id="star-rating-grammar-<?php echo e($i); ?>" type="radio" name="grammar" value="<?php echo e($i); ?>">
                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-grammar-<?php echo e($i); ?>" title="<?php echo e($i); ?> out of 10 stars"></label>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <textarea  class="form-control" name="grammar_comment" id="editor6" style="resize: none" rows="8" required><?php echo $leveltest->grammar_comment; ?></textarea>
                            <br>
                            <p>
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="pending"> Pending</option>
                                    <option value="present"> Present</option>
                                    <option value="absent"> Absent</option>
                                </select>
                            </p>
                            <br>
                            <br>
                            <button <?php if(date('Y-m-d',strtotime($leveltest->date_time)) > date('Y-m-d')): ?> disabled <?php endif; ?> class="btn btn-default"  type="submit"><i class="fa fa-save"></i> Save Changes</button>
                        </form>
                    </div>


                  
                    </div>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/css/star-rating.css">
    <style type="text/css">
        .star-rating{
            font-size: 1.5em;
        }
        .star-rating__wrap{
            display: inline-block;
            font-size: 1em;
        }
        .star-rating__wrap:after{
            content: "";
            display: table;
            clear: both;
        }
        .star-rating__ico{
            float: right;
            padding-left: 2px;
            cursor: pointer;
            color: #FFB300;
        }
        .star-rating__ico:last-child{
            padding-left: 0;
        }
        .star-rating__input{
            display: none;
        }
        .star-rating__ico:hover:before,
        .star-rating__ico:hover ~ .star-rating__ico:before,
        .star-rating__input:checked ~ .star-rating__ico:before
        {
            content: "\f005";
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/js/star-rating.js"></script>
    <script src="//cdn.ckeditor.com/4.7.1/basic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
    <script src="https://unpkg.com/lodash@4.16.0"></script>
    <script>
       

        $(document).ready(function(){
            CKEDITOR.replace( 'editor' );
            CKEDITOR.replace( 'editor2' );
            CKEDITOR.replace( 'editor3' );
            CKEDITOR.replace( 'editor4' );
            CKEDITOR.replace( 'editor5' );
            CKEDITOR.replace( 'editor6' );

            var url = "<?php echo e(url('ajax/mistake')); ?>"
            var process = ""
            $('.add_mistake').click(function(){
                process = "add";
                $('#myModal').modal('show')
                $('#mistakefrm').trigger('reset')
            });


        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.teacher', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>