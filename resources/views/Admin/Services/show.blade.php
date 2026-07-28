@extends('Admin.includes.main')
@section('head')
    <style>
        .service-image {
            max-width: 300px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .detail-row {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .detail-label {
            font-weight: 600;
            color: #555;
        }
        .status-badge {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }
        .status-active {
            background-color: #d4edda;
            color: #155724;
        }
        .status-inactive {
            background-color: #f8d7da;
            color: #721c24;
        }
        .featured-badge {
            background-color: #fff3cd;
            color: #856404;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }
    </style>
@endsection
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 1.5rem;">
    <h3>Service Details</h3>
    <div>
        <a href="{{ route('admin.service.edit', $service) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i>&nbsp; Edit
        </a>
        <a href="{{ route('admin.service.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i>&nbsp; Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @if($service->featured_image)
                            <img src="{{ asset('storage/' . $service->featured_image) }}" class="service-image img-fluid" alt="{{ $service->title }}">
                        @else
                            <div class="service-image bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fa fa-image fa-3x text-muted"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h4 class="mb-2">{{ $service->title }}</h4>
                        @if($service->short_title)
                            <p class="text-muted mb-2">{{ $service->short_title }}</p>
                        @endif
                        <div class="mb-3">
                            @if($service->featured)
                                <span class="featured-badge"><i class="fa fa-star"></i> Featured</span>
                            @endif
                            <span class="status-badge {{ $service->status ? 'status-active' : 'status-inactive' }}">
                                {{ $service->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="detail-row">
                    <div class="detail-label">Slug:</div>
                    <div>{{ $service->slug }}</div>
                </div>

                @if($service->category)
                <div class="detail-row">
                    <div class="detail-label">Category:</div>
                    <div>{{ $service->category }}</div>
                </div>
                @endif

                @if($service->short_description)
                <div class="detail-row">
                    <div class="detail-label">Short Description:</div>
                    <div>{{ $service->short_description }}</div>
                </div>
                @endif

                @if($service->description)
                <div class="detail-row">
                    <div class="detail-label">Full Description:</div>
                    <div>{!! $service->description !!}</div>
                </div>
                @endif

                @if($service->button_text || $service->button_link)
                <div class="detail-row">
                    <div class="detail-label">Button:</div>
                    <div>
                        Text: {{ $service->button_text ?? 'N/A' }}<br>
                        Link: {{ $service->button_link ?? 'N/A' }}
                    </div>
                </div>
                @endif

                @if($service->icon)
                <div class="detail-row">
                    <div class="detail-label">Icon:</div>
                    <div>{{ $service->icon }}</div>
                </div>
                @endif

                <div class="detail-row">
                    <div class="detail-label">Display Order:</div>
                    <div>{{ $service->display_order }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Created:</div>
                    <div>{{ $service->created_at->format('F j, Y, g:i a') }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Updated:</div>
                    <div>{{ $service->updated_at->format('F j, Y, g:i a') }}</div>
                </div>
            </div>
        </div>

        @if($service->banner_image)
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="mb-3">Banner Image</h5>
                <img src="{{ asset('storage/' . $service->banner_image) }}" class="img-fluid rounded" alt="Banner">
            </div>
        </div>
        @endif
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">SEO Information</h5>
            </div>
            <div class="card-body">
                @if($service->seo_title)
                <div class="mb-3">
                    <strong>SEO Title:</strong>
                    <p class="mb-0">{{ $service->seo_title }}</p>
                </div>
                @endif

                @if($service->seo_keywords)
                <div class="mb-3">
                    <strong>SEO Keywords:</strong>
                    <p class="mb-0">{{ $service->seo_keywords }}</p>
                </div>
                @endif

                @if($service->seo_description)
                <div class="mb-3">
                    <strong>SEO Description:</strong>
                    <p class="mb-0">{{ $service->seo_description }}</p>
                </div>
                @endif

                @if(!$service->seo_title && !$service->seo_keywords && !$service->seo_description)
                <p class="text-muted">No SEO information provided.</p>
                @endif
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.service.edit', $service) }}" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Edit Service
                    </a>
                    <button onclick="duplicateService({{ $service->id }})" class="btn btn-warning">
                        <i class="fa fa-copy"></i> Duplicate Service
                    </button>
                    <button onclick="toggleStatus({{ $service->id }})" class="btn btn-{{ $service->status ? 'danger' : 'success' }}">
                        <i class="fa fa-{{ $service->status ? 'times' : 'check' }}"></i> {{ $service->status ? 'Deactivate' : 'Activate' }}
                    </button>
                    <button onclick="deleteService({{ $service->id }})" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Delete Service
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteService(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route("admin.service.destroy", "") }}/' + id;
            }
        });
    }

    function duplicateService(id) {
        Swal.fire({
            title: 'Duplicate Service?',
            text: 'This will create a copy of this service.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, duplicate it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route("admin.service.duplicate", "") }}/' + id;
            }
        });
    }

    function toggleStatus(id) {
        Swal.fire({
            title: 'Toggle Status?',
            text: 'This will change the service status.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route("admin.service.toggle-status", "") }}/' + id;
            }
        });
    }
</script>
@endsection
