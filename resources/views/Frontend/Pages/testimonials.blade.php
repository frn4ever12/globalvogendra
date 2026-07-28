@extends('Frontend.includes.main')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .testimonial-card {
            background: #fff;
            border: 1px solid #e3e3e3;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
        }

        .profile-photo {
            border-radius: 50%;
            width: 60px;
            height: 60px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .rating {
            color: #f39c12;
            font-size: 14px;
        }

        .testimonial-title {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .testimonial-title span {
            color: #e74c3c;
        }

        .btn-primary {
            background-color: white;
            color: #0056b3;
            border: 1px solid #0056b3;
            font-size: 14px;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            color: white;
        }

        .success-card {
            background: linear-gradient(90deg, #00154F, #0275d8);
            color: #fff;
            border: none;
        }

        .success-card h5 {
            font-size: 1.5rem;
            line-height: 1.2;
        }

        .success-card img {
            border: 3px solid #fff;
        }

        .badge-custom {
            background-color: #ff5722;
            font-size: 0.9rem;
            padding: 0.5em 1em;
        }

        .quote-block {
            font-size: 1.2rem;
            font-weight: bold;
            color: #00154F;
        }
    </style>
@endsection

@section('content')
    <div class="container my-5">
        <section class="container border-bottom pb-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="text-primary fw-bold">Testimonials <span class="text-danger">Stories</span></h1>
                </div>
            </div>
        </section>

        <div class="container my-5">
            <h1 class="testimonial-title text-center">
                What our <span>Students Say</span>
            </h1>
            <div class="row justify-content-center">
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-md-4 my-3">
                        <div class="testimonial-card">
                            <img src="https://via.placeholder.com/60" alt="Student" class="profile-photo">
                            <h5>Student Name</h5>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg"
                                alt="Google" style="width: 20px;">
                            <p class="mt-3">
                                The best guidance in your application process. I am happily going to the USA.
                            </p>
                            <small class="text-muted">Jun 9, 2024</small>
                            <div class="rating mt-2">★★★★★</div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="text-center">
                <a href="#" class="btn btn-primary mt-4">Write a Review ✎</a>
            </div>
        </div>

        <div class="container my-5">
            <section class="border-bottom pb-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="text-primary fw-bold">Success <span class="text-danger">Stories</span></h1>
                    </div>
                </div>
            </section>

            <div class="row mt-5 g-4">
                <div class="col-md-6">
                    <div class="card   rounded-3 p-3">
                        <div class="row align-items-center">
                            <div class="card border-0 p-4 col-4  rounded-4 ">
                                <img src="success_image.jpg" alt="Success Image" class="img-fluid  my-3"
                                    style="width: 100px; height: 100px;">
                            </div>
                            <div class="col-8">
                                <h5 class="fw-bold mb-0">Nishan Dangi</h5>
                                <p class="text-muted mb-1">Australia VISA Success</p>
                                <p class="text-muted">September 15, 2024</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p>
                                “Setting goals is the first step in turning the invisible into the visible.”
                                Congratulations on your visa grant. Your hard work paid off as you fly to your dreamland.
                            </p>
                            <a href="{{ route('successstory') }}" class="text-primary fw-bold mt-2">KNOW MORE
                                <span>&rarr;</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card   rounded-3 p-3">
                        <div class="row align-items-center">
                            <div class="card border-0 p-4 col-4  rounded-4 ">
                                <img src="success_image.jpg" alt="Success Image" class="img-fluid  my-3"
                                    style="width: 100px; height: 100px;">
                            </div>
                            <div class="col-8">
                                <h5 class="fw-bold mb-0">Nishan Dangi</h5>
                                <p class="text-muted mb-1">Australia VISA Success</p>
                                <p class="text-muted">September 15, 2024</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p>
                                “Setting goals is the first step in turning the invisible into the visible.”
                                Congratulations on your visa grant. Your hard work paid off as you fly to your dreamland.
                            </p>
                            <a href="{{ route('successstory') }}" class="text-primary fw-bold mt-2">KNOW MORE
                                <span>&rarr;</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card   rounded-3 p-3">
                        <div class="row align-items-center">
                            <div class="card border-0 p-4 col-4  rounded-4 ">
                                <img src="success_image.jpg" alt="Success Image" class="img-fluid  my-3"
                                    style="width: 100px; height: 100px;">
                            </div>
                            <div class="col-8">
                                <h5 class="fw-bold mb-0">Nishan Dangi</h5>
                                <p class="text-muted mb-1">Australia VISA Success</p>
                                <p class="text-muted">September 15, 2024</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p>
                                “Setting goals is the first step in turning the invisible into the visible.”
                                Congratulations on your visa grant. Your hard work paid off as you fly to your dreamland.
                            </p>
                            <a href="{{ route('successstory') }}" class="text-primary fw-bold mt-2">KNOW MORE
                                <span>&rarr;</span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card   rounded-3 p-3">
                        <div class="row align-items-center">
                            <div class="card border-0 p-4 col-4  rounded-4 ">
                                <img src="success_image.jpg" alt="Success Image" class="img-fluid  my-3"
                                    style="width: 100px; height: 100px;">
                            </div>
                            <div class="col-8">
                                <h5 class="fw-bold mb-0">Nishan Dangi</h5>
                                <p class="text-muted mb-1">Australia VISA Success</p>
                                <p class="text-muted">September 15, 2024</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p>
                                “Setting goals is the first step in turning the invisible into the visible.”
                                Congratulations on your visa grant. Your hard work paid off as you fly to your dreamland.
                            </p>
                            <a href="{{ route('successstory') }}" class="text-primary fw-bold mt-2">KNOW MORE
                                <span>&rarr;</span></a>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="{{ route('success') }}" class="text-primary fw-bold mt-2">See All <span>&rarr;</span></a>
                </div>
            </div>
        </div>
     @endsection
