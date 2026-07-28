@extends('Frontend.includes.main')

@section('content')
@if($level)
<!-- Hero Section -->
<section class="german-level-hero" style="background: linear-gradient(135deg, #2563eb 0%, #16a34a 100%); padding: 80px 0; position: relative; overflow: hidden;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); opacity: 0.5;"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <span style="background: rgba(255,255,255,0.2); color: white; padding: 8px 20px; border-radius: 30px; font-size: 14px; font-weight: 600;">
                    {{ $level->level_code }} Level
                </span>
                <h1 style="color: white; font-size: 3.5rem; font-weight: 800; margin: 20px 0;">
                    {{ $level->title }}
                </h1>
                <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem; margin-bottom: 30px;">
                    {{ $level->short_description }}
                </p>
                <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                    @if($level->button_text && $level->button_link)
                    <a href="{{ $level->button_link }}" style="background: white; color: #2563eb; padding: 15px 35px; border-radius: 30px; font-weight: 700; text-decoration: none; transition: all 0.3s ease;">
                        {{ $level->button_text }}
                    </a>
                    @endif
                    <a href="#curriculum" style="background: rgba(255,255,255,0.2); color: white; padding: 15px 35px; border-radius: 30px; font-weight: 700; text-decoration: none; transition: all 0.3s ease;">
                        View Curriculum
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                @if($level->image)
                    <img src="{{ asset('storage/' . $level->image) }}" class="img-fluid rounded-4 shadow-lg" alt="{{ $level->title }}" style="max-height: 400px; object-fit: cover;">
                @elseif($level->icon)
                    <div style="background: rgba(255,255,255,0.2); width: 300px; height: 300px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                        <i class="fa fa-{{ $level->icon }} fa-8x" style="color: white;"></i>
                    </div>
                @else
                    <div style="background: rgba(255,255,255,0.2); width: 300px; height: 300px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                        <i class="fa fa-language fa-8x" style="color: white;"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Course Overview -->
