<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/24/2017
 * Time: 6:29 PM
 */
?>


<?php $__env->startSection('content'); ?>
    <?php if(is_desktop()): ?>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <label><?php echo app('translator')->getFromJson('menu.all_class'); ?></label>
                        <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> <?php echo app('translator')->getFromJson('button.delete'); ?></button>
                    </div> 
                <form action="<?php echo e(route('admin.classer.destroy', 0)); ?>" id="delete_all" method="post">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <div class="table-responsive">
                        <?php echo $html->table(); ?>

                    </div>
                </form>
                
            </div>
        </div>
    <?php else: ?>
    <label><?php echo app('translator')->getFromJson('menu.all_class'); ?></label>
    <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> <?php echo app('translator')->getFromJson('button.delete'); ?></button>
     <form action="<?php echo e(route('admin.classer.destroy', 0)); ?>" id="delete_all" method="post">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('DELETE')); ?>

        <div class="table-responsive">
            <?php echo $html->table(); ?>

        </div>
    </form>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.bootstrap.min.js')); ?>"></script>
    <!-- <script src="//cdn.datatables.net/plug-ins/1.10.19/i18n/Korean.json"></script> -->
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