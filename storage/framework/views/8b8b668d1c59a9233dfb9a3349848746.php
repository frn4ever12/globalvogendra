<?php $__env->startSection('head'); ?>
    <style>
        .image-preview {
            max-width: 200px;
            max-height: 150px;
            object-fit: cover;
            margin-top: 10px;
            border-radius: 4px;
        }
        .color-picker {
            width: 100px;
            height: 40px;
            padding: 2px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div style="display: flex;justify-content: space-between;align-items: center;flex-wrap: wrap;margin-bottom: 1.5rem;">
    <h3>
        Edit About Us
    </h3>
</div>
<form action="<?php echo e(route('admin.about-us.update')); ?>" method="post" enctype="multipart/form-data">
    <?php echo method_field('PUT'); ?>
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <label>Title</label>
            <input class="form-control" placeholder="About Us Title" type="text" name="title" value="<?php echo e($about->title ?? 'About Us'); ?>" />
            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <label>Button Text</label>
            <input class="form-control" placeholder="Learn More" type="text" name="button_text" value="<?php echo e($about->button_text ?? 'Learn More'); ?>" />
            <?php $__errorArgs = ['button_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
            <label>Description</label>
            <textarea class="form-control ckeditor" rows="10" id="description" name="description"><?php echo e($about->description ?? ''); ?></textarea>
            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <label>Image</label>
            <input class="form-control" type="file" name="image" accept="image/*" id="aboutImage" />
            <?php if($about->image): ?>
                <img src="<?php echo e(asset('storage/' . $about->image)); ?>" class="image-preview" id="imagePreview" />
            <?php else: ?>
                <img id="imagePreview" class="image-preview d-none" />
            <?php endif; ?>
            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <label>Text Color</label>
            <input type="color" class="form-control color-picker" name="text_color" value="<?php echo e($about->text_color ?? '#333333'); ?>" />
            <?php $__errorArgs = ['text_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <label>Background Color</label>
            <input type="color" class="form-control color-picker" name="background_color" value="<?php echo e($about->background_color ?? '#ffffff'); ?>" />
            <?php $__errorArgs = ['background_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <label>Display Order</label>
            <input type="number" class="form-control" name="display_order" value="<?php echo e($about->display_order ?? 0); ?>" />
            <?php $__errorArgs = ['display_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="status" id="status" <?php echo e($about->status ?? true ? 'checked' : ''); ?>>
                <label class="form-check-label" for="status">Active</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            <a href="<?php echo e(route('admin.about-us.show')); ?>" class="btn btn-danger">
                <i class="fa fa-long-arrow-left"></i>&nbsp;
                <span>Go Back</span>
            </a>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea#description',
        menubar: false,
        plugins: 'code table lists image',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | table | image',
    });

    // Image preview
    $('#aboutImage').change(function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.includes.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\global consultancy\resources\views/Admin/AboutUs/edit.blade.php ENDPATH**/ ?>