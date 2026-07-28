@extends('Admin.includes.main')
@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h3><b>Add a New University<span style="color: red; font-size: 1.3rem; "></span></b></h3>
    </div>
    <form enctype="multipart/form-data" action="{{ route('admin.university.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 form-group">
                <label>Name <span style="color:red;">*</span></label>
                <input class="form-control" placeholder="Name" type="text" name="name" />
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 form-group">
                <label>Image <span style="color:red;">*</span></label>
                <input class="form-control" type="file" name="image_url" />
                @error('image_url')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 form-group">
                <label>Description <span style="color:red;">*</span></label>
                <textarea class="form-control" name="description" rows="4"></textarea>
                @error('description')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 form-group">
                <label>Website<span style="color:red;">*</span></label>
                <input class="form-control" placeholder="website" type="text" name="website_url" />
                @error('website_url')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>         
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
