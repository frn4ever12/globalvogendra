<?php $__env->startSection('content'); ?>
    <!-- Hero Slider Section -->
    <?php if(isset($heroBanners) && $heroBanners->count() > 0): ?>
        <?php if (isset($component)) { $__componentOriginale74ef38c4f718abe5610e24f5e2f3fa8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale74ef38c4f718abe5610e24f5e2f3fa8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.hero-slider','data' => ['banners' => $heroBanners]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('hero-slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['banners' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($heroBanners)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale74ef38c4f718abe5610e24f5e2f3fa8)): ?>
<?php $attributes = $__attributesOriginale74ef38c4f718abe5610e24f5e2f3fa8; ?>
<?php unset($__attributesOriginale74ef38c4f718abe5610e24f5e2f3fa8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale74ef38c4f718abe5610e24f5e2f3fa8)): ?>
<?php $component = $__componentOriginale74ef38c4f718abe5610e24f5e2f3fa8; ?>
<?php unset($__componentOriginale74ef38c4f718abe5610e24f5e2f3fa8); ?>
<?php endif; ?>
    <?php else: ?>
        <div class="alert alert-warning">
            No hero banners found. <?php echo e(isset($heroBanners) ? 'Banners count: ' . $heroBanners->count() : 'heroBanners variable not set'); ?>

        </div>
    <?php endif; ?>

    <!-- About Us Section -->
    <?php if(isset($aboutUs)): ?>
        <?php if (isset($component)) { $__componentOriginalfc161fe03571607c9739cc956beb8abb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc161fe03571607c9739cc956beb8abb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.about-us-section','data' => ['aboutUs' => $aboutUs]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('about-us-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['aboutUs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($aboutUs)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc161fe03571607c9739cc956beb8abb)): ?>
<?php $attributes = $__attributesOriginalfc161fe03571607c9739cc956beb8abb; ?>
<?php unset($__attributesOriginalfc161fe03571607c9739cc956beb8abb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc161fe03571607c9739cc956beb8abb)): ?>
<?php $component = $__componentOriginalfc161fe03571607c9739cc956beb8abb; ?>
<?php unset($__componentOriginalfc161fe03571607c9739cc956beb8abb); ?>
<?php endif; ?>
    <?php endif; ?>

    <!-- Services Section -->
    <?php if(isset($services)): ?>
        <?php if (isset($component)) { $__componentOriginal84e6a61baf7e197282792366cc9042f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal84e6a61baf7e197282792366cc9042f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.services-section','data' => ['services' => $services]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('services-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['services' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($services)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal84e6a61baf7e197282792366cc9042f8)): ?>
<?php $attributes = $__attributesOriginal84e6a61baf7e197282792366cc9042f8; ?>
<?php unset($__attributesOriginal84e6a61baf7e197282792366cc9042f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal84e6a61baf7e197282792366cc9042f8)): ?>
<?php $component = $__componentOriginal84e6a61baf7e197282792366cc9042f8; ?>
<?php unset($__componentOriginal84e6a61baf7e197282792366cc9042f8); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php echo $__env->make('Frontend.includes.university-slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="m-0 my-4 row align-items-center">
        <?php echo $__env->make('Frontend.includes.stories-slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <section class="container">
        <div class="py-4 mx-auto my-4 w-50" style="text-align: center;">
            <h2>Learning Center</h2>
        </div>
        <div class="row">
            <div class="mb-4 col-md-4">
                <div class="card">
                    <a href="<?php echo e(route('learning.ielts')); ?>">
                        <img src="<?php echo e(asset('dist/img/image1.jpg')); ?>" class="card-img-top" alt="Article Image">
                        <div class="card-body">
                            <h6 class="card-title">IELTS</h6>
                        </div>
                    </a>
                </div>
            </div>

            <div class="mb-4 col-md-4">
                <div class="card">
                    <a href="<?php echo e(route('learning.pte')); ?>">
                        <img src="<?php echo e(asset('dist/img/image2.jpg')); ?>" class="card-img-top" alt="Article Image">
                        <div class="card-body">
                            <h6 class="card-title">PTE</h6>
                        </div>
                    </a>
                </div>
            </div>

            <div class="mb-4 col-md-4">
                <div class="card">
                    <a href="<?php echo e(route('learning.toefl')); ?>">
                        <img src="<?php echo e(asset('dist/img/image3.jpg')); ?>" class="card-img-top" alt="Article Image">
                        <div class="card-body">
                            <h6 class="card-title">TOEFL</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php echo $__env->make('Frontend.includes.country-slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </section>
    <section class="container py-4 my-4">
        <h2 class="py-2">Our Services</h2>
        <div class="row service-list">
            <div class="col-12 col-md-6">
                <div class="service-item">
                    <p><i class="fas fa-check-circle"></i></p>
                    <p>100% Visa Assistance</p>
                </div>
                <div class="service-item">
                    <p><i class="fas fa-check-circle"></i></p>
                    <p>International Educational Loans</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="service-item">
                    <p><i class="fas fa-check-circle"></i></p>
                    <p>Coaching for IELTS, TOEFL-iBT, PTE-A, OET, SAT</p>
                </div>
                <div class="service-item">
                    <p><i class="fas fa-check-circle"></i></p>
                    <p>Assistance in Documentation for Admission</p>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.includes.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\global consultancy\resources\views/welcome.blade.php ENDPATH**/ ?>