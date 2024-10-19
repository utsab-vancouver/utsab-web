<?php $__env->startSection('content'); ?>
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Puja Schedule')); ?></div>

                <div class="card-body">
                	<?php echo $__env->make('admin.includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                	<?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form method="POST" action="<?php echo e(route('save-puja-schedule')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="puja_name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Puja Name')); ?></label>

                            <div class="col-md-6">
                                <select name="puja_name" class="form-control">
                                    <option value="">Select one</option>
                                    <?php if($pujas): ?>
                                    <?php $__currentLoopData = $pujas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puja): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($puja->id); ?>"><?php echo e($puja->puja_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="event_name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Event')); ?></label>

                            <div class="col-md-6">
                                <input id="event_name" type="text" class="form-control<?php echo e($errors->has('event_name') ? ' is-invalid' : ''); ?>" name="event_name" value="<?php echo e(old('event_name')); ?>" required autofocus>

                                <?php if($errors->has('event_name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('event_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Date')); ?></label>

                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control<?php echo e($errors->has('date') ? ' is-invalid' : ''); ?>" name="date" value="<?php echo e(old('date')); ?>" autofocus>

                                <?php if($errors->has('date')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('date')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="timings" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Timings')); ?></label>

                            <div class="col-md-6">
                                <input id="timings" type="text" class="form-control<?php echo e($errors->has('timings') ? ' is-invalid' : ''); ?>" name="timings" value="<?php echo e(old('timings')); ?>" autofocus>

                                <?php if($errors->has('timings')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('timings')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="activities" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Activities')); ?></label>

                            <div class="col-md-6">
                                <input id="activities" type="text" class="form-control<?php echo e($errors->has('activities') ? ' is-invalid' : ''); ?>" name="activities" value="<?php echo e(old('activities')); ?>" autofocus>

                                <?php if($errors->has('activities')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('activities')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prasadam" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Prasadam')); ?></label>

                            <div class="col-md-6">
                                <input id="prasadam" type="text" class="form-control<?php echo e($errors->has('prasadam') ? ' is-invalid' : ''); ?>" name="prasadam" value="<?php echo e(old('prasadam')); ?>" autofocus>

                                <?php if($errors->has('prasadam')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('prasadam')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Save')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12" style="margin-top: 30px;">
            <div class="card">
                <div class="card-header"><?php echo e(__('List')); ?></div>

                <div class="card-body">

                	<table class="table table-bordered utsab-datatable">
                		<thead>
                			<tr>
                                <th>S/N</th>  
                                <th>Puja Name</th>  
                                <th>&nbsp;</th>              				
                			</tr>
                		</thead>
                		<tbody>
                			<?php if(isset($pujaschedules)): ?>
                            <?php
                                $i = 0;
                            ?>
                			<?php $__currentLoopData = $pujaschedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pujaschedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $i++;
                            ?>
                			<tr>
                                <td><?php echo e($i); ?></td>
                                <td><?php echo e($key); ?></td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Event</th>
                                            <th>Date</th>
                                            <th>Timings</th>
                                            <th>Activities</th>
                                            <th>Prasadam</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        <?php $__currentLoopData = $pujaschedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($keys + 1); ?></td>
                                                <td><?php echo e($ps['event_name']); ?></td>
                                                <td><?php echo e($ps['date']); ?></td>
                                                <td><?php echo e($ps['timings']); ?></td>
                                                <td><?php echo e($ps['activities']); ?></td>
                                                <td><?php echo e($ps['prasadam']); ?></td>
                                                <td style="width: 15%" class="text-center">
                                                    <a href="<?php echo e(route('edit-puja-schedule', ['id' => $ps['id']])); ?>" class="btn btn-xs btn-outline-info"><i class="fas fa-edit"></i></a>
                                                <a href="javascript:void(0)" onclick="deletePuja(<?php echo e($ps['id']); ?>)" class="btn btn-xs btn-danger" id="row-<?php echo e($ps['id']); ?>"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </td>
                			</tr>
                			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                			<?php endif; ?>
                		</tbody>
                	</table>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function deletePuja(id) {
        var con = confirm('Do you want to delete this puja?');
        if(con){
            $.ajax({
                url:'<?php echo e(url("delete-puja-schedule")); ?>',
                method:'POST',
                data: {'id': id},
                success: function (response){
                    var data = $.parseJSON(response);

                    if(data.response == 1){

                        alert('Request completed successfully.')
                        if(data.total == '0'){
                            $("#row-"+id).parent().parent().parent().parent().parent().parent().remove();
                        }else{
                            $("#row-"+id).parent().parent().remove();
                        }

                    }else {
                        alert('Request failed!!')
                    }
                }
            });
        }
    }





</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>