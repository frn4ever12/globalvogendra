@extends('Admin.includes.main')

@section('content')
<div style="margin-bottom: 1.5rem;">
    <h3><b>Add a New Event</b></h3>
</div>
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<form enctype="multipart/form-data" action="{{ route('admin.event.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 form-group">
            <label>Title<span style="color:red;">*</span></label>
            <input class="form-control" placeholder="Title" type="text" name="title" value="{{ old('title') }}" />
            @error('title')
                <span class="error-message text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 form-group">
            <label>Description<span style="color:red;">*</span></label>
            <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
            @error('description')
                <span class="error-message text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 form-group">
            <label>Date<span style="color:red;">*</span></label>
            <input class="form-control" type="date" name="date" value="{{ old('date') }}" />
            @error('date')
                <span class="error-message text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 form-group">
            <label>Start Time<span style="color:red;">*</span></label>
            <input class="form-control" type="time" name="start_time" value="{{ old('start_time') }}" />
            @error('start_time')
                <span class="error-message text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 form-group">
            <label>End Time</label>
            <input class="form-control" type="time" name="end_time" value="{{ old('end_time') }}" />
            @error('end_time')
                <span class="error-message text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 form-group">
            <label>Location<span style="color:red;">*</span></label>
            <input class="form-control" type="text" name="location" value="{{ old('location') }}" />
            @error('location')
                <span class="error-message text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 form-group">
            <label>Contact</label>
            <input class="form-control" type="text" name="contact" value="{{ old('contact') }}" />
            @error('contact')
                <span class="error-message text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 form-group">
            <label>Image<span style="color:red;">*</span></label>
            <input class="form-control" type="file" name="image" />
            @error('image')
                <span class="error-message text-danger">{{ $message }}</span>
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
