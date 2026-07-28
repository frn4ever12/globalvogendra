@extends('Frontend.includes.main')
@section('content')
<div class="container py-5">
    <!-- Page Header -->
    <div class="text-center mb-5">
        <h6 class="text-success fw-bold text-uppercase mb-2" style="letter-spacing: 2px;">Our Services</h6>
        <h1 class="fw-bold mb-3" style="color: #0056b3; font-size: 3rem;">All Services</h1>
        <div class="mx-auto" style="width: 80px; height: 4px; background: linear-gradient(90deg, #28a745, #0056b3); border-radius: 2px;"></div>
    </div>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
        </ol>
    </nav>

    <!-- Services Grid -->
    <div class="row g-4">
        @forelse($services as $service)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="service-card h-100 bg-white rounded shadow-sm overflow-hidden" 
                     style="transition: all 0.3s ease; border: 1px solid #e9ecef;"
                     data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    
                    <!-- Featured Image -->
                    @if($service->featured_image)
                        <div class="service-image-wrapper position-relative" style="height: 200px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $service->featured_image) }}" 
                                 class="w-100 h-100" 
                                 alt="{{ $service->title }}"
                                 style="object-fit: cover; transition: transform 0.3s ease;"
                                 loading="lazy">
                            @if($service->featured)
                                <span class="position-absolute top-0 end-0 m-3 px-3 py-1 rounded-pill bg-warning text-dark fw-bold" style="font-size: 12px;">
                                    <i class="fa fa-star"></i> Featured
                                </span>
                            @endif
                        </div>
                    @else
                        <div class="service-image-wrapper position-relative bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            @if($service->icon)
                                <i class="{{ $service->icon }} fa-4x text-muted"></i>
                            @else
                                <i class="fa fa-cogs fa-4x text-muted"></i>
                            @endif
                        </div>
                    @endif

                    <!-- Card Content -->
                    <div class="p-4">
                        @if($service->category)
                            <span class="badge bg-secondary mb-2">{{ $service->category }}</span>
                        @endif
                        
                        <h5 class="fw-bold mb-3" style="color: #333; font-size: 1.25rem;">{{ $service->title }}</h5>
                        
                        @if($service->short_description)
                            <p class="text-muted mb-4" style="font-size: 0.95rem; line-height: 1.6;">
                                {{ Str::limit(strip_tags($service->short_description), 150) }}
                            </p>
                        @endif

                        <a href="{{ route('service.detail', $service->slug) }}" 
                           class="btn btn-primary rounded-pill px-4 py-2 w-100"
                           style="background: linear-gradient(135deg, #0056b3, #003a80); border: none; transition: all 0.3s ease;">
                            {{ $service->button_text ?? 'Read More' }}
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="fa fa-inbox fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No services available at the moment.</h5>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($services->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $services->links() }}
        </div>
    @endif
</div>

<style>
    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 86, 179, 0.15) !important;
    }

    .service-card:hover .service-image-wrapper img {
        transform: scale(1.1);
    }

    .service-card:hover .btn-primary {
        background: linear-gradient(135deg, #003a80, #0056b3) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 86, 179, 0.3);
    }
</style>
@endsection
