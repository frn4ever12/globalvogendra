@extends('Admin.includes.main')
@section('head')
    <style>
        .image-preview {
            max-width: 200px;
            max-height: 150px;
            object-fit: cover;
            margin-top: 10px;
            border-radius: 4px;
        }
        .color-picker {
            width: 100px;
            height: 40px;
            padding: 2px;
        }
    </style>
@endsection
@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h3><b>Edit Hero Banner</b></h3>
    </div>
    <form action="{{ route('admin.hero-banner.update', $heroBanner->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Title <span style="color:red;">*</span></label>
                <input class="form-control" placeholder="Banner Title" type="text" name="title" value="{{ $heroBanner->title }}" required />
                @error('title')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Subtitle</label>
                <input class="form-control" placeholder="Banner Subtitle" type="text" name="subtitle" value="{{ $heroBanner->subtitle ?? '' }}" />
                @error('subtitle')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label>Description</label>
                <textarea class="form-control" placeholder="Short Description" name="description" rows="3">{{ $heroBanner->description ?? '' }}</textarea>
                @error('description')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Button Text</label>
                <input class="form-control" placeholder="Apply Now" type="text" name="button_text" value="{{ $heroBanner->button_text ?? '' }}" />
                @error('button_text')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Button URL</label>
                <input class="form-control" placeholder="https://..." type="url" name="button_url" value="{{ $heroBanner->button_url ?? '' }}" />
                @error('button_url')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Desktop Image</label>
                <input class="form-control" type="file" name="desktop_image" accept="image/*" id="desktopImage" />
                @if($heroBanner->desktop_image)
                    <img src="{{ asset('storage/' . $heroBanner->desktop_image) }}" class="image-preview" id="desktopPreview" />
                @else
                    <img id="desktopPreview" class="image-preview d-none" />
                @endif
                @error('desktop_image')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Mobile Image</label>
                <input class="form-control" type="file" name="mobile_image" accept="image/*" id="mobileImage" />
                @if($heroBanner->mobile_image)
                    <img src="{{ asset('storage/' . $heroBanner->mobile_image) }}" class="image-preview" id="mobilePreview" />
                @else
                    <img id="mobilePreview" class="image-preview d-none" />
                @endif
                @error('mobile_image')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Overlay Color</label>
                <input type="color" class="form-control color-picker" name="overlay_color" value="{{ $heroBanner->overlay_color ?? '#000000' }}" />
                @error('overlay_color')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Overlay Opacity (0-100)</label>
                <input type="range" class="form-control" name="overlay_opacity" min="0" max="100" value="{{ $heroBanner->overlay_opacity ?? 50 }}" />
                @error('overlay_opacity')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Text Position</label>
                <select name="text_position" class="form-control">
                    <option value="left" {{ $heroBanner->text_position === 'left' ? 'selected' : '' }}>Left</option>
                    <option value="center" {{ $heroBanner->text_position === 'center' ? 'selected' : '' }}>Center</option>
                    <option value="right" {{ $heroBanner->text_position === 'right' ? 'selected' : '' }}>Right</option>
                </select>
                @error('text_position')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Text Color</label>
                <input type="color" class="form-control color-picker" name="text_color" value="{{ $heroBanner->text_color ?? '#ffffff' }}" />
                @error('text_color')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Button Color</label>
                <input type="color" class="form-control color-picker" name="button_color" value="{{ $heroBanner->button_color ?? '#007bff' }}" />
                @error('button_color')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Button Text Color</label>
                <input type="color" class="form-control color-picker" name="button_text_color" value="{{ $heroBanner->button_text_color ?? '#ffffff' }}" />
                @error('button_text_color')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Banner Height</label>
                <select name="banner_height" class="form-control">
                    <option value="small" {{ $heroBanner->banner_height === 'small' ? 'selected' : '' }}>Small</option>
                    <option value="medium" {{ $heroBanner->banner_height === 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="large" {{ $heroBanner->banner_height === 'large' ? 'selected' : '' }}>Large</option>
                    <option value="full_screen" {{ $heroBanner->banner_height === 'full_screen' ? 'selected' : '' }}>Full Screen</option>
                </select>
                @error('banner_height')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Display Order</label>
                <input type="number" class="form-control" name="display_order" value="{{ $heroBanner->display_order }}" />
                @error('display_order')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Start Date</label>
                <input type="date" class="form-control" name="start_date" value="{{ $heroBanner->start_date ? $heroBanner->start_date->format('Y-m-d') : '' }}" />
                @error('start_date')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>End Date</label>
                <input type="date" class="form-control" name="end_date" value="{{ $heroBanner->end_date ? $heroBanner->end_date->format('Y-m-d') : '' }}" />
                @error('end_date')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="enable_dark_overlay" id="enable_dark_overlay" {{ $heroBanner->enable_dark_overlay ? 'checked' : '' }}>
                    <label class="form-check-label" for="enable_dark_overlay">Enable Dark Overlay</label>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="enable_gradient" id="enable_gradient" {{ $heroBanner->enable_gradient ? 'checked' : '' }}>
                    <label class="form-check-label" for="enable_gradient">Enable Gradient Overlay</label>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" id="status" {{ $heroBanner->status ? 'checked' : '' }}>
                    <label class="form-check-label" for="status">Active</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Save Banner</button>
                <a href="{{ route('admin.hero-banner.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        // Image preview for desktop
        $('#desktopImage').change(function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#desktopPreview').attr('src', e.target.result).removeClass('d-none');
                }
                reader.readAsDataURL(file);
            }
        });

        // Image preview for mobile
        $('#mobileImage').change(function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mobilePreview').attr('src', e.target.result).removeClass('d-none');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
