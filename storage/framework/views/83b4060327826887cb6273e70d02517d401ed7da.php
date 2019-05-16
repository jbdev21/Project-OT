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
                <label><?php echo app('translator')->getFromJson('label.new_class'); ?></label>
                <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> <?php echo app('translator')->getFromJson('button.delete'); ?></button>
            </div>
            <form action="<?php echo e(route('admin.classer.destroy', 0)); ?>" id="delete_all" method="post">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('DELETE')); ?>

                <div class="table-responsive">
                    <table class="table table-stripped table-hover">
                       <thead>
                        <tr>
                            <td><input type="checkbox" id="checkAll" ></td>
                            <td><?php echo app('translator')->getFromJson('label.username'); ?></td>
                            <td><?php echo app('translator')->getFromJson('label.name'); ?></td>
                            <td><?php echo app('translator')->getFromJson('label.contact_number'); ?></td>
                            <td><?php echo app('translator')->getFromJson('label.type'); ?></td>
                            <td><?php echo app('translator')->getFromJson('label.days'); ?></td>
                            <td><?php echo app('translator')->getFromJson('label.time'); ?></td>
                            <td><?php echo app('translator')->getFromJson('label.minutes'); ?></td>
                            <td><?php echo app('translator')->getFromJson('label.total_session'); ?></td>
                            <td><?php echo app('translator')->getFromJson('label.start_date'); ?></td>
                            <td><?php echo app('translator')->getFromJson('label.payment_method'); ?></td>
                            <td><?php echo app('translator')->getFromJson('label.price'); ?></td>
                            <td>등록일</td>
                            <td><?php echo app('translator')->getFromJson('label.teacher'); ?></td>
                            <td></td>
                            <td><?php echo app('translator')->getFromJson('label.note'); ?></td>
                        </tr>
                       </thead>
                       <tbody>
                       <?php count($classes);?>
                           <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="item_checked[]" value="<?php echo e($class->id); ?>">
                                    </td>
                                     <td>
                                        <a href="<?php echo e(route('admin.student.show', $class->user->id)); ?>">
                                            <?php echo e($class->user->username); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <?php echo e($class->user->name); ?>

                                        <br>
                                        <?php echo e($class->user->korean_name); ?>

                                    </td>
                                    <td>
                                        <?php echo e($class->user->contact_number); ?>

                                        <?php if($class->user->contact_number1): ?>
                                        <br>
                                        <?php echo e($class->user->contact_number1); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($class->type); ?></td>
                                    <td>
                               
                                    	<?php $__currentLoopData = $class->day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    		<?php echo app('translator')->getFromJson('label.'. strtolower(str_limit($day->day_name, 3, ''))); ?> &nbsp;
                                    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td><?php echo e(date(setting('time_format'),strtotime($class->time))); ?></td>
                                    <td><?php echo e($class->minutes); ?></td>
                                    <td><?php echo e($class->total_sessions); ?></td>
                                    <td><?php echo e($class->start_date); ?></td>
                                    
                                    <td align="center"><?php if($class->payment_method == "bank"): ?> <img class="img-responsive" src="<?php echo e(asset('image/icons/bank.png')); ?>"> <?php else: ?> <img class="img-responsive" src="<?php echo e(asset('image/icons/credit-card.png')); ?>"> <?php endif; ?></td>
                                    <td>
                                        <?php echo e(number_format($class->payment_price)); ?> <?php echo app('translator')->getFromJson('label.won'); ?>
                                    </td>
                                    <td>
                                        <?php echo e(date_formater('date_time_format', $class->created_at)); ?>

                                    </td>
                                    <td>
                                    <?php if($class->admin): ?>
                                        <div class="form-control">
                                              <?php echo e($class->admin->name); ?>      
                                        </div>            
                                    <?php else: ?>
                                    	<select class="form-control input-sm" name="teacher_id" id="teacher_id_<?php echo e($class->id); ?>" required>
                                    		<option value=""> -  강사배정 -</option>
                                    		<?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    			<option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->name); ?></option>
                                     		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    	</select>
                                    <?php endif; ?>
                                    </td>
                                    <td>
                                     <?php if($class->admin): ?>
                                        <a href="<?php echo e(route('admin.classer.edit', $class->id)); ?>" class="btn btn-success btn-sm assign_submit" > <?php echo app('translator')->getFromJson('button.edit'); ?></a>
                                     <?php else: ?>
                                        <button type="button" id="<?php echo e($class->id); ?>" class="btn btn-success btn-sm assign_submit" > <?php echo app('translator')->getFromJson('button.assign'); ?></button>
                                     <?php endif; ?>
                                        <a href="<?php echo e(route('admin.classer.show', $class->id)); ?>" class="btn btn-primary btn-sm"> 
                                        <?php echo app('translator')->getFromJson('button.show'); ?> 
                                        <?php if($class->note): ?>
                                        <i class="fa fa-circle" style="color:red; position: absolute; margin-top: -10px; margin-left: 5px;" ></i>
                                        <?php endif; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php if($class->note): ?>
                       
                                            <a tabindex="0" data-placement="left" class="btn btn-xs btn-default"  role="button" data-toggle="popover" data-trigger="focus" title="<?php echo app('translator')->getFromJson('label.note'); ?>" data-content="<?php echo $class->note; ?>" data-html="true">?</a>
                                    
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </tbody>
                   </table>
                </div>
            </form>
                <?php echo e($classes->links()); ?>


        </div>
    </div>
    <form method="post" id="assign_form" style="display: none;">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="teacher_id" id="teacher_id_input">
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover()
            
            $(document).on('click','.assign_submit', function(){
                var url = '<?php echo e(url('admin/classer/assign/')); ?>';
                var id = $(this).attr('id')
                var selected_teacher_id = $('#teacher_id_' + id + ' option:selected').val();
                //alert(selected_teacher_id)
                var id = $(this).attr('id')
                $('#teacher_id_input').val(selected_teacher_id)
                $('#assign_form').attr('action', url + '/' + id)
                $('#assign_form').submit();   
            });

            $("#checkAll").click(function(){
                    $('input:checkbox').not(this).prop('checked', this.checked);
                });

            $('#delete_all_btn').click(function(){
                if(confirm("<?php echo app('translator')->getFromJson('label.are_you_sure_to_delete'); ?>")){
                    $('#delete_all').submit();
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>