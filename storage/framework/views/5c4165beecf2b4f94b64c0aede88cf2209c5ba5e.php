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
                    <th><?php echo app('translator')->getFromJson('label.type'); ?></th>
                    <th><?php echo app('translator')->getFromJson('label.time'); ?></th>
                    <th><?php echo app('translator')->getFromJson('label.minutes'); ?></th>
                    <th><?php echo app('translator')->getFromJson('label.day'); ?></th>
                    <th width="100">시작일</th>
                    <th width="100">종료일</th>
                    <th><?php echo app('translator')->getFromJson('label.sessions'); ?></th>
                    <th><?php echo app('translator')->getFromJson('label.payment_method'); ?></th>
                    <th><?php echo app('translator')->getFromJson('label.teacher'); ?></th>
                    <th>시작일</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $allclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><input type="checkbox" name="item_checked[]" value="<?php echo e($session->classer->id); ?>" ></td>
                            <td>
                             <?php if($session->classer->user): ?>
                                <?php if($session->classer->status == "ongoing"): ?>  <?php echo checkDuplication($session->classer->user->id, $session->classer->id); ?> <?php endif; ?> <?php echo e($session->classer->user->username); ?>

                             <?php endif; ?>
                            </td>
                            <td>
                             <?php if($session->classer->user): ?>
                                <?php echo e($session->classer->user->name); ?> <br> <?php echo e($session->classer->user->korean_name); ?>

                             <?php endif; ?>
                            </td>
                            <td>
                                <?php if($session->classer->user): ?>
                                    <?php echo $session->classer->user()->first()->getNumber(); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($session->classer->type); ?></td>
                            <td><b style='color:green'> <?php echo e(date('A h:i', strtotime($session->date_time))); ?> </b></td>
                            <td><?php echo e($session->classer->minutes); ?></td>
                            <td>
                                <?php $__currentLoopData = $session->classer->day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo app('translator')->getFromJson('label.'. strtolower(str_limit($day->day_name, 3, ''))); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php  
                                $first_session = $session->classer->getFirstSession();
                                if($first_session){
                                    echo date('Y-m-d', strtotime($first_session->date_time));
                                }
                                 ?>
                            </td>
                            <td>
                                <?php 
                                $last_session = $session->classer->getLastSession();
                                    if($last_session){
                                        echo date('Y-m-d', strtotime($last_session->date_time));
                                    }
                                 ?>
                            </td>
                            <td>
                                <?php     
                                $total = count($session->classer->getRemainingSession()) ? count($session->classer->getRemainingSession()) : "<span style='color:red'>". count($session->classer->getRemainingSession()) ."</span>" ;
                                $total .= '/' . $session->classer->total_sessions;
                                echo $total;
                                 ?>
                            </td>
                            <td>
                                <?php if($session->classer->payment_method == "bank"): ?>
                                    <img class='img-responsive' src="/image/icons/bank.png">
                                <?php else: ?>
                                        <img class='img-responsive' src="/image/icons/credit-card.png">           
                                <?php endif; ?>
                                <?php echo e(number_format($session->classer->payment_price)); ?> <?php echo app('translator')->getFromJson('label.won'); ?>
                            </td>
                            <td>
                                <?php if($session->classer->admin): ?>
                                    <?php echo e($session->classer->admin->name); ?>

                                <?php endif; ?>
                            </td>
                            <td width="70px">
                                <?php if($session->classer->status == "pending"): ?>{
                                    <b style="color:orange"><?php echo app('translator')->getFromJson('label.' . $session->classer->status); ?> </b>
                                <?php elseif($session->classer->status == "ended"): ?>
                                    <b style="color:red"><?php echo app('translator')->getFromJson('label.' . $session->classer->status); ?></b>
                                <?php else: ?>
                                    <b><?php echo app('translator')->getFromJson('label.' . $session->classer->status); ?></b>
                                <?php endif; ?>
                            </td>
                            <td width="150px">
                                <a href="<?php echo e(route('admin.classer.show', $session->classer->id) . '?session='. $session->id); ?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> <?php echo app('translator')->getFromJson('button.more'); ?> </a>
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

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.bootstrap.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>