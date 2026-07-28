<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['banners']));

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

foreach (array_filter((['banners']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $heightClasses = [
        'small' => '300px',
        'medium' => '400px',
        'large' => '500px',
        'full_screen' => '100vh'
    ];
?>

<?php if($banners && $banners->count() > 0): ?>
    <div class="hero-slider-section">
        <div class="swiper heroSwiper">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($banner->desktop_image): ?>
                        <div class="swiper-slide">
                            <div class="hero-slide position-relative" 
                                 style="height: <?php echo e($heightClasses[$banner->banner_height] ?? '400px'); ?>; background-image: url('<?php echo e(asset('storage/' . $banner->desktop_image)); ?>'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                                
                                <!-- Dark Overlay -->
                                <?php if($banner->enable_dark_overlay): ?>
                                    <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"
                                         style="background: <?php echo e($banner->overlay_color ?? '#000000'); ?>; opacity: <?php echo e(($banner->overlay_opacity ?? 50) / 100); ?>;"></div>
                                <?php endif; ?>
                                
                                <!-- Gradient Overlay -->
                                <?php if($banner->enable_gradient): ?>
                                    <div class="hero-gradient position-absolute top-0 start-0 w-100 h-100"
                                         style="background: linear-gradient(135deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.1) 50%, rgba(0,0,0,0.3) 100%);"></div>
                                <?php endif; ?>
                                
                                <!-- Content -->
                                <div class="hero-content position-absolute top-50 start-0 translate-middle-y w-100 h-100 d-flex align-items-center"
                                     style="z-index: 10; color: <?php echo e($banner->text_color ?? '#ffffff'); ?>; padding: 1rem;">
                                    <div class="container">
                                        <div class="row justify-content-start">
                                            <div class="col-lg-8 col-md-10 animate__animated animate__fadeInUp" data-aos="fade-up">
                                                <?php if($banner->title): ?>
                                                    <h1 class="fw-bold mb-2" style="font-size: 2rem;"><?php echo e($banner->title); ?></h1>
                                                <?php endif; ?>
                                                
                                                <?php if($banner->subtitle): ?>
                                                    <h2 class="mb-2" style="font-size: 1.25rem;"><?php echo e($banner->subtitle); ?></h2>
                                                <?php endif; ?>
                                                
                                                <?php if($banner->description): ?>
                                                    <p class="mb-3" style="font-size: 1rem;"><?php echo e($banner->description); ?></p>
                                                <?php endif; ?>
                                                
                                                <?php if($banner->button_text && $banner->button_url): ?>
                                                    <a href="<?php echo e($banner->button_url); ?>" 
                                                       class="btn rounded-pill px-4 py-2 animate__animated animate__pulse animate__infinite"
                                                       style="background-color: <?php echo e($banner->button_color ?? '#007bff'); ?>; color: <?php echo e($banner->button_text_color ?? '#ffffff'); ?>; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.2); font-size: 0.9rem;">
                                                        <?php echo e($banner->button_text); ?>

                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <style>
        .hero-slider-section {
            position: relative;
            overflow: hidden;
        }
        
        .heroSwiper {
            width: 100%;
            height: 100%;
        }
        
        .hero-slide {
            position: relative;
            overflow: hidden;
        }
        
        .hero-overlay,
        .hero-gradient {
            pointer-events: none;
        }
        
        .hero-content {
            pointer-events: none;
        }
        
        .hero-content * {
            pointer-events: auto;
        }
        
        .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background: white;
            opacity: 0.5;
        }
        
        .swiper-pagination-bullet-active {
            opacity: 1;
            background: white;
        }
        
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 1.5rem !important;
            }
            
            .hero-content h2 {
                font-size: 1rem !important;
            }
            
            .hero-content p {
                font-size: 0.875rem !important;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var heroSwiper = new Swiper('.heroSwiper', {
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                speed: 1000,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                lazy: {
                    loadPrevNext: true,
                },
                touchRatio: 0.5,
                simulateTouch: true,
            });
        });
    </script>
<?php endif; ?>
<?php /**PATH D:\global consultancy\resources\views/components/hero-slider.blade.php ENDPATH**/ ?>