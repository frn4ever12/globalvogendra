<?php if(session('success')): ?>
    <div class="custom-alert" id="success-alert">
        <span> <?php echo e(session('success')); ?></span>   
        &nbsp;&nbsp;
         <span class="close" aria-label="Close">&times;</span>
    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="custom-alert" id="error-alert">
        <span> <?php echo e(session('error')); ?></span>
        <span class="close" aria-label="Close">&times;</span>
    </div>
<?php endif; ?><?php /**PATH D:\global consultancy\resources\views/Frontend/includes/message.blade.php ENDPATH**/ ?>