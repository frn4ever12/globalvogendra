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
    <h3>Edit Feature</h3>
    <div>
        <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-danger">
            <i class="fa fa-arrow-left"></i>&nbsp; Back
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.why-choose-us.update', $whyChooseUs) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Basic Information -->
            <h5 class="mb-3">Basic Information</h5>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Title <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="title" required value="{{ $whyChooseUs->title }}" placeholder="Enter feature title" />
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">
                    <label>Short Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="short_description" rows="3" required placeholder="Enter short description">{{ $whyChooseUs->short_description }}</textarea>
                    @error('short_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <!-- Image or Icon -->
            <h5 class="mb-3">Image or Icon</h5>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Upload Image</label>
                    <input class="form-control" type="file" name="image" accept="image/*" id="featureImage" />
                    @if($whyChooseUs->image)
                        <img src="{{ asset('storage/' . $whyChooseUs->image) }}" class="image-preview" />
                    @endif
                    <img id="featureImagePreview" class="image-preview d-none" />
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Or Icon (Font Awesome)</label>
                    <input class="form-control" type="text" name="icon" value="{{ $whyChooseUs->icon }}" placeholder="e.g., fa fa-graduation-cap, fa fa-check-circle" />
                    <small class="text-muted">If no image uploaded, this icon will be displayed</small>
                    @error('icon')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <!-- Counter -->
            <h5 class="mb-3">Counter (Optional)</h5>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Counter Number</label>
                    <input class="form-control" type="text" name="counter" value="{{ $whyChooseUs->counter }}" placeholder="e.g., 98, 150, 5000" />
                    @error('counter')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Counter Suffix</label>
                    <input class="form-control" type="text" name="counter_suffix" value="{{ $whyChooseUs->counter_suffix }}" placeholder="e.g., %, +, +" />
                    @error('counter_suffix')
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
                    <input class="form-control" type="text" name="button_text" value="{{ $whyChooseUs->button_text }}" placeholder="e.g., Learn More" />
                    @error('button_text')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Button Link</label>
                    <input class="form-control" type="text" name="button_link" value="{{ $whyChooseUs->button_link }}" placeholder="https://..." />
                    @error('button_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <!-- Styling -->
            <h5 class="mb-3">Styling</h5>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Background Color</label>
                    <input type="color" class="form-control color-picker" name="background_color" value="{{ $whyChooseUs->background_color }}" />
                    @error('background_color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Icon Color</label>
                    <input type="color" class="form-control color-picker" name="icon_color" value="{{ $whyChooseUs->icon_color }}" />
                    @error('icon_color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Animation Type</label>
                    <select class="form-select" name="animation">
                        <option value="fade-up" {{ $whyChooseUs->animation == 'fade-up' ? 'selected' : '' }}>Fade Up</option>
                        <option value="fade-down" {{ $whyChooseUs->animation == 'fade-down' ? 'selected' : '' }}>Fade Down</option>
                        <option value="fade-left" {{ $whyChooseUs->animation == 'fade-left' ? 'selected' : '' }}>Fade Left</option>
                        <option value="fade-right" {{ $whyChooseUs->animation == 'fade-right' ? 'selected' : '' }}>Fade Right</option>
                        <option value="zoom-in" {{ $whyChooseUs->animation == 'zoom-in' ? 'selected' : '' }}>Zoom In</option>
                        <option value="zoom-out" {{ $whyChooseUs->animation == 'zoom-out' ? 'selected' : '' }}>Zoom Out</option>
                        <option value="flip-left" {{ $whyChooseUs->animation == 'flip-left' ? 'selected' : '' }}>Flip Left</option>
                        <option value="flip-right" {{ $whyChooseUs->animation == 'flip-right' ? 'selected' : '' }}>Flip Right</option>
                        <option value="slide-up" {{ $whyChooseUs->animation == 'slide-up' ? 'selected' : '' }}>Slide Up</option>
                        <option value="slide-down" {{ $whyChooseUs->animation == 'slide-down' ? 'selected' : '' }}>Slide Down</option>
                        <option value="bounce" {{ $whyChooseUs->animation == 'bounce' ? 'selected' : '' }}>Bounce</option>
                        <option value="pulse" {{ $whyChooseUs->animation == 'pulse' ? 'selected' : '' }}>Pulse</option>
                    </select>
                    @error('animation')
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
                    <input type="number" class="form-control" name="display_order" value="{{ $whyChooseUs->display_order }}" />
                    @error('display_order')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" name="status" id="status" {{ $whyChooseUs->status ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Update Feature
                </button>
                <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-secondary">
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
    $('#featureImage').change(function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#featureImagePreview').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
