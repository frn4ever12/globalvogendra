<div class="swiper-container banner">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="{{ asset('dist/img/banner1.jpg') }}" class="hero-image" alt="">
        </div>
        <div class="swiper-slide">
            <img src="{{ asset('dist/img/banner2.jpg') }}" class="hero-image" alt="">
        </div>

    </div>
</div>
<script>
    var swiper = new Swiper('.swiper-container.banner', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
    });
</script>