@extends('Frontend.includes.main')
@section('content')
    <!-- Hero Slider Section -->
    @if(isset($heroBanners) && $heroBanners->count() > 0)
        <x-hero-slider :banners="$heroBanners" />
    @endif

    <!-- About Us Section -->
    @if(isset($aboutUs))
        @if($aboutUs)
            <x-about-us-section :aboutUs="$aboutUs" />
        @endif
    @endif

    <!-- Services Section -->
    @if(isset($frontendServices))
        <x-services-section :services="$frontendServices" />
    @endif

    <!-- Process Section -->
    @if(isset($processes))
        <x-process-section :processes="$processes" />
    @endif

    <!-- Why Choose Us Section -->
    @if(isset($whyChooseUs))
        <x-why-choose-us-section :features="$whyChooseUs" />
    @endif

    <!-- Visa Success Stories Section -->
    @if(isset($visaSuccessStories))
        <x-visa-success-stories-section :stories="$visaSuccessStories" />
    @endif

    <!-- German Language Levels Section -->
    @if(isset($germanLanguageLevels))
        <x-german-language-levels-section :levels="$germanLanguageLevels" />
    @endif

    @include('Frontend.includes.university-slider')
    <div class="m-0 my-4 row align-items-center">
        @include('Frontend.includes.stories-slider')
    </div>

    <section class="container py-4 my-4">
        <h2 class="py-2 text-center">Learning Center</h2>
        <div class="row">
            <div class="mb-4 col-12 col-md-4">
                <div class="card h-100">
                    <a href="{{ route('learning.ielts') }}">
                        <img src="{{ asset('dist/img/image1.jpg') }}" class="card-img-top" alt="IELTS" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h6 class="card-title">IELTS</h6>
                        </div>
                    </a>
                </div>
            </div>

            <div class="mb-4 col-12 col-md-4">
                <div class="card h-100">
                    <a href="{{ route('learning.pte') }}">
                        <img src="{{ asset('dist/img/image2.jpg') }}" class="card-img-top" alt="PTE" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h6 class="card-title">PTE</h6>
                        </div>
                    </a>
                </div>
            </div>

            <div class="mb-4 col-12 col-md-4">
                <div class="card h-100">
                    <a href="{{ route('learning.toefl') }}">
                        <img src="{{ asset('dist/img/image3.jpg') }}" class="card-img-top" alt="TOEFL" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h6 class="card-title">TOEFL</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @include('Frontend.includes.country-slider')

    </section>
    <section class="container py-4 my-4">
        <h2 class="py-2 text-center">Our Services</h2>
        <div class="row service-list">
            <div class="col-12 col-md-6 mb-3">
                <div class="service-item d-flex align-items-center">
                    <p class="mb-0 me-2"><i class="fas fa-check-circle text-success"></i></p>
                    <p class="mb-0">100% Visa Assistance</p>
                </div>
                <div class="service-item d-flex align-items-center">
                    <p class="mb-0 me-2"><i class="fas fa-check-circle text-success"></i></p>
                    <p class="mb-0">International Educational Loans</p>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="service-item d-flex align-items-center">
                    <p class="mb-0 me-2"><i class="fas fa-check-circle text-success"></i></p>
                    <p class="mb-0">Coaching for IELTS, TOEFL-iBT, PTE-A, OET, SAT</p>
                </div>
                <div class="service-item d-flex align-items-center">
                    <p class="mb-0 me-2"><i class="fas fa-check-circle text-success"></i></p>
                    <p class="mb-0">Assistance in Documentation for Admission</p>
                </div>
            </div>
        </div>
    </section>
@endsection
