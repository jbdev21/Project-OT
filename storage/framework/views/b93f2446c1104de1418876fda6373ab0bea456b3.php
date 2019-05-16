<?php $__env->startSection('content'); ?>
 <div id="loader" class="text-center" style="margin-top: 50px;">
    <img src="<?php echo e(asset('public/loaders/admin-loader.gif')); ?>">
  </div> 
	<div class="row" id="dashboard-body" style="display: none;">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="row top_tiles">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                          <div class="count"><?php echo e(count($ongoing_class)); ?></div>
                          <h3><a href="<?php echo e(route('admin.classer.today')); ?>"><?php echo app('translator')->getFromJson('label.on_going_class'); ?></a></h3>
                         
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-comments-o"></i></div>
                          <div class="count">{{ newLeveltest }}</div>
                          <h3><a href="<?php echo e(route('admin.leveltest.new')); ?>"><?php echo app('translator')->getFromJson('label.level_tests'); ?></a></h3>
                          
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                          <div class="count"><?php echo e(count($postponed)); ?></div>
                          <h3>
                          <a href="<?php echo e(route('admin.classer.postponed')); ?>">
                          <?php echo app('translator')->getFromJson('label.postponed_class'); ?>
                          </a>
                          </h3>
                          
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-check-square-o"></i></div>
                          <div class="count">{{ newClass }}</div>
                          <h3><a href="<?php echo e(route('admin.classer.new')); ?>"><?php echo app('translator')->getFromJson('label.new_enrolled'); ?></a></h3>
                         
                        </div>
                      </div>
                  </div>
                  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo app('translator')->getFromJson('label.scheduled_classes'); ?> <small><?php echo app('translator')->getFromJson('label.lists_of_sessions'); ?></small></h2>
                    <div class="clearfix"></div>
                  </div>
                    <div class="table-responsive">
                      <?php echo $html->table(); ?>

                    </div>
                  </div>
              </div>
            </div>
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
            $('#loader').hide()
            $('#dashboard-body').show();

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