<header class=" text-white" style="background: linear-gradient(135deg, #0056b3, #003a80);">
    <div class="container py-2 container-fluid top-navbar" >
        <div class="row align-items-center" >
            <div class="col-md-6 col-sm-4 text-start">
                <div class="contact">
                    <i class="fas fa-map-marker-alt"></i> <span class="me-4"><?php echo e($setting->address??'123 Main St, City, Country'); ?></span>
                    <i class="fas fa-phone"></i> <span class="me-4"><?php echo e($setting->phone??'+977 1234569874'); ?></span>
                    <i class="fas fa-envelope"></i> <span><?php echo e($setting->email??'contact@example.com'); ?></span>
                </div>
            </div>
            <div class="col-md-6 col-sm-8 text-end text-white" style="display: flex; align-items: center; justify-content: flex-end; gap: 1rem;">
                <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-sm text-white" style="background-color: rgb(44, 193, 111); ">Dashboard</a>
                <button type="button" id="logOutBtn" class="btn btn-danger btn-sm"><i class="fa fa-sign-out"></i> LogOut</button>
                <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-sm text-white" style="background-color: rgb(44, 193, 111); " ><i class="fa fa-user"></i>&nbsp; Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
<?php /**PATH D:\global consultancy\resources\views/Frontend/includes/top-header.blade.php ENDPATH**/ ?>