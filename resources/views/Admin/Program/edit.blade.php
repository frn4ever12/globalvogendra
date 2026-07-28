@extends('Admin.includes.main')
@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h3><b>Edit Program<span style="color: red; font-size: 1.3rem; "></span></b></h3>
    </div>
    <form enctype="multipart/form-data" action="{{ route('admin.program.update',$program->id) }}" method="post">
       @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 form-group">
                <label>Name <span style="color:red;">*</span></label>
                <input class="form-control" placeholder="Name" type="text" name="name" value="{{$program->name}}" />
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 form-group">
                <label>Status </label>
               <select name="status" class="form-control">
                <option value="" selected disabled>Choose a status</option>
                <option value="1" {{$program->status==1?'selected':''}}>Active</option>
                <option value="0" {{$program->status==0?'selected':''}}>Deactive</option>
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
