@extends('Admin.includes.main')
@section('head')
    <style>
        .process-card {
            transition: all 0.3s ease;
            cursor: move;
        }
        .process-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .process-card.dragging {
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
        .process-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        .step-badge {
            background: linear-gradient(135deg, #0056b3, #003a80);
            color: white;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font_weight: bold;
        }
    </style>
@endsection
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 1.5rem;">
    <h3>Process Management</h3>
    <div>
        <a href="{{ route('admin.process.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i>&nbsp; Add Process
        </a>
    </div>
</div>

<!-- Search and Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('admin.process.index') }}" method="GET" class="row g-3">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="Search processes..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa fa-search"></i> Search
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Processes List -->
<div class="card">
    <div class="card-body">
        <div id="processes-list">
            @forelse($processes as $process)
                <div class="process-card row align-items-center p-3 mb-3 border rounded" data-id="{{ $process->id }}">
                    <div class="col-md-1 text-center">
                        <i class="fa fa-bars text-muted" style="cursor: move;"></i>
                    </div>
                    <div class="col-md-1">
                        <div class="step-badge">{{ $process->step_no }}</div>
                    </div>
                    <div class="col-md-2">
                        @if($process->image)
                            <img src="{{ asset('storage/' . $process->image) }}" class="process-image" alt="{{ $process->title }}">
                        @elseif($process->icon)
                            <div class="process-image bg-light d-flex align-items-center justify-content-center">
                                <i class="fa fa-{{ $process->icon }} text-muted"></i>
                            </div>
                        @else
                            <div class="process-image bg-light d-flex align-items-center justify-content-center">
                                <i class="fa fa-image text-muted"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h6 class="mb-1 fw-bold">{{ $process->title }}</h6>
                        <small class="text-muted">{{ Str::limit($process->description, 50) }}</small>
                        @if($process->animation)
                            <span class="badge bg-info">{{ $process->animation }}</span>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <span class="status-badge {{ $process->status ? 'status-active' : 'status-inactive' }}">
                            {{ $process->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <div class="col-md-2 text-end">
                        <div class="btn-group">
                            <a href="{{ route('admin.process.show', $process) }}" class="btn btn-sm btn-info" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.process.edit', $process) }}" class="btn btn-sm btn-primary" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button onclick="toggleStatus({{ $process->id }})" class="btn btn-sm btn-{{ $process->status ? 'danger' : 'success' }}" title="{{ $process->status ? 'Deactivate' : 'Activate' }}">
                                <i class="fa fa-{{ $process->status ? 'times' : 'check' }}"></i>
                            </button>
                            <button onclick="deleteProcess({{ $process->id }})" class="btn btn-sm btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="fa fa-inbox fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No processes found</h5>
                    <a href="{{ route('admin.process.create') }}" class="btn btn-primary mt-2">
                        <i class="fa fa-plus"></i> Add First Process
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Pagination -->
@if($processes->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $processes->links() }}
    </div>
@endif
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Drag and Drop Sorting
    var processesList = document.getElementById('processes-list');
    new Sortable(processesList, {
        animation: 150,
        handle: '.fa-bars',
        ghostClass: 'dragging',
        onEnd: function(evt) {
            var order = [];
            document.querySelectorAll('.process-card').forEach(function(card) {
                order.push(card.getAttribute('data-id'));
            });
            
            $.ajax({
                url: '{{ route("admin.process.reorder") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    order: order
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Processes reordered successfully!',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        }
    });

    // Delete Process
    function deleteProcess(id) {
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
                    url: '{{ route("admin.process.destroy", "") }}/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Process has been deleted.',
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
            url: '{{ route("admin.process.toggle-status", "") }}/' + id,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Process status updated!',
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
