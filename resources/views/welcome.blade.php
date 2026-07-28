@extends('Frontend.includes.main')
@section('content')
    <!-- Hero Slider Section -->
    @if(isset($heroBanners) && $heroBanners->count() > 0)
        <x-hero-slider :banners="$heroBanners" />
    @else
        <div class="alert alert-warning">
            No hero banners found. {{ isset($heroBanners) ? 'Banners count: ' . $heroBanners->count() : 'heroBanners variable not set' }}
        </div>
    @endif

    <!-- About Us Section -->
    @if(isset($aboutUs))
        <x-about-us-section :aboutUs="$aboutUs" />
    @endif

    @include('Frontend.includes.university-slider')
    <div class="m-0 my-4 row align-items-center">
        @include('Frontend.includes.stories-slider')
    </div>

    <section class="container">
        <div class="py-4 mx-auto my-4 w-50" style="text-align: center;">
            <h2>Learning Center</h2>
        </div>
        <div class="row">
            <div class="mb-4 col-md-4">
                <div class="card">
                    <a href="{{ route('learning.ielts') }}">
                        <img src="{{ asset('dist/img/image1.jpg') }}" class="card-img-top" alt="Article Image">
                        <div class="card-body">
                            <h6 class="card-title">IELTS</h6>
                        </div>
                    </a>
                </div>
            </div>

            <div class="mb-4 col-md-4">
                <div class="card">
                    <a href="{{ route('learning.pte') }}">
                        <img src="{{ asset('dist/img/image2.jpg') }}" class="card-img-top" alt="Article Image">
                        <div class="card-body">
                            <h6 class="card-title">PTE</h6>
                        </div>
                    </a>
                </div>
            </div>

            <div class="mb-4 col-md-4">
                <div class="card">
                    <a href="{{ route('learning.toefl') }}">
                        <img src="{{ asset('dist/img/image3.jpg') }}" class="card-img-top" alt="Article Image">
                        <div class="card-body">
                            <h6 class="card-title">TOEFL</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @include('Frontend.includes.country-slider')

    </section>
    <section class="container py-4 my-4">
        <h2 class="py-2">Our Services</h2>
        <div class="row service-list">
            <div class="col-12 col-md-6">
                <div class="service-item">
                    <p><i class="fas fa-check-circle"></i></p>
                    <p>100% Visa Assistance</p>
                </div>
                <div class="service-item">
                    <p><i class="fas fa-check-circle"></i></p>
                    <p>International Educational Loans</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="service-item">
                    <p><i class="fas fa-check-circle"></i></p>
                    <p>Coaching for IELTS, TOEFL-iBT, PTE-A, OET, SAT</p>
                </div>
                <div class="service-item">
                    <p><i class="fas fa-check-circle"></i></p>
                    <p>Assistance in Documentation for Admission</p>
                </div>
            </div>
        </div>
    </section>
@endsection
