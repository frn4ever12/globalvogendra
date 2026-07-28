@extends('Admin.includes.main')
@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h3><b>Edit Sub Menu<span style="color: red; font-size: 1.3rem; "></span></b></h3>
    </div>
    <form action="{{ route('admin.submenu.update', $subMenu->id) }}" method="post" enctype="multipart/form-data">
       @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Parent Menu <span style="color:red;">*</span></label>
                <select name="menu_id" class="form-control" required>
                    <option value="">Select Parent Menu</option>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}" {{ $subMenu->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                    @endforeach
                </select>
                @error('menu_id')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Name <span style="color:red;">*</span></label>
                <input class="form-control" placeholder="Sub Menu Name" type="text" name="name" value="{{ $subMenu->name }}" required />
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Banner Image</label>
                <input class="form-control" type="file" name="banner_image" accept="image/*" />
                @if($subMenu->banner_image)
                    <img src="{{ asset('storage/' . $subMenu->banner_image) }}" style="max-width: 200px; margin-top: 10px;" />
                @endif
                @error('banner_image')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Featured Image</label>
                <input class="form-control" type="file" name="featured_image" accept="image/*" />
                @if($subMenu->featured_image)
                    <img src="{{ asset('storage/' . $subMenu->featured_image) }}" style="max-width: 200px; margin-top: 10px;" />
                @endif
                @error('featured_image')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Order</label>
                <input class="form-control" placeholder="Order" type="number" name="order_no" value="{{ $subMenu->order_no }}" />
                @error('order_no')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" id="status" {{ $subMenu->status ? 'checked' : '' }}>
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
                <a href="{{ route('admin.submenu.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
@endsection
