@props(['stories' => null])

@if($stories && $stories->count() > 0)
<section class="visa-success-stories-section py-5" style="background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%); position: relative; overflow: hidden;">
    <!-- Background Pattern -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%2316a34a\' fill-opacity=\'0.03\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); opacity: 0.5; z-index: 0;"></div>
    
    <div class="container" style="position: relative; z-index: 1;">
        <!-- Animated Counters -->
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="counter-box text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="counter-number" data-target="500">0</div>
                    <div class="counter-label">Visa Approved</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="counter-box text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="counter-number" data-target="98">0</div>
                    <div class="counter-label">Success Rate %</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="counter-box text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="counter-number" data-target="150">0</div>
                    <div class="counter-label">Partner Universities</div>
                </div>
            </div>
        </div>

        <!-- Section Header -->
        <div class="text-center mb-5">
            <span class="section-subtitle text-uppercase fw-bold" style="color: #16a34a; letter-spacing: 2px; font-size: 14px;">
                SUCCESS STORIES
            </span>
            <h2 class="section-title fw-bold mb-3" style="color: #2563eb; font-size: 3rem;">
                Our Successful Visa Stories
            </h2>
            <p class="section-subtitle-text text-muted" style="font-size: 1.2rem; max-width: 600px; margin: 0 auto;">
                Real students. Real visas. Real success.
            </p>
        </div>

        <!-- Filters -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="filter-buttons text-center">
                    <button class="filter-btn active" data-filter="all">All</button>
                    @foreach($stories->pluck('country')->unique() as $country)
                    <button class="filter-btn" data-filter="{{ $country }}">{{ $country }}</button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Stories Slider -->
        <div class="stories-slider position-relative">
            <div class="stories-container row g-4">
                @foreach($stories as $index => $story)
                <div class="col-lg-4 col-md-6 col-12 story-item" data-country="{{ $story->country }}">
                    <div class="story-card" 
                         data-aos="fade-up" 
                         data-aos-delay="{{ $index * 100 }}"
                         onclick="openStoryModal({{ $story->id }})">
                        
                        <!-- Visa Approved Badge -->
                        <div class="visa-badge">
                            <i class="fa fa-check-circle"></i>
                            <span>Visa Approved</span>
                        </div>
                        
                        <!-- Student Photo -->
                        <div class="student-photo-wrapper">
                            @if($story->student_image)
                                <img src="{{ asset('storage/' . $story->student_image) }}" 
                                     alt="{{ $story->student_name }}" 
                                     class="student-photo">
                            @else
                                <div class="student-photo-placeholder">
                                    <i class="fa fa-user"></i>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Content -->
                        <div class="story-content">
                            <div class="country-badge">
                                <i class="fa fa-globe"></i>
                                <span>{{ $story->country }}</span>
                            </div>
                            
                            <h3 class="student-name">{{ $story->student_name }}</h3>
                            
                            <div class="university-info">
                                <i class="fa fa-university"></i>
                                <span>{{ $story->university }}</span>
                            </div>
                            
                            <div class="course-info">
                                <i class="fa fa-book"></i>
                                <span>{{ $story->course }}</span>
                            </div>
                            
                            @if($story->visa_date)
                            <div class="visa-date">
                                <i class="fa fa-calendar"></i>
                                <span>{{ $story->visa_date->format('M d, Y') }}</span>
                            </div>
                            @endif
                            
                            <!-- Rating -->
                            <div class="rating">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $story->rating)
                                        <i class="fa fa-star"></i>
                                    @else
                                        <i class="fa fa-star-o"></i>
                                    @endif
                                @endfor
                            </div>
                            
                            @if($story->testimonial)
                            <p class="testimonial">{{ Str::limit($story->testimonial, 80) }}</p>
                            @endif
                            
                            <button class="read-more-btn">
                                Read Full Story
                                <i class="fa fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Slider Navigation -->
            <div class="slider-nav">
                <button class="nav-btn prev-btn" onclick="prevSlide()">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <button class="nav-btn next-btn" onclick="nextSlide()">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Story Modal -->
<div class="story-modal" id="storyModal">
    <div class="modal-content">
        <div class="modal-close" onclick="closeStoryModal()">
            <i class="fa fa-times"></i>
        </div>
        <div class="modal-body" id="modalBody">
            <!-- Dynamic content will be loaded here -->
        </div>
    </div>
