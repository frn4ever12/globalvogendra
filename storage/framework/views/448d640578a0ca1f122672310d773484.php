<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['levels' => null]));

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

foreach (array_filter((['levels' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($levels && $levels->count() > 0): ?>
<section class="german-levels-section py-5" style="background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%); position: relative; overflow: hidden;">
    <!-- Background Pattern -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%2316a34a\' fill-opacity=\'0.03\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); opacity: 0.5; z-index: 0;"></div>
    
    <div class="container" style="position: relative; z-index: 1;">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <span class="section-subtitle text-uppercase fw-bold" style="color: #16a34a; letter-spacing: 2px; font-size: 14px;">
                GERMAN LANGUAGE
            </span>
            <h2 class="section-title fw-bold mb-3" style="color: #2563eb; font-size: 3rem;">
                German Language Levels
            </h2>
            <p class="section-subtitle-text text-muted" style="font-size: 1.2rem; max-width: 600px; margin: 0 auto;">
                Master German from A1 to C2 with internationally recognized courses and experienced instructors.
            </p>
        </div>

        <!-- Level Cards -->
        <div class="row g-4">
            <?php $__currentLoopData = $levels->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-2 col-md-4 col-6">
                <div class="level-card" 
                     data-aos="<?php echo e($level->animation ?? 'fade-up'); ?>" 
                     data-aos-delay="<?php echo e($index * 100); ?>"
                     style="background-color: <?php echo e($level->background_color ?? '#ffffff'); ?>;">
                    
                    <!-- Ribbon -->
                    <?php if($level->ribbon): ?>
                    <div class="level-ribbon">
                        <span><?php echo e($level->ribbon); ?></span>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Level Badge -->
                    <div class="level-badge">
                        <span><?php echo e($level->level_code); ?></span>
                    </div>
                    
                    <!-- Icon/Image -->
                    <div class="level-icon-wrapper" style="color: <?php echo e($level->icon_color ?? '#2563eb'); ?>;">
                        <?php if($level->image): ?>
                            <img src="<?php echo e(asset('storage/' . $level->image)); ?>" 
                                 alt="<?php echo e($level->title); ?>" 
                                 class="level-image">
                        <?php elseif($level->icon): ?>
                            <i class="fa fa-<?php echo e($level->icon); ?> level-icon"></i>
                        <?php else: ?>
                            <i class="fa fa-language level-icon"></i>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Content -->
                    <div class="level-content">
                        <h3 class="level-title"><?php echo e($level->title); ?></h3>
                        <p class="level-description"><?php echo e(Str::limit($level->short_description, 60)); ?></p>
                        
                        <!-- Course Details -->
                        <div class="level-details">
                            <?php if($level->duration): ?>
                            <div class="detail-item">
                                <i class="fa fa-clock"></i>
                                <span><?php echo e($level->duration); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if($level->class_type): ?>
                            <div class="detail-item">
                                <i class="fa fa-laptop"></i>
                                <span><?php echo e($level->class_type); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Students Counter -->
                        <?php if($level->students_count > 0): ?>
                        <div class="students-counter">
                            <span class="counter-number"><?php echo e($level->students_count); ?></span>
                            <span class="counter-label">Students</span>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Certificate Badge -->
                        <?php if($level->certificate): ?>
                        <div class="certificate-badge">
                            <i class="fa fa-certificate"></i>
                            <span>Certificate</span>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Button -->
                    <?php if($level->button_text && $level->button_link): ?>
                    <a href="<?php echo e($level->button_link); ?>" class="level-btn">
                        <?php echo e($level->button_text); ?>

                        <i class="fa fa-arrow-right ms-2"></i>
                    </a>
                    <?php else: ?>
                    <a href="<?php echo e(route('german-level.show', $level->level_code)); ?>" class="level-btn">
                        View Details
                        <i class="fa fa-arrow-right ms-2"></i>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<style>
.german-levels-section {
    position: relative;
}

.section-subtitle {
    display: inline-block;
    padding: 8px 20px;
    background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
    border-radius: 30px;
    margin-bottom: 15px;
}

.section-title {
    position: relative;
    z-index: 1;
}

.level-card {
    position: relative;
    border-radius: 20px;
    padding: 30px 20px;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 2px solid transparent;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    height: 100%;
    z-index: 1;
    overflow: hidden;
}

.level-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 20px;
    padding: 2px;
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    opacity: 0;
    transition: opacity 0.4s ease;
}

.level-card:hover::before {
    opacity: 1;
}

.level-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 60px rgba(22, 163, 74, 0.3);
}

.level-ribbon {
    position: absolute;
    top: 15px;
    right: -35px;
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: white;
    padding: 5px 40px;
    font-size: 11px;
    font-weight: 700;
    transform: rotate(45deg);
    box-shadow: 0 2px 10px rgba(245, 158, 11, 0.4);
    z-index: 2;
}

.level-badge {
    position: absolute;
    top: -15px;
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: 800;
    box-shadow: 0 4px 15px rgba(22, 163, 74, 0.4);
    z-index: 2;
}

.level-icon-wrapper {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(22, 163, 74, 0.1) 100%);
    position: relative;
    transition: all 0.4s ease;
}

.level-card:hover .level-icon-wrapper {
    transform: scale(1.1) rotate(5deg);
    background: linear-gradient(135deg, rgba(37, 99, 235, 0.2) 0%, rgba(22, 163, 74, 0.2) 100%);
}

.level-icon-wrapper::before {
    content: '';
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    border-radius: 50%;
    border: 2px dashed currentColor;
    opacity: 0.3;
    animation: rotate 20s linear infinite;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.level-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 50%;
    transition: transform 0.4s ease;
}

.level-card:hover .level-image {
    transform: scale(1.2);
}

.level-icon {
    font-size: 32px;
    transition: transform 0.4s ease;
}

.level-card:hover .level-icon {
    transform: scale(1.2);
}

.level-content {
    position: relative;
    z-index: 1;
}

.level-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 10px;
    transition: color 0.3s ease;
}

