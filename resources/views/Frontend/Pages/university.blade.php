@extends('Frontend.includes.main')
@section('head')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
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
    .slide-title{
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
    .swiper-button-next::after, .swiper-button-prev::after {
        font-size: 1.6rem;
    }

    .swiper-button-prev {
        left: 10px;
    }

    .swiper-pagination-bullet {
        background: #fff;
    }
.bubble-container {
    padding: 20px; 
    border-radius: 25px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center; 
    width: fit-content; 
    margin: 20px auto; 
}

.bubble-title {
    font-size: 2rem; 
    font-weight: bold; 
    color: #333;
    margin-bottom: 15px;
    text-transform: uppercase; 
}

.bubble-subtitle {
    font-size: 1.5rem; 
    color: #555;
    font-style: italic; 
    margin: 0;
}
.bubble-container:hover {
    background-color: #ffe066; 
    transform: scale(1.05);
    transition: all 0.3s ease-in-out; 
}

</style>
@endsection
@section('content')
<section style="width: 100%; position: relative; background-image: url('{{ asset('dist/img/background.png')  }}'); background-size: cover; background-position: center; border-bottom: 1px solid rgb(222, 222, 222);">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>

    <div class="row align-items-center" style="position: relative; padding: 100px; z-index: 1; text-align: center;">
        <div>
            <h1 style="color: #fff; font-weight: bold;">Universities</h1>
            <p style="color:#fff">
               
            </p>
        </div>
    </div>
</section>

<section class="container" style="border-bottom: 1px solid rgb(222, 222, 222);">
    <div class="m-0 my-4 row align-items-center">
        <div class="col-sm-12 col-md-6 animate-section">
            <div>
                <h2 style="color:rgb(6, 96, 121);font-weight:bold;">We Provide</h2>
                <h1 style="color:rgb(6, 121, 56);font-weight:bold;">Top Universities <br> <span style="color: red">Accross the world</span></h1>
            </div>
        </div>
        <div class=" col-sm-12 col-md-6 ">
                @include('Frontend.includes.banner-slider')
        </div>
    </div>
</section>

@include('Frontend.includes.country-slider')
</section>
<!-- Appointment Section -->
<section style="width: 100%; position: relative; background-image: url('{{ asset('dist/img/cover2.jpg')  }}'); background-size: cover; background-position: center; border-bottom: 1px solid rgb(222, 222, 222);">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="bubble-container">
                <h1 class="bubble-title">Get to know us better</h1>
                <h3 class="bubble-subtitle">Make an Appointment Now!</h3>
            </div>            

            <div class="col-md-6 bg-white p-5 rounded border">
                @include('Frontend.includes.contact')
            </div>
        </div>
    </div>
</section>
@endsection