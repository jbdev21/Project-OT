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
                <label><?php echo app('translator')->getFromJson('menu.postponed_class'); ?></label>
            </div>
            <div class="row">
               <!-- <div class="col-sm-1">
                    <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> <?php echo app('translator')->getFromJson('button.delete'); ?></button>
                </div> -->
                
            </div>
            <form action="<?php echo e(route('admin.classer.destroy', 0)); ?>" id="delete_all" method="post">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('DELETE')); ?>

            <div class="table-responsive">
               <table class="table table-stripped table-hover">
                   <thead>
                    <tr>
                        <!-- <td><input type="checkbox" id="checkAll" ></td> -->
                        <td><?php echo app('translator')->getFromJson('label.username'); ?></td>
                        <td><?php echo app('translator')->getFromJson('label.name'); ?></td>
                        <td><?php echo app('translator')->getFromJson('label.contact_number'); ?></td>
                        <td><?php echo app('translator')->getFromJson('label.type'); ?></td>
                        <td><?php echo app('translator')->getFromJson('label.days'); ?></td>
                        <td><?php echo app('translator')->getFromJson('label.time'); ?></td>
                        <td><?php echo app('translator')->getFromJson('label.minutes'); ?></td>
                        <td><?php echo app('translator')->getFromJson('label.total_session'); ?></td>
                        <td><?php echo app('translator')->getFromJson('label.duration'); ?></td>
                        <td><?php echo app('translator')->getFromJson('label.date'); ?></td>
                        <td><?php echo app('translator')->getFromJson('label.teacher'); ?></td>
                        <td></td>
                        <!-- <td></td> -->
                    </tr>
                   </thead>
                   <tbody>
                   <?php count($classes);?>
                       <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                                <!-- <td>
                                    <input type="checkbox" name="item_checked[]" value="<?php echo e($class->id); ?>">
                                </td> -->
                                 <td>
                                 <?php if($class->classer->user): ?>
                                    <a href="<?php echo e(route('admin.student.show', $class->classer->user->id)); ?>">
                                        <?php echo e($class->classer->user->username); ?>

                                    </a>
                                 <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($class->classer->user->name); ?>

                                    <br>
                                    <?php echo e($class->classer->user->korean_name); ?>

                                </td>
                                <td>
                                    <?php echo e($class->classer->user->contact_number); ?>

                                    <?php if($class->classer->user->contact_number1): ?>
                                        <br>
                                        <?php echo e($class->classer->user->contact_number1); ?>

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($class->classer->type); ?></td>
                                <td>
                                    <?php $__currentLoopData = $class->classer->day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                		<?php echo app('translator')->getFromJson('label.'. strtolower(str_limit($day->day_name, 3, ''))); ?> &nbsp;
                                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td><?php echo e(date(setting('time_format'),strtotime($class->classer->time))); ?></td>
                                <td><?php echo e($class->classer->minutes); ?></td>
                                <td><?php echo e($class->classer->total_sessions); ?></td>
                                <td>
                                    <?php  
                                         $first_session = $class->classer->getFirstSession();
                                        $last_session = $class->classer->getLastSession();
                                        echo  date_formater('date_format', $first_session->date_time). ' - ' . date_formater('date_format', $last_session->date_time);
                                     ?>
                                </td>
                                <td>
                                
                                   <?php echo e(date_formater('date_format', $class->date_time)); ?>

                                </td>
                                <td>
                                <?php if($class->admin): ?>
                                    <?php echo e($class->classer->admin->name); ?>

                                <?php endif; ?>
                                
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-xs" href="<?php echo e(route('admin.classer.show', $class->classer->id)); ?>?session=<?php echo e($class->id); ?>"><?php echo app('translator')->getFromJson('button.show'); ?></a>
                                </td>
                                <!-- <td>
                                  
                                    <a href="<?php echo e(route('admin.classer.show', $class->classer->id)); ?>" class="btn btn-primary btn-sm"> 
                                    <?php echo app('translator')->getFromJson('button.show'); ?> 
                                    <?php if($class->note): ?>
                                    <i class="fa fa-circle" style="color:red; position: absolute; margin-top: -10px; margin-left: 5px;" ></i>
                                    <?php endif; ?>
                                    </a>
                                   
                                </td> -->
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
                if(confirm("Are you sure to delete selected items?")){
                    $('#delete_all').submit();
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>