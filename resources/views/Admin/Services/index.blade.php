@extends('Admin.includes.main')
@section('head')
    <style>
        .service-card {
            transition: all 0.3s ease;
            cursor: move;
        }
        .service-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .service-card.dragging {
            opacity: 0.5;
            transform: scale(0.95);
        }
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
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
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .service-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
@endsection
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 1.5rem;">
    <h3>Our Services</h3>
    <div>
        <a href="{{ route('admin.service.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i>&nbsp; Add Service
        </a>
    </div>
</div>

<!-- Search and Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('admin.service.index') }}" method="GET" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search services..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="category" class="form-select">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa fa-search"></i> Search
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Services List -->
<div class="card">
    <div class="card-body">
        <div id="services-list">
            @forelse($services as $service)
                <div class="service-card row align-items-center p-3 mb-3 border rounded" data-id="{{ $service->id }}">
                    <div class="col-md-1 text-center">
                        <i class="fa fa-bars text-muted" style="cursor: move;"></i>
                    </div>
                    <div class="col-md-2">
                        @if($service->featured_image)
                            <img src="{{ asset('storage/' . $service->featured_image) }}" class="service-image" alt="{{ $service->title }}">
                        @else
                            <div class="service-image bg-light d-flex align-items-center justify-content-center">
                                <i class="fa fa-image text-muted"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h6 class="mb-1 fw-bold">{{ $service->title }}</h6>
                        @if($service->short_title)
                            <small class="text-muted">{{ $service->short_title }}</small>
                        @endif
                        @if($service->category)
                            <span class="badge bg-secondary">{{ $service->category }}</span>
                        @endif
                    </div>
                    <div class="col-md-2">
                        @if($service->featured)
                            <span class="featured-badge"><i class="fa fa-star"></i> Featured</span>
                        @endif
                        <span class="status-badge {{ $service->status ? 'status-active' : 'status-inactive' }}">
                            {{ $service->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <div class="col-md-3 text-end">
                        <div class="btn-group">
                            <a href="{{ route('admin.service.show', $service) }}" class="btn btn-sm btn-info" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.service.edit', $service) }}" class="btn btn-sm btn-primary" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button onclick="duplicateService({{ $service->id }})" class="btn btn-sm btn-warning" title="Duplicate">
                                <i class="fa fa-copy"></i>
                            </button>
                            <button onclick="toggleStatus({{ $service->id }})" class="btn btn-sm btn-{{ $service->status ? 'danger' : 'success' }}" title="{{ $service->status ? 'Deactivate' : 'Activate' }}">
                                <i class="fa fa-{{ $service->status ? 'times' : 'check' }}"></i>
                            </button>
                            <button onclick="deleteService({{ $service->id }})" class="btn btn-sm btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="fa fa-inbox fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No services found</h5>
                    <a href="{{ route('admin.service.create') }}" class="btn btn-primary mt-2">
                        <i class="fa fa-plus"></i> Add First Service
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Pagination -->
@if($services->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $services->links() }}
    </div>
@endif
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Drag and Drop Sorting
    var servicesList = document.getElementById('services-list');
    new Sortable(servicesList, {
        animation: 150,
        handle: '.fa-bars',
        ghostClass: 'dragging',
        onEnd: function(evt) {
            var order = [];
            document.querySelectorAll('.service-card').forEach(function(card) {
                order.push(card.getAttribute('data-id'));
            });
            
            $.ajax({
                url: '{{ route("admin.service.reorder") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    order: order
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Services reordered successfully!',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        }
    });

    // Delete Service
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
                $.ajax({
                    url: '{{ route("admin.service.destroy", "") }}/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Service has been deleted.',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    }
                });
            }
        });
    }

    // Duplicate Service
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
                $.ajax({
                    url: '{{ route("admin.service.duplicate", "") }}/' + id,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Duplicated!',
                            text: 'Service has been duplicated.',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    }
                });
            }
        });
    }

    // Toggle Status
    function toggleStatus(id) {
        $.ajax({
            url: '{{ route("admin.service.toggle-status", "") }}/' + id,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Service status updated!',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    location.reload();
                });
            }
        });
    }
</script>
@endsection
