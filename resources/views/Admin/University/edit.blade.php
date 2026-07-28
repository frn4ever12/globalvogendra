@extends('Admin.includes.main')
@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h3><b>Edit University<span style="color: red; font-size: 1.3rem; "></span></b></h3>
    </div>
    <form enctype="multipart/form-data" action="{{ route('admin.university.update',$university->id) }}" method="post">
       @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 form-group">
                <label>Name <span style="color:red;">*</span></label>
                <input class="form-control" placeholder="Name" type="text" name="name" value="{{$university->name}}" />
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 form-group">
                <label>Image </label>
                <input class="form-control" type="file" name="image_url" />
                @error('image_url')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 form-group">
                <label>Description <span style="color:red;">*</span></label>
                <textarea class="form-control" name="description" rows="4">{{$university->description}}</textarea>
                @error('description')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 form-group">
                <label>Website<span style="color:red;">*</span></label>
                <input class="form-control" placeholder="website" type="text" name="website_url" value="{{$university->website_url}}" />
                @error('website_url')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>         
            <div class="col-lg-3 col-md-3 col-sm-6 form-group">
                <label>Status </label>
               <select name="status" class="form-control">
                <option value="" selected disabled>Choose a status</option>
                <option value="1" {{$university->status==1?'selected':''}}>Active</option>
                <option value="0" {{$university->status==0?'selected':''}}>Deactive</option>
               </select>
                @error('status')
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
