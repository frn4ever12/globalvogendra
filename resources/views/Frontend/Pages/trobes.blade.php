@extends('Frontend.includes.main')

@section('head')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<style>
   .swiper-container {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.swiper-wrapper {
    display: flex;
}

.swiper-slide {
    width: 33.33%;
    padding: 0 5px;
    position: relative;
}

.slide-title {
    position: absolute;
    bottom: 10%;
    left: 10%;
    font-size: 2rem;
    font-weight: bold;
    color: #fff;
}

.swiper-slide img {
    width: 100%;
    height: 400px;
    border-radius: 10px;
}

.swiper-button-next,
.swiper-button-prev {
    color: #fff;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 1.5rem;
    border-radius: 50%;
}

.swiper-button-next {
    right: 10px;
}

.swiper-button-next::after, 
.swiper-button-prev::after {
    font-size: 1.6rem;
}

.swiper-button-prev {
    left: 10px;
}

.swiper-pagination-bullet {
    background: #fff;
}

.section-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #064D7C;
    margin-bottom: 20px;
}

.section-content {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
}

.section-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #064D7C;
    margin-bottom: 20px;
    text-align: center;
}

</style>
@endsection

@section('content')
<section style="width: 100%; position: relative; background-image: url('{{ asset('dist/img/background.png') }}'); background-size: cover; background-position: center; border-bottom: 1px solid rgb(222, 222, 222);">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>

    <div class="row align-items-center" style="position: relative; padding: 100px; z-index: 1; text-align: center;">
        <div>
            <h1 style="color: #fff; font-weight: bold;">La Trobe Uni Via Navitas</h1>
            <p style="color:#fff">
                With a proud history built on a mission to advance knowledge and learning to shape the future of our world, we are the most successful Australian university at combining accessibility and excellence. Our passionate teachers deliver globally recognised learning to our diverse student body.
            </p>
        </div>
    </div>
</section>

<section class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('dist/img/university.png') }}" alt="University Building" class="img-fluid rounded" style="width: 400px; height: auto;">        </div>
        <div class="col-md-6">
            <h2 class="section-title">Making a Difference</h2>
            <p>La Trobe's schools and departments are known for making a positive difference in the lives of our students, partners, and communities.</p>
            <p>La Trobe is a university known for making a positive difference in the lives of our students, partners, and communities. We will become an even more valued and relevant university because of the way we respond to their needs in this time of great local and national crisis. Our aim is to emerge as a more resilient, future-focused, and necessarily more efficient institution that will thrive in a post-COVID world by being more sharply focused on the needs of our community and by playing to our strengths in teaching and research. The Strategic Plan is a living document that we will review periodically to ensure it remains relevant to our circumstances.</p>
            <a href="#" class="btn btn-primary">Visit Website</a>
        </div>
    </div>
</section>
<section class="py-4 bg-light">
    <div class="container">
        <h2 class="section-title">Courses From La Trobe Uni Via Navitas</h2>
        <p>Take the next step in your career with flexible online</p>
        <div class="row mt-4">
            <h2 class="section-title">Courses Offered</h2>
            <div class="col-md-6 px-4">
                <ul class="list-unstyled">
                    <li class="mb-3 d-flex align-items-center">
                        <span class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3" style="width: 28px; height: 28px;">
                            &#10003;
                        </span>
                        Bachelor of Arts
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <span class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3" style="width: 28px; height: 28px;">
                            &#10003;
                        </span>
                        Bachelor of Archaeology
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <span class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3" style="width: 28px; height: 28px;">
                            &#10003;
                        </span>
                        Bachelor of Physiotherapy
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <span class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3" style="width: 28px; height: 28px;">
                            &#10003;
                        </span>
                        Bachelor of Accounting                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <span class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3" style="width: 28px; height: 28px;">
                            &#10003;
                        </span>
                        Associate Degree in Engineering Technology                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-unstyled">
                    <li class="mb-3 d-flex align-items-center">
                        <span class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3" style="width: 28px; height: 28px;">
                            &#10003;
                        </span>
                        Diploma of Arts                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <span class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3" style="width: 28px; height: 28px;">
                            &#10003;
                        </span>
                        Bachelor of Business                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <span class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3" style="width: 28px; height: 28px;">
                            &#10003;
                        </span>
                        Bachelor of Nursing                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <span class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3" style="width: 28px; height: 28px;">
                            &#10003;
                        </span>
                        Bachelor of Engineering (Honours)                    
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <span class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3" style="width: 28px; height: 28px;">
                            &#10003;
                        </span>
                        Bachelor of Cybersecurity / Bachelor of Criminology                    
                    </li>
                    <a href="#" class="btn btn-primary">Visit Website</a>
                </ul>
            </div>
        </div>
    </div>
</section>
        
        <!-- Section 4: Carousel (Optional Swiper Slider Section) -->
        <section class="container my-5">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('dist/img/university.png')  }}" alt="Slide 1">
                        <div class="slide-title">Explore Your Future</div>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('dist/img/university.png')  }}" alt="Slide 2">
                        <div class="slide-title">Innovative Learning</div>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('dist/img/university.png')  }}" alt="Slide 3">
                        <div class="slide-title">Global Opportunities</div>
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        
        <script>
            const swiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                },
            });
        </script>
        @endsection
        