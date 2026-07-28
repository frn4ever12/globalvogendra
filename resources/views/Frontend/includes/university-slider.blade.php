<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<section class="pb-4 position-relative">
    <div class="container  my-4">
        <h2 class="py-4">Top <span style="color:red;">Universities</span> we represent</h2>
        <div class="swiper-container university-slider">
            <div class="swiper-wrapper">
                @foreach ($universities as $university)
                    <div class="swiper-slide ">
                        <div class="university-box position-relative">
                            <a href="{{ route('universities', $university->id) }}">
                                <img src="{{ $university->image_url ? asset('storage/' . $university->image_url) : asset('images/default-image.jpg') }}"
                                    alt="{{ $university->name }}">
                                <div class="university-name">
                                    <h3 class="university-title">{{ $university->name }}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
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
