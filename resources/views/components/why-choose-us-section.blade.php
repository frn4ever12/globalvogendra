@props(['features' => null])

@if($features && $features->count() > 0)
<section class="why-choose-us-section py-5" style="background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <span class="section-subtitle text-uppercase fw-bold" style="color: #16a34a; letter-spacing: 2px; font-size: 14px;">
                WHY CHOOSE US
            </span>
            <h2 class="section-title fw-bold mb-3" style="color: #2563eb; font-size: 3rem;">
                Why Choose Global Excel?
            </h2>
            <p class="section-subtitle-text text-muted" style="font-size: 1.2rem; max-width: 600px; margin: 0 auto;">
                Your trusted partner for studying, working and building your future in Germany.
            </p>
        </div>

        <!-- Feature Cards -->
        <div class="row g-4">
            @foreach($features->take(4) as $index => $feature)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="why-choose-card" 
                     data-aos="{{ $feature->animation ?? 'fade-up' }}" 
                     data-aos-delay="{{ $index * 100 }}"
                     style="background-color: {{ $feature->background_color ?? '#ffffff' }};">
                    
                    <!-- Icon/Image -->
                    <div class="feature-icon-wrapper" style="color: {{ $feature->icon_color ?? '#2563eb' }};">
                        @if($feature->image)
                            <img src="{{ asset('storage/' . $feature->image) }}" 
                                 alt="{{ $feature->title }}" 
                                 class="feature-image">
                        @elseif($feature->icon)
                            <i class="fa fa-{{ $feature->icon }} feature-icon"></i>
                        @else
                            <i class="fa fa-star feature-icon"></i>
                        @endif
                    </div>
                    
                    <!-- Counter -->
                    @if($feature->counter)
                    <div class="counter-wrapper">
                        <span class="counter-number" data-target="{{ preg_replace('/[^0-9]/', '', $feature->counter) }}">
                            0
                        </span>
                        <span class="counter-suffix">{{ $feature->counter_suffix ?? '' }}</span>
                    </div>
                    @endif
                    
                    <!-- Content -->
                    <div class="feature-content">
                        <h3 class="feature-title">{{ $feature->title }}</h3>
                        <p class="feature-description">{{ $feature->short_description }}</p>
                        
                        @if($feature->button_text && $feature->button_link)
                        <a href="{{ $feature->button_link }}" class="feature-btn">
                            {{ $feature->button_text }}
                            <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.why-choose-us-section {
    position: relative;
    overflow: hidden;
}

.why-choose-us-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2316a34a' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.5;
    z-index: 0;
}

.section-subtitle {
    display: inline-block;
    padding: 8px 20px;
    background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
    border-radius: 30px;
    margin-bottom: 15px;
}

.section-title {
    position: relative;
    z-index: 1;
}

.why-choose-card {
    position: relative;
    border-radius: 20px;
    padding: 40px 25px;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 2px solid transparent;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    height: 100%;
    z-index: 1;
    overflow: hidden;
}

.why-choose-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 20px;
    padding: 2px;
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    opacity: 0;
    transition: opacity 0.4s ease;
}

.why-choose-card:hover::before {
    opacity: 1;
}

.why-choose-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 60px rgba(22, 163, 74, 0.3);
}

.feature-icon-wrapper {
    width: 100px;
    height: 100px;
    margin: 0 auto 25px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(22, 163, 74, 0.1) 100%);
    position: relative;
    transition: all 0.4s ease;
}

.why-choose-card:hover .feature-icon-wrapper {
    transform: scale(1.1) rotate(5deg);
    background: linear-gradient(135deg, rgba(37, 99, 235, 0.2) 0%, rgba(22, 163, 74, 0.2) 100%);
}

.feature-icon-wrapper::before {
    content: '';
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    border-radius: 50%;
    border: 2px dashed currentColor;
    opacity: 0.3;
    animation: rotate 20s linear infinite;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.feature-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    transition: transform 0.4s ease;
}

