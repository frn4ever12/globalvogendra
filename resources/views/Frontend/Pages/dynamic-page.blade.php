@extends('Frontend.includes.main')
@section('content')
    <!-- Full-width Banner Section -->
    @if($page->banner_image || $subMenu->banner_image)
    <section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <h1 class="display-4 fw-bold text-danger animate-section-item">{{ $page->title }}</h1>
            @if($page->subtitle)
                <h3 class="mt-3">{{ $page->subtitle }}</h3>
            @endif
        </div>
    </section>
    @endif

    <!-- Breadcrumb -->
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('menu.page', $menu->slug) }}">{{ $menu->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $subMenu->name }}</li>
            </ol>
        </nav>
    </div>

    <!-- Main Content Section -->
    <div class="container py-5">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-lg-3 mb-4">
                <div class="card shadow-sm sticky-top" style="top: 100px;">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Quick Links</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @foreach($menu->subMenus as $relatedSubMenu)
                                <li class="list-group-item">
                                    <a href="{{ route('submenu.page', [$menu->slug, $relatedSubMenu->slug]) }}" 
                                       class="text-decoration-none {{ $relatedSubMenu->id == $subMenu->id ? 'fw-bold text-primary' : 'text-dark' }}">
                                        {{ $relatedSubMenu->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <!-- Render Page Sections -->
                @if($page->sections && $page->sections->count() > 0)
                    @foreach($page->sections->sortBy('sort_order') as $section)
                        <x-section-renderer :section="$section" />
                    @endforeach
                @else
                    <div class="alert alert-info">
                        <h4 class="alert-heading">No Content Available</h4>
                        <p>This section is currently being updated. Please check back later.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
