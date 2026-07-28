<section class="position-relative my-2 py-4">
    <div class="container">

        <h2 class="py-4">Top <span style="color:red;">Countries</span> we represent</h2>
        <div class="swiper-container country-slider">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <div class="country-box position-relative">
                            <a href="<?php echo e(route('university', ['country' => $country->id])); ?>">
                                <img src="<?php echo e($country->flag_url ? asset('storage/' . $country->flag_url) : asset('images/default-image.jpg')); ?>"
                                    alt="<?php echo e($country->name); ?>" >
                                <div class="country-name">
                                    <h3 class="country-title"><?php echo e($country->name); ?></h3>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!-- Swiper Pagination and Navigation -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</section>

<script>
    var swiper = new Swiper('.country-slider.swiper-container', {
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
<?php /**PATH D:\global consultancy\resources\views/Frontend/includes/country-slider.blade.php ENDPATH**/ ?>