.level-card:hover .level-title {
    color: #2563eb;
}

.level-description {
    color: #64748b;
    font-size: 0.85rem;
    line-height: 1.5;
    margin-bottom: 15px;
}

.level-details {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-bottom: 15px;
}

.detail-item {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 0.8rem;
    color: #64748b;
}

.detail-item i {
    color: #16a34a;
}

.students-counter {
    margin-bottom: 15px;
}

.counter-number {
    display: block;
    font-size: 1.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.counter-label {
    font-size: 0.75rem;
    color: #64748b;
}

.certificate-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
    color: #16a34a;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 0.75rem;
    font-weight: 600;
    margin-bottom: 15px;
}

.level-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 20px;
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    color: white;
    text-decoration: none;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.85rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(22, 163, 74, 0.3);
    width: 100%;
}

.level-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(22, 163, 74, 0.4);
    background: linear-gradient(135deg, #2563eb 0%, #16a34a 100%);
}

/* Responsive */
@media (max-width: 991px) {
    .section-title {
        font-size: 2.2rem;
    }
    
    .level-card {
        margin-bottom: 30px;
    }
}

@media (max-width: 767px) {
    .section-title {
        font-size: 1.8rem;
    }
    
    .section-subtitle-text {
        font-size: 1rem;
    }
    
    .level-card {
        padding: 25px 15px;
    }
    
    .level-icon-wrapper {
        width: 60px;
        height: 60px;
    }
    
    .level-icon {
        font-size: 24px;
    }
    
    .level-title {
        font-size: 1rem;
    }
    
    .level-description {
        font-size: 0.75rem;
    }
}
</style>
<?php endif; ?>
<?php /**PATH D:\global consultancy\resources\views/components/german-language-levels-section.blade.php ENDPATH**/ ?>