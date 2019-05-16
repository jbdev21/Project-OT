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
                <?php echo app('translator')->getFromJson('menu.new_level_test'); ?>
            </div>
            <div class="row">
               <div class="col-sm-1">
                    <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> <?php echo app('translator')->getFromJson('button.delete'); ?></button>
                </div>
                      
            </div> 
            <div class="x_content">
                <form action="<?php echo e(route('admin.leveltest.destroy', 0)); ?>" id="delete_all" method="post">
                    <input type="hidden" name="to_not_new" value="1">
                  <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>

                <div class="table-responsive">
                   <table class="table table-stripped table-hover">
                       <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"></th>
                            <th><?php echo app('translator')->getFromJson('label.name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('label.mobile'); ?></th>
                            <th><?php echo app('translator')->getFromJson('label.type'); ?></th>
                            <th><?php echo app('translator')->getFromJson('label.time'); ?></th>
                            <th><?php echo app('translator')->getFromJson('label.date'); ?></th>
                            <th>연령대</th>
                            <th>셀프 레벨링</th>
                            <th><?php echo app('translator')->getFromJson('label.teacher'); ?></th>
                            <th></th>
                        </tr>
                       </thead>
                       <tbody>
                       <?php count($leveltests);?>
                           <?php $__currentLoopData = $leveltests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leveltest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                  <td><input type="checkbox" name="item_checked[]" value="<?php echo e($leveltest->id); ?>"></td>
                                    <td>
                                        <?php echo e($leveltest->name); ?>	
                                        <br>
                                        <?php echo e($leveltest->korean_name); ?>

                                    </td>
                                    <td><?php echo e($leveltest->mobile); ?></td>
                                    <td><?php echo e($leveltest->type); ?></td>
                                    <td><?php echo e(date_formater('time_format',$leveltest->time)); ?></td>
                                    <td><?php echo e(date_formater('date_format',$leveltest->date)); ?></td>
                                     <td><?php echo e($leveltest->age_group); ?> </td>
                                    <td><?php echo e($leveltest->self_assesment); ?></td>
                                    <td>
                                      <input type="hidden" name="leveltest_id" value="<?php echo e($leveltest->id); ?>" >
                                    	<select class="form-control input-sm" name="teacher_id" id="teacher_id_<?php echo e($leveltest->id); ?>">
                                    		<option value=""> - <?php echo app('translator')->getFromJson('label.select_teacher'); ?> -</option>
                                    		<?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    			<option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->name); ?></option>
                                     		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    	</select>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm assign_submit" id="<?php echo e($leveltest->id); ?>"> <?php echo app('translator')->getFromJson('button.assign'); ?></button>
                                        <a href="<?php echo e(route('admin.leveltest.show', $leveltest->id)); ?>" class="btn btn-primary btn-sm"> <?php echo app('translator')->getFromJson('button.view'); ?></a>
                                    </td>
                                </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </tbody>
                   </table>
                </div>
                </form>
                    <?php echo e($leveltests->links()); ?>

            </div>
        </div>
    </div>
        <form action="<?php echo e(route('admin.leveltest.assign')); ?>" method="post" id="assign_form" style="display: none;">
        <?php echo e(csrf_field()); ?>

          <input type="hidden" name="teacher_id" id="teacher_id_input">
           <input type="hidden" name="leveltest_id" id="leveltest_id" >
       </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">

        $(document).on('click','.assign_submit', function(){
            var id = $(this).attr('id')
            var selected_teacher_id = $('#teacher_id_' + id + ' option:selected').val();
            //alert(selected_teacher_id)
            var id = $(this).attr('id')
            $('#teacher_id_input').val(selected_teacher_id)
            $('#leveltest_id').val(id)
            $('#assign_form').submit();
        });

        $(document).ready(function(){

            $("#checkAll").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $('#delete_all_btn').click(function(){
                if(confirm("<?php echo app('translator')->getFromJson('label.are_you_sure_to_delete'); ?>")){
                    $('#delete_all').submit();
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>