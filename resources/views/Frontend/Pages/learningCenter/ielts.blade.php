@extends('Frontend.includes.main')
@section('content')
    <section class="header-section position-relative text-start p-5 animate-section"
    style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
    <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
    <div class="content position-relative z-2 col-md-7 py-5 px-4">
        <h1 class="display-4 fw-bold text-primary">IELTS</h1>
        <h1 class="display-4 fw-bold text-danger animate-section-item">Test Preparation</h1>
        <p>
            It is a test of English Language proficiency. It is jointly managed by the University of Cambridge ESOL Examinations, the British Council, and IDP Education Australia. There are two versions of the pte: The Academic Version and the General Version.
        </p>
    </div>
</section>
    <!-- Overview Section -->
    <div class="container my-4">
        <div class="row g-4">
            <!-- Left Content -->
            <div class="col-md-8">
                <h1 style="font-weight: bold;">Overview</h1>
                <p>
                    IELTS stands for “International English Language Testing System.” The Academic Version is intended for those who want to enroll in universities and other institutions of higher education and for professionals such as medical professionals and nurses who want to study or practice.
                </p>
                <p>
                    The General Training Version is intended for those planning to undertake non-academic training or employment for immigration purposes.
                </p>
                <p>
                    IELTS is accepted by almost all Australian, British, Canadian, Irish, New Zealand, and more than 1800 US academic institutions. It is the only acceptable English test for immigration to Australia and also accepted by the UK and Canada.
                </p>

                <!-- Types of IELTS -->
                <h4>Types of IELTS Exam</h4>
                <div class="row my-4">
                    <div class="col-md-4"> <!-- Reduced width to 4 (instead of 6) -->
                        <div class="p-4 border card" > <!-- Added the gradient background -->
                            <h5 class="text-primary mb-2">01</h5>
                            <h5>Ielts Academic Test</h5>
                        </div>
                    </div>           
                    <div class="col-md-4"> <!-- Reduced width to 4 (instead of 6) -->
                        <div class="p-4 border card" > <!-- Added the gradient background -->
                            <h5 class="text-primary mb-2">02</h5>
                            <h5>Ielts General Test</h5>
                        </div>
                    </div>
                    
                </div>
            </div>

            <!-- Right Content -->
            <div class="col-md-4">
                <div class="card p-3" style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
                    <h2 class="fw-bold text-center">IELTS Course</h2>
                    <p class="text-danger text-center fs-4 fw-bold mt-3">NPR 7,500</p>
                    <p>Per Session</p>
                    <ul style="list-style: none;padding:0;">
                        <li class="my-2"><i class="fas fa-check-circle text-success"></i> Complete Classes – 6 weeks</li>
                        <li class="my-2"><i class="fas fa-check-circle text-success"></i> Free Practice Materials</li>
                        <li class="my-2"><i class="fas fa-check-circle text-success"></i> Full Teaching Support</li>
                    </ul>
                    <button class="btn btn-danger w-100">Book Now</button>
                </div>
            </div>
        </div>
    </div>

 <!-- Test Duration Section -->
 <div class="container test-duration-section mt-5">
        <h2 style="font-weight: bold;">Total Test Duration: 2 hours 45 minutes</h2>
        <p>The first three modules – Listening, Reading, and Writing (always in that order) – are completed in one day with no break in between. The Speaking Module may be taken at the discretion of the test center.</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Listening</th>
                    <th>Reading</th>
                    <th>Writing</th>
                    <th>Speaking</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>30 Minutes</td>
                    <td>60 Minutes</td>
                    <td>60 Minutes</td>
                    <td>11-14 Minutes</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Band Scale Section -->
    <div class="container mt-5">
        <div class="row">
            <!-- Band Scale Table Section (Left Side) - Wider Table -->
            <div class="col-md-8">
                <h2 style="font-weight: bold;">IELTS Band Scale</h2>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Band Score</th>
                            <th>Level of Proficiency</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>9</td>
                            <td>Expert User</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Very Good User</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Good User</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Competent User</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Modest User</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Limited User</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Intermittent User</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Non User</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Didnot attempt test</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    
            <!-- Enroll Section (Right Side) - Long and Less Wide -->
            <div class="col-md-4">
                <div class="card p-3"> <!-- Fixed Height for Enroll Section -->
                    <h3 class="text-center">Enroll Now</h3>
                    <form>
                        <div class="form-group my-2">
                            <label for="name">Your Name *</label>
                            <input type="text" id="name" class="form-control my-2" placeholder="Enter your name">
                        </div>
                        <div class="form-group my-2">
                            <label for="email">Your Email *</label>
                            <input type="email" id="email" class="form-control my-2" placeholder="Enter your email">
                        </div>
                        <div class="form-group my-2">
                            <label for="mobile">Contact Number *</label>
                            <input type="text" id="mobile" class="form-control my-2" placeholder="Enter Mobile Number">
                        </div>
                        <div class="form-group my-2">
                            <label for="mobile">Select Your Course *</label>
                            <input type="text" id="course" class="form-control my-2" placeholder="Enter Course">
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Enroll Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
@endsection
