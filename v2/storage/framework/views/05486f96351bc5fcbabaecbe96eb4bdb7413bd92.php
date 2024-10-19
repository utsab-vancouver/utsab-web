<?php $__env->startSection('content'); ?>
    <section>
        <div class="row">
        <!-- Begin Content -->
        <div class="col-md-12">
            <!-- Magazine Slider -->
            <div class="carousel slide carousel-v1 margin-bottom-40" id="myCarousel-1">
                <div class="carousel-inner">
                    <?php if(isset($sliders)): ?>
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item <?php echo e(($key == 0)?'active':''); ?>">
                        <img alt="" src="<?php echo e(url('uploads/slider/'.$slider->slider_image)); ?>">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    
                </div>
                <div class="carousel-arrow">
                    <a data-slide="prev" onclick="return false;" href="#myCarousel-1" class="left carousel-control">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a data-slide="next" onclick="return false;" href="#myCarousel-1" class="right carousel-control">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
            <!-- End s Slider -->
        </div>
        <!-- End Content -->
    </div>
    </section>
    <!--/container-->
    <div class="container">
        <div class="row margin-bottom-30">
            <!-- Welcome Block -->
            <div class="col-md-12 md-margin-bottom-40">
                <div class="headline">
                    <h2>About Utsab </h2></div>
                <p class="text-justify">Utsab is a non-profit community organization in British Columbia. It aims to practice, discuss and promote Bengali festivities. The majority of Utsab community are families of South Asian origin and have started a new life in Lower Mainland. New life brings in new people – next generation of Canadians having Bengali cultural background. Ustab hence promotes learning and practicing Bengali culture among the youngsters. It adopts modern, scientific and logical approach to the challenges and opportunities of existing Bengali community and help newcomers to integrate with the mainstream society and benefit the members through networking. The organization has its own approved constitution and operational procedure. It refrains from any political affiliation and adheres the purpose of the society on a strict non-political basis.</p>
            </div>
            <!--/col-md-12-->
        </div>
    </div>
    <!-- Owl Clients v1 -->
    <!-- photo -->
    <div class="container-fluid ng-scope">
        <div class="row no-gutter aos-init aos-animate" data-aos="fade-up">
            <div class="col-sm-3 col-xs-6 col-md-3">
                <a href="<?php echo e(url('frontend/assets/img/main/shots-img1.jpg')); ?>" rel="gallery4" class="fancybox " title=" Event Name">
                    <span><img class="img-responsive" src="<?php echo e(url('frontend/assets/img/main/shots-img1.jpg')); ?>" alt=""></span>
                </a>
            </div>
            <div class="col-sm-3 col-xs-6 col-md-3">
                <a href="<?php echo e(url('frontend/assets/img/main/shots-img2.jpg')); ?>" rel="gallery4" class="fancybox" title="Event Name">
                    <span><img class="img-responsive" src="<?php echo e(url('frontend/assets/img/main/shots-img2.jpg')); ?>" alt=""></span>
                </a>
            </div>
            <div class="col-sm-3 col-xs-6 col-md-3">
                <a href="<?php echo e(url('frontend/assets/img/main/shots-img3.jpg')); ?>" rel="gallery4" class="fancybox " title="Event Name">
                    <span><img class="img-responsive" src="<?php echo e(url('frontend/assets/img/main/shots-img3.jpg')); ?>" alt=""></span>
                </a>
            </div>
            <div class="col-sm-3 col-xs-6 col-md-3">
                <a href="<?php echo e(url('frontend/assets/img/main/shots-img4.jpg')); ?>" rel="gallery4" class="fancybox " title="Event Name">
                    <span><img class="img-responsive" src="<?php echo e(url('frontend/assets/img/main/shots-img4.jpg')); ?>" alt=""></span>
                </a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function() {

        OwlCarousel.initOwlCarousel();
    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sites', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>