<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/24/2017
 * Time: 6:29 PM
 */
?>


<?php $__env->startSection('content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12" id="app">
        <div class="x_panel">
            <div class="x_title">
               <a href="<?php echo e(route('admin.leveltest.index')); ?>" class="btn btn-default btn-sm"><i class="fa fa-ban"></i>  <?php echo app('translator')->getFromJson('button.back'); ?></a>
            </div>

            <div class="x_content">
             <form action="<?php echo e(route('admin.leveltest.update', $leveltest->id)); ?>" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><?php echo e($leveltest->name); ?></h2>
                        <table class="table">
                            <tr>
                                <td><?php echo app('translator')->getFromJson('label.korean_name'); ?>:</td>
                                <td><b><?php echo e($leveltest->korean_name); ?></b></td>
                            </tr>
                             <tr>
                                <td><?php echo app('translator')->getFromJson('label.type'); ?>:</td>
                                <td>
                                    <select class="form-control" name="type">
                                        <option <?php if($leveltest->type == "Video"): ?> selected <?php endif; ?> class="Video">Video</option>
                                        <option <?php if($leveltest->type == "Phone"): ?> selected <?php endif; ?> class="Phone">Phone</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo app('translator')->getFromJson('label.time'); ?>: </td>
                                <td>
                                    <select type='text' name="time" class="form-control">
                                        <?php $__currentLoopData = time_select(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(date('h:iA', strtotime($time))); ?>" <?php if($leveltest->time ==  date('h:iA', strtotime($time)) ): ?> selected  <?php endif; ?> > <?php echo e(date('h:iA', strtotime($time))); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo app('translator')->getFromJson('label.date'); ?>:</td>
                                <td>
                                    <input required type="date" name="date" value="<?php echo e($leveltest->date); ?>" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo app('translator')->getFromJson('label.teacher'); ?>:</td>
                                <td>
                                    <select name="teacher" id="" class="form-control input-sm">
                                        <option value=""> No teacher Assigned </option>
                                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($teacher->id); ?>" <?php if($leveltest->admin && $leveltest->admin->id == $teacher->id): ?> selected <?php endif; ?>><?php echo e($teacher->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                   
                                </td>   
                            </tr>
                        </table>
                        
                    </div>
                  <!--   <div class="col-sm-6">
                        <div id="canvasRadar" style="height: 370px; max-width: 100%; margin: 0px auto;"></div>
                    </div> -->
                </div>
                    <hr>
                <div class="row">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>

                            
                     
                        <div class="col-sm-6">
                        <label><?php echo app('translator')->getFromJson('label.status'); ?></label>
                            <select class="form-control" <?php if(date('Y-m-d',strtotime($leveltest->date_time)) > date('Y-m-d')): ?> disabled readonly <?php endif; ?> name="status">
                                <option value="present" <?php if($leveltest->status =="present"): ?> selected <?php endif; ?> > <?php echo app('translator')->getFromJson('button.present'); ?></option>
                                <option value="absent" <?php if($leveltest->status =="absent"): ?> selected <?php endif; ?>> <?php echo app('translator')->getFromJson('button.absent'); ?></option>
                            </select>
                            <br>
                            <label><?php echo app('translator')->getFromJson('label.overall_comment'); ?> </label>
                            <textarea  class="form-control" name="comment" id="editor" style="resize: none" rows="8" required><?php echo $leveltest->comment; ?></textarea>
                        </div>
                        <div class="col-sm-6">
                        <br>
                        <br>   
                            <label for="input-1" class="control-label"><?php echo app('translator')->getFromJson('label.comprehension'); ?></label>
                            <input id="input-1" name="comprehension" value="<?php echo e($leveltest->comprehension); ?>" class="rating rating-loading" data-min="0"  data-size="xs" data-max="10" data-step="1">
                            <textarea  class="form-control" name="comprehension_comment" id="editor2" style="resize: none" rows="8" required><?php echo $leveltest->comprehension_comment; ?></textarea>
                            <br>
                        </div>
                        <div class="col-sm-6">
                             <label for="input-1" class="control-label"><?php echo app('translator')->getFromJson('label.pronounciation'); ?></label>
                            <input id="input-1" name="pronounciation" value="<?php echo e($leveltest->pronounciation); ?>"  class="rating rating-loading" data-min="0"  data-size="xs" data-max="10" data-step="1">
                            <textarea  class="form-control" name="pronounciation_comment" id="editor3" style="resize: none" rows="8" required><?php echo $leveltest->pronounciation_comment; ?></textarea>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <label for="input-1" class="control-label"><?php echo app('translator')->getFromJson('label.fluency'); ?></label>
                            <input id="input-1" name="fluency" value="<?php echo e($leveltest->fluency); ?>"   class="rating rating-loading" data-min="0"  data-size="xs" data-max="10" data-step="1">
                            <textarea  class="form-control" name="fluency_comment" id="editor4" style="resize: none" rows="8" required><?php echo $leveltest->fluency_comment; ?></textarea>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <label for="input-1" class="control-label"><?php echo app('translator')->getFromJson('label.vocabulary'); ?></label>
                            <input id="input-1" name="vocabulary" value="<?php echo e($leveltest->vocabulary); ?>"   class="rating rating-loading" data-min="0"  data-size="xs" data-max="10" data-step="1">
                            <textarea  class="form-control" name="vocabulary_comment" id="editor5" style="resize: none" rows="8" required><?php echo $leveltest->vocabulary_comment; ?></textarea>
                            <br>
                        </div>
                        <div class="col-sm-6">
                             <label for="input-1" class="control-label"><?php echo app('translator')->getFromJson('label.grammar'); ?></label>
                            <input id="input-1" name="grammar" value="<?php echo e($leveltest->grammar); ?>"   class="rating rating-loading" data-min="0"  data-size="xs" data-max="10" data-step="1">
                            <textarea  class="form-control" name="grammar_comment" id="editor6" style="resize: none" rows="8" required><?php echo $leveltest->grammar_comment; ?></textarea>
                            <br>
                        </div>
                    </div>
                     <div class="col-sm-6">
                    <p>
                        <label><?php echo app('translator')->getFromJson('label.status'); ?></label>
                        <select class="form-control" name="status">
                            <option value="pending" <?php if($leveltest->status == "pending"): ?> selected <?php endif; ?> ><?php echo app('translator')->getFromJson('label.pending'); ?></option>
                            <option value="present" <?php if($leveltest->status == "present"): ?> selected <?php endif; ?> ><?php echo app('translator')->getFromJson('label.present'); ?></option>
                            <option value="absent" <?php if($leveltest->status == "absent"): ?> selected <?php endif; ?> ><?php echo app('translator')->getFromJson('label.absent'); ?></option>
                        </select>
                    </p>
                    <br>

                            <button  class="btn btn-default btn-lg"  type="submit"><i class="fa fa-save"></i> <?php echo app('translator')->getFromJson('button.save'); ?></button>
                         
                    </div>


                  
                   </form>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/css/star-rating.css">

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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
		function printContent(el){
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
		}

	
			google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['This is just only for Sample', 'Percentage'],
          ["King's pawn (e4)", 44],
          ["Queen's pawn (d4)", 31],
          ["Knight to King 3 (Nf3)", 12],
          ["Queen's bishop pawn (c4)", 10],
          ['Other', 3]
        ]);

        var options = {
          title: 'Sample Chart',
          width: 600,
          legend: { position: 'none' },
          chart: { title: 'Sample Chart',
                   subtitle: 'Chart Demo' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('canvasRadar'));
        chart.draw(data, options);
      };

			
			
    </script>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>