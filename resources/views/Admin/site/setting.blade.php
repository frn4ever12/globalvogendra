@extends('Admin.includes.main')

@section('content')
<div style="margin-bottom:2rem;">
    <h3 style="font-size: 2rem;">Website Settings</h3>
</div>
    <form enctype="multipart/form-data" action="{{route('admin.site.setting.update',$setting->id)}}" method="post">
       @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                <label class="form-label">Organization Name<span style="color:red">*</span></label>
                <input class="form-control" placeholder="Organization Name" type="text" name="name" value="{{$setting->name??''}}" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                <label class="form-label">Address<span style="color:red">*</span></label>
                <input class="form-control" placeholder="Address" type="text" name="address" value="{{$setting->address??''}}" />
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 form-group">
                <label class="form-label">Email <span style="color:red">*</span></label>
                <input class="form-control" placeholder="Email" type="text" name="email" value="{{$setting->email??''}}" />

            </div>
       
            <div class="col-lg-3 col-md-3 col-sm-6 form-group">
                <label class="form-label">Phone <span style="color:red">*</span></label>
                <input class="form-control" placeholder="Phone" type="text" name="phone" value="{{$setting->phone??''}}" minlength="10" maxlength="10" />

            </div>
       
            <div class="col-lg-3 col-md-3 col-sm-6 form-group">
                <label class="form-label">Logo <span style="color:red">*</span></label>
                <input class="form-control" type="file" name="logo" />

            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 form-group">
                <label class="form-label">Facebook Link</label>
                <input class="form-control" placeholder="Link" type="text" name="fb_link" value="{{$setting->fb_link??''}}" />
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 form-group">
                <label class="form-label">Instagram Link</label>
                <input class="form-control" placeholder="Link" type="text" name="insta_link" value="{{$setting->insta_link??''}}" />
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 form-group">
                <label class="form-label">Twitter Link </label>
                <input class="form-control" placeholder="Link" type="text" name="twitter_link" value="{{$setting->twitter_link??''}}" />

            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Save Settings</button>
            </div>
        </div>
    </form>
@endsection
