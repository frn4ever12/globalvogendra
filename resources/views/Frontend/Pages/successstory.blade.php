@extends('Frontend.includes.main')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="container my-5">
        <section class="container border-bottom pb-3">
            <div class="row align-items-center justify-content-center ">
                <div class="col-md-6 d-flex flex-column align-items-center justify-content-center text-center">
                    <h5 style="color: #0a0a0a;">Success Story</h5>
                    <h1 style="color: #0a0a0a;">Ayushma Sharma | Australia Student Visa Granted</h1>
                </div>
            </div>
            <div class="container my-5">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="card card  p-4 text-center  rounded-4">
                            <img src="success_image.jpg" alt="Success Image" class="img-fluid"
                                style="width: 150px; height: 150px;">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h2 class="text-primary">Australia VISA Success</h2>
                        <blockquote class="blockquote quote-block">
                            “Setting goals is the first step in turning the invisible into the visible.”
                        </blockquote>
                        <p class="mt-4">Congratulations on your visa grant! We're delighted to announce that
                            <strong>Ayushma Sharma</strong> has successfully received their student visa for Australia.
                        </p>
                        <ul class="list-unstyled details-list">
                            <li><strong>University/Institution:</strong> Kaplan Business School</li>
                            <li><strong>Course:</strong> Bachelor of Arts</li>
                            <li><strong>Location:</strong> Australia</li>
                            <li><strong>Visa Received:</strong> March 2023</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container mt-5">
        <h2 class="text-center text-primary">Other Success Stories</h2>
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
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
