@extends('Frontend.includes.main')

@section('content')
<section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <h1 class="display-4 fw-bold text-danger animate-section-item">Education Counseling</h1>
        </div>
    </section>
<div class="container py-4 my-4 animate-section ">
    <div class="row">
        <div class="col-md-6 col-lg-4 d-flex animate-section-item">
            <div class="service-box">
                <img src="{{ asset('images/aus.jpg') }}" class="service-image" alt="Pre-departure Orientation">
                <div class="service-overlay">
                    <h3>Australia</h3>
                    <a href="{{ route('counselordashboard') }}" class="btn btn-outline-white text-white text-decoration-none">
                        Learn More <span>&#8594;</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex animate-section-item">
            <div class="service-box">
                <img src="{{ asset('images/canada.jpg') }}" class="service-image" alt="Test Preparation">
                <div class="service-overlay">
                    <h3>Canada</h3>
                    <a href="{{ route('counselordashboard') }}" class="btn btn-outline-white text-white text-decoration-none">
                        Learn More <span>&#8594;</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex animate-section-item">
            <div class="service-box">
                <img src="{{ asset('images/UK.jpg') }}" class="service-image" alt="Student Accommodation">
                <div class="service-overlay">
                    <h3>United Kingdom</h3>
                    <a href="{{ route('counselordashboard') }}" class="btn btn-outline-white text-white text-decoration-none">
                        Learn More <span>&#8594;</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex animate-section-item">
            <div class="service-box">
                <img src="{{ asset('images/usa.jpg') }}" class="service-image" alt="Education Counseling">
                <div class="service-overlay">
                    <h3>USA</h3>
                    <a href="{{ route('counselordashboard') }}" class="btn btn-outline-white text-white text-decoration-none">
                        Learn More <span>&#8594;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('dist/js/frontend.js') }}"></script>
@endsection