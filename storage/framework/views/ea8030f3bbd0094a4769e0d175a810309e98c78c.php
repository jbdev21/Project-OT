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
                Class
            </div>

            <div class="x_content">
                 <label>Today's Class Sessions</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Student</th>
                                <th>Contact Numbers</th>
                                <th>Type</th>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Minutes</th>
                                <th>Session</th>
                                <th>Duration</th>
                                <th>Status</th>
                                <th>Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $today_sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $today_session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($today_session->classer->user->username); ?>

                                    </td>
                                    <td>
                                        <?php echo e($today_session->classer->user->name); ?> <br> 
                                        <small><?php echo e($today_session->classer->user->korean_name); ?></small>
                                    </td>
                                    <td>
                                        <?php echo e($today_session->classer->user->contact_number); ?> <br>
                                        <?php echo e($today_session->classer->user->contact_number1); ?>

                                    </td>
                                    <td>
                                        <?php echo e(ucfirst($today_session->classer->type)); ?>

                                    </td>
                                    <td>
                                        <?php 
                                            $days = "";
                                            foreach($today_session->classer->day as $day):
                                                $days .= str_limit($day->day_name, 2, '.');
                                            endforeach;

                                            echo $days;
                                         ?>
                                    </td>
                                    <td>
                                            <?php echo e(date('h:iA',strtotime($today_session->date_time))); ?>

                                    </td>
                                    <td>
                                        <?php echo e($today_session->classer->minutes); ?> <small>min.</small>
                                    </td>
                                    <td>
                                        <?php echo e($today_session->classer->total_sessions); ?>

                                    </td>
                                    <td>
                                        <?php  
                                            $first_session = $today_session->classer->getFirstSession();
                                            $last_session = $today_session->classer->getLastSession();
                                            if($first_session)
                                            {
                                                echo date_formater('date_format', $first_session->date_time). ' / ' . date_formater('date_format', $last_session->date_time);
                                            }	

                                         ?>
                                    </td>
                                    <td>
                                        <?php if($today_session->status ==  'absent'): ?>
                                            <span style="color:red">
                                        <?php elseif($today_session->status == 'postponed'): ?>
                                            <span style="color:brown">
                                        <?php elseif($today_session->status ==  'present'): ?>
                                            <span style="color:green">
                                        <?php endif; ?>
                                            <?php echo e(strtoupper($today_session->status)); ?>

                                        </span>
                                    </td>
                                    <td>
                                            <?php echo e(strlen($today_session->comment)); ?>

                                    </td>
                                    <td align="right">
                                        <a href="<?php echo e(route('teacher.session.show', $today_session->id)); ?>" class="btn btn-xs btn-primary">Details</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
			</div>
        </div>
    </div>
   
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.teacher', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>