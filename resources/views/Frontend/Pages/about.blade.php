@extends('Frontend.includes.main')
@section('content')
    <!-- About Us Section -->
    <section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <h1 class="display-4 fw-bold text-danger animate-section-item">About Us</h1>
        </div>
    </section>

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                {!! $about->description !!}
            </div>
        </div>
    </div>

    <!-- Team Section with Images -->
    <div class="container py-5">
        <h2 class="text-center mb-5">Meet Our Team</h2>
        <div class="row text-center">
            @foreach (\App\Models\Team::take(3)->get() as $data)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $data->photo) }}" class="card-img-top" alt="{{ $data->member_name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->member_name }}</h5>
                            <p class="card-text">{{ $data->member_position }}</p>
                            <p class="text-muted">{{ Illuminate\Support\Str::words($data->short_description, 100) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
