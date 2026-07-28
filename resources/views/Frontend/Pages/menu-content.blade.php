@extends('Frontend.includes.main')
@section('content')
    <!-- Menu Content Header Section -->
    <section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <h1 class="display-4 fw-bold text-danger animate-section-item">{{ $menu->name }}</h1>
        </div>
    </section>

    <!-- Menu Content Section -->
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                @if($menu->content)
                    <div class="menu-content">
                        {!! $menu->content !!}
                    </div>
                @else
                    <div class="alert alert-info">
                        <h4 class="alert-heading">No Content Available</h4>
                        <p>This menu item does not have any content yet. Please check back later or contact us for more information.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
