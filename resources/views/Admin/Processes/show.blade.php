@extends('Admin.includes.main')
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 1.5rem;">
    <h3>Process Details</h3>
    <div>
        <a href="{{ route('admin.process.index') }}" class="btn btn-danger">
            <i class="fa fa-arrow-left"></i>&nbsp; Back
        </a>
        <a href="{{ route('admin.process.edit', $process) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i>&nbsp; Edit
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                @if($process->image)
                    <img src="{{ asset('storage/' . $process->image) }}" class="img-fluid rounded mb-3" alt="{{ $process->title }}">
                @elseif($process->icon)
                    <div class="bg-light p-5 rounded mb-3">
                        <i class="fa fa-{{ $process->icon }} fa-5x text-muted"></i>
                    </div>
                @else
                    <div class="bg-light p-5 rounded mb-3">
                        <i class="fa fa-image fa-5x text-muted"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-9">
                <h4 class="mb-3">Step {{ $process->step_no }}: {{ $process->title }}</h4>
                <div class="mb-3">
                    <span class="badge {{ $process->status ? 'bg-success' : 'bg-danger' }}">
                        {{ $process->status ? 'Active' : 'Inactive' }}
                    </span>
                    @if($process->animation)
                        <span class="badge bg-info">{{ $process->animation }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Description:</strong>
                    <div>{!! $process->description !!}</div>
                </div>
                @if($process->button_text && $process->button_link)
                <div class="mb-3">
                    <strong>Button:</strong>
                    <a href="{{ $process->button_link }}" class="btn btn-sm btn-primary">{{ $process->button_text }}</a>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <strong>Display Order:</strong> {{ $process->display_order }}
                    </div>
                    <div class="col-md-4">
                        <strong>Background Color:</strong>
                        <span class="d-inline-block" style="width: 20px; height: 20px; background-color: {{ $process->background_color }}; border: 1px solid #ccc;"></span>
                        {{ $process->background_color }}
                    </div>
                    <div class="col-md-4">
                        <strong>Icon Color:</strong>
                        <span class="d-inline-block" style="width: 20px; height: 20px; background-color: {{ $process->icon_color }}; border: 1px solid #ccc;"></span>
                        {{ $process->icon_color }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
