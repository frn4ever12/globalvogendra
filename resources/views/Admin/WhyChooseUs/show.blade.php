@extends('Admin.includes.main')
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 1.5rem;">
    <h3>Feature Details</h3>
    <div>
        <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-danger">
            <i class="fa fa-arrow-left"></i>&nbsp; Back
        </a>
        <a href="{{ route('admin.why-choose-us.edit', $whyChooseUs) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i>&nbsp; Edit
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                @if($whyChooseUs->image)
                    <img src="{{ asset('storage/' . $whyChooseUs->image) }}" class="img-fluid rounded mb-3" alt="{{ $whyChooseUs->title }}">
                @elseif($whyChooseUs->icon)
                    <div class="bg-light p-5 rounded mb-3">
                        <i class="fa fa-{{ $whyChooseUs->icon }} fa-5x text-muted"></i>
                    </div>
                @else
                    <div class="bg-light p-5 rounded mb-3">
                        <i class="fa fa-image fa-5x text-muted"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-9">
                <h4 class="mb-3">{{ $whyChooseUs->title }}</h4>
                <div class="mb-3">
                    <span class="badge {{ $whyChooseUs->status ? 'bg-success' : 'bg-danger' }}">
                        {{ $whyChooseUs->status ? 'Active' : 'Inactive' }}
                    </span>
                    @if($whyChooseUs->animation)
                        <span class="badge bg-info">{{ $whyChooseUs->animation }}</span>
                    @endif
                    @if($whyChooseUs->counter)
                        <span class="badge bg-primary">{{ $whyChooseUs->counter }}{{ $whyChooseUs->counter_suffix }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Description:</strong>
                    <p>{{ $whyChooseUs->short_description }}</p>
                </div>
                @if($whyChooseUs->button_text && $whyChooseUs->button_link)
                <div class="mb-3">
                    <strong>Button:</strong>
                    <a href="{{ $whyChooseUs->button_link }}" class="btn btn-sm btn-primary">{{ $whyChooseUs->button_text }}</a>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <strong>Display Order:</strong> {{ $whyChooseUs->display_order }}
                    </div>
                    <div class="col-md-4">
                        <strong>Background Color:</strong>
                        <span class="d-inline-block" style="width: 20px; height: 20px; background-color: {{ $whyChooseUs->background_color }}; border: 1px solid #ccc;"></span>
                        {{ $whyChooseUs->background_color }}
                    </div>
                    <div class="col-md-4">
                        <strong>Icon Color:</strong>
                        <span class="d-inline-block" style="width: 20px; height: 20px; background-color: {{ $whyChooseUs->icon_color }}; border: 1px solid #ccc;"></span>
                        {{ $whyChooseUs->icon_color }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
