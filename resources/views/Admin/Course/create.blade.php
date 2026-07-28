@extends('Admin.includes.main')
@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h3><b>Add a New Course<span style="color: red; font-size: 1.3rem; "></span></b></h3>
    </div>
    <form enctype="multipart/form-data" action="{{ route('admin.course.store') }}" method="post">
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
                <label>University <span style="color:red;">*</span></label>
                <select class="form-control" name="university_id">
                    <option value="">Select a University</option>
                    @foreach(\App\Models\University::all() as $university)
                        <option value="{{ $university->id }}">{{ $university->name }}</option>
                    @endforeach
                </select>
                @error('university_id')
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
