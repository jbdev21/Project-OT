<?php
/**
 * User: JOFIE BERNAS
 * Date: 1/4/2018
 */
?>


<?php $__env->startSection('content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
               <label><?php echo app('translator')->getFromJson('label.edit_class'); ?></label>
            </div>
            <div class="x_content">
                <a class="btn btn-warning" href="<?php echo e(route('admin.classer.show', $class->id)); ?>"><i class="fa fa-reply-all"></i> <?php echo app('translator')->getFromJson('button.back'); ?></a>
                <br>
                <div class="row">
                    <div class="col col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-body class-details" >

                            <h4>수강내역 </h4>
                               <form action="<?php echo e(route('admin.classer.update', $class->id)); ?>" method="post" data-parsley-validate class="form-horizontal">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field("PUT")); ?>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.class_code'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" readonly value="<?php echo e($class->class_code); ?>" name="name" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">영문이름 <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input readonly type="text" value="<?php echo e($class->user->name); ?>"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.student_korean_name'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input readonly type="text" value="<?php echo e($class->user->korean_name); ?>"class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">분  
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input readonly type="text" value="<?php echo e($class->minutes); ?>"class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">주간수업횟수 
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input readonly type="text" value="<?php echo e($class->days_in_week); ?>"class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.duration'); ?> 
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input readonly type="text" value="<?php echo e($duration); ?>" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.sessions'); ?> 
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input readonly type="text" value="<?php echo e($total_sessions); ?>" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.payment_method'); ?> 
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-control input-md disabled" style="padding:0px 0px 0px 5px">
                                            <?php if($class->payment_method == "bank"): ?>
                                                <img src="<?php echo e(asset('image/icons/bank.png')); ?>" >
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('image/icons/credit-card.png')); ?>">;
                                            <?php endif; ?>
                                            <?php echo e(number_format($class->payment_price)); ?><?php echo app('translator')->getFromJson('label.won'); ?>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.class_type'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" name="type">
                                                <?php $__empty_1 = true; $__currentLoopData = $course_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option 
                                                    <?php if($class->type == $type->name): ?> selected <?php endif; ?> value="<?php echo e($type->id); ?>">
                                                    <?php echo e($type->name); ?>

                                                </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <option> no type</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('label.teacher'); ?> *</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" name="teacher">
                                                <?php $__empty_1 = true; $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option 
                                                    <?php if($class->admin_id == $teacher->id): ?> selected <?php endif; ?> value="<?php echo e($teacher->id); ?>">
                                                    <?php echo e($teacher->name); ?>

                                                </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <option> <?php echo app('translator')->getFromJson('label.no_teacher'); ?></option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.class_status'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" name="status">
                                                <option 
                                                    <?php if($class->status == "pending"): ?> selected <?php endif; ?> value="pending">
                                                    <?php echo app('translator')->getFromJson('label.pending'); ?>
                                                </option>
                                                <option 
                                                    <?php if($class->status == "ongoing"): ?> selected <?php endif; ?> value="ongoing">
                                                    <?php echo app('translator')->getFromJson('label.ongoing'); ?>
                                                </option>
                                                <option 
                                                    <?php if($class->status == "ended"): ?> selected <?php endif; ?> value="ended">
                                                    <?php echo app('translator')->getFromJson('label.ended'); ?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success"><?php echo app('translator')->getFromJson('button.save'); ?></button>
                                            <button type="button" id="enrollmentbtn"  class="btn btn-success">수강신청</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        <div class="panel-body  class-enrollment" style="display:none">

                            <h4><?php echo app('translator')->getFromJson('label.enrollment'); ?> </h4>
                               <form action="<?php echo e(route('admin.classer.reenoll', $class->id)); ?>" method="post" data-parsley-validate class="form-horizontal">
                                    <?php echo e(csrf_field()); ?>

                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">영문이름 <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input readonly type="text" value="<?php echo e($class->user->name); ?>"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.student_korean_name'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input readonly type="text" value="<?php echo e($class->user->korean_name); ?>"class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">분  
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input readonly type="text" value="<?php echo e($class->minutes); ?>"class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">주간수업횟수 
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input readonly type="text" value="<?php echo e($class->days_in_week); ?>"class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.duration'); ?> 
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input readonly type="text" value="<?php echo e($duration); ?>" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.sessions'); ?> 
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input readonly type="text" value="<?php echo e($total_sessions); ?>" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.class_type'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" name="type" readonly>
                                                <?php $__empty_1 = true; $__currentLoopData = $course_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option 
                                                    <?php if($class->type == $type->name): ?> selected <?php endif; ?> value="<?php echo e($type->id); ?>">
                                                    <?php echo e($type->name); ?>

                                                </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <option> no type</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('label.teacher'); ?> *</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" name="teacher" readonly>
                                                <?php $__empty_1 = true; $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option 
                                                    <?php if($class->admin_id == $teacher->id): ?> selected <?php endif; ?> value="<?php echo e($teacher->id); ?>">
                                                    <?php echo e($teacher->name); ?>

                                                </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <option> <?php echo app('translator')->getFromJson('label.no_teacher'); ?></option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.class_status'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" name="status">
                                                <option 
                                                    <?php if($class->status == "pending"): ?> selected <?php endif; ?> value="pending">
                                                    <?php echo app('translator')->getFromJson('label.pending'); ?>
                                                </option>
                                                <option 
                                                    <?php if($class->status == "ongoing"): ?> selected <?php endif; ?> value="ongoing">
                                                    <?php echo app('translator')->getFromJson('label.ongoing'); ?>
                                                </option>
                                                <option 
                                                    <?php if($class->status == "ended"): ?> selected <?php endif; ?> value="ended">
                                                    <?php echo app('translator')->getFromJson('label.ended'); ?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">시작일자
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  type="date" name="start_date" value="<?php echo e(date('Y-m-d')); ?>" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo app('translator')->getFromJson('label.time'); ?> 
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select type='text' name="time" class="form-control " required>
                                                <option value="6:00AM" <?php if($class->time == "06:00:00"): ?> selected <?php endif; ?> >6:00 AM</option>
                                                <option value="6:10AM" <?php if($class->time == "06:10:00"): ?> selected <?php endif; ?> >6:10 AM</option>
                                                <option value="6:20AM" <?php if($class->time == "06:20:00"): ?> selected <?php endif; ?> >6:20 AM</option>
                                                <option value="6:30AM" <?php if($class->time == "06:30:00"): ?> selected <?php endif; ?> >6:30 AM</option>
                                                <option value="6:40AM" <?php if($class->time == "06:40:00"): ?> selected <?php endif; ?> >6:40 AM</option>
                                                <option value="6:50AM" <?php if($class->time == "06:50:00"): ?> selected <?php endif; ?> >6:50 AM</option>
                                                <option value="7:00AM" <?php if($class->time == "07:00:00"): ?> selected <?php endif; ?> >7:00 AM</option>
                                                <option value="7:10AM" <?php if($class->time == "07:10:00"): ?> selected <?php endif; ?> >7:10 AM</option>
                                                <option value="7:20AM" <?php if($class->time == "07:20:00"): ?> selected <?php endif; ?> >7:20 AM</option>
                                                <option value="7:30AM" <?php if($class->time == "07:30:00"): ?> selected <?php endif; ?> >7:30 AM</option>
                                                <option value="7:40AM" <?php if($class->time == "07:40:00"): ?> selected <?php endif; ?> >7:40 AM</option>
                                                <option value="7:50AM" <?php if($class->time == "07:50:00"): ?> selected <?php endif; ?> >7:50 AM</option>
                                                <option value="8:00AM" <?php if($class->time == "08:00:00"): ?> selected <?php endif; ?> >8:00 AM</option>
                                                <option value="8:10AM" <?php if($class->time == "08:10:00"): ?> selected <?php endif; ?> >8:10 AM</option>
                                                <option value="8:20AM" <?php if($class->time == "08:20:00"): ?> selected <?php endif; ?> >8:20 AM</option>
                                                <option value="8:30AM" <?php if($class->time == "08:30:00"): ?> selected <?php endif; ?> >8:30 AM</option>
                                                <option value="8:40AM" <?php if($class->time == "08:40:00"): ?> selected <?php endif; ?> >8:40 AM</option>
                                                <option value="8:50AM" <?php if($class->time == "08:50:00"): ?> selected <?php endif; ?> >8:50 AM</option>
                                                <option value="9:00AM" <?php if($class->time == "09:00:00"): ?> selected <?php endif; ?> >9:00 AM</option>
                                                <option value="9:10AM" <?php if($class->time == "09:10:00"): ?> selected <?php endif; ?> >9:10 AM</option>
                                                <option value="9:20AM" <?php if($class->time == "09:20:00"): ?> selected <?php endif; ?> >9:20 AM</option>
                                                <option value="9:30AM" <?php if($class->time == "09:30:00"): ?> selected <?php endif; ?> >9:30 AM</option>
                                                <option value="9:40AM" <?php if($class->time == "09:40:00"): ?> selected <?php endif; ?> >9:40 AM</option>
                                                <option value="9:50AM" <?php if($class->time == "09:50:00"): ?> selected <?php endif; ?> >9:50 AM</option>
                                                <option value="10:00AM" <?php if($class->time == "10:00:00"): ?> selected <?php endif; ?> >10:00 AM</option>
                                                <option value="10:10AM" <?php if($class->time == "10:10:00"): ?> selected <?php endif; ?> >10:10 AM</option>
                                                <option value="10:20AM" <?php if($class->time == "10:20:00"): ?> selected <?php endif; ?> >10:20 AM</option>
                                                <option value="10:30AM" <?php if($class->time == "10:30:00"): ?> selected <?php endif; ?> >10:30 AM</option>
                                                <option value="10:40AM" <?php if($class->time == "10:40:00"): ?> selected <?php endif; ?> >10:40 AM</option>
                                                <option value="10:50AM" <?php if($class->time == "10:50:00"): ?> selected <?php endif; ?> >10:50 AM</option>
                                                <option value="11:00AM" <?php if($class->time == "11:00:00"): ?> selected <?php endif; ?> >11:00 AM</option>
                                                <option value="11:10AM" <?php if($class->time == "11:10:00"): ?> selected <?php endif; ?> >11:10 AM</option>
                                                <option value="11:20AM" <?php if($class->time == "11:20:00"): ?> selected <?php endif; ?> >11:20 AM</option>
                                                <option value="11:30AM" <?php if($class->time == "11:30:00"): ?> selected <?php endif; ?> >11:30 AM</option>
                                                <option value="11:40AM" <?php if($class->time == "11:40:00"): ?> selected <?php endif; ?> >11:40 AM</option>
                                                <option value="11:50AM" <?php if($class->time == "11:50:00"): ?> selected <?php endif; ?> >11:50 AM</option>
                                                <option value="12:00AM" <?php if($class->time == "12:00:00"): ?> selected <?php endif; ?> >12:00 AM</option>
                                                <option value="12:10PM" <?php if($class->time == "12:10:00"): ?> selected <?php endif; ?> >12:10 PM</option>
                                                <option value="12:20PM" <?php if($class->time == "12:20:00"): ?> selected <?php endif; ?> >12:20 PM</option>
                                                <option value="12:30PM" <?php if($class->time == "12:30:00"): ?> selected <?php endif; ?> >12:30 PM</option>
                                                <option value="12:40PM" <?php if($class->time == "12:40:00"): ?> selected <?php endif; ?> >12:40 PM</option>
                                                <option value="12:50PM" <?php if($class->time == "12:50:00"): ?> selected <?php endif; ?> >12:50 PM</option>
                                                <option value="01:00PM" <?php if($class->time == "13:00:00"): ?> selected <?php endif; ?> >01:00 PM</option>
                                                <option value="01:10PM" <?php if($class->time == "13:10:00"): ?> selected <?php endif; ?> >01:10 PM</option>
                                                <option value="01:20PM" <?php if($class->time == "13:20:00"): ?> selected <?php endif; ?> >01:20 PM</option>
                                                <option value="01:30PM" <?php if($class->time == "13:30:00"): ?> selected <?php endif; ?> >01:30 PM</option>
                                                <option value="01:40PM" <?php if($class->time == "13:40:00"): ?> selected <?php endif; ?> >01:40 PM</option>
                                                <option value="01:50PM" <?php if($class->time == "13:50:00"): ?> selected <?php endif; ?> >01:50 PM</option>
                                                <option value="02:00PM" <?php if($class->time == "14:00:00"): ?> selected <?php endif; ?> >02:00 PM</option>
                                                <option value="02:10PM" <?php if($class->time == "14:10:00"): ?> selected <?php endif; ?> >02:10 PM</option>
                                                <option value="02:20PM" <?php if($class->time == "14:20:00"): ?> selected <?php endif; ?> >02:20 PM</option>
                                                <option value="02:30PM" <?php if($class->time == "14:30:00"): ?> selected <?php endif; ?> >02:30 PM</option>
                                                <option value="02:40PM" <?php if($class->time == "14:40:00"): ?> selected <?php endif; ?> >02:40 PM</option>
                                                <option value="02:50PM" <?php if($class->time == "14:50:00"): ?> selected <?php endif; ?> >02:50 PM</option>
                                                <option value="03:00PM" <?php if($class->time == "15:00:00"): ?> selected <?php endif; ?> >03:00 PM</option>
                                                <option value="03:10PM" <?php if($class->time == "15:10:00"): ?> selected <?php endif; ?> >03:10 PM</option>
                                                <option value="03:20PM" <?php if($class->time == "15:20:00"): ?> selected <?php endif; ?> >03:20 PM</option>
                                                <option value="03:30PM" <?php if($class->time == "15:30:00"): ?> selected <?php endif; ?> >03:30 PM</option>
                                                <option value="03:40PM" <?php if($class->time == "15:40:00"): ?> selected <?php endif; ?> >03:40 PM</option>
                                                <option value="03:50PM" <?php if($class->time == "15:50:00"): ?> selected <?php endif; ?> >03:50 PM</option>
                                                <option value="04:00PM" <?php if($class->time == "16:00:00"): ?> selected <?php endif; ?> >04:00 PM</option>
                                                <option value="04:10PM" <?php if($class->time == "16:10:00"): ?> selected <?php endif; ?> >04:10 PM</option>
                                                <option value="04:20PM" <?php if($class->time == "16:20:00"): ?> selected <?php endif; ?> >04:20 PM</option>
                                                <option value="04:30PM" <?php if($class->time == "16:30:00"): ?> selected <?php endif; ?> >04:30 PM</option>
                                                <option value="04:40PM" <?php if($class->time == "16:40:00"): ?> selected <?php endif; ?> >04:40 PM</option>
                                                <option value="04:50PM" <?php if($class->time == "16:50:00"): ?> selected <?php endif; ?> >04:50 PM</option>
                                                <option value="05:00PM" <?php if($class->time == "17:00:00"): ?> selected <?php endif; ?> >05:00 PM</option>
                                                <option value="05:10PM" <?php if($class->time == "17:10:00"): ?> selected <?php endif; ?> >05:10 PM</option>
                                                <option value="05:20PM" <?php if($class->time == "17:20:00"): ?> selected <?php endif; ?> >05:20 PM</option>
                                                <option value="05:30PM" <?php if($class->time == "17:30:00"): ?> selected <?php endif; ?> >05:30 PM</option>
                                                <option value="05:40PM" <?php if($class->time == "17:40:00"): ?> selected <?php endif; ?> >05:40 PM</option>
                                                <option value="05:40PM" <?php if($class->time == "17:40:00"): ?> selected <?php endif; ?> >05:50 PM</option>
                                                <option value="06:00PM" <?php if($class->time == "18:00:00"): ?> selected <?php endif; ?> >06:00 PM</option>
                                                <option value="06:10PM" <?php if($class->time == "18:10:00"): ?> selected <?php endif; ?> >06:10 PM</option>
                                                <option value="06:20PM" <?php if($class->time == "18:20:00"): ?> selected <?php endif; ?> >06:20 PM</option>
                                                <option value="06:30PM" <?php if($class->time == "18:30:00"): ?> selected <?php endif; ?> >06:30 PM</option>
                                                <option value="06:40PM" <?php if($class->time == "18:40:00"): ?> selected <?php endif; ?> >06:40 PM</option>
                                                <option value="06:50PM" <?php if($class->time == "18:50:00"): ?> selected <?php endif; ?> >06:50 PM</option>
                                                <option value="07:00PM" <?php if($class->time == "19:00:00"): ?> selected <?php endif; ?> >07:00 PM</option>
                                                <option value="07:10PM" <?php if($class->time == "19:10:00"): ?> selected <?php endif; ?> >07:10 PM</option>
                                                <option value="07:20PM" <?php if($class->time == "19:20:00"): ?> selected <?php endif; ?> >07:20 PM</option>
                                                <option value="07:30PM" <?php if($class->time == "19:30:00"): ?> selected <?php endif; ?> >07:30 PM</option>
                                                <option value="07:40PM" <?php if($class->time == "19:40:00"): ?> selected <?php endif; ?> >07:40 PM</option>
                                                <option value="07:50PM" <?php if($class->time == "19:50:00"): ?> selected <?php endif; ?> >07:50 PM</option>
                                                <option value="08:00PM" <?php if($class->time == "20:00:00"): ?> selected <?php endif; ?> >08:00 PM</option>
                                                <option value="08:10PM" <?php if($class->time == "20:10:00"): ?> selected <?php endif; ?> >08:10 PM</option>
                                                <option value="08:20PM" <?php if($class->time == "20:20:00"): ?> selected <?php endif; ?> >08:20 PM</option>
                                                <option value="08:30PM" <?php if($class->time == "20:30:00"): ?> selected <?php endif; ?> >08:30 PM</option>
                                                <option value="08:40PM" <?php if($class->time == "20:40:00"): ?> selected <?php endif; ?> >08:40 PM</option>
                                                <option value="08:50PM" <?php if($class->time == "20:50:00"): ?> selected <?php endif; ?> >08:50 PM</option>
                                                <option value="09:00PM" <?php if($class->time == "21:00:00"): ?> selected <?php endif; ?> >09:00 PM</option>
                                                <option value="09:10PM" <?php if($class->time == "21:10:00"): ?> selected <?php endif; ?> >09:10 PM</option>
                                                <option value="09:20PM" <?php if($class->time == "21:20:00"): ?> selected <?php endif; ?> >09:20 PM</option>
                                                <option value="09:30PM" <?php if($class->time == "21:30:00"): ?> selected <?php endif; ?> >09:30 PM</option>
                                                <option value="09:40PM" <?php if($class->time == "21:40:00"): ?> selected <?php endif; ?> >09:40 PM</option>
                                                <option value="09:50PM" <?php if($class->time == "21:50:00"): ?> selected <?php endif; ?> >09:50 PM</option>
                                                <option value="10:00PM" <?php if($class->time == "22:00:00"): ?> selected <?php endif; ?> >10:00 PM</option>
                                                <option value="10:10PM" <?php if($class->time == "22:10:00"): ?> selected <?php endif; ?> >10:10 PM</option>
                                                <option value="10:20PM" <?php if($class->time == "22:20:00"): ?> selected <?php endif; ?> >10:20 PM</option>
                                                <option value="10:30PM" <?php if($class->time == "22:30:00"): ?> selected <?php endif; ?> >10:30 PM</option>
                                                <option value="10:40PM" <?php if($class->time == "22:40:00"): ?> selected <?php endif; ?> >10:40 PM</option>
                                                <option value="10:50PM" <?php if($class->time == "22:50:00"): ?> selected <?php endif; ?> >10:50 PM</option>
                                                <option value="11:00PM" <?php if($class->time == "23:00:00"): ?> selected <?php endif; ?> >11:00 PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success"><?php echo app('translator')->getFromJson('button.save'); ?></button>
                                            <button type="button" id="enrollmentCancelbtn" class="btn btn-warning"><?php echo app('translator')->getFromJson('button.cancel'); ?></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col col-sm-6 other-form">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <h4 class="header">수강시간 </h4 class="header">
                                <form action="<?php echo e(route('admin.classer.changetime', $class->id)); ?>" method="post"> 
                                    <?php echo e(csrf_field()); ?>  
                                    <label for="first-name"><?php echo app('translator')->getFromJson('label.time'); ?> <span class="required">*</span></label> 
                                    <select type='text' name="time" class="form-control">
                                        <?php $__currentLoopData = time_select(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(date('H:i', strtotime($time))); ?>" <?php if($class->time ==  date('H:i:s', strtotime($time)) ): ?> selected  <?php endif; ?> > <?php echo e(date('h:i A', strtotime($time))); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                    <br>
                                    <label for="first-name"><?php echo app('translator')->getFromJson('label.affected_date'); ?> <span class="required">*</span></label> 
                                    <input class="form-control" type="date" name="efffected_date" value="<?php echo e(date('Y-m-d')); ?>"> 
                                    <br>
                                    <button class="btn btn-success"> <?php echo app('translator')->getFromJson('button.save'); ?></button>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4 class="header">수강기간</h4>
                                 <form action="<?php echo e(route('admin.classer.changestartdate', $class->id)); ?>" method="post"> 
                                        <?php echo e(csrf_field()); ?>  
                                        <label for="first-name"><?php echo app('translator')->getFromJson('label.affected_date'); ?> <span class="required">*</span></label> 
                                        <input class="form-control" type="date" name="start_date" value="<?php echo e($class->start_date); ?>"> 
                                        <br>
                                        <label><input name="only_remaining" type="checkbox"> <?php echo app('translator')->getFromJson('label.apply_only_for_remaining_class'); ?></label>
                                        <br>
                                        <br>
                                        <button class="btn btn-success"> <?php echo app('translator')->getFromJson('button.save'); ?></button>
                                    </form>
                            </div>
                        </div>
                         <div class="panel panel-default">
                            <div class="panel-body">
                                <h4 class="header"><?php echo app('translator')->getFromJson('label.days'); ?></h4>
                                 <form action="<?php echo e(route('admin.classer.changeDays', $class->id)); ?>" method="post"> 
                                        <?php echo e(csrf_field()); ?>  
                                        <label><?php echo app('translator')->getFromJson('label.select_days'); ?></label>
                                        <br>
                                       
                                        <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="checkbox" name="days[]" <?php if(in_array($day->day_number, $class_day->toArray())): ?> checked  <?php endif; ?>  class="single-checkbox day-<?php echo e($day->day_number); ?>" value="<?php echo e($day->id); ?>" id="<?php echo e($day->day_name); ?>" >
                                                <label for="<?php echo e($day->day_name); ?>">
                                                <?php echo app('translator')->getFromJson('label.'. strtolower(str_limit($day->day_name,3, ''))); ?> 
                                                </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <br>
                                        <br>
                                        <label for="first-name"><?php echo app('translator')->getFromJson('label.affected_date'); ?> <span class="required">*</span></label> 
                                        <input class="form-control" type="date" name="affected_date" value="<?php echo e(date('Y-m-d')); ?>"> 
                                        <br>
                                        <button  class="btn btn-success"> <?php echo app('translator')->getFromJson('button.save'); ?></button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript" src="<?php echo e(asset('js/parsley.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            $(".single-checkbox").not(":checked").attr("disabled", true);

            $('#enrollmentbtn').click(function(){
                $('.class-details').hide();
                $('.class-enrollment').show()
                $('.other-form').hide();
            })

            $('#enrollmentCancelbtn').click(function(){
                 $('.class-details').show();
                $('.class-enrollment').hide()
                $('.other-form').show();
            })

            $(".single-checkbox").click(function() {
                var limit = <?php echo e($class->days_in_week); ?>

                var bol = $(".single-checkbox:checked").length >= limit;
                $(".single-checkbox").not(":checked").attr("disabled",bol);
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>