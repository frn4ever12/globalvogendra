@extends('Admin.includes.main')
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 1.5rem;">
    <h3>Level Details</h3>
    <div>
        <a href="{{ route('admin.german-language-level.index') }}" class="btn btn-danger">
            <i class="fa fa-arrow-left"></i>&nbsp; Back
        </a>
        <a href="{{ route('admin.german-language-level.edit', $germanLanguageLevel) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i>&nbsp; Edit
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                @if($germanLanguageLevel->image)
                    <img src="{{ asset('storage/' . $germanLanguageLevel->image) }}" class="img-fluid rounded mb-3" alt="{{ $germanLanguageLevel->title }}">
                @elseif($germanLanguageLevel->icon)
                    <div class="bg-light p-5 rounded mb-3">
                        <i class="fa fa-{{ $germanLanguageLevel->icon }} fa-5x text-muted"></i>
                    </div>
                @else
                    <div class="bg-light p-5 rounded mb-3">
                        <i class="fa fa-image fa-5x text-muted"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-9">
                <div class="mb-3">
                    <span class="badge bg-primary">{{ $germanLanguageLevel->level_code }}</span>
                    <span class="badge {{ $germanLanguageLevel->status ? 'bg-success' : 'bg-danger' }}">
                        {{ $germanLanguageLevel->status ? 'Active' : 'Inactive' }}
                    </span>
                    @if($germanLanguageLevel->ribbon)
                        <span class="badge bg-warning">{{ $germanLanguageLevel->ribbon }}</span>
                    @endif
                    @if($germanLanguageLevel->animation)
                        <span class="badge bg-info">{{ $germanLanguageLevel->animation }}</span>
                    @endif
                </div>
                <h4 class="mb-3">{{ $germanLanguageLevel->title }}</h4>
                <p class="mb-3">{{ $germanLanguageLevel->short_description }}</p>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Level Name:</strong> {{ $germanLanguageLevel->level_name }}
                    </div>
                    <div class="col-md-4">
                        <strong>Duration:</strong> {{ $germanLanguageLevel->duration }}
                    </div>
                    <div class="col-md-4">
                        <strong>Class Type:</strong> {{ $germanLanguageLevel->class_type }}
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Schedule:</strong> {{ $germanLanguageLevel->class_schedule }}
                    </div>
                    <div class="col-md-4">
                        <strong>Course Fee:</strong> {{ $germanLanguageLevel->course_fee }}
                    </div>
                    <div class="col-md-4">
                        <strong>Exam:</strong> {{ $germanLanguageLevel->exam_name }}
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Students:</strong> {{ $germanLanguageLevel->students_count }}
                    </div>
                    <div class="col-md-4">
                        <strong>Certificate:</strong> {{ $germanLanguageLevel->certificate ? 'Yes' : 'No' }}
                    </div>
                    <div class="col-md-4">
                        <strong>Display Order:</strong> {{ $germanLanguageLevel->display_order }}
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Background Color:</strong>
                        <span class="d-inline-block" style="width: 20px; height: 20px; background-color: {{ $germanLanguageLevel->background_color }}; border: 1px solid #ccc;"></span>
                        {{ $germanLanguageLevel->background_color }}
                    </div>
                    <div class="col-md-4">
                        <strong>Text Color:</strong>
                        <span class="d-inline-block" style="width: 20px; height: 20px; background-color: {{ $germanLanguageLevel->text_color }}; border: 1px solid #ccc;"></span>
                        {{ $germanLanguageLevel->text_color }}
                    </div>
                </div>
                
                @if($germanLanguageLevel->button_text && $germanLanguageLevel->button_link)
                <div class="mb-3">
                    <strong>Button:</strong>
                    <a href="{{ $germanLanguageLevel->button_link }}" class="btn btn-sm btn-primary">{{ $germanLanguageLevel->button_text }}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
