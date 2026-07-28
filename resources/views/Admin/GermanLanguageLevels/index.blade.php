@extends('Admin.includes.main')
@section('head')
    <style>
        .level-card {
            transition: all 0.3s ease;
            cursor: move;
        }
        .level-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .level-card.dragging {
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
        .level-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        .level-badge {
            background: linear-gradient(135deg, #0056b3, #003a80);
            color: white;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 1.5rem;">
    <h3>German Language Levels</h3>
    <div>
        <a href="{{ route('admin.german-language-level.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i>&nbsp; Add Level
        </a>
    </div>
</div>

<!-- Search and Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('admin.german-language-level.index') }}" method="GET" class="row g-3">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="Search levels..." value="{{ request('search') }}">
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

<!-- Levels List -->
<div class="card">
    <div class="card-body">
        <div id="levels-list">
            @forelse($levels as $level)
                <div class="level-card row align-items-center p-3 mb-3 border rounded" data-id="{{ $level->id }}">
                    <div class="col-md-1 text-center">
                        <i class="fa fa-bars text-muted" style="cursor: move;"></i>
                    </div>
                    <div class="col-md-1">
                        <div class="level-badge">{{ $level->level_code }}</div>
                    </div>
                    <div class="col-md-2">
                        @if($level->image)
                            <img src="{{ asset('storage/' . $level->image) }}" class="level-image" alt="{{ $level->title }}">
                        @elseif($level->icon)
                            <div class="level-image bg-light d-flex align-items-center justify-content-center">
                                <i class="fa fa-{{ $level->icon }} text-muted"></i>
                            </div>
                        @else
                            <div class="level-image bg-light d-flex align-items-center justify-content-center">
                                <i class="fa fa-image text-muted"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h6 class="mb-1 fw-bold">{{ $level->title }}</h6>
                        <small class="text-muted">{{ Str::limit($level->short_description, 50) }}</small>
                        @if($level->ribbon)
                            <span class="badge bg-warning">{{ $level->ribbon }}</span>
                        @endif
                    </div>
                    <div class="col-md-2">
                        @if($level->animation)
                            <span class="badge bg-info">{{ $level->animation }}</span>
                        @endif
                        <span class="status-badge {{ $level->status ? 'status-active' : 'status-inactive' }}">
                            {{ $level->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <div class="col-md-2 text-end">
                        <div class="btn-group">
                            <a href="{{ route('admin.german-language-level.show', $level) }}" class="btn btn-sm btn-info" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.german-language-level.edit', $level) }}" class="btn btn-sm btn-primary" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button onclick="toggleStatus({{ $level->id }})" class="btn btn-sm btn-{{ $level->status ? 'danger' : 'success' }}" title="{{ $level->status ? 'Deactivate' : 'Activate' }}">
                                <i class="fa fa-{{ $level->status ? 'times' : 'check' }}"></i>
                            </button>
                            <button onclick="deleteLevel({{ $level->id }})" class="btn btn-sm btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="fa fa-inbox fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No levels found</h5>
                    <a href="{{ route('admin.german-language-level.create') }}" class="btn btn-primary mt-2">
                        <i class="fa fa-plus"></i> Add First Level
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Pagination -->
@if($levels->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $levels->links() }}
    </div>
@endif
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Drag and Drop Sorting
    var levelsList = document.getElementById('levels-list');
    new Sortable(levelsList, {
        animation: 150,
        handle: '.fa-bars',
        ghostClass: 'dragging',
        onEnd: function(evt) {
            var order = [];
            document.querySelectorAll('.level-card').forEach(function(card) {
                order.push(card.getAttribute('data-id'));
            });
            
            $.ajax({
                url: '{{ route("admin.german-language-level.reorder") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    order: order
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Levels reordered successfully!',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        }
    });

    // Delete Level
    function deleteLevel(id) {
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
                    url: '{{ route("admin.german-language-level.destroy", "") }}/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Level has been deleted.',
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
            url: '{{ route("admin.german-language-level.toggle-status", "") }}/' + id,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Level status updated!',
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
