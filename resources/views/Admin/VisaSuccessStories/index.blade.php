@extends('Admin.includes.main')
@section('head')
    <style>
        .story-card {
            transition: all 0.3s ease;
            cursor: move;
        }
        .story-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .story-card.dragging {
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
        .student-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
        }
        .rating-stars {
            color: #ffc107;
        }
    </style>
@endsection
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 1.5rem;">
    <h3>Visa Success Stories</h3>
    <div>
        <a href="{{ route('admin.visa-success-story.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i>&nbsp; Add Story
        </a>
    </div>
</div>

<!-- Search and Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('admin.visa-success-story.index') }}" method="GET" class="row g-3">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="Search stories..." value="{{ request('search') }}">
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

<!-- Stories List -->
<div class="card">
    <div class="card-body">
        <div id="stories-list">
            @forelse($stories as $story)
                <div class="story-card row align-items-center p-3 mb-3 border rounded" data-id="{{ $story->id }}">
                    <div class="col-md-1 text-center">
                        <i class="fa fa-bars text-muted" style="cursor: move;"></i>
                    </div>
                    <div class="col-md-2">
                        @if($story->student_image)
                            <img src="{{ asset('storage/' . $story->student_image) }}" class="student-image" alt="{{ $story->student_name }}">
                        @else
                            <div class="student-image bg-light d-flex align-items-center justify-content-center">
                                <i class="fa fa-user text-muted"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h6 class="mb-1 fw-bold">{{ $story->student_name }}</h6>
                        <small class="text-muted">{{ $story->university }}</small>
                        <div class="rating-stars">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $story->rating)
                                    <i class="fa fa-star"></i>
                                @else
                                    <i class="fa fa-star-o"></i>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <div class="col-md-2">
                        <span class="badge bg-info">{{ $story->country }}</span>
                        <span class="badge bg-secondary">{{ $story->course }}</span>
                    </div>
                    <div class="col-md-2">
                        @if($story->visa_date)
                            <small class="text-muted">{{ $story->visa_date->format('M d, Y') }}</small>
                        @endif
                        <span class="status-badge {{ $story->status ? 'status-active' : 'status-inactive' }}">
                            {{ $story->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <div class="col-md-1 text-end">
                        <div class="btn-group">
                            <a href="{{ route('admin.visa-success-story.show', $story) }}" class="btn btn-sm btn-info" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.visa-success-story.edit', $story) }}" class="btn btn-sm btn-primary" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button onclick="toggleStatus({{ $story->id }})" class="btn btn-sm btn-{{ $story->status ? 'danger' : 'success' }}" title="{{ $story->status ? 'Deactivate' : 'Activate' }}">
                                <i class="fa fa-{{ $story->status ? 'times' : 'check' }}"></i>
                            </button>
                            <button onclick="deleteStory({{ $story->id }})" class="btn btn-sm btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="fa fa-inbox fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No stories found</h5>
                    <a href="{{ route('admin.visa-success-story.create') }}" class="btn btn-primary mt-2">
                        <i class="fa fa-plus"></i> Add First Story
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Pagination -->
@if($stories->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $stories->links() }}
    </div>
@endif
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Drag and Drop Sorting
    var storiesList = document.getElementById('stories-list');
    new Sortable(storiesList, {
        animation: 150,
        handle: '.fa-bars',
        ghostClass: 'dragging',
        onEnd: function(evt) {
            var order = [];
            document.querySelectorAll('.story-card').forEach(function(card) {
                order.push(card.getAttribute('data-id'));
            });
            
            $.ajax({
                url: '{{ route("admin.visa-success-story.reorder") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    order: order
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Stories reordered successfully!',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        }
    });

    // Delete Story
    function deleteStory(id) {
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
                    url: '{{ route("admin.visa-success-story.destroy", "") }}/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Story has been deleted.',
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
            url: '{{ route("admin.visa-success-story.toggle-status", "") }}/' + id,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Story status updated!',
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
