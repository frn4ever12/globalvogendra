@extends('Frontend.includes.main')
@section('content')  
<section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <h1 class="display-4 fw-bold text-danger animate-section-item">Scholarship</h1>
        </div>
    </section>

<div class="container py-4 my-4  animate-section">
    <div class="row">
        <div class="col-12">
            <h3 style="color: #000; font-size: 24px; font-weight: bold; margin-bottom: 15px;">
                Study Abroad Scholarships
            </h3>
            <p style="font-size: 16px; line-height: 1.6; color: #333; margin-bottom: 20px;">
                Any hesitation about studying abroad is typically related to the cost. However, what most students don’t know is that they can actually apply their current on-campus financial aid package to their study abroad trip in addition to scholarships. In fact, for some students, particularly those who pay out-of-state tuition, studying abroad can sometimes be cheaper than a traditional on-campus semester.
            </p>
            <p style="font-size: 16px; line-height: 1.6; color: #333;">
                A study abroad scholarship is a monetary award for students to use toward the expenses of their program such as travel, course credits, books, and lodging. Students must apply for scholarships and some can be very competitive while others are underutilized. There are several types of study abroad scholarships to apply for, such as:
            </p>

            <h3 style="color: #000; font-size: 24px; font-weight: bold; margin-bottom: 15px;">
                Merit-based
            </h3>
            <p style="font-size: 16px; line-height: 1.6; color: #333; margin-bottom: 20px;">
                These awards are based on a student’s academic, artistic, athletic, or other abilities, and often factor in an applicant’s extracurricular activities and community service record. It’s important to note that qualifications will vary based on the particular scholarship.
            </p>

            <h3 style="color: #000; font-size: 24px; font-weight: bold; margin-bottom: 15px;">
                Student Specific:
            </h3>
            <p style="font-size: 16px; line-height: 1.6; color: #333; margin-bottom: 20px;">
                These are scholarships for applicants who initially qualify based on factors such as gender, race, religion, family and medical history, or many other student-specific factors. Minority scholarships are the most common awards in this category, but qualifications will vary based on the particular scholarship.
            </p>

            <h3 style="color: #000; font-size: 24px; font-weight: bold; margin-bottom: 15px;">
                Destination Specific:
            </h3>
            <p style="font-size: 16px; line-height: 1.6; color: #333; margin-bottom: 20px;">
                These are scholarships awarded by a country to students planning to pursue a study abroad program in that particular country. They are awarded as an incentive to study in that country instead of elsewhere. Check with government-sponsored travel websites of the country where you wish to study to see what scholarships are available.
            </p>
        </div>

        <div class="col-12  animate-section-item" style="padding: 20px; text-align: center;">
            <button id="toggle-button" 
                style="background-color: rgb(22, 61, 146); color: white; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer; font-size: 14px;">
                Other Scholarships
            </button>
        </div>

        <div id="other-services-section" 
            style="background: #f9fbff; padding: 20px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); display: none;" class="col-12">
            <h3 style="color: #000; font-size: 20px; font-weight: bold;">Other <span style="color: #1e90ff;">Scholarships</span></h3>
            <ul style="list-style: none; padding: 0; margin: 20px 0;">
                <li style="margin-bottom: 10px;">
                    <i class="fas fa-chevron-right" style="color: #1e90ff; margin-right: 8px;"></i>
                    <a href="#" style="text-decoration: none; color: #1e90ff;">SOP Bank</a>
                </li>
                <li style="margin-bottom: 10px;">
                    <i class="fas fa-chevron-right" style="color: #1e90ff; margin-right: 8px;"></i>
                    <a href="#" style="text-decoration: none; color: #1e90ff;">Counseling at Your Tips</a>
                </li>
                <li style="margin-bottom: 10px;">
                    <i class="fas fa-chevron-right" style="color: #1e90ff; margin-right: 8px;"></i>
                    <a href="#" style="text-decoration: none; color: #1e90ff;">Newsletter</a>
                </li>
                <li style="margin-bottom: 10px;">
                    <i class="fas fa-chevron-right" style="color: #1e90ff; margin-right: 8px;"></i>
                    <a href="#" style="text-decoration: none; color: #1e90ff;">Study Abroad FAQs</a>
                </li>
                <li style="margin-bottom: 10px;">
                    <i class="fas fa-chevron-right" style="color: #1e90ff; margin-right: 8px;"></i>
                    <a href="#" style="text-decoration: none; color: #1e90ff;">Compare Destination</a>
                </li>
                <li style="margin-bottom: 10px;">
                    <i class="fas fa-chevron-right" style="color: #1e90ff; margin-right: 8px;"></i>
                    <a href="#" style="text-decoration: none; color: #1e90ff;">Scholarships</a>
                </li>
                <li style="margin-bottom: 10px;">
                    <i class="fas fa-chevron-right" style="color: #1e90ff; margin-right: 8px;"></i>
                    <a href="#" style="text-decoration: none; color: #1e90ff;">Agent Zone</a>
                </li>
                <li style="margin-bottom: 10px;">
                    <i class="fas fa-chevron-right" style="color: #1e90ff; margin-right: 8px;"></i>
                    <a href="#" style="text-decoration: none; color: #1e90ff;">Interview Preparation</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    document.getElementById('toggle-button').addEventListener('click', function () {
        const section = document.getElementById('other-services-section');
        if (section.style.display === 'none' || section.style.display === '') {
            section.style.display = 'block';
            this.textContent = 'Hide Other Scholarships'; 
        } else {
            section.style.display = 'none';
            this.textContent = 'Other Scholarships'; 
        }
    });
</script>
<script src="{{ asset('dist/js/frontend.js') }}"></script>
@endsection