@extends('Frontend.includes.main')
@section('head')
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

        .swiper-slide img {
            width: 100%;
            height: 400px;
            border-radius: 10px;
        }
    </style>
@endsection

@section('content')
    <section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <h1 class="display-4 fw-bold text-danger animate-section-item">Pre-Departure</h1>
        </div>
    </section>
    <div class="container py-4 my-4 animate-section">
        <div class="row gx-4 gy-4">
            <div class="col-md-6 d-flex animate-section-item">
                <div class="service-box shadow rounded overflow-hidden position-relative">
                    <img src="{{ asset('images/aus.jpg') }}" class="service-image w-100" alt="Pre-departure Orientation"
                        style="height: 300px; object-fit: cover;">
                    <div class="service-overlay ">
                        <h3 class="fs-5 mb-2">Pre-departure Guide Australia</h3>
                        <a href="{{ route('predepartureguide') }}" class="text-white text-decoration-none small">Know More
                            &gt;</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex animate-section-item">
                <div class="service-box shadow rounded overflow-hidden position-relative">
                    <img src="{{ asset('images/UK.jpg') }}" class="service-image w-100" alt="Test Preparation"
                        style="height: 300px; object-fit: cover;">
                    <div class="service-overlay">
                        <h3 class="fs-5 mb-2">Pre-departure Guide UK</h3>
                        <a href="{{ route('predepartureguide') }}" class="text-white text-decoration-none small">Know More
                            &gt;</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 animate-section-item">
            <button id="toggle-services-button" class="btn btn-primary mb-3"
                style="background-color: rgb(22, 61, 146);">Other Services</button>
            <div id="other-services-section" class="bg-light p-3 rounded shadow" style="display: none;">
                <h3 class="text-dark mb-3">Other <span class="text-primary">Services</span></h3>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-chevron-right text-primary me-2"></i><a href="#"
                            class="text-primary text-decoration-none">SOP Bank</a></li>
                    <li class="mb-2"><i class="fas fa-chevron-right text-primary me-2"></i><a href="#"
                            class="text-primary text-decoration-none">Counseling at Your Tips</a></li>
                    <li class="mb-2"><i class="fas fa-chevron-right text-primary me-2"></i><a href="#"
                            class="text-primary text-decoration-none">Newsletter</a></li>
                    <li class="mb-2"><i class="fas fa-chevron-right text-primary me-2"></i><a href="#"
                            class="text-primary text-decoration-none">Study Abroad FAQs</a></li>
                    <li class="mb-2"><i class="fas fa-chevron-right text-primary me-2"></i><a href="#"
                            class="text-primary text-decoration-none">Compare Destination</a></li>
                    <li class="mb-2"><i class="fas fa-chevron-right text-primary me-2"></i><a href="#"
                            class="text-primary text-decoration-none">Scholarships</a></li>
                    <li class="mb-2"><i class="fas fa-chevron-right text-primary me-2"></i><a href="#"
                            class="text-primary text-decoration-none">Agent Zone</a></li>
                    <li class="mb-2"><i class="fas fa-chevron-right text-primary me-2"></i><a href="#"
                            class="text-primary text-decoration-none">Interview Preparation</a></li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggle-services-button').addEventListener('click', function() {
            const section = document.getElementById('other-services-section');
            section.style.display = (section.style.display === 'none' || section.style.display === '') ? 'block' :
                'none';
            this.textContent = section.style.display === 'block' ? 'Hide Other Services' : 'Other Services';
        });
    </script>
    <script src="{{ asset('dist/js/frontend.js') }}"></script>
@endsection