.why-choose-card:hover .feature-image {
    transform: scale(1.2);
}

.feature-icon {
    font-size: 40px;
    transition: transform 0.4s ease;
}

.why-choose-card:hover .feature-icon {
    transform: scale(1.2);
}

.counter-wrapper {
    margin-bottom: 20px;
}

.counter-number {
    display: inline-block;
    font-size: 3rem;
    font-weight: 800;
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1;
}

.counter-suffix {
    font-size: 2rem;
    font-weight: 700;
    color: #2563eb;
    margin-left: 5px;
}

.feature-content {
    position: relative;
    z-index: 1;
}

.feature-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 15px;
    transition: color 0.3s ease;
}

.why-choose-card:hover .feature-title {
    color: #2563eb;
}

.feature-description {
    color: #64748b;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 20px;
}

.feature-btn {
    display: inline-flex;
    align-items: center;
    padding: 12px 30px;
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    color: white;
    text-decoration: none;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(22, 163, 74, 0.3);
}

.feature-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(22, 163, 74, 0.4);
    background: linear-gradient(135deg, #2563eb 0%, #16a34a 100%);
}

/* Responsive */
@media (max-width: 991px) {
    .section-title {
        font-size: 2.2rem;
    }
    
    .section-subtitle {
        font-size: 12px;
        padding: 6px 15px;
    }
    
    .section-subtitle-text {
        font-size: 1rem;
    }
    
    .why-choose-card {
        margin-bottom: 30px;
        padding: 35px 20px;
    }
    
    .feature-icon-wrapper {
        width: 90px;
        height: 90px;
    }
    
    .feature-icon {
        font-size: 36px;
    }
}

@media (max-width: 767px) {
    .section-title {
        font-size: 1.8rem;
    }
    
    .section-subtitle {
        font-size: 11px;
        padding: 5px 12px;
    }
    
    .section-subtitle-text {
        font-size: 0.9rem;
    }
    
    .why-choose-card {
        padding: 30px 15px;
    }
    
    .feature-icon-wrapper {
        width: 70px;
        height: 70px;
        margin-bottom: 20px;
    }
    
    .feature-icon {
        font-size: 28px;
    }
    
    .feature-title {
        font-size: 1.1rem;
        margin-bottom: 12px;
    }
    
    .feature-description {
        font-size: 0.85rem;
        margin-bottom: 15px;
    }
    
    .counter-number {
        font-size: 2.5rem;
    }
    
    .counter-suffix {
        font-size: 1.5rem;
    }
    
    .feature-btn {
        font-size: 0.8rem;
        padding: 10px 20px;
    }
}

@media (max-width: 576px) {
    .section-title {
        font-size: 1.5rem;
    }
    
    .section-subtitle {
        font-size: 10px;
        padding: 4px 10px;
    }
    
    .section-subtitle-text {
        font-size: 0.85rem;
    }
    
    .why-choose-card {
        padding: 25px 12px;
    }
    
    .feature-icon-wrapper {
        width: 60px;
        height: 60px;
        margin-bottom: 15px;
    }
    
    .feature-icon {
        font-size: 24px;
    }
    
    .feature-title {
        font-size: 1rem;
        margin-bottom: 10px;
    }
    
    .feature-description {
        font-size: 0.8rem;
        margin-bottom: 12px;
    }
    
    .counter-number {
        font-size: 2rem;
    }
    
    .counter-suffix {
        font-size: 1.2rem;
    }
    
    .feature-btn {
        font-size: 0.75rem;
        padding: 8px 15px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Counter animation when section becomes visible
    const counters = document.querySelectorAll('.counter-number');
    const observerOptions = {
        threshold: 0.5
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-target'));
                let current = 0;
                const increment = target / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 30);
                observer.unobserve(counter);
            }
        });
    }, observerOptions);
    
    counters.forEach(counter => {
        observer.observe(counter);
    });
});
</script>
@endif
