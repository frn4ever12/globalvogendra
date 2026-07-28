@extends('Frontend.includes.main')


@section('content')
<section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5">
            <h1 class="display-4 fw-bold text-danger animate-section-item">{{ $university->name }}</h1>
        </div>
    </section>
    

    <section class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('storage/'.$university->image_url) }}" alt="University Building" class="img-fluid rounded"
                    style="width: 400px; height: auto;">
            </div>
            <div class="col-md-6">
                <h2>Making a Difference</h2>
                <p>{{ $university->name }} 's schools and departments are known for making a positive difference in the
                    lives of our students, partners, and communities.</p>
                <p>{{ $university->name }} {{ $university->description }}</p>
                <a href="{{ $university->website_url ?? '#' }}" class="btn btn-primary">Visit Website</a>
            </div>
        </div>
    </section>
    <div class="container my-5">
        <div class="container my-5">
            <section class="mt-5">
                <h2 class="section-title text-center">Ways to Study</h2>
                <p class="text-center">
                    Take the next step in your career with flexible online study options, industry connections, and the
                    support of expert teachers.
                </p>
                <div class="row text-center justify-content-center" style="gap:1rem;">
                    <a href="{{ $university->website_url ?? '#' }}" class="card p-3  col-sm-6 col-md-2" target="_blank">
                        <b>1</b>
                        <h6>Undergraduate</h6>
                    </a>
                    <a href="{{ $university->website_url ?? '#' }}" class="card p-3  col-sm-6 col-md-2" target="_blank">
                        <b>2</b>
                        <h6>Postgraduate</h6>
                    </a>
                    <a href="{{ $university->website_url ?? '#' }}" class="card p-3  col-sm-6 col-md-2" target="_blank">
                        <b>3</b>
                        <h6>Graduate Research Degrees</h6>
                    </a>
                    <a href="{{ $university->website_url ?? '#' }}" class="card p-3  col-sm-6 col-md-2" target="_blank">
                        <b>4</b>
                        <h6>Online Courses</h6>
                    </a>
                    <a href="{{ $university->website_url ?? '#' }}" class="card p-3  col-sm-6 col-md-2" target="_blank">
                        <b>5</b>
                        <h6>Short Courses</h6>
                    </a>
                </div>
            </section>
        </div>

        <section>
            <div class="container my-5">
                <h2 class="section-title">{{ $university->name }} - Courses Offered</h2>
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6 p-4">
                        <ul class="list-unstyled">
                            @foreach ($university->courses()->get() as $course)
                                <li class="mb-3 d-flex align-items-center">
                                    <span
                                        class="d-inline-flex align-items-center justify-content-center text-primary border border-primary rounded-circle me-3"
                                        style="width: 28px; height: 28px;">
                                        &#10003;
                                    </span>
                                    {{ $course->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                </div>
                <a href="{{ $university->website_url ?? '#' }}" class="btn btn-primary mt-4">Visit Website</a>
            </div>
        </section>
        <div class="container my-5">
            <!-- Entry Requirements Section -->
            <div class="card p-4 my-2">
                <h3>Entry Requirements</h3>
                <p>Our courses have a range of academic and English language requirements. These requirements are in place
                    to make sure you have the knowledge and skills you need to succeed in your studies.</p>
                <a href="{{ $university->website_url ?? '#' }}" target="_blank">Visit Website <i
                        class="bi bi-arrow-right-circle-fill"></i></a>
            </div>

            <!-- How to Apply Section -->
            <div class="card p-4 my-2">
                <h3>How to Apply</h3>
                <p>Select your level of study and begin your application process.</p>
                <a href="{{ $university->website_url ?? '#' }}" target="_blank">Visit Website <i
                        class="bi bi-arrow-right-circle-fill"></i></a>
            </div>

            <!-- International Tuition Fees Section -->
            <div class="card p-4 my-2">
                <h3>International Tuition Fees and Scholarships</h3>
                <p>International study is a big decision, especially when the future can look a little uncertain. So we've
                    designed our range of scholarships to give you the support you need in a changing world. In the form of
                    tuition fee reductions, these scholarships recognize your potential and reward your hard work.</p>
                <a href="{{ $university->website_url ?? '#' }}" target="_blank">Visit Website <i
                        class="bi bi-arrow-right-circle-fill"></i></a>
            </div>
        </div>


        
    </div>
    
@endsection
