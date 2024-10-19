<?php $__env->startSection('content'); ?>
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Gallery')); ?></div>

                <div class="card-body">
                	<?php echo $__env->make('admin.includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                	<?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form method="POST" action="<?php echo e(url('save-gallery')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Gallery Name')); ?></label>

                            <div class="col-md-6">
                                <input id="gallery_name" type="text" class="form-control<?php echo e($errors->has('gallery_name') ? ' is-invalid' : ''); ?>" name="gallery_name" value="<?php echo e(old('gallery_name')); ?>" required autofocus>

                                <?php if($errors->has('gallery_name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('gallery_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Gallery Title Image')); ?></label>

                            <div class="col-md-6">
                                <input id="gallery_image" type="file" class="form-control<?php echo e($errors->has('gallery_image') ? ' is-invalid' : ''); ?>" name="gallery_image" value="<?php echo e(old('gallery_image')); ?>" required autofocus>

                                <?php if($errors->has('gallery_image')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('gallery_image')); ?></strong>
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
                <div class="card-header"><?php echo e(__('Gallery List')); ?></div>

                <div class="card-body">

                	<table class="table table-bordered utsab-datatable">
                		<thead>
                			<tr>
                				<th>Gallery Name</th>
                				<th>Gallery Image</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php if(isset($galleries)): ?>
                			<?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                			<tr>
                				<td><?php echo e($gallery->gallery_name); ?></td>
                				<td>
                					<img height="100" width="100" src="<?php echo e(asset('uploads/gallery').'/'.$gallery->gallery_name.'/'.$gallery->gallery_image); ?>">
                				</td>
                				<td>
                                    <a href="<?php echo e(url('edit-gallery').'/'.$gallery->id); ?>" class="btn btn-outline-info"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:void(0)" onclick="deleteGallery('<?php echo e($gallery->id); ?>')" class="btn btn-danger" id="row-<?php echo e($gallery->id); ?>"><i class="fas fa-trash"></i></a>
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
    function deleteGallery(id) {
        var con = confirm('Do you want to delete this gallery? If you delete this group then it\'s all images will be deleted.');
        if(con){
            $.ajax({
                url:'<?php echo e(url("delete-gallery")); ?>',
                method:'POST',
                data: {'id': id},
                success: function (response){
                    if(response == 1){
                        alert('Request completed successfully.')
                        $("#row-"+id).parent().parent().remove();
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