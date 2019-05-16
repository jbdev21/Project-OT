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
    <?php endif; ?>
    <form action="">
        <div class="row">
            <div class="col-sm-3">
                    <label><?php echo app('translator')->getFromJson('menu.all_class'); ?></label>
                    <?php if(!Auth::user()->academy): ?>
                        <button type="button" class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> <?php echo app('translator')->getFromJson('button.delete'); ?></button>
                    <?php endif; ?>
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
    <form action="<?php echo e(route('admin.classer.destroy', 0)); ?>" id="delete_all" method="post">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('DELETE')); ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th><input type="checkbox" id="checkAll" ></th>
                    <th><?php echo app('translator')->getFromJson("label.username"); ?></th>
                    <th><?php echo app('translator')->getFromJson('label.name'); ?></th>
                    <th><?php echo app('translator')->getFromJson('label.contact_number'); ?></th>
                    <th width="100"><?php echo app('translator')->getFromJson('label.type'); ?></th>
                    <th><?php echo app('translator')->getFromJson('label.time'); ?></th>
                    <th><?php echo app('translator')->getFromJson('label.minutes'); ?></th>
                    <th width="130"><?php echo app('translator')->getFromJson('label.day'); ?></th>
                    <th width="100">시작일</th>
                    <th width="100">종료일</th>
                    <th><?php echo app('translator')->getFromJson('label.sessions'); ?></th>
                    <th  width="100"><?php echo app('translator')->getFromJson('label.payment_method'); ?></th>
                    <th><?php echo app('translator')->getFromJson('label.teacher'); ?></th>
                    <th width="80">상태</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $allclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><input type="checkbox" name="item_checked[]" value="<?php echo e($class->id); ?>" ></td>
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
                            <td width="150px"> 
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
    </form>
    <?php if(is_desktop()): ?>
            </div>
        </div>
    <?php endif; ?>
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
            width: 1320px !important;
            margin: 15px auto;
        }

        #modalIframe{
            height: 80vh;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.bootstrap.min.js')); ?>"></script>
    <!-- <script src="//cdn.datatables.net/plug-ins/1.10.19/i18n/Korean.json"></script> -->

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