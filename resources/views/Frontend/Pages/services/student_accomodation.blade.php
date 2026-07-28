@extends('Frontend.includes.main')
@section('content')  
<section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <h1 class="display-4 fw-bold text-danger animate-section-item">Student Accomodation</h1>
        </div>
    </section>

<div class="container py-4 my-4">
    <div class="row gy-4">
    <div class="col-md-6 col-lg-4 d-flex justify-content-center animate-section-item">
        <div style="
            text-align: center; 
            max-width: 300px; 
            padding: 40px 20px; 
            border: 1px solid #ddd; 
            border-radius: 15px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
            background-color: #fff;">
            <div style="margin-bottom: 20px;">
                <i class="fas fa-home" style="font-size: 50px; color: #2c3e50;"></i>
            </div>
            <h3 style="font-size: 1.5rem; font-weight: 600; color: #2c3e50; margin-bottom: 15px;">
                Right Place, Right Price
            </h3>
            <p style="font-size: 1rem; color: #7f8c8d; line-height: 1.6;">
                We help you find the exact accommodation to fit your needs. <br>
                Choose from lots of quality accommodations.
            </p>
        </div>
    </div>


    <div class="col-md-6 col-lg-4 d-flex justify-content-center animate-section-item">
        <div style="
            text-align: center; 
            max-width: 300px; 
            padding: 40px 20px; 
            border: 1px solid #ddd; 
            border-radius: 15px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
            background-color: #fff;">
            <div style="margin-bottom: 20px;">
                <i class="fas fa-home" style="font-size: 50px; color: #2c3e50;"></i>
            </div>
            <h3 style="font-size: 1.5rem; font-weight: 600; color: #2c3e50; margin-bottom: 15px;">
                Right Place, Right Price
            </h3>
            <p style="font-size: 1rem; color: #7f8c8d; line-height: 1.6;">
                We help you find the exact accommodation to fit your needs. <br>
                Choose from lots of quality accommodations.
            </p>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 d-flex justify-content-center animate-section-item">
        <div style="
            text-align: center; 
            max-width: 300px; 
            padding: 40px 20px; 
            border: 1px solid #ddd; 
            border-radius: 15px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
            background-color: #fff;">
            <div style="margin-bottom: 20px;">
                <i class="fas fa-home" style="font-size: 50px; color: #2c3e50;"></i>
            </div>
            <h3 style="font-size: 1.5rem; font-weight: 600; color: #2c3e50; margin-bottom: 15px;">
                Right Place, Right Price
            </h3>
            <p style="font-size: 1rem; color: #7f8c8d; line-height: 1.6;">
                We help you find the exact accommodation to fit your needs. <br>
                Choose from lots of quality accommodations.
            </p>
        </div>
    </div>
    </div>
</div>

<div class="container py-4 my-4">
    <div class="row align-items-center animate-section-item">
        <div class="col-md-7">
            <h3 style="color: #000; font-size: 24px; font-weight: bold; margin-bottom: 15px;">
                Study Abroad Scholarships
            </h3>
            <p style="font-size: 16px; line-height: 1.6; color: #333; margin-bottom: 20px;">
                Any hesitation about studying abroad is typically related to the cost. However, what most students don’t know is that they can actually apply their current on-campus financial aid package to their study abroad trip in addition to scholarships. In fact, for some students, particularly those who pay out-of-state tuition, studying abroad can sometimes be cheaper than a traditional on-campus semester.
            </p>
            <a href="#" class="btn" style="border: 2px solid navy; color: navy; background-color: transparent; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-size: 16px; display: inline-flex; align-items: center; justify-content: center; transition: 0.3s;">
                Book Your Stay Now <span style="margin-left: 5px;">&#8594;</span>
            </a>
        </div>

        <div class="col-md-5 text-center">
            <img src="{{ asset('images/scholarship.jpg') }}" alt="Study Abroad Scholarships" style="max-width: 100%; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        </div>
        
        <hr style="border: 0; border-top: 1px solid #ccc; margin-top: 40px; margin-bottom: 40px;">
    </div>


    <div class="row align-items-center animate-section-item">
        <div class="col-md-7">
            <h3 style="color: #000; font-size: 24px; font-weight: bold; margin-bottom: 15px;">
                Study Abroad Scholarships
            </h3>
            <p style="font-size: 16px; line-height: 1.6; color: #333; margin-bottom: 20px;">
                Any hesitation about studying abroad is typically related to the cost. However, what most students don’t know is that they can actually apply their current on-campus financial aid package to their study abroad trip in addition to scholarships. In fact, for some students, particularly those who pay out-of-state tuition, studying abroad can sometimes be cheaper than a traditional on-campus semester.
            </p>
            <a href="#" class="btn" style="border: 2px solid navy; color: navy; background-color: transparent; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-size: 16px; display: inline-flex; align-items: center; justify-content: center; transition: 0.3s;">
                Book Your Stay Now <span style="margin-left: 5px;">&#8594;</span>
            </a>
        </div>

        <div class="col-md-5 text-center">
            <img src="{{ asset('images/scholarship.jpg') }}" alt="Study Abroad Scholarships" style="max-width: 100%; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        </div>

        <hr style="border: 0; border-top: 1px solid #ccc; margin-top: 40px; margin-bottom: 40px;">
    </div>
 
</div>
<script src="{{ asset('dist/js/frontend.js') }}"></script>
@endsection