@extends('Frontend.includes.main')

@section('content')
    <section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <h1 class="display-4 fw-bold text-danger animate-section-item">Services</h1>
        </div>
    </section>

    <div class="container text-center px-4 py-2 pt-4 fw-bold animate-section-item w-75 mx-auto" style="color: #4b4b4b;">
        <p>
            Our comprehensive range of services covers every step of your journey, from identifying the right universities
            to pre-departure orientation.
            We make the process seamless, allowing you to focus on what matters most—your strengths and dreams of studying
            in your Dreamland.
        </p>
    </div>

    <div class="container my-2 animate-section">
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 d-flex animate-section-item">
                <div class="service-box">
                    <img src="{{ asset('images/orientation.jpg') }}" class="service-image" alt="Pre-departure Orientation">
                    <div class="service-overlay">
                        <h3>Pre-departure Orientation</h3>
                        <a href="{{ route('predeparture') }}" class="btn btn-outline-white text-white text-decoration-none">
                            Learn More <span>&#8594;</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 d-flex animate-section-item">
                <div class="service-box">
                    <img src="{{ asset('images/test.png') }}" class="service-image" alt="Test Preparation">
                    <div class="service-overlay">
                        <h3>Test Preparation</h3>
                        <a href="{{ route('testpreparation') }}"
                            class="btn btn-outline-white text-white text-decoration-none">
                            Learn More <span>&#8594;</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 d-flex animate-section-item">
                <div class="service-box">
                    <img src="{{ asset('images/accomodation.jpg') }}" class="service-image" alt="Student Accommodation">
                    <div class="service-overlay">
                        <h3>Student Accommodation</h3>
                        <a href="{{ route('studentaccomodation') }}"
                            class="btn btn-outline-white text-white text-decoration-none">
                            Learn More <span>&#8594;</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 d-flex animate-section-item">
                <div class="service-box">
                    <img src="{{ asset('images/counseling.jpg') }}" class="service-image" alt="Education Counseling">
                    <div class="service-overlay">
                        <h3>Education Counseling</h3>
                        <a href="{{ route('educationcounseling') }}"
                            class="btn btn-outline-white text-white text-decoration-none">
                            Learn More <span>&#8594;</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 d-flex animate-section-item">
                <div class="service-box">
                    <img src="{{ asset('images/scholarship.jpg') }}" class="service-image" alt="Scholarship Guidance">
                    <div class="service-overlay">
                        <h3>Scholarship Guidance</h3>
                        <a href="{{ route('scholarshipguidence') }}"
                            class="btn btn-outline-white text-white text-decoration-none">
                            Learn More <span>&#8594;</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 d-flex animate-section-item">
                <div class="service-box">
                    <img src="{{ asset('images/university.jpg') }}" class="service-image" alt="University Admission">
                    <div class="service-overlay">
                        <h3>University Admission</h3>
                        <a href="{{ route('countries') }}" class="btn btn-outline-white text-white text-decoration-none">
                            Learn More <span>&#8594;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-4 bg-light animate-section-item">
        <div class="container">
            <h2 class="fw-bold text-dark text-start ">
                More <span class="text-primary">Services</span>
            </h2>
            <div class="row mt-4">
                <div class="col-md-6 px-4 animate-section-item">
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-center">
                            <span
                                class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3"
                                style="width: 28px; height: 28px;">
                                &#10003;
                            </span>
                            International Educational Loans
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span
                                class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3"
                                style="width: 28px; height: 28px;">
                                &#10003;
                            </span>
                            Assistance in Filling of Applicants
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span
                                class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3"
                                style="width: 28px; height: 28px;">
                                &#10003;
                            </span>
                            100% Visa Assistance
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span
                                class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3"
                                style="width: 28px; height: 28px;">
                                &#10003;
                            </span>
                            Providing International Student ID Card
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span
                                class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3"
                                style="width: 28px; height: 28px;">
                                &#10003;
                            </span>
                            Assistance in Documentation for Admission
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 animate-section-item">
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-center">
                            <span
                                class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3"
                                style="width: 28px; height: 28px;">
                                &#10003;
                            </span>
                            Discounts on tickets and extra luggage
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span
                                class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3"
                                style="width: 28px; height: 28px;">
                                &#10003;
                            </span>
                            Tie-up with student travel and Medical Insurance providers
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span
                                class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3"
                                style="width: 28px; height: 28px;">
                                &#10003;
                            </span>
                            Regular follow-up with Universities/Colleges
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span
                                class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3"
                                style="width: 28px; height: 28px;">
                                &#10003;
                            </span>
                            Coaching for IELTS, TOEFL-iBT, PTE-A, OET, SAT
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
