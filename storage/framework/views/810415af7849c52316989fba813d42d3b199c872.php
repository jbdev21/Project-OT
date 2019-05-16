<ul class="nav nav-tabs" role="tablist">
	<?php if(Request::segment(1) == "notice"): ?> 
  		<li role="presentation"  class="active"><a href="<?php echo e(url('notice')); ?>" aria-controls="home" role="tab" >공지사항</a></li>
  	<?php elseif(Request::segment(1) == "inquiry"): ?>
    	<li role="presentation" class="active"><a href="<?php echo e(url('inquiry')); ?>" aria-controls="messages" role="tab">1:1문의</a></li>
    <?php else: ?>
    	<li role="presentation"class="active"><a href="<?php echo e(url('faq')); ?>" aria-controls="profile" role="tab">자주 묻는 질문</a></li>
    <?php endif; ?>
</ul>