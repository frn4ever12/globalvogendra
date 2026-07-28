@props(['aboutUs'])

@if($aboutUs)
    <section class="about-us-section" style="background-color: {{ $aboutUs->background_color ?? '#f8f9fa' }}; padding: 4rem 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                    @if($aboutUs->image)
                        <img src="{{ asset('storage/' . $aboutUs->image) }}" 
                             class="img-fluid rounded shadow" 
                             alt="{{ $aboutUs->title }}"
                             style="width: 100%; height: auto; object-fit: contain; max-height: 400px;"
                             data-aos="fade-right">
                    @endif
                </div>
                <div class="col-lg-6 col-md-12">
                    <div style="color: {{ $aboutUs->text_color ?? '#333333' }};" data-aos="fade-left">
                        @if($aboutUs->title)
                            <h2 class="fw-bold mb-3" style="font-size: 2.5rem;">{{ $aboutUs->title }}</h2>
                        @endif
                        
                        @if($aboutUs->description)
                            <div class="mb-4" style="font-size: 1.1rem; line-height: 1.8;">
                                {!! $aboutUs->description !!}
                            </div>
                        @endif
                        
                        @if($aboutUs->button_text)
                            <a href="{{ route('about') }}" 
                               class="btn btn-lg rounded-pill px-5 py-3"
                               style="background: linear-gradient(135deg, #0056b3, #003a80); color: white; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                                {{ $aboutUs->button_text }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