<section class="py-5" style="background: #f8fafc;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 style="color: #2563eb; font-size: 2.5rem; font-weight: 700; margin-bottom: 30px;">Course Overview</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                                <div style="background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%); width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-clock" style="color: #16a34a; font-size: 1.2rem;"></i>
                                </div>
                                <div>
                                    <h4 style="margin: 0; color: #1e293b;">Duration</h4>
                                    <p style="margin: 0; color: #64748b;">{{ $level->duration }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                                <div style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-laptop" style="color: #2563eb; font-size: 1.2rem;"></i>
                                </div>
                                <div>
                                    <h4 style="margin: 0; color: #1e293b;">Class Type</h4>
                                    <p style="margin: 0; color: #64748b;">{{ $level->class_type }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                                <div style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-calendar" style="color: #d97706; font-size: 1.2rem;"></i>
                                </div>
                                <div>
                                    <h4 style="margin: 0; color: #1e293b;">Schedule</h4>
                                    <p style="margin: 0; color: #64748b;">{{ $level->class_schedule }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                                <div style="background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-certificate" style="color: #ef4444; font-size: 1.2rem;"></i>
                                </div>
                                <div>
                                    <h4 style="margin: 0; color: #1e293b;">Certificate</h4>
                                    <p style="margin: 0; color: #64748b;">{{ $level->certificate ? 'Available' : 'Not Available' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div style="background: linear-gradient(135deg, #2563eb 0%, #16a34a 100%); padding: 40px; border-radius: 20px; color: white; position: relative; overflow: hidden;">
                    <h3 style="font-size: 1.5rem; margin-bottom: 20px;">Course Fee</h3>
                    <h2 style="font-size: 3rem; font-weight: 800; margin-bottom: 10px;">{{ $level->course_fee }}</h2>
                    <p style="margin-bottom: 30px; opacity: 0.9;">All-inclusive pricing</p>
                    @if($level->button_text && $level->button_link)
                    <a href="{{ $level->button_link }}" style="background: white; color: #2563eb; padding: 15px 35px; border-radius: 30px; font-weight: 700; text-decoration: none; display: inline-block; margin-bottom: 15px;">
                        {{ $level->button_text }}
                    </a>
                    @endif
                    <div style="margin-top: 20px;">
                        <p style="margin: 5px 0;"><i class="fa fa-check-circle"></i> Expert Instructors</p>
                        <p style="margin: 5px 0;"><i class="fa fa-check-circle"></i> Study Materials</p>
                        <p style="margin: 5px 0;"><i class="fa fa-check-circle"></i> Mock Tests</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Curriculum Section -->
<section id="curriculum" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span style="color: #16a34a; font-weight: 700; letter-spacing: 2px; font-size: 14px; text-transform: uppercase;">CURRICULUM</span>
            <h2 style="color: #2563eb; font-size: 2.5rem; font-weight: 700; margin-top: 15px;">Course Curriculum</h2>
        </div>
        
        @if($level->curricula && $level->curricula->count() > 0)
        <div class="row g-4">
            @foreach($level->curricula as $index => $curriculum)
            <div class="col-md-6">
                <div style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); border-left: 4px solid #2563eb;">
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                        <div style="background: linear-gradient(135deg, #2563eb 0%, #16a34a 100%); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700;">
                            {{ $index + 1 }}
                        </div>
                        <h4 style="margin: 0; color: #1e293b;">{{ $curriculum->title }}</h4>
                    </div>
                    @if($curriculum->description)
                    <p style="color: #64748b; margin: 0;">{{ $curriculum->description }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <p style="color: #64748b;">Curriculum details coming soon.</p>
        </div>
        @endif
    </div>
</section>

<!-- Benefits Section -->
<section class="py-5" style="background: #f8fafc;">
    <div class="container">
        <div class="text-center mb-5">
            <span style="color: #16a34a; font-weight: 700; letter-spacing: 2px; font-size: 14px; text-transform: uppercase;">BENEFITS</span>
            <h2 style="color: #2563eb; font-size: 2.5rem; font-weight: 700; margin-top: 15px;">Why Choose This Course?</h2>
        </div>
        
        @if($level->benefits && $level->benefits->count() > 0)
        <div class="row g-4">
            @foreach($level->benefits as $benefit)
            <div class="col-md-4">
                <div style="background: white; padding: 40px 30px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); text-align: center; transition: all 0.3s ease;">
                    @if($benefit->icon)
                    <div style="background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                        <i class="fa fa-{{ $benefit->icon }} fa-2x" style="color: #16a34a;"></i>
                    </div>
                    @endif
                    <h4 style="color: #1e293b; margin-bottom: 15px;">{{ $benefit->title }}</h4>
                    @if($benefit->description)
                    <p style="color: #64748b; margin: 0;">{{ $benefit->description }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="row g-4">
            <div class="col-md-4">
                <div style="background: white; padding: 40px 30px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); text-align: center;">
                    <div style="background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                        <i class="fa fa-graduation-cap fa-2x" style="color: #16a34a;"></i>
                    </div>
                    <h4 style="color: #1e293b; margin-bottom: 15px;">Study in Germany</h4>
                    <p style="color: #64748b; margin: 0;">Prepare for university admission and student visa requirements.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div style="background: white; padding: 40px 30px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); text-align: center;">
                    <div style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                        <i class="fa fa-briefcase fa-2x" style="color: #2563eb;"></i>
                    </div>
                    <h4 style="color: #1e293b; margin-bottom: 15px;">Job Opportunities</h4>
                    <p style="color: #64748b; margin: 0;">Enhance career prospects with German language skills.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div style="background: white; padding: 40px 30px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); text-align: center;">
                    <div style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                        <i class="fa fa-comments fa-2x" style="color: #d97706;"></i>
                    </div>
                    <h4 style="color: #1e293b; margin-bottom: 15px;">Daily Communication</h4>
                    <p style="color: #64748b; margin: 0;">Communicate effectively in German-speaking countries.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span style="color: #16a34a; font-weight: 700; letter-spacing: 2px; font-size: 14px; text-transform: uppercase;">FAQ</span>
            <h2 style="color: #2563eb; font-size: 2.5rem; font-weight: 700; margin-top: 15px;">Frequently Asked Questions</h2>
        </div>
        
        @if($level->faqs && $level->faqs->count() > 0)
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    @foreach($level->faqs as $index => $faq)
                    <div class="accordion-item" style="border: none; margin-bottom: 15px; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" style="background: white; color: #1e293b; font-weight: 600;">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background: #f8fafc; color: #64748b;">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-5">
            <p style="color: #64748b;">FAQs coming soon.</p>
        </div>
        @endif
    </div>
</section>

<!-- Related Levels -->
@if($relatedLevels && $relatedLevels->count() > 0)
<section class="py-5" style="background: #f8fafc;">
    <div class="container">
        <div class="text-center mb-5">
            <span style="color: #16a34a; font-weight: 700; letter-spacing: 2px; font-size: 14px; text-transform: uppercase;">OTHER LEVELS</span>
            <h2 style="color: #2563eb; font-size: 2.5rem; font-weight: 700; margin-top: 15px;">Related German Levels</h2>
        </div>
        
        <div class="row g-4">
            @foreach($relatedLevels as $relatedLevel)
            <div class="col-md-4">
                <div style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); text-align: center; transition: all 0.3s ease;">
                    <div style="background: linear-gradient(135deg, #2563eb 0%, #16a34a 100%); color: white; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 1.5rem; font-weight: 800;">
                        {{ $relatedLevel->level_code }}
                    </div>
                    <h4 style="color: #1e293b; margin-bottom: 10px;">{{ $relatedLevel->title }}</h4>
                    <p style="color: #64748b; margin-bottom: 20px;">{{ Str::limit($relatedLevel->short_description, 80) }}</p>
                    <a href="{{ route('german-level.show', $relatedLevel->level_code) }}" style="background: linear-gradient(135deg, #2563eb 0%, #16a34a 100%); color: white; padding: 10px 25px; border-radius: 20px; text-decoration: none; font-weight: 600;">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endif
@endsection
