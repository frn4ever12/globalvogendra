@extends('Frontend.includes.main')
@section('content')
    <section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <h1 class="display-4 fw-bold text-danger animate-section-item">Test Preparation</h1>
        </div>
    </section>

    <div class="container py-4 my-4">
        <div class="row gx-4 gy-4 animate-section-item">
            <!-- Card 1 -->
            <div class="col-md-4 d-flex">
                <div class="service-box shadow rounded overflow-hidden position-relative">
                    <img src="{{ asset('images/test.png') }}" class="service-image w-100" alt="Test Preparation"
                        style="height: 300px; object-fit: cover;">
                    <div class="service-overlay">
                        <h3 class="fs-5 mb-2">IELTS</h3>
                        <a href="{{ route('learning.ielts') }}"
                            class="btn btn-outline-white text-white text-decoration-none"
                            style="border: 2px solid white; padding: 0.5rem 1rem; border-radius: 4px;">
                            Learn More <span>&#8594;</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4 d-flex">
                <div class="service-box shadow rounded overflow-hidden position-relative">
                    <img src="{{ asset('images/test.png') }}" class="service-image w-100" alt="Test Preparation"
                        style="height: 300px; object-fit: cover;">
                    <div class="service-overlay">
                        <h3 class="fs-5 mb-2">TOEFL</h3>
                        <a href="{{ route('learning.toefl') }}"
                            class="btn btn-outline-white text-white text-decoration-none"
                            style="border: 2px solid white; padding: 0.5rem 1rem; border-radius: 4px;">
                            Learn More <span>&#8594;</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 d-flex">
                <div class="service-box shadow rounded overflow-hidden position-relative">
                    <img src="{{ asset('images/test.png') }}" class="service-image w-100" alt="Test Preparation"
                        style="height: 300px; object-fit: cover;">
                    <div class="service-overlay">
                        <h3 class="fs-5 mb-2">PTE</h3>
                        <a href="{{ route('learning.pte') }}" class="btn btn-outline-white text-white text-decoration-none"
                            style="border: 2px solid white; padding: 0.5rem 1rem; border-radius: 4px;">
                            Learn More <span>&#8594;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dist/js/frontend.js') }}"></script>
@endsection
