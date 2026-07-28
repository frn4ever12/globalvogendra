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

        .swiper-slide {
            width: 33.33%;
            padding: 0 5px;
            position: relative;
        }

        .swiper-slide img {
            width: 100%;
            height: 400px;
            border-radius: 10px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #fff;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 1.5rem;
            border-radius: 50%;
        }

        .swiper-button-next {
            right: 10px;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 1.6rem;
        }

        .swiper-button-prev {
            left: 10px;
        }

        .swiper-pagination-bullet {
            background: #fff;
        }
    </style>
@endsection
@section('content')
    <section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <div>
                <h1 class="display-4 fw-bold text-danger animate-section-item">We Provide</h1>
                <h1 class="display-4 fw-bold text-primary animate-section-item">Top Universities <span
                        style="color: red">Accross the world</span></h1>
            </div>
    </section>

    @include('Frontend.includes.country-slider')
@endsection
