@extends('Frontend.includes.main')
@section('head')
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounceIn {
            from {
                opacity: 0;
                transform: scale(0.3);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @media (max-width: 1024px) {
            .content-wrapper {
                flex-direction: column;
                align-items: center;
            }

            .text-content,
            .cards {
                max-width: 100%;
                text-align: center;
            }

            .text-content {
                margin-bottom: 20px;
            }

            .cards {
                flex-direction: row;
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .custom-padding {
                padding: 3rem;
            }

            .swiper-slide img {
                height: 200px;
            }
        }

        @media (max-width: 480px) {
            section.header-section {
                padding: 60px 10px;
            }

            .custom-padding {
                padding: 2rem;
            }

            section.header-section .content h1 {
                font-size: 32px;
            }

            section.header-section .content p {
                font-size: 16px;
            }
        }

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

        .slide-title {
            position: absolute;
            bottom: 10%;
            left: 10%;
            font-size: 2rem;
            font-weight: bold;
            color: #fff;
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
        <div class="content position-relative z-2 col-md-7 py-5">
            <h1 class="display-4 fw-bold text-danger animate-section-item">Universities</h1>
        </div>
    </section>
    <section class="container" style="border-bottom: 1px solid rgb(222, 222, 222);">
        <div class="m-0 my-4 row align-items-center">
            <div class=" col-6">
                <div>
                    <h2 style="color:rgb(6, 96, 121);font-weight:bold;">We Represent
                        <span style="color:rgb(6, 121, 56);font-weight:bold;"> Following College and University in <span
                                style="color: red">{{ $country->name }}</span></span>
                    </h2>
                </div>
            </div>
            <div class=" col-6">
                @include('Frontend.includes.banner-slider')
            </div>
        </div>
    </section>
    @include('Frontend.includes.university-slider', ['universities' => $universities])
@endsection
