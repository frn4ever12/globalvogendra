<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['aboutUs']));

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

foreach (array_filter((['aboutUs']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($aboutUs): ?>
<section class="about-us-section py-5" style="background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%); position: relative; overflow: hidden;">
    <!-- Background Pattern -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%232563eb\' fill-opacity=\'0.03\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); opacity: 0.5; z-index: 0;"></div>
    
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row align-items-center">
            <!-- Image Section -->
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                <div class="about-image-wrapper" data-aos="fade-right" data-aos-duration="1000">
                    <?php if($aboutUs->image): ?>
                        <div class="image-container">
                            <img src="<?php echo e(asset('storage/' . $aboutUs->image)); ?>" 
                                 class="about-main-image img-fluid rounded-4 shadow-lg" 
                                 alt="<?php echo e($aboutUs->title); ?>">
                            <!-- Floating Badge -->
                            <div class="floating-badge">
                                <div class="badge-content">
                                    <i class="fa fa-graduation-cap fa-2x"></i>
                                    <div>
                                        <span class="badge-number">12+</span>
                                        <span class="badge-text">Years Experience</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Content Section -->
            <div class="col-lg-6 col-md-12">
                <div class="about-content-wrapper" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <!-- Section Badge -->
                    <div class="section-badge mb-3">
                        <span style="color: #16a34a; font-weight: 700; letter-spacing: 2px; font-size: 12px; text-transform: uppercase;">
                            ABOUT US
                        </span>
                    </div>
                    
                    <!-- Title -->
                    <?php if($aboutUs->title): ?>
                        <h2 class="about-title fw-bold mb-4" style="color: #2563eb; font-size: 3rem; line-height: 1.2;">
                            <?php echo e($aboutUs->title); ?>

                        </h2>
                    <?php endif; ?>
                    
                    <!-- Description -->
                    <?php if($aboutUs->description): ?>
                        <div class="about-description mb-4" style="font-size: 1.1rem; line-height: 1.8; color: #64748b;">
                            <?php echo $aboutUs->description; ?>

                        </div>
                    <?php endif; ?>
                    
                    <!-- Features List -->
                    <div class="about-features mb-4">
                        <div class="feature-item">
                            <div class="feature-icon" style="background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%); color: #16a34a;">
                                <i class="fa fa-check"></i>
                            </div>
                            <span>Expert Guidance</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon" style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); color: #2563eb;">
                                <i class="fa fa-check"></i>
                            </div>
                            <span>100% Visa Support</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon" style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); color: #d97706;">
                                <i class="fa fa-check"></i>
                            </div>
                            <span>Top Universities</span>
                        </div>
                    </div>
                    
                    <!-- Button -->
                    <?php if($aboutUs->button_text): ?>
                        <a href="<?php echo e(route('about')); ?>" 
                           class="about-btn btn btn-lg rounded-pill px-5 py-3">
                            <?php echo e($aboutUs->button_text); ?>

                            <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.about-us-section {
    position: relative;
}

.image-container {
    position: relative;
    display: inline-block;
}

.about-main-image {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(37, 99, 235, 0.2);
    transition: transform 0.4s ease;
}

.about-main-image:hover {
    transform: scale(1.02);
}

.floating-badge {
    position: absolute;
    bottom: -20px;
    right: -20px;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    animation: float 3s ease-in-out infinite;
    z-index: 2;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.badge-content {
    display: flex;
    align-items: center;
    gap: 15px;
}

.badge-content i {
    color: #16a34a;
}

.badge-number {
    display: block;
    font-size: 1.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.badge-text {
    font-size: 0.8rem;
    color: #64748b;
    font-weight: 600;
}

.about-title {
    position: relative;
}

.about-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 80px;
    height: 4px;
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    border-radius: 2px;
}

.about-description {
    position: relative;
}

.about-features {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 1rem;
    color: #1e293b;
    font-weight: 500;
}

.feature-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    transition: transform 0.3s ease;
}

.feature-item:hover .feature-icon {
    transform: scale(1.1) rotate(5deg);
}

.about-btn {
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    color: white;
    border: none;
    box-shadow: 0 4px 15px rgba(22, 163, 74, 0.3);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.about-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s ease;
}

.about-btn:hover::before {
    left: 100%;
}

.about-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(22, 163, 74, 0.4);
    background: linear-gradient(135deg, #2563eb 0%, #16a34a 100%);
}

/* Responsive */
@media (max-width: 991px) {
    .about-title {
        font-size: 2.2rem;
    }
    
    .floating-badge {
        bottom: -15px;
        right: -15px;
        padding: 15px;
    }
}

@media (max-width: 767px) {
    .about-title {
        font-size: 1.8rem;
    }
    
    .about-description {
        font-size: 1rem;
    }
    
    .floating-badge {
        bottom: -10px;
        right: -10px;
        padding: 12px;
    }
    
    .badge-content {
        gap: 10px;
    }
    
    .badge-content i {
        font-size: 1.5rem;
    }
    
    .badge-number {
        font-size: 1.2rem;
    }
    
    .badge-text {
        font-size: 0.7rem;
    }
}
</style>
<?php endif; ?>
<?php /**PATH D:\global consultancy\resources\views/components/about-us-section.blade.php ENDPATH**/ ?>