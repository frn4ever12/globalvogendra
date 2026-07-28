@props(['processes' => null])

@if($processes && $processes->count() > 0)
<section class="process-section py-5" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <span class="section-subtitle text-uppercase fw-bold" style="color: #16a34a; letter-spacing: 2px; font-size: 14px;">
                OUR JOURNEY
            </span>
            <h2 class="section-title fw-bold mb-3" style="color: #2563eb; font-size: 3rem;">
                Your Journey Towards Germany
            </h2>
            <p class="section-subtitle-text text-muted" style="font-size: 1.2rem; max-width: 600px; margin: 0 auto;">
                We simplify every step of your international education journey.
            </p>
        </div>

        <!-- Process Cards -->
        <div class="row g-4">
            @foreach($processes->take(4) as $index => $process)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="process-card" 
                     data-aos="{{ $process->animation ?? 'fade-up' }}" 
                     data-aos-delay="{{ $index * 100 }}"
                     style="background-color: {{ $process->background_color ?? '#ffffff' }};">
                    
                    <!-- Step Badge -->
                    <div class="step-badge">
                        <span>STEP</span>
                        <span class="step-number">{{ $process->step_no }}</span>
                    </div>
                    
                    <!-- Icon/Image -->
                    <div class="process-icon-wrapper" style="color: {{ $process->icon_color ?? '#2563eb' }};">
                        @if($process->image)
                            <img src="{{ asset('storage/' . $process->image) }}" 
                                 alt="{{ $process->title }}" 
                                 class="process-image">
                        @elseif($process->icon)
                            <i class="fa fa-{{ $process->icon }} process-icon"></i>
                        @else
                            <i class="fa fa-graduation-cap process-icon"></i>
                        @endif
                    </div>
                    
                    <!-- Content -->
                    <div class="process-content">
                        <h3 class="process-title">{{ $process->title }}</h3>
                        <p class="process-description">{{ Str::limit(strip_tags($process->description), 100) }}</p>
                        
                        @if($process->button_text && $process->button_link)
                        <a href="{{ $process->button_link }}" class="process-btn">
                            {{ $process->button_text }}
                            <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                        @endif
                    </div>
                    
                    <!-- Connector Line (Desktop) -->
                    @if($index < 3)
                    <div class="connector-line d-none d-lg-block">
                        <svg viewBox="0 0 100 20" preserveAspectRatio="none">
                            <path d="M0,10 Q50,0 100,10" fill="none" stroke="#2563eb" stroke-width="2" stroke-dasharray="5,5"/>
                        </svg>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.process-section {
    position: relative;
    overflow: hidden;
}

.process-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%232563eb' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
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

.process-card {
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
}

.process-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 60px rgba(37, 99, 235, 0.3);
    border-color: #2563eb;
}

.step-badge {
    position: absolute;
    top: -15px;
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%);
    color: white;
    padding: 8px 20px;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    box-shadow: 0 4px 15px rgba(22, 163, 74, 0.4);
    z-index: 2;
}

.step-number {
    display: block;
    font-size: 18px;
    font-weight: 800;
}

.process-icon-wrapper {
    width: 100px;
    height: 100px;
    margin: 0 auto 25px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(37, 99, 235, 0.05) 100%);
    position: relative;
    transition: all 0.4s ease;
}

.process-card:hover .process-icon-wrapper {
    transform: scale(1.1) rotate(5deg);
    background: linear-gradient(135deg, rgba(37, 99, 235, 0.2) 0%, rgba(37, 99, 235, 0.1) 100%);
}

.process-icon-wrapper::before {
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

.process-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
}

.process-icon {
    font-size: 40px;
}

.process-content {
    position: relative;
    z-index: 1;
}

.process-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 15px;
    transition: color 0.3s ease;
}

.process-card:hover .process-title {
    color: #2563eb;
}

.process-description {
    color: #64748b;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 20px;
}

.process-btn {
    display: inline-flex;
    align-items: center;
    padding: 12px 30px;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: white;
    text-decoration: none;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
}

.process-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
    background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
}

.connector-line {
    position: absolute;
    top: 50%;
    right: -30px;
    width: 60px;
    height: 20px;
    transform: translateY(-50%);
    z-index: 0;
}

.connector-line svg {
    width: 100%;
    height: 100%;
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
    
    .process-card {
        margin-bottom: 30px;
        padding: 35px 20px;
    }
    
    .process-icon-wrapper {
        width: 90px;
        height: 90px;
    }
    
    .process-icon {
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
    
    .process-card {
        padding: 30px 15px;
    }
    
    .process-icon-wrapper {
        width: 70px;
        height: 70px;
        margin-bottom: 20px;
    }
    
    .process-icon {
        font-size: 28px;
    }
    
    .process-title {
        font-size: 1.1rem;
        margin-bottom: 12px;
    }
    
    .process-description {
        font-size: 0.85rem;
        margin-bottom: 15px;
    }
    
    .process-btn {
        font-size: 0.8rem;
        padding: 10px 20px;
    }
    
    .step-badge {
        padding: 6px 15px;
        font-size: 10px;
    }
    
    .step-number {
        font-size: 16px;
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
    
    .process-card {
        padding: 25px 12px;
    }
    
    .process-icon-wrapper {
        width: 60px;
        height: 60px;
        margin-bottom: 15px;
    }
    
    .process-icon {
        font-size: 24px;
    }
    
    .process-title {
        font-size: 1rem;
        margin-bottom: 10px;
    }
    
    .process-description {
        font-size: 0.8rem;
        margin-bottom: 12px;
    }
    
    .process-btn {
        font-size: 0.75rem;
        padding: 8px 15px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Counter animation for step numbers
    const stepNumbers = document.querySelectorAll('.step-number');
    stepNumbers.forEach((number, index) => {
        const target = parseInt(number.textContent);
        let current = 0;
        const increment = target / 20;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                number.textContent = target;
                clearInterval(timer);
            } else {
                number.textContent = Math.floor(current);
            }
        }, 50 + (index * 20));
    });
});
</script>
@endif
