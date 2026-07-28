@extends('Admin.includes.main')
@section('head')
    <style>
        .image-preview {
            max-width: 150px;
            max-height: 150px;
            object-fit: cover;
            margin-top: 10px;
            border-radius: 8px;
        }
    </style>
@endsection
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 1.5rem;">
    <h3>Add New Visa Success Story</h3>
    <div>
        <a href="{{ route('admin.visa-success-story.index') }}" class="btn btn-danger">
            <i class="fa fa-arrow-left"></i>&nbsp; Back
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.visa-success-story.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Student Information -->
            <h5 class="mb-3">Student Information</h5>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Student Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="student_name" required placeholder="e.g., Aarav Sharma" />
                    @error('student_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Country <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="country" required placeholder="e.g., Nepal" />
                    @error('country')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>City</label>
                    <input class="form-control" type="text" name="city" placeholder="e.g., Kathmandu" />
                    @error('city')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>University <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="university" required placeholder="e.g., Technical University of Munich" />
                    @error('university')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Course <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="course" required placeholder="e.g., BSc Computer Science" />
                    @error('course')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Intake</label>
                    <input class="form-control" type="text" name="intake" placeholder="e.g., September 2026" />
                    @error('intake')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <!-- Visa Information -->
            <h5 class="mb-3">Visa Information</h5>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Visa Date</label>
                    <input type="date" class="form-control" name="visa_date" />
                    @error('visa_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Visa Type</label>
                    <input class="form-control" type="text" name="visa_type" placeholder="e.g., Student Visa" />
                    @error('visa_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Rating <span class="text-danger">*</span></label>
                    <select class="form-select" name="rating" required>
                        <option value="5">★★★★★ (5 Stars)</option>
                        <option value="4">★★★★☆ (4 Stars)</option>
                        <option value="3">★★★☆☆ (3 Stars)</option>
                        <option value="2">★★☆☆☆ (2 Stars)</option>
                        <option value="1">★☆☆☆☆ (1 Star)</option>
                    </select>
                    @error('rating')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <!-- Images -->
            <h5 class="mb-3">Images</h5>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Student Photo</label>
                    <input class="form-control" type="file" name="student_image" accept="image/*" id="studentImage" />
                    <img id="studentImagePreview" class="image-preview d-none" />
                    @error('student_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Visa Photo</label>
                    <input class="form-control" type="file" name="visa_image" accept="image/*" id="visaImage" />
                    <img id="visaImagePreview" class="image-preview d-none" />
                    @error('visa_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Passport Photo</label>
                    <input class="form-control" type="file" name="passport_image" accept="image/*" id="passportImage" />
                    <img id="passportImagePreview" class="image-preview d-none" />
                    @error('passport_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <!-- Additional Information -->
            <h5 class="mb-3">Additional Information</h5>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">
                    <label>Testimonial</label>
                    <textarea class="form-control" name="testimonial" rows="4" placeholder="Enter student testimonial..."></textarea>
                    @error('testimonial')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Video URL (Optional)</label>
                    <input class="form-control" type="text" name="video_url" placeholder="https://youtube.com/watch?v=..." />
                    @error('video_url')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Display Order</label>
                    <input type="number" class="form-control" name="display_order" value="0" />
                    @error('display_order')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="status" id="status" checked>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save Story
                </button>
                <a href="{{ route('admin.visa-success-story.index') }}" class="btn btn-secondary">
                    <i class="fa fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Image previews
    $('#studentImage').change(function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#studentImagePreview').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(file);
        }
    });

    $('#visaImage').change(function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#visaImagePreview').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(file);
        }
    });

    $('#passportImage').change(function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#passportImagePreview').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
