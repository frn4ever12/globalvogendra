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

<?php if($aboutUs && $aboutUs->status): ?>
    <section class="about-us-section" style="background-color: <?php echo e($aboutUs->background_color ?? '#f8f9fa'); ?>; padding: 4rem 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                    <?php if($aboutUs->image): ?>
                        <img src="<?php echo e(asset('storage/' . $aboutUs->image)); ?>" 
                             class="img-fluid rounded shadow" 
                             alt="<?php echo e($aboutUs->title); ?>"
                             style="width: 100%; height: auto; object-fit: contain; max-height: 400px;"
                             data-aos="fade-right">
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div style="color: <?php echo e($aboutUs->text_color ?? '#333333'); ?>;" data-aos="fade-left">
                        <?php if($aboutUs->title): ?>
                            <h2 class="fw-bold mb-3" style="font-size: 2.5rem;"><?php echo e($aboutUs->title); ?></h2>
                        <?php endif; ?>
                        
                        <?php if($aboutUs->description): ?>
                            <div class="mb-4" style="font-size: 1.1rem; line-height: 1.8;">
                                <?php echo $aboutUs->description; ?>

                            </div>
                        <?php endif; ?>
                        
                        <?php if($aboutUs->button_text): ?>
                            <a href="<?php echo e(route('about')); ?>" 
                               class="btn btn-lg rounded-pill px-5 py-3"
                               style="background: linear-gradient(135deg, #0056b3, #003a80); color: white; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                                <?php echo e($aboutUs->button_text); ?>

                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH D:\global consultancy\resources\views/components/about-us-section.blade.php ENDPATH**/ ?>