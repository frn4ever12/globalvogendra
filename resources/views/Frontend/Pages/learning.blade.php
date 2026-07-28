@extends('Frontend.includes.main')

@section('head')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <style>
        .form-link {
            color: #ffffff;
        }
    </style>
@endsection

@section('content')
    <section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <h1 class="display-4 fw-bold text-danger animate-section-item">Global Excel</h1>
            <h1 class="display-4 fw-bold text-primary animate-section-item">Learning Center</h1>
        </div>
    </section>

    <section class="container my-4">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <p>You might be wondering how one can conduct such an international level class at an economical
                    (Competitive) price...</p>
                <p>Every institution claims that they provide expert instructors to get you the desired band...</p>
                <p><strong>Book Class of your choice from 7 am till 6 pm.</strong></p>
            </div>
            <div class="col-sm-12 col-md-4 text-white ">
                <div class="row g-2">
                    <div class="col-6  ">
                        <div class="card text-white  p-3 bg-primary" style="min-height:130px;">
                            <h6>PTE Mock Test Free* / Paid</h6>
                            <a href="#" class="form-link">Form</a>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="card text-white  p-3 bg-danger" style="min-height:130px;">
                            <h6>Duolingo Online Booking</h6>
                            <a href="#" class="form-link">Form</a>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="card text-white  p-3 bg-danger" style="min-height:130px;">
                            <h6>Inquiry or Registration</h6>
                            <a href="#" class="form-link">Form</a>
                        </div>
                    </div>
                    <div class="col-6  ">
                        <div class="card text-white  p-3 bg-primary" style="min-height:130px;">
                            <h6>Learning Center Class Schedule</h6>
                            <a href="#" class="form-link">Form</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('Frontend.includes.test-classes')

    <section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);">
        </div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <div class=" text-danger animate-section-item">
                <h1 class="display-4 fw-bold" style="color: #0056b3">ABROAD STUDY <span style="color:red;">DESTINATIONS AND
                        FACTS</span></h1>
                <p>We have partnered with top universities in nine countries.</p>
            </div>
        </div>
    </section>
    <section class="header-section">
        <div class="overlay"></div>
        <div class="content col-md-7 custom-padding">

        </div>
    </section>

    <section class="container my-4">
        <h2 class="py-4">Our <span style="color:red;">Services</span></h2>
        <div>
            <div>
                <div>
                    <div class="service-item">
                        <p><i class="fas fa-check-circle"></i></p>
                        <p>100% Visa Assistance</p>
                    </div>
                </div>
                <div>
                    <div class="service-item">
                        <p><i class="fas fa-check-circle"></i></p>
                        <p>International Educational Loans</p>
                    </div>
                </div>
                <div>
                    <div class="service-item">
                        <p><i class="fas fa-check-circle"></i></p>
                        <p>Coaching for IELTS, TOEFL-iBT, PTE-A, OET, SAT</p>
                    </div>
                </div>
                <div>
                    <div class="service-item">
                        <p><i class="fas fa-check-circle"></i></p>
                        <p>Assistance in Documentation for Admission</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    </script>
@endsection