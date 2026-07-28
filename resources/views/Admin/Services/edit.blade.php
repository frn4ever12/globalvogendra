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
    <h3>Edit Service</h3>
    <div>
        <a href="{{ route('admin.service.index') }}" class="btn btn-danger">
            <i class="fa fa-arrow-left"></i>&nbsp; Back
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.service.update', $service) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            
            <!-- Basic Information -->
            <h5 class="mb-3">Basic Information</h5>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Service Title <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="title" required value="{{ $service->title }}" />
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Short Title</label>
                    <input class="form-control" type="text" name="short_title" value="{{ $service->short_title }}" />
                    @error('short_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Slug</label>
                    <input class="form-control" type="text" name="slug" value="{{ $service->slug }}" />
                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Category</label>
                    <input class="form-control" type="text" name="category" value="{{ $service->category }}" />
                    @error('category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">
                    <label>Short Description</label>
                    <textarea class="form-control" name="short_description" rows="3">{{ $service->short_description }}</textarea>
                    @error('short_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <!-- Images -->
            <h5 class="mb-3">Images</h5>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Featured Image</label>
                    <input class="form-control" type="file" name="featured_image" accept="image/*" id="featuredImage" />
                    @if($service->featured_image)
                        <img src="{{ asset('storage/' . $service->featured_image) }}" class="image-preview" id="featuredImagePreview" />
                    @else
                        <img id="featuredImagePreview" class="image-preview d-none" />
                    @endif
                    @error('featured_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Banner Image</label>
                    <input class="form-control" type="file" name="banner_image" accept="image/*" id="bannerImage" />
                    @if($service->banner_image)
                        <img src="{{ asset('storage/' . $service->banner_image) }}" class="image-preview" id="bannerImagePreview" />
                    @else
                        <img id="bannerImagePreview" class="image-preview d-none" />
                    @endif
                    @error('banner_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Icon (Font Awesome/Bootstrap Icons)</label>
                    <input class="form-control" type="text" name="icon" value="{{ $service->icon }}" placeholder="e.g., fa fa-home or bi bi-house" />
                    @error('icon')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <!-- Full Description -->
            <h5 class="mb-3">Full Description</h5>
            <div class="form-group mb-3">
                <textarea class="form-control ckeditor" name="description" id="description" rows="15">{{ $service->description }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <hr>

            <!-- Button Settings -->
            <h5 class="mb-3">Button Settings</h5>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Button Text</label>
                    <input class="form-control" type="text" name="button_text" value="{{ $service->button_text }}" />
                    @error('button_text')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb-3">
                    <label>Button Link</label>
                    <input class="form-control" type="text" name="button_link" value="{{ $service->button_link }}" />
                    @error('button_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <!-- SEO Settings -->
            <h5 class="mb-3">SEO Settings</h5>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">
                    <label>SEO Title</label>
                    <input class="form-control" type="text" name="seo_title" value="{{ $service->seo_title }}" />
                    @error('seo_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">
                    <label>SEO Keywords</label>
                    <textarea class="form-control" name="seo_keywords" rows="2">{{ $service->seo_keywords }}</textarea>
                    @error('seo_keywords')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">
                    <label>SEO Description</label>
                    <textarea class="form-control" name="seo_description" rows="3">{{ $service->seo_description }}</textarea>
                    @error('seo_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <!-- Display Settings -->
            <h5 class="mb-3">Display Settings</h5>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <label>Display Order</label>
                    <input type="number" class="form-control" name="display_order" value="{{ $service->display_order }}" />
                    @error('display_order')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" name="featured" id="featured" {{ $service->featured ? 'checked' : '' }}>
                        <label class="form-check-label" for="featured">Featured Service</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 form-group mb-3">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" name="status" id="status" {{ $service->status ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Update Service
                </button>
                <a href="{{ route('admin.service.index') }}" class="btn btn-secondary">
                    <i class="fa fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', '|', 'undo', 'redo'],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                ]
            }
        })
        .catch(error => {
            console.error(error);
        });

    // Image previews
    $('#featuredImage').change(function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#featuredImagePreview').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(file);
        }
    });

    $('#bannerImage').change(function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#bannerImagePreview').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
