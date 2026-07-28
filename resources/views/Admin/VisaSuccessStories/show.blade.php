@extends('Admin.includes.main')
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 1.5rem;">
    <h3>Story Details</h3>
    <div>
        <a href="{{ route('admin.visa-success-story.index') }}" class="btn btn-danger">
            <i class="fa fa-arrow-left"></i>&nbsp; Back
        </a>
        <a href="{{ route('admin.visa-success-story.edit', $visaSuccessStory) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i>&nbsp; Edit
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                @if($visaSuccessStory->student_image)
                    <img src="{{ asset('storage/' . $visaSuccessStory->student_image) }}" class="img-fluid rounded-circle mb-3" alt="{{ $visaSuccessStory->student_name }}" style="width: 150px; height: 150px; object-fit: cover;">
                @else
                    <div class="bg-light p-5 rounded-circle mb-3" style="width: 150px; height: 150px; margin: 0 auto; display: flex; align-items: center; justify-content: center;">
                        <i class="fa fa-user fa-4x text-muted"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-9">
                <div class="mb-3">
                    <span class="badge bg-primary">{{ $visaSuccessStory->country }}</span>
                    <span class="badge {{ $visaSuccessStory->status ? 'bg-success' : 'bg-danger' }}">
                        {{ $visaSuccessStory->status ? 'Active' : 'Inactive' }}
                    </span>
                </div>
                <h4 class="mb-3">{{ $visaSuccessStory->student_name }}</h4>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>University:</strong> {{ $visaSuccessStory->university }}
                    </div>
                    <div class="col-md-4">
                        <strong>Course:</strong> {{ $visaSuccessStory->course }}
                    </div>
                    <div class="col-md-4">
                        <strong>Intake:</strong> {{ $visaSuccessStory->intake }}
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>City:</strong> {{ $visaSuccessStory->city }}
                    </div>
                    <div class="col-md-4">
                        <strong>Visa Date:</strong> {{ $visaSuccessStory->visa_date ? $visaSuccessStory->visa_date->format('M d, Y') : 'N/A' }}
                    </div>
                    <div class="col-md-4">
                        <strong>Visa Type:</strong> {{ $visaSuccessStory->visa_type }}
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Rating:</strong>
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $visaSuccessStory->rating)
                                <i class="fa fa-star text-warning"></i>
                            @else
                                <i class="fa fa-star-o text-muted"></i>
                            @endif
                        @endfor
                    </div>
                    <div class="col-md-4">
                        <strong>Display Order:</strong> {{ $visaSuccessStory->display_order }}
                    </div>
                </div>
                
                @if($visaSuccessStory->testimonial)
                <div class="mb-3">
                    <strong>Testimonial:</strong>
                    <p class="mt-2">{{ $visaSuccessStory->testimonial }}</p>
                </div>
                @endif
                
                @if($visaSuccessStory->video_url)
                <div class="mb-3">
                    <strong>Video URL:</strong>
                    <a href="{{ $visaSuccessStory->video_url }}" target="_blank" class="btn btn-sm btn-info">
                        <i class="fa fa-play"></i> Watch Video
                    </a>
                </div>
                @endif
            </div>
        </div>
        
        @if($visaSuccessStory->visa_image || $visaSuccessStory->passport_image)
        <hr>
        <h5 class="mb-3">Documents</h5>
        <div class="row">
            @if($visaSuccessStory->visa_image)
            <div class="col-md-6 mb-3">
                <strong>Visa Image:</strong>
                <img src="{{ asset('storage/' . $visaSuccessStory->visa_image) }}" class="img-fluid rounded mt-2" alt="Visa" style="max-height: 200px;">
            </div>
            @endif
            @if($visaSuccessStory->passport_image)
            <div class="col-md-6 mb-3">
                <strong>Passport Image:</strong>
                <img src="{{ asset('storage/' . $visaSuccessStory->passport_image) }}" class="img-fluid rounded mt-2" alt="Passport" style="max-height: 200px;">
            </div>
            @endif
        </div>
        @endif
    </div>
</div>
@endsection
