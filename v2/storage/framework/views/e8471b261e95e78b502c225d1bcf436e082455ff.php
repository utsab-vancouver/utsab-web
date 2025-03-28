<!-- Navbar -->
<div class="bg-navbar navbar-default mega-menu" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a style="margin-bottom: 80px;" class="navbar-brand" href="<?php echo e(url('/')); ?>">
                                    <img class="img-responsive" id="logo-header" src="<?php echo e(url('frontend/assets/img/logo-310x310.png')); ?>" alt="Utsab Logo">
                                </a>
                    <div class="title-of-utsab">Utsab | The Cultural Heritage of Bengal</div>
                </div>
            </div>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="full-width-menu">Menu Bar</span>
                <span class="icon-toggle">
                            <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class=" collapse navbar-collapse navbar-responsive-collapse navbar-color" >
        <div class="container navbar-padding">
            <ul class="nav navbar-nav">
                <!-- Home -->
                <li style="border-left: none;">
                    <a href="<?php echo e(url('/')); ?>">Home</a>
                </li>
                <!-- End Home -->
                <!-- About Membership -->
                <li><a href="<?php echo e(url('membership')); ?>">Membership</a></li>
                <!-- End About Membership -->
                <!-- Our Executive Committee -->
                <li>
                    <a href="<?php echo e(url('executive-commitee')); ?>">Exe. Committee</a>
                </li>
                <!-- End Our Executive Committee -->
                <!-- Puja Schedule -->
                <li>
                    <a href="<?php echo e(url('puja-schedule')); ?>">Puja Schedule</a>
                </li>
                <!-- End Puja Schedule -->
                <!-- Our Events -->
                <!-- <li>
                    <a href="#pages/event.html">Events</a>
                </li> -->
                <!-- End Events -->
                <!-- gallery -->
                 <li>
                    <a href="<?php echo e(url('gallery')); ?>">Gallery</a>
                </li>
                <!-- End gallery -->
                <!-- contact -->
                <li style="border-right: none;">
                    <a href="<?php echo e(url('contact')); ?>">Contact Us</a>
                </li>
                <!-- End contact -->
            </ul>
        </div>
        <!--/end container-->
    </div>
    <!--/navbar-collapse-->
</div>
<!-- End Navbar -->