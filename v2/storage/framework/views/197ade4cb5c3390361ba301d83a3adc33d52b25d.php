<?php $__env->startSection('content'); ?>
<!-- container content -->
<div class="container content">
    <div class="row margin-bottom-40">
        <div class="col-md-9 md-margin-bottom-40">
            <div class="text-center">
                <h1><?php echo e($puja_header->title); ?></h1>
                <h4><?php echo e($puja_header->address); ?></h4>
            </div>

            <?php if(isset($pujaschedules)): ?>
            <?php $__currentLoopData = $pujaschedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pujaschedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="panel panel-warning margin-bottom-40 text-center">
                <div class="panel-heading ">
                    <h3 class="panel-title"><?php echo e($key); ?></h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th class="text-center">Event</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Timings</th>
                                <th class="text-center">Activities</th>
                                <th class="text-center">Prasadam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Saraswati Puja -->
                            <?php $__currentLoopData = $pujaschedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($ps['event_name']); ?></td>
                                <td class="text-center"><?php echo e($ps['date']); ?></td>
                                <td class="text-center"><?php echo e($ps['timings']); ?></td>
                                <td class="text-center"><?php echo e($ps['activities']); ?></td>
                                <td class="text-center"><?php echo e($ps['prasadam']); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </div>
        <div class="col-md-3">
            <div class="col-md-12 margin-top-40">
                <img class="img-responsive" src="<?php echo e(url('frontend/assets/img/main/durga.png')); ?>">
            </div>
            <div class="col-md-12 margin-top-40">
                <img class="img-responsive" src="<?php echo e(url('frontend/assets/img/main/kali.png')); ?>">
            </div>
            <div class="col-md-12 margin-top-40">
                <img class="img-responsive" src="<?php echo e(url('frontend/assets/img/main/saraswati.png')); ?>">
            </div>
        </div>
    </div>
</div>
<!-- End container content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sites', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>