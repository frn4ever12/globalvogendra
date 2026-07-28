@extends('Admin.includes.main')
@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h3><b>Edit Menu<span style="color: red; font-size: 1.3rem; "></span></b></h3>
    </div>
    <form action="{{ route('admin.menu.update', $menu->id) }}" method="post">
       @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Name <span style="color:red;">*</span></label>
                <input class="form-control" placeholder="Menu Name" type="text" name="name" value="{{ $menu->name }}" />
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Icon (FontAwesome class)</label>
                <input class="form-control" placeholder="e.g., fa fa-home" type="text" name="icon" value="{{ $menu->icon ?? '' }}" />
                @error('icon')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Order</label>
                <input class="form-control" placeholder="Order" type="number" name="order_no" value="{{ $menu->order_no }}" />
                @error('order_no')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" id="status" {{ $menu->status ? 'checked' : '' }}>
                    <label class="form-check-label" for="status">Active</label>
                </div>
                @error('status')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
@endsection
