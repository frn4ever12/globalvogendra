@extends('Admin.includes.main')
@section('content')
<div style="display: flex;justify-content: space-between;align-items: center;flex-wrap: wrap;margin-bottom: 1.5rem;">
    <h3>
        About Us
    </h3>
    <div>
        <a href="{{ route('admin.about-us.edit') }}" class="btn btn-success">
            <i class="fa fa-edit"></i>&nbsp;
            <span>Edit</span>
        </a>
    </div>
</div>
<section style="border: 1px solid rgb(230, 230, 230);padding:1.4rem;">
    @if($about)
        <div class="row">
            <div class="col-md-6">
                <h4>{{ $about->title }}</h4>
                <p><strong>Status:</strong> {{ $about->status ? 'Active' : 'Inactive' }}</p>
                <p><strong>Button Text:</strong> {{ $about->button_text }}</p>
                <p><strong>Text Color:</strong> {{ $about->text_color }}</p>
                <p><strong>Background Color:</strong> {{ $about->background_color }}</p>
                <p><strong>Display Order:</strong> {{ $about->display_order }}</p>
            </div>
            <div class="col-md-6">
                @if($about->image)
                    <img src="{{ asset('storage/' . $about->image) }}" class="img-fluid" style="max-width: 300px; border-radius: 8px;" />
                @else
                    <p class="text-muted">No image uploaded</p>
                @endif
            </div>
        </div>
        <hr style="margin: 1.5rem 0;">
        <h5>Description:</h5>
        <div>{!! $about->description !!}</div>
    @else
        <p class="alert alert-warning">No About Us content found. Please create one.</p>
    @endif
</section>
@endsection