</div>

<style>
.visa-success-stories-section {
    position: relative;
}

.counter-box {
    padding: 30px 20px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.counter-box:hover {
    transform: translateY(-5px);
}

.counter-number {
    font-size: 3rem;
    font-weight: 800;
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.counter-label {
    font-size: 1.1rem;
    color: #64748b;
    font-weight: 600;
    margin-top: 10px;
}

.section-subtitle {
    display: inline-block;
    padding: 8px 20px;
    background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
    border-radius: 30px;
    margin-bottom: 15px;
}

.filter-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 10px 25px;
    border: 2px solid #e2e8f0;
    background: white;
    border-radius: 25px;
    font-weight: 600;
    color: #64748b;
    transition: all 0.3s ease;
    cursor: pointer;
}

.filter-btn:hover,
.filter-btn.active {
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    color: white;
    border-color: transparent;
}

.stories-slider {
    position: relative;
}

.stories-container {
    transition: transform 0.5s ease;
}

.story-card {
    background: white;
    border-radius: 24px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 2px solid transparent;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    height: 100%;
}

.story-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 24px;
    padding: 2px;
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    opacity: 0;
    transition: opacity 0.4s ease;
}

.story-card:hover::before {
    opacity: 1;
}

.story-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 60px rgba(22, 163, 74, 0.3);
}

.visa-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%);
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 5px;
    box-shadow: 0 4px 15px rgba(22, 163, 74, 0.4);
    z-index: 2;
}

.student-photo-wrapper {
    width: 100px;
    height: 100px;
    margin: 0 auto 20px;
    position: relative;
}

.student-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid #f0f9ff;
    transition: transform 0.4s ease;
}

.story-card:hover .student-photo {
    transform: scale(1.1);
    border-color: #dcfce7;
}

.student-photo-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: #2563eb;
}

.story-content {
    position: relative;
    z-index: 1;
}

.country-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    color: #2563eb;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 15px;
}

.student-name {
    font-size: 1.3rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 10px;
}

.university-info,
.course-info,
.visa-date {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 0.9rem;
    color: #64748b;
    margin-bottom: 8px;
}

.university-info i,
.course-info i,
.visa-date i {
    color: #16a34a;
}

.rating {
    color: #ffc107;
    margin: 15px 0;
    font-size: 1.1rem;
}

.testimonial {
    color: #64748b;
    font-size: 0.9rem;
    line-height: 1.6;
    margin-bottom: 20px;
}

.read-more-btn {
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(22, 163, 74, 0.3);
}

.read-more-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(22, 163, 74, 0.4);
}

.slider-nav {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    padding: 0 -50px;
    pointer-events: none;
}

.nav-btn {
    pointer-events: auto;
    background: white;
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: all 0.3s ease;
    color: #2563eb;
}

.nav-btn:hover {
    background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
    color: white;
    transform: scale(1.1);
}

/* Modal Styles */
.story-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.8);
    z-index: 9999;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.story-modal.active {
    display: flex;
}

.modal-content {
    background: white;
    border-radius: 24px;
    max-width: 800px;
    width: 100%;
    max-height: 90vh;
    overflow-y: auto;
    position: relative;
}

.modal-close {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(0, 0, 0, 0.1);
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 10;
}

.modal-close:hover {
    background: rgba(0, 0, 0, 0.2);
}

.modal-body {
    padding: 40px;
}

/* Responsive */
@media (max-width: 991px) {
    .section-title {
        font-size: 2.2rem;
    }
    
    .counter-number {
        font-size: 2.5rem;
    }
}

@media (max-width: 767px) {
    .section-title {
        font-size: 1.8rem;
    }
    
    .counter-number {
        font-size: 2rem;
    }
    
    .counter-label {
        font-size: 1rem;
    }
    
    .story-card {
        padding: 25px 20px;
    }
    
    .slider-nav {
        padding: 0 -20px;
    }
}
</style>

<script>
// Animated Counters
const counters = document.querySelectorAll('.counter-number');
const speed = 200;

const animateCounters = () => {
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const inc = target / speed;

        if (count < target) {
            counter.innerText = Math.ceil(count + inc);
            setTimeout(animateCounters, 1);
        } else {
            counter.innerText = target;
        }
    });
};

