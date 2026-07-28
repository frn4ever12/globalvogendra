@extends('Frontend.includes.main')
@section('content')
    <!-- Header Section -->
    <section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <h1 class="display-4 fw-bold text-danger animate-section-item">Test Preparation</h1>
            <h6 class=" py-4 text-secondary animate-section-item">     It is a test of English Language proficiency. It is jointly managed by the University of Cambridge ESOL Examinations, the British Council, and IDP Education Australia. There are two versions of the pte: The Academic Version and the General Version.
            </h6>
        </div>
    </section>

    <!-- Overview Section -->
    <div class="container overview-section my-4">
        <div class="row g-4">
            <!-- Left Content (sat + SAT Overview) -->
            <div class="col-md-8">
                <!-- sat Overview -->
                <h1 style="font-weight: bold;">Overview</h1>
                <p>
                    sat stands for “International English Language Testing System.” The Academic Version is intended for those who want to enroll in universities and other institutions of higher education and for professionals such as medical professionals and nurses who want to study or practice.
                </p>
                <p>
                    The General Training Version is intended for those planning to undertake non-academic training or employment for immigration purposes.
                </p>
                <p>
                    sat is accepted by almost all Australian, British, Canadian, Irish, New Zealand, and more than 1800 US academic institutions. It is the only acceptable English test for immigration to Australia and also accepted by the UK and Canada.
                </p>
    
                <!-- SAT Overview -->
                <div class="sat-section p-4 mt-4" style="background-color: #ffffff;">
                    <h2 style="font-weight: bold; margin-bottom: 1rem;">SAT consist of the general SAT Reasoning Test and SAT subject Test.</h2>
                    <h4 style="font-weight: bold; margin-bottom: 0.5rem;">SAT Reasoning Test</h4>
                    <p style="line-height: 1.6; color: #333;">
                        The SAT Reasoning Test is three hours and 45 minutes long and measures skills in three areas: critical reading, math, and writing. Although most questions are multiple choice, students are also required to write a 25-minute essay. The SAT assesses the critical thinking skills students need for academic success in college – skills that students learned in high school.
                    </p>
                    <p style="line-height: 1.6; color: #333;">
                        The SAT is typically taken by high school juniors and seniors. It tells students how well they use the skills and knowledge they have attained in and outside of the classroom – including how they think, solve problems, and communicate. The SAT is an important resource for colleges. It’s also one of the best predictors of how well students will do in college.
                    </p>
                    <h4 style="font-weight: bold; margin-bottom: 0.5rem;">SAT Subject Test</h4>
                    <p style="line-height: 1.6; color: #333;">
                        The SAT Subject Tests are one-hour, mostly multiple-choice tests in specific subjects. These tests measure knowledge of particular subjects and the ability to apply that knowledge. Students take the Subject Tests to demonstrate to colleges their mastery of specific subjects like English, history, mathematics, science, and language. Many colleges use the Subject Tests for admission, for course placement, and to advise students about course selection.
                    </p>
                </div>
            </div>
    
            <!-- Right Content (Enroll Section) -->
            <div class="col-md-4">
                <div class="card p-3 mb-4" style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
                    <h2 class="text-center" style="font-weight: bold;">Sat Course</h2>
                    <h1 class="text-danger text-center fs-4 fw-bold mt-3">NPR 12,000</h1>
                    <p>Per Session</p>
                    <ul style="list-style: none;padding:0;">
                        <li class="my-2"><i class="fas fa-check-circle text-success"></i> Complete Classes – 6 weeks</li>
                        <li class="my-2"><i class="fas fa-check-circle text-success"></i> Free Practice Materials</li>
                        <li class="my-2"><i class="fas fa-check-circle text-success"></i> Full Teaching Support</li>
                    </ul>
                    <button class="btn btn-danger w-100">Book Now</button>
                </div>
    
                <div class="enroll-section" style="background-color: #fff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 2rem;">
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
                            <label for="course">Select Your Course *</label>
                            <input type="text" id="course" class="form-control my-2" placeholder="Enter Course">
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Enroll Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    

@endsection
