<section class="py-3 my-3" style="background-color: rgb(249, 249, 249);">
    <div class="container my-5" >
        <h2 class="text-center mb-4 text-danger" style="font-weight: bold;font-size: 2rem;">Student Stories and Experiences</h2>

        <div class="swiper-container stories-slider text-center">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class=" p-4 ">
                        <p class="text-muted">"This is the best service I've ever used! Highly recommend."</p>
                        <h5 class="mt-3">John Doe</h5>
                        <p class="small text-muted">May 15, 2024</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class=" p-4 ">
                        <p class="text-muted">"The team is incredibly professional, and they always deliver on time."</p>
                        <h5 class="mt-3">Jane Smith</h5>
                        <p class="small text-muted">May 15, 2024</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class=" p-4 ">
                        <p class="text-muted">"A fantastic experience. Will definitely use this service again."</p>
                        <h5 class="mt-3">Michael Johnson</h5>
                        <p class="small text-muted">May 15, 2024</p>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>
 <!-- Initialize Swiper -->
 <script>
    var swiper = new Swiper('.swiper-container.stories-slider', {
        loop: true, 
        autoplay: {
            delay: 5000, 
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        slidesPerView: 1,
        spaceBetween: 10,
    });
</script>