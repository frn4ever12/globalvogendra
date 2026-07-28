<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<section class="pb-4 position-relative">
    <div class="container  my-4">
        <h2 class="py-4">Top <span style="color:red;">Universities</span> we represent</h2>
        <div class="swiper-container university-slider">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide ">
                        <div class="university-box position-relative">
                            <a href="<?php echo e(route('universities', $university->id)); ?>">
                                <img src="<?php echo e($university->image_url ? asset('storage/' . $university->image_url) : asset('images/default-image.jpg')); ?>"
                                    alt="<?php echo e($university->name); ?>">
                                <div class="university-name">
                                    <h3 class="university-title"><?php echo e($university->name); ?></h3>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <!-- Swiper Pagination and Navigation -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>
</section>
<script>
    var swiper = new Swiper('.university-slider.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        slideToClickedSlide: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            1024: {
                slidesPerView: 4,
            },
            768: {
                slidesPerView: 2,
            },
            480: {
                slidesPerView: 1,
            },
        },
    });
</script>
<?php /**PATH D:\global consultancy\resources\views/Frontend/includes/university-slider.blade.php ENDPATH**/ ?>