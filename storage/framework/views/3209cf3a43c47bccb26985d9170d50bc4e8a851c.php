<?php $__env->startSection('content'); ?>
	<div class="page-heading" style="background-image: url('http://www.carolsill.com/wp-content/uploads/2015/03/Books-e1426555865730.jpg');">
		<div class="container">
			<h1><?php echo app('translator')->getFromJson('label.curriculum'); ?></h1>
		</div>	
	</div>

    <div class="container">
        <?php $__currentLoopData = $curriculums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curriculum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section>
            <img src="<?php echo e(asset('' . $curriculum->picture)); ?>" alt="" class="img-responsive">
            
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <?php $__currentLoopData = $curriculum->books()->where('available', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button type="button" onclick="preview(<?php echo e($book->id); ?>)" style="border-radius:0px; margin:3px;" class=" btn btn-xs btn-default">
                            <i class="fa fa-book"></i> <?php echo e($book->title); ?>

                        </button> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
             
            </section>
            <div class="spacer"></div>
            <div class="spacer"></div>
          
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

        <!-- Modal -->
        <div class="modal fade " data-keyboard="false" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="position:relative">
                        <button type="button" class="close" style="position:absolute; right:20px; top:20px;z-index:999" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="bb-custom-wrapper">
                            <h1 id="book_title"></h1>
                            <nav>
                                <a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-first">First page</a>
                                <a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left">Previous</a>
                                <a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right">Next</a>
                                <a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last">Last page</a>
                            </nav>
                            <br>
                            <div id="bb-bookblock" class="bb-bookblock">
                               
                            </div>

                            

                    </div>
                </div>
            </div>
        </div>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/default.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bookblock.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/demo1.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/modernizr.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquerypp.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.bookblock.js')); ?>"></script>
    <script>
     

            function preview(id)
            {
                $.get('<?php echo e(url('api/pagepreviews/')); ?>/' + id, function(response){
                    //console.log(response)
                        $('.bb-bookblock').html("")
                        $('#book_title').html(response.book.title);

                        $.each(response.pages, function(index, value){
                            
                            var page = '<div class="bb-item">'
                                page += '<a><img src="' + value.url + '" alt="Book Page"/></a>'
                                page += '</div>';
                           
                            $('.bb-bookblock').append(page)
                        })

                        Page.init();

                        $('#myModal').modal('show')
                    })
                return false;
            }

            var Page = (function() {
                
                var config = {
                        $bookBlock : $( '#bb-bookblock' ),
                        $navNext : $( '#bb-nav-next' ),
                        $navPrev : $( '#bb-nav-prev' ),
                        $navFirst : $( '#bb-nav-first' ),
                        $navLast : $( '#bb-nav-last' )
                    },
                    init = function() {
                        config.$bookBlock.bookblock( {
                            speed : 800,
                            shadowSides : 0.8,
                            shadowFlip : 0.7
                        } );
                        initEvents();
                    },
                    initEvents = function() {
                        
                        var $slides = config.$bookBlock.children();

                        // add navigation events
                        config.$navNext.on( 'click touchstart', function() {
                            config.$bookBlock.bookblock( 'next' );
                            return false;
                        } );

                        config.$navPrev.on( 'click touchstart', function() {
                            config.$bookBlock.bookblock( 'prev' );
                            return false;
                        } );

                        config.$navFirst.on( 'click touchstart', function() {
                            config.$bookBlock.bookblock( 'first' );
                            return false;
                        } );

                        config.$navLast.on( 'click touchstart', function() {
                            config.$bookBlock.bookblock( 'last' );
                            return false;
                        } );
                        
                        // add swipe events
                        $slides.on( {
                            'swipeleft' : function( event ) {
                                config.$bookBlock.bookblock( 'next' );
                                return false;
                            },
                            'swiperight' : function( event ) {
                                config.$bookBlock.bookblock( 'prev' );
                                return false;
                            }
                        } );

                        // add keyboard events
                        $( document ).keydown( function(e) {
                            var keyCode = e.keyCode || e.which,
                                arrow = {
                                    left : 37,
                                    up : 38,
                                    right : 39,
                                    down : 40
                                };

                            switch (keyCode) {
                                case arrow.left:
                                    config.$bookBlock.bookblock( 'prev' );
                                    break;
                                case arrow.right:
                                    config.$bookBlock.bookblock( 'next' );
                                    break;
                            }
                        } );
                    };

                    return { init : init };

            })();

            
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(theme('layout.app'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>