<?php if(Session::has('message')): ?>
<BR>
    <div class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>" id="alert-box"><?php echo Session::get('message'); ?></div>
<?php endif; ?>