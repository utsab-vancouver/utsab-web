<?php if(count($errors)): ?>
<div class="form-group">
	<div class="alert alert-danger alert-dismissible" role="alert"> 
		<p> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		<ul>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li><?php echo e($error); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
</div>
<?php endif; ?>