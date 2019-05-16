<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/13/2017
 * Time: 11:32 AM
 */
?>


<?php $__env->startSection('content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
               <?php echo app('translator')->getFromJson('label.curriculum'); ?>
            </div>
            <div class="row">
               <div class="col-sm-12">
                    <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> <?php echo app('translator')->getFromJson('button.delete'); ?></button>
                       <a href="<?php echo e(route('admin.curriculum.create')); ?>" class="btn btn-default btn-sm pull-right" ><i class="fa fa-plus"></i><?php echo app('translator')->getFromJson('button.new'); ?></a>
                </div>
            </div>
            <br> 
            <div class="x_content">
                <form action="<?php echo e(route('admin.curriculum.destroy', 0)); ?>" id="delete_all" method="post">
                     <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <?php echo $html->table(); ?>

                </form>
          
            </div>
        </div>
    </div>

    <!-- Modal -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.bootstrap.min.js')); ?>"></script>
    <?php echo $html->scripts(); ?>

    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('click','#checkAll', function(){
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