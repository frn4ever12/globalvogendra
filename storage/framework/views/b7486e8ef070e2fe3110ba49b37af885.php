<?php if(session('success')): ?>
    <div class="custom-alert" id="alert">
        <span> <?php echo e(session('success')); ?></span>
        <span class="close" aria-label="Close">&times;</span>
    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="custom-error-alert" id="alert">
        <span><?php echo e(session('error')); ?></span>
        <span class="close" aria-label="Close">&times;</span>
    </div>
<?php endif; ?>
<?php /**PATH D:\global consultancy\resources\views/Admin/includes/message.blade.php ENDPATH**/ ?>