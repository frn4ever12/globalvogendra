<section class="position-relative my-2 py-4">
    <div class="container">

        <h2 class="py-4">Top <span style="color:red;">Countries</span> we represent</h2>
        <div class="swiper-container country-slider">
            <div class="swiper-wrapper">
                @foreach ($countries as $country)
                    <div class="swiper-slide">
                        <div class="country-box position-relative">
                            <a href="{{ route('university', ['country' => $country->id]) }}">
                                <img src="{{ $country->flag_url ? asset('storage/' . $country->flag_url) : asset('images/default-image.jpg') }}"
                                    alt="{{ $country->name }}" >
                                <div class="country-name">
                                    <h3 class="country-title">{{ $country->name }}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
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
