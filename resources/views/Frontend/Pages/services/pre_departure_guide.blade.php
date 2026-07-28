@extends('Frontend.includes.main')
@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Left Section (Description) -->
        <div class="col-md-8">
            <div class="description-section p-4">
                <h2>About Our Courses</h2>
                <p>
                    Welcome to our comprehensive course platform, where we provide top-notch training tailored to your goals. 
                    Learn from industry experts and enhance your skills in a supportive environment. 
                    Choose from a variety of courses designed to fit your learning pace and style.
                </p>
                <p>
                    Our mission is to help you achieve your full potential. 
                    Whether you're starting fresh or looking to upskill, we have the resources and guidance you need. 
                    Join us today and take the first step toward a brighter future!
                </p>
            </div>
        </div>

        <!-- Right Section (Enroll Now) -->
        <div class="col-md-4 d-flex align-items-center my-5">
            <div class="enroll-section p-4 mx-auto" style="background-color: #ffffff; border: 1px solid #ddd; border-radius: 8px; width: 100%;">
                <h3 class="text-center mb-4">Enroll Now</h3>
                <form>
                    <div class="form-group mb-3">
                        <label for="name">Your Name *</label>
                        <input type="text" id="name" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Your Email *</label>
                        <input type="email" id="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="mobile">Contact Number *</label>
                        <input type="text" id="mobile" class="form-control" placeholder="Enter Mobile Number">
                    </div>
                    <div class="form-group mb-4">
                        <label for="course">Select Your Course *</label>
                        <input type="text" id="course" class="form-control" placeholder="Enter Course">
                    </div>
                    <button type="submit" class="btn btn-danger w-100">Enroll Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
