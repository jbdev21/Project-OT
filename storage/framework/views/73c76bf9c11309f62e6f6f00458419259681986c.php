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
                <label><?php echo app('translator')->getFromJson('label.today_class_session'); ?></label>
            </div>
            <?php echo $html->table(); ?>

            

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.19/i18n/Korean.json"></script>
    <?php echo $html->scripts(); ?>

    <script type="text/javascript">
        $(document).ready(function(){

            $("#checkAll").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $('#delete_all_btn').click(function(){
                if(confirm("Are you sure to delete selected items?")){
                    $('#delete_all').submit();
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>