// Trigger counters when in view
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounters();
            counterObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.counter-box').forEach(box => {
    counterObserver.observe(box);
});

// Filter functionality
const filterBtns = document.querySelectorAll('.filter-btn');
const storyItems = document.querySelectorAll('.story-item');

filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        // Remove active class from all buttons
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const filter = btn.getAttribute('data-filter');

        storyItems.forEach(item => {
            if (filter === 'all' || item.getAttribute('data-country') === filter) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});

// Slider functionality
let currentSlide = 0;
const slidesPerView = window.innerWidth >= 992 ? 3 : window.innerWidth >= 768 ? 2 : 1;
const totalSlides = {{ $stories->count() }};

function nextSlide() {
    const maxSlide = totalSlides - slidesPerView;
    currentSlide = currentSlide >= maxSlide ? 0 : currentSlide + 1;
    updateSlider();
}

function prevSlide() {
    const maxSlide = totalSlides - slidesPerView;
    currentSlide = currentSlide <= 0 ? maxSlide : currentSlide - 1;
    updateSlider();
}

function updateSlider() {
    const container = document.querySelector('.stories-container');
    const slideWidth = 100 / slidesPerView;
    container.style.transform = `translateX(-${currentSlide * slideWidth}%)`;
}

// Auto-slide
let autoSlideInterval = setInterval(nextSlide, 5000);

// Pause on hover
const slider = document.querySelector('.stories-slider');
slider.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
slider.addEventListener('mouseleave', () => autoSlideInterval = setInterval(nextSlide, 5000));

// Modal functionality
const stories = @json($stories);

function openStoryModal(storyId) {
    const story = stories.find(s => s.id === storyId);
    if (!story) return;

    const modalBody = document.getElementById('modalBody');
    modalBody.innerHTML = `
        <div class="row">
            <div class="col-md-4 text-center">
                ${story.student_image ? 
                    `<img src="{{ asset('storage/') }}${story.student_image}" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">` :
                    `<div class="bg-light p-5 rounded-circle mb-3" style="width: 150px; height: 150px; margin: 0 auto; display: flex; align-items: center; justify-content: center;">
                        <i class="fa fa-user fa-4x text-muted"></i>
                    </div>`
                }
                ${story.visa_image ? 
                    `<img src="{{ asset('storage/') }}${story.visa_image}" class="img-fluid rounded mb-2" style="max-height: 150px;">` : ''
                }
                ${story.passport_image ? 
                    `<img src="{{ asset('storage/') }}${story.passport_image}" class="img-fluid rounded" style="max-height: 150px;">` : ''
                }
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <span class="badge bg-primary">${story.country}</span>
                    <span class="badge bg-success">Visa Approved</span>
                </div>
                <h3 class="mb-3">${story.student_name}</h3>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>University:</strong> ${story.university}
                    </div>
                    <div class="col-md-6">
                        <strong>Course:</strong> ${story.course}
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Intake:</strong> ${story.intake || 'N/A'}
                    </div>
                    <div class="col-md-6">
                        <strong>Visa Type:</strong> ${story.visa_type || 'N/A'}
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Visa Date:</strong> ${story.visa_date || 'N/A'}
                    </div>
                    <div class="col-md-6">
                        <strong>Rating:</strong>
                        ${'★'.repeat(story.rating)}${'☆'.repeat(5 - story.rating)}
                    </div>
                </div>
                
                ${story.testimonial ? `
                <div class="mb-3">
                    <strong>Testimonial:</strong>
                    <p class="mt-2">${story.testimonial}</p>
                </div>
                ` : ''}
                
                ${story.video_url ? `
                <div class="mb-3">
                    <strong>Video:</strong>
                    <a href="${story.video_url}" target="_blank" class="btn btn-sm btn-info">
                        <i class="fa fa-play"></i> Watch Video
                    </a>
                </div>
                ` : ''}
            </div>
        </div>
    `;

    document.getElementById('storyModal').classList.add('active');
}

function closeStoryModal() {
    document.getElementById('storyModal').classList.remove('active');
}

// Close modal on outside click
document.getElementById('storyModal').addEventListener('click', (e) => {
    if (e.target.id === 'storyModal') {
        closeStoryModal();
    }
});
</script>
@endif
