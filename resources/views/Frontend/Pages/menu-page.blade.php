@extends('Frontend.includes.main')
@section('content')
    <!-- Full-width Banner Section -->
    @if($menu->icon)
    <section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <h1 class="display-4 fw-bold text-danger animate-section-item">
                @if($menu->icon)
                    <i class="{{ $menu->icon }} me-2"></i>
                @endif
                {{ $menu->name }}
            </h1>
            <p class="lead mt-3">Explore our {{ $menu->name }} services and offerings</p>
        </div>
    </section>
    @endif

    <!-- Breadcrumb -->
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $menu->name }}</li>
            </ol>
        </nav>
    </div>

    <!-- Sub Menus Grid -->
    <div class="container py-5">
        @if($subMenus->count() > 0)
            <div class="row">
                @foreach($subMenus as $subMenu)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 shadow-sm hover-shadow transition-all">
                            @if($subMenu->banner_image)
                                <img src="{{ asset('storage/' . $subMenu->banner_image) }}" class="card-img-top" alt="{{ $subMenu->name }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $subMenu->name }}</h5>
                                <p class="card-text text-muted">Learn more about {{ $subMenu->name }}</p>
                                <a href="{{ route('submenu.page', [$menu->id, $subMenu->id]) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                <h4 class="alert-heading">No Content Available</h4>
                <p>This section is currently being updated. Please check back later.</p>
            </div>
        @endif
    </div>
@endsection
