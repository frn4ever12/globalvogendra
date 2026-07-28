@extends('Admin.includes.main')
@section('head')
    <style>
        .image-preview {
            max-width: 200px;
            max-height: 200px;
            object-fit: cover;
            margin-top: 10px;
            border-radius: 8px;
        }
        .color-picker {
            width: 100px;
            height: 40px;
            padding: 2px;
        }
    </style>
@endsection
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 1.5rem;">
    <h3>Edit German Language Level</h3>
    <div>
        <a href="{{ route('admin.german-language-level.index') }}" class="btn btn-danger">
            <i class="fa fa-arrow-left"></i>&nbsp; Back
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.german-language-level.update', $germanLanguageLevel) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Basic Information -->
            <h5 class="mb-3">Basic Information</h5>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Level Code <span class="text-danger">*</span></label>
                    <select class="form-select" name="level_code" required>
                        <option value="">Select Level</option>
                        <option value="A1" {{ $germanLanguageLevel->level_code == 'A1' ? 'selected' : '' }}>A1</option>
                        <option value="A2" {{ $germanLanguageLevel->level_code == 'A2' ? 'selected' : '' }}>A2</option>
                        <option value="B1" {{ $germanLanguageLevel->level_code == 'B1' ? 'selected' : '' }}>B1</option>
                        <option value="B2" {{ $germanLanguageLevel->level_code == 'B2' ? 'selected' : '' }}>B2</option>
                        <option value="C1" {{ $germanLanguageLevel->level_code == 'C1' ? 'selected' : '' }}>C1</option>
                        <option value="C2" {{ $germanLanguageLevel->level_code == 'C2' ? 'selected' : '' }}>C2</option>
                    </select>
                    @error('level_code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Level Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="level_name" required value="{{ $germanLanguageLevel->level_name }}" placeholder="e.g., Beginner" />
                    @error('level_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Title <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="title" required value="{{ $germanLanguageLevel->title }}" placeholder="e.g., Beginner German" />
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">
                    <label>Short Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="short_description" rows="3" required placeholder="Enter short description">{{ $germanLanguageLevel->short_description }}</textarea>
                    @error('short_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <!-- Course Details -->
            <h5 class="mb-3">Course Details</h5>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Duration</label>
                    <input class="form-control" type="text" name="duration" value="{{ $germanLanguageLevel->duration }}" placeholder="e.g., 8 Weeks" />
                    @error('duration')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Class Type</label>
                    <select class="form-select" name="class_type">
                        <option value="">Select Type</option>
                        <option value="Online" {{ $germanLanguageLevel->class_type == 'Online' ? 'selected' : '' }}>Online</option>
                        <option value="Physical" {{ $germanLanguageLevel->class_type == 'Physical' ? 'selected' : '' }}>Physical</option>
                        <option value="Hybrid" {{ $germanLanguageLevel->class_type == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                    </select>
                    @error('class_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Class Schedule</label>
                    <select class="form-select" name="class_schedule">
                        <option value="">Select Schedule</option>
                        <option value="Morning" {{ $germanLanguageLevel->class_schedule == 'Morning' ? 'selected' : '' }}>Morning</option>
                        <option value="Day" {{ $germanLanguageLevel->class_schedule == 'Day' ? 'selected' : '' }}>Day</option>
                        <option value="Evening" {{ $germanLanguageLevel->class_schedule == 'Evening' ? 'selected' : '' }}>Evening</option>
                        <option value="Weekend" {{ $germanLanguageLevel->class_schedule == 'Weekend' ? 'selected' : '' }}>Weekend</option>
                    </select>
                    @error('class_schedule')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Course Fee</label>
                    <input class="form-control" type="text" name="course_fee" value="{{ $germanLanguageLevel->course_fee }}" placeholder="e.g., $500" />
                    @error('course_fee')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Exam Name</label>
                    <select class="form-select" name="exam_name">
                        <option value="">Select Exam</option>
                        <option value="Goethe" {{ $germanLanguageLevel->exam_name == 'Goethe' ? 'selected' : '' }}>Goethe</option>
                        <option value="TELC" {{ $germanLanguageLevel->exam_name == 'TELC' ? 'selected' : '' }}>TELC</option>
                        <option value="TestDaF" {{ $germanLanguageLevel->exam_name == 'TestDaF' ? 'selected' : '' }}>TestDaF</option>
                    </select>
                    @error('exam_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Students Completed</label>
                    <input type="number" class="form-control" name="students_count" value="{{ $germanLanguageLevel->students_count }}" />
                    @error('students_count')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="certificate" id="certificate" {{ $germanLanguageLevel->certificate ? 'checked' : '' }}>
                        <label class="form-check-label" for="certificate">Certificate Available</label>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Image or Icon -->
            <h5 class="mb-3">Image or Icon</h5>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Upload Image</label>
                    <input class="form-control" type="file" name="image" accept="image/*" id="levelImage" />
                    @if($germanLanguageLevel->image)
                        <img src="{{ asset('storage/' . $germanLanguageLevel->image) }}" class="image-preview" />
                    @endif
                    <img id="levelImagePreview" class="image-preview d-none" />
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Or Icon (Font Awesome)</label>
                    <input class="form-control" type="text" name="icon" value="{{ $germanLanguageLevel->icon }}" placeholder="e.g., fa fa-graduation-cap" />
                    <small class="text-muted">If no image uploaded, this icon will be displayed</small>
                    @error('icon')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <!-- Button Settings -->
            <h5 class="mb-3">Button Settings (Optional)</h5>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Button Text</label>
                    <input class="form-control" type="text" name="button_text" value="{{ $germanLanguageLevel->button_text }}" placeholder="e.g., Enroll Now" />
                    @error('button_text')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Button Link</label>
                    <input class="form-control" type="text" name="button_link" value="{{ $germanLanguageLevel->button_link }}" placeholder="https://..." />
                    @error('button_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <!-- Styling -->
            <h5 class="mb-3">Styling</h5>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 form-group mb-3">
                    <label>Background Color</label>
                    <input type="color" class="form-control color-picker" name="background_color" value="{{ $germanLanguageLevel->background_color }}" />
                    @error('background_color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 form-group mb-3">
                    <label>Text Color</label>
                    <input type="color" class="form-control color-picker" name="text_color" value="{{ $germanLanguageLevel->text_color }}" />
                    @error('text_color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 form-group mb-3">
                    <label>Animation Type</label>
                    <select class="form-select" name="animation">
                        <option value="fade-up" {{ $germanLanguageLevel->animation == 'fade-up' ? 'selected' : '' }}>Fade Up</option>
                        <option value="fade-down" {{ $germanLanguageLevel->animation == 'fade-down' ? 'selected' : '' }}>Fade Down</option>
                        <option value="fade-left" {{ $germanLanguageLevel->animation == 'fade-left' ? 'selected' : '' }}>Fade Left</option>
                        <option value="fade-right" {{ $germanLanguageLevel->animation == 'fade-right' ? 'selected' : '' }}>Fade Right</option>
                        <option value="zoom-in" {{ $germanLanguageLevel->animation == 'zoom-in' ? 'selected' : '' }}>Zoom In</option>
                        <option value="zoom-out" {{ $germanLanguageLevel->animation == 'zoom-out' ? 'selected' : '' }}>Zoom Out</option>
                        <option value="flip-left" {{ $germanLanguageLevel->animation == 'flip-left' ? 'selected' : '' }}>Flip Left</option>
                        <option value="flip-right" {{ $germanLanguageLevel->animation == 'flip-right' ? 'selected' : '' }}>Flip Right</option>
                        <option value="slide-up" {{ $germanLanguageLevel->animation == 'slide-up' ? 'selected' : '' }}>Slide Up</option>
                        <option value="slide-down" {{ $germanLanguageLevel->animation == 'slide-down' ? 'selected' : '' }}>Slide Down</option>
                        <option value="bounce" {{ $germanLanguageLevel->animation == 'bounce' ? 'selected' : '' }}>Bounce</option>
                        <option value="pulse" {{ $germanLanguageLevel->animation == 'pulse' ? 'selected' : '' }}>Pulse</option>
                    </select>
                    @error('animation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 form-group mb-3">
                    <label>Ribbon (Optional)</label>
                    <input class="form-control" type="text" name="ribbon" value="{{ $germanLanguageLevel->ribbon }}" placeholder="e.g., Most Popular, Recommended" />
                    @error('ribbon')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <!-- Display Settings -->
            <h5 class="mb-3">Display Settings</h5>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Display Order</label>
                    <input type="number" class="form-control" name="display_order" value="{{ $germanLanguageLevel->display_order }}" />
                    @error('display_order')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" name="status" id="status" {{ $germanLanguageLevel->status ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Update Level
                </button>
                <a href="{{ route('admin.german-language-level.index') }}" class="btn btn-secondary">
                    <i class="fa fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Image preview
    $('#levelImage').change(function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#levelImagePreview').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
