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
        <h3><b>Add New Hero Banner</b></h3>
    </div>
    <form action="{{ route('admin.hero-banner.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Title <span style="color:red;">*</span></label>
                <input class="form-control" placeholder="Banner Title" type="text" name="title" required />
                @error('title')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Subtitle</label>
                <input class="form-control" placeholder="Banner Subtitle" type="text" name="subtitle" />
                @error('subtitle')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label>Description</label>
                <textarea class="form-control" placeholder="Short Description" name="description" rows="3"></textarea>
                @error('description')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Button Text</label>
                <input class="form-control" placeholder="Apply Now" type="text" name="button_text" />
                @error('button_text')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Button URL</label>
                <input class="form-control" placeholder="https://..." type="text" name="button_url" />
                @error('button_url')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Desktop Image</label>
                <input class="form-control" type="file" name="desktop_image" accept="image/*" id="desktopImage" />
                <img id="desktopPreview" class="image-preview d-none" />
                @error('desktop_image')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Mobile Image</label>
                <input class="form-control" type="file" name="mobile_image" accept="image/*" id="mobileImage" />
                <img id="mobilePreview" class="image-preview d-none" />
                @error('mobile_image')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Overlay Color</label>
                <input type="color" class="form-control color-picker" name="overlay_color" value="#000000" />
                @error('overlay_color')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Overlay Opacity (0-100)</label>
                <input type="range" class="form-control" name="overlay_opacity" min="0" max="100" value="50" />
                @error('overlay_opacity')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Text Position</label>
                <select name="text_position" class="form-control">
                    <option value="left">Left</option>
                    <option value="center" selected>Center</option>
                    <option value="right">Right</option>
                </select>
                @error('text_position')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Text Color</label>
                <input type="color" class="form-control color-picker" name="text_color" value="#ffffff" />
                @error('text_color')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Button Color</label>
                <input type="color" class="form-control color-picker" name="button_color" value="#007bff" />
                @error('button_color')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Button Text Color</label>
                <input type="color" class="form-control color-picker" name="button_text_color" value="#ffffff" />
                @error('button_text_color')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Banner Height</label>
                <select name="banner_height" class="form-control">
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large" selected>Large</option>
                    <option value="full_screen">Full Screen</option>
                </select>
                @error('banner_height')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Display Order</label>
                <input type="number" class="form-control" name="display_order" value="0" />
                @error('display_order')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Start Date</label>
                <input type="date" class="form-control" name="start_date" />
                @error('start_date')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>End Date</label>
                <input type="date" class="form-control" name="end_date" />
                @error('end_date')
                    <span class="error-message text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="enable_dark_overlay" id="enable_dark_overlay" checked>
                    <label class="form-check-label" for="enable_dark_overlay">Enable Dark Overlay</label>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="enable_gradient" id="enable_gradient" checked>
                    <label class="form-check-label" for="enable_gradient">Enable Gradient Overlay</label>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" id="status" checked>
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
