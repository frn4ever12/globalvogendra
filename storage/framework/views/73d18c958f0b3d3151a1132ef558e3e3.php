<nav class="navbar navbar-expand-lg py-3"  style="position: sticky; top: 0; z-index: 1000; background:white;">
    <div class="container container-fluid">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
            <?php if($setting && $setting->logo): ?>
                <img src="<?php echo e(asset('storage/' . $setting->logo)); ?>" style="width:40px;" alt="">
            <?php else: ?>
                <img src="<?php echo e(asset('dist/img/logo.jpg')); ?>" style="width:40px;" alt="">
            <?php endif; ?>
            <small class="orgName"><?php echo e($setting->name ?? 'Organization Name'); ?></small>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if($menus && $menus->count() > 0): ?>
                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($menu->subMenus->count() > 0): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle mx-2" href="#" id="navbarDropdown<?php echo e($menu->id); ?>" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php if($menu->icon): ?>
                                        <i class="<?php echo e($menu->icon); ?> me-1"></i>
                                    <?php endif; ?>
                                    <?php echo e($menu->name); ?>

                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown<?php echo e($menu->id); ?>">
                                    <?php $__currentLoopData = $menu->subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a class="dropdown-item" href="<?php echo e(route('submenu.page', [$menu->slug, $subMenu->slug])); ?>"><?php echo e($subMenu->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="mx-2 nav-link" href="<?php echo e(route('menu.page', $menu->slug)); ?>">
                                    <?php if($menu->icon): ?>
                                        <i class="<?php echo e($menu->icon); ?> me-1"></i>
                                    <?php endif; ?>
                                    <?php echo e($menu->name); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="mx-2 nav-link btn" href="<?php echo e(route('contact')); ?>"
                        style=" background: linear-gradient(135deg, #0056b3, #003a80); color:white;">&nbsp;&nbsp;Contact us&nbsp;&nbsp;</a>
                </li>
                <li class="nav-item">
                    <span class="openMenuBtn">&#9776;</span>
                </li>
            </ul>
        </div>
    </div>
</nav>





<?php /**PATH D:\global consultancy\resources\views/Frontend/includes/navbar.blade.php ENDPATH**/ ?>