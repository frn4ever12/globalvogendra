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
    <h3>Add New German Language Level</h3>
    <div>
        <a href="{{ route('admin.german-language-level.index') }}" class="btn btn-danger">
            <i class="fa fa-arrow-left"></i>&nbsp; Back
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.german-language-level.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Basic Information -->
            <h5 class="mb-3">Basic Information</h5>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Level Code <span class="text-danger">*</span></label>
                    <select class="form-select" name="level_code" required>
                        <option value="">Select Level</option>
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="B1">B1</option>
                        <option value="B2">B2</option>
                        <option value="C1">C1</option>
                        <option value="C2">C2</option>
                    </select>
                    @error('level_code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Level Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="level_name" required placeholder="e.g., Beginner" />
                    @error('level_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Title <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="title" required placeholder="e.g., Beginner German" />
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">
                    <label>Short Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="short_description" rows="3" required placeholder="Enter short description"></textarea>
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
                    <input class="form-control" type="text" name="duration" placeholder="e.g., 8 Weeks" />
                    @error('duration')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Class Type</label>
                    <select class="form-select" name="class_type">
                        <option value="">Select Type</option>
                        <option value="Online">Online</option>
                        <option value="Physical">Physical</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                    @error('class_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Class Schedule</label>
                    <select class="form-select" name="class_schedule">
                        <option value="">Select Schedule</option>
                        <option value="Morning">Morning</option>
                        <option value="Day">Day</option>
                        <option value="Evening">Evening</option>
                        <option value="Weekend">Weekend</option>
                    </select>
                    @error('class_schedule')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Course Fee</label>
                    <input class="form-control" type="text" name="course_fee" placeholder="e.g., $500" />
                    @error('course_fee')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Exam Name</label>
                    <select class="form-select" name="exam_name">
                        <option value="">Select Exam</option>
                        <option value="Goethe">Goethe</option>
                        <option value="TELC">TELC</option>
                        <option value="TestDaF">TestDaF</option>
                    </select>
                    @error('exam_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Students Completed</label>
                    <input type="number" class="form-control" name="students_count" value="0" />
                    @error('students_count')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="certificate" id="certificate">
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
                    <img id="levelImagePreview" class="image-preview d-none" />
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Or Icon (Font Awesome)</label>
                    <input class="form-control" type="text" name="icon" placeholder="e.g., fa fa-graduation-cap" />
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
                    <input class="form-control" type="text" name="button_text" placeholder="e.g., Enroll Now" />
                    @error('button_text')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Button Link</label>
                    <input class="form-control" type="text" name="button_link" placeholder="https://..." />
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
                    <input type="color" class="form-control color-picker" name="background_color" value="#ffffff" />
                    @error('background_color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 form-group mb-3">
                    <label>Text Color</label>
                    <input type="color" class="form-control color-picker" name="text_color" value="#1e293b" />
                    @error('text_color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 form-group mb-3">
                    <label>Animation Type</label>
                    <select class="form-select" name="animation">
                        <option value="fade-up">Fade Up</option>
                        <option value="fade-down">Fade Down</option>
                        <option value="fade-left">Fade Left</option>
                        <option value="fade-right">Fade Right</option>
                        <option value="zoom-in">Zoom In</option>
                        <option value="zoom-out">Zoom Out</option>
                        <option value="flip-left">Flip Left</option>
                        <option value="flip-right">Flip Right</option>
                        <option value="slide-up">Slide Up</option>
                        <option value="slide-down">Slide Down</option>
                        <option value="bounce">Bounce</option>
                        <option value="pulse">Pulse</option>
                    </select>
                    @error('animation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 form-group mb-3">
                    <label>Ribbon (Optional)</label>
                    <input class="form-control" type="text" name="ribbon" placeholder="e.g., Most Popular, Recommended" />
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
                    <input type="number" class="form-control" name="display_order" value="0" />
                    @error('display_order')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" name="status" id="status" checked>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save Level
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
