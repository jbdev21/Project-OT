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
                    <form action="">
                        <div class="row">
                                <div class="col-sm-3">
                                    
                                </div> 
                                <div class="col-sm-9 ">
                                    <div class="input-group pull-right" style="width:300px">
                                        <input type="search"   name='q' placeholder=" search" value="<?php echo e(request("q")); ?>" class="form-control">
                                        <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true">
                                        </span> Search!</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th><?php echo app('translator')->getFromJson("label.username"); ?></th>
                                    <th><?php echo app('translator')->getFromJson('label.name'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('label.contact_number'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('label.type'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('label.time'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('label.minutes'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('label.day'); ?></th>
                                    <th width="100">시작일</th>
                                    <th>종료일</th>
                                    <th><?php echo app('translator')->getFromJson('label.sessions'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('label.payment_method'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('label.teacher'); ?></th>
                                    <th>시작일</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $allclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                        <td>
                                            <?php if($class->user): ?>
                                            <?php if($class->status == "ongoing"): ?>  <?php echo checkDuplication($class->user->id, $class->id); ?> <?php endif; ?> <?php echo e($class->user->username); ?>

                                            <?php endif; ?>
                                            </td>
                                            <td>
                                            <?php if($class->user): ?>
                                                <?php echo e($class->user->name); ?> <br> <?php echo e($class->user->korean_name); ?>

                                            <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($class->user): ?>
                                                    <?php echo $class->user()->first()->getNumber(); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($class->type); ?></td>
                                            <td><b style='color:green'> <?php echo e(date('A h:i', strtotime($class->time))); ?> </b></td>
                                            <td><?php echo e($class->minutes); ?></td>
                                            <td>
                                                <?php $__currentLoopData = $class->day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo app('translator')->getFromJson('label.'. strtolower(str_limit($day->day_name, 3, ''))); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td>
                                                <?php  
                                                $first_session = $class->getFirstSession();
                                                if($first_session){
                                                    echo date('Y-m-d', strtotime($first_session->date_time));
                                                }
                                                 ?>
                                            </td>
                                            <td>
                                                <?php 
                                                $last_session = $class->getLastSession();
                                                    if($last_session){
                                                        echo date('Y-m-d', strtotime($last_session->date_time));
                                                    }
                                                 ?>
                                            </td>
                                            <td>
                                                <?php     
                                                $total = count($class->getRemainingSession()) ? count($class->getRemainingSession()) : "<span style='color:red'>". count($class->getRemainingSession()) ."</span>" ;
                                                $total .= '/' . $class->total_sessions;
                                                echo $total;
                                                 ?>
                                            </td>
                                            <td>
                                                <?php if($class->payment_method == "bank"): ?>
                                                    <img class='img-responsive' src="/image/icons/bank.png">
                                                <?php else: ?>
                                                        <img class='img-responsive' src="/image/icons/credit-card.png">           
                                                <?php endif; ?>
                                                <?php echo e(number_format($class->payment_price)); ?> <?php echo app('translator')->getFromJson('label.won'); ?>
                                            </td>
                                            <td>
                                                <?php if($class->admin): ?>
                                                    <?php echo e($class->admin->name); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php  echo today_attendance($class->id)  ?>
                                            </td>
                                            <td>
                                               <?php if($class->user): ?>
                                                    <?php 
                                                    $near_session = $class->classSession()->whereDate('date_time', '>=', date('Y-m-d'))->first();
                                                    if($near_session){
                                                        $button = "";
                                                        if(!Auth::user()->academy){
                                                            $button .= '<a href="' . route('admin.classer.show', $class->id) . '?session='. $near_session->id .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> '. Lang::get('button.more') .'</a>';
                                                        }
                                                        $button  .= '<button data-url="' . route('admin.classer.show', $class->id) . '?session='. $near_session->id .'&modal=1" class="btn btn-xs btn-primary iframe-modal"><i class="glyphicon glyphicon-eye-open"></i> 팝업</button>';
                                                        echo $button;
                                                    }else{
                                                        $button = "";
                                                        if(!Auth::user()->academy){
                                                            $button .= '<a href="' . route('admin.classer.show', $class->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> '. Lang::get('button.more') .'</a>';
                                                        }
                                                        $button  .= '<button  data-url="' . route('admin.classer.show', $class->id) . '?modal=1" class="btn btn-xs btn-primary iframe-modal"><i class="glyphicon glyphicon-eye-open"></i> 팝업</button>';
                                                        echo $button;
                                                    }
                                                     ?>
                                                <?php else: ?>
                                                    <small style="color:red">수업정보가 없습니다</small>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo e($allclasses->appends(['q' => request('q'), 'page' => request('cat')])->links()); ?>

                            
                        </div>
                    </div>
                </div>
            </div>
     </div>

     <div class="modal fade" tabindex="-1" role="dialog" id="iframeModal">
        <div class="modal-dialog modal-super-large"  role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">수강관리  <button class="btn btn-default" id="refreshIframe"><i class="fa fa-refresh"></i></button></h4>
                </div>
                <div class="modal-body">
                    <iframe src="" id="modalIframe" frameborder="0" width="100%" height="1000"></iframe>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
     <style>
        .modal-super-large {
            width: 1280px !important;
            margin: 30px auto;
        }

        #modalIframe{
            height: 80vh;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#loader').hide()
            $('#dashboard-body').show();

            $('#refreshIframe').click(function(){
                var url = document.getElementById('modalIframe').contentDocument.location
                $('#modalIframe').attr('src', url)
            })

            $(document).on('click', '.iframe-modal', function(){
                var url = $(this).data('url')
                $('#modalIframe').attr('src', url)
                $('#iframeModal').modal('show')
                return false
            })
        });

        
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>