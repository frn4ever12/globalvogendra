<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['services']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['services']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($services && $services->count() > 0): ?>
    <section class="services-section py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <!-- Section Headings -->
            <div class="text-center mb-5">
                <h6 class="text-success fw-bold text-uppercase mb-2" style="letter-spacing: 2px;">Our Services</h6>
                <h2 class="fw-bold mb-3" style="color: #0056b3; font-size: 2.5rem;">Services We Offer</h2>
                <div class="mx-auto" style="width: 80px; height: 4px; background: linear-gradient(90deg, #28a745, #0056b3); border-radius: 2px;"></div>
            </div>

            <!-- Services Cards -->
            <div class="row g-4">
                <?php $__currentLoopData = $services->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="service-card h-100 bg-white rounded shadow-sm overflow-hidden" 
                             style="transition: all 0.3s ease; border: 1px solid #e9ecef;"
                             data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 100); ?>">
                            
                            <!-- Featured Image -->
                            <?php if($service->featured_image): ?>
                                <div class="service-image-wrapper position-relative" style="height: 200px; overflow: hidden;">
                                    <img src="<?php echo e(asset('storage/' . $service->featured_image)); ?>" 
                                         class="w-100 h-100" 
                                         alt="<?php echo e($service->title); ?>"
                                         style="object-fit: cover; transition: transform 0.3s ease;"
                                         loading="lazy">
                                    <?php if($service->featured): ?>
                                        <span class="position-absolute top-0 end-0 m-3 px-3 py-1 rounded-pill bg-warning text-dark fw-bold" style="font-size: 12px;">
                                            <i class="fa fa-star"></i> Featured
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php else: ?>
                                <div class="service-image-wrapper position-relative bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <?php if($service->icon): ?>
                                        <i class="<?php echo e($service->icon); ?> fa-4x text-muted"></i>
                                    <?php else: ?>
                                        <i class="fa fa-cogs fa-4x text-muted"></i>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <!-- Card Content -->
                            <div class="p-4">
                                <?php if($service->category): ?>
                                    <span class="badge bg-secondary mb-2"><?php echo e($service->category); ?></span>
                                <?php endif; ?>
                                
                                <h5 class="fw-bold mb-3" style="color: #333; font-size: 1.25rem;"><?php echo e($service->title); ?></h5>
                                
                                <?php if($service->short_description): ?>
                                    <p class="text-muted mb-4" style="font-size: 0.95rem; line-height: 1.6;">
                                        <?php echo e(Str::limit(strip_tags($service->short_description), 150)); ?>

                                    </p>
                                <?php endif; ?>

                                <a href="<?php echo e(route('service.detail', $service->slug)); ?>" 
                                   class="btn btn-primary rounded-pill px-4 py-2 w-100"
                                   style="background: linear-gradient(135deg, #0056b3, #003a80); border: none; transition: all 0.3s ease;">
                                    <?php echo e($service->button_text ?? 'Read More'); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- View All Services Button -->
            <?php if($services->count() > 6): ?>
                <div class="text-center mt-5">
                    <a href="<?php echo e(route('services.index')); ?>" class="btn btn-outline-primary btn-lg rounded-pill px-5">
                        View All Services <i class="fa fa-arrow-right ms-2"></i>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <style>
        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 86, 179, 0.15) !important;
        }

        .service-card:hover .service-image-wrapper img {
            transform: scale(1.1);
        }

        .service-card:hover .btn-primary {
            background: linear-gradient(135deg, #003a80, #0056b3) !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 86, 179, 0.3);
        }

        @media (max-width: 768px) {
            .services-section h2 {
                font-size: 2rem !important;
            }
        }

        @media (max-width: 576px) {
            .services-section h2 {
                font-size: 1.75rem !important;
            }
        }
    </style>
<?php endif; ?>
<?php /**PATH D:\global consultancy\resources\views/components/services-section.blade.php ENDPATH**/ ?>