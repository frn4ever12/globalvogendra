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
<div style="display: flex;justify-content: space-between;align-items: center;flex-wrap: wrap;margin-bottom: 1.5rem;">
    <h3>
        Edit About Us
    </h3>
</div>
<form action="{{route('admin.about-us.update')}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <label>Title</label>
            <input class="form-control" placeholder="About Us Title" type="text" name="title" value="{{ $about->title ?? 'About Us' }}" />
            @error('title')
                <span class="error-message text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <label>Button Text</label>
            <input class="form-control" placeholder="Learn More" type="text" name="button_text" value="{{ $about->button_text ?? 'Learn More' }}" />
            @error('button_text')
                <span class="error-message text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
            <label>Description</label>
            <textarea class="form-control ckeditor" rows="10" id="description" name="description">{{ $about->description ?? '' }}</textarea>
            @error('description')
                <span class="error-message text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <label>Image</label>
            <input class="form-control" type="file" name="image" accept="image/*" id="aboutImage" />
            @if($about->image)
                <img src="{{ asset('storage/' . $about->image) }}" class="image-preview" id="imagePreview" />
            @else
                <img id="imagePreview" class="image-preview d-none" />
            @endif
            @error('image')
                <span class="error-message text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <label>Text Color</label>
            <input type="color" class="form-control color-picker" name="text_color" value="{{ $about->text_color ?? '#333333' }}" />
            @error('text_color')
                <span class="error-message text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <label>Background Color</label>
            <input type="color" class="form-control color-picker" name="background_color" value="{{ $about->background_color ?? '#f8f9fa' }}" />
            @error('background_color')
                <span class="error-message text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <label>Display Order</label>
            <input type="number" class="form-control" name="display_order" value="{{ $about->display_order ?? 0 }}" />
            @error('display_order')
                <span class="error-message text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="status" id="status" {{ $about->status ?? true ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Active</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            <a href="{{route('admin.about-us.show')}}" class="btn btn-danger">
                <i class="fa fa-long-arrow-left"></i>&nbsp;
                <span>Go Back</span>
            </a>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea#description',
        menubar: false,
        plugins: 'code table lists image',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | table | image',
    });

    // Image preview
    $('#aboutImage').change(function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
