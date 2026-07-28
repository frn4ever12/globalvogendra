<?php $__env->startSection('content'); ?>
<div style="display: flex;justify-content: space-between;align-items: center;flex-wrap: wrap;margin-bottom: 1.5rem;">
    <h3>
        About Us
    </h3>
    <div>
        <a href="<?php echo e(route('admin.about-us.edit')); ?>" class="btn btn-success">
            <i class="fa fa-edit"></i>&nbsp;
            <span>Edit</span>
        </a>
    </div>
</div>
<section style="border: 1px solid rgb(230, 230, 230);padding:1.4rem;">
    <?php if($about): ?>
        <div class="row">
            <div class="col-md-6">
                <h4><?php echo e($about->title); ?></h4>
                <p><strong>Status:</strong> <?php echo e($about->status ? 'Active' : 'Inactive'); ?></p>
                <p><strong>Button Text:</strong> <?php echo e($about->button_text); ?></p>
                <p><strong>Text Color:</strong> <?php echo e($about->text_color); ?></p>
                <p><strong>Background Color:</strong> <?php echo e($about->background_color); ?></p>
                <p><strong>Display Order:</strong> <?php echo e($about->display_order); ?></p>
            </div>
            <div class="col-md-6">
                <?php if($about->image): ?>
                    <img src="<?php echo e(asset('storage/' . $about->image)); ?>" class="img-fluid" style="max-width: 300px; border-radius: 8px;" />
                <?php else: ?>
                    <p class="text-muted">No image uploaded</p>
                <?php endif; ?>
            </div>
        </div>
        <hr style="margin: 1.5rem 0;">
        <h5>Description:</h5>
        <div><?php echo $about->description; ?></div>
    <?php else: ?>
        <p class="alert alert-warning">No About Us content found. Please create one.</p>
    <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.includes.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\global consultancy\resources\views/Admin/AboutUs/show.blade.php ENDPATH**/ ?>