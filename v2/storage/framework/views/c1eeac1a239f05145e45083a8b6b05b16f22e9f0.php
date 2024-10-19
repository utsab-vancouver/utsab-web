<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
    <div class="container">
        <h1 class="pull-left">Contacts Us</h1>
    </div>
    <!--/container-->
</div>
<!-- container content -->
<div class="container content">
    <div class="row margin-bottom-30">
        <div class="col-md-9 mb-margin-bottom-30">
            <?php echo $__env->make('admin.includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <form action="<?php echo e(url('contact')); ?>" method="post" id="sky-form3" class="sky-form contact-style" novalidate="novalidate">
                <?php echo e(csrf_field()); ?>

                <fieldset class="no-padding">
                    <label>Name <span class="color-red">*</span></label>
                    <div class="row sky-space-20">
                        <div class="col-md-7 col-md-offset-0">
                            <div>
                                <input name="name" id="name" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <label>Email <span class="color-red">*</span></label>
                    <div class="row sky-space-20">
                        <div class="col-md-7 col-md-offset-0">
                            <div>
                                <input name="email" id="email" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <label>Message <span class="color-red">*</span></label>
                    <div class="row sky-space-20">
                        <div class="col-md-11 col-md-offset-0">
                            <div>
                                <textarea rows="8" name="message" id="message" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <p>
                        <button type="submit" class="btn-u">Send Message</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/col-md-9-->
        <div class="col-md-3">
            <!-- Contacts -->
            <div class="headline">
                <h2>Contacts</h2></div>
            <ul class="list-unstyled who margin-bottom-30">
                <!-- <li><i class="fa fa-home"></i>1/1, Block-C, Imandipur, Savar.</li>
                <li><i class="fa fa-phone"></i>+88 02 7712877</li>
                <li><i class="fa fa-mobile-phone"></i>+88 01670964209</li> -->
                <li><i class="fa fa-envelope"></i><a href="mailto:info@utsab.ca">info@utsab.ca</a></li><li>
                    <i class="fa fa-facebook"></i><a href="https://www.facebook.com/profile.php?id=100004346055814" target="_blank">facebook Link</a></li>
                <li><a href="#"><i class="fa fa-globe"></i>http://www.utsab.ca</a></li>
            </ul>
        </div>
        <!--/col-md-3-->
    </div>
    <!--/row-->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sites', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>