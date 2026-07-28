@props(['section'])

@switch($section->section_type)
    @case('heading')
        <div class="section-heading mb-4">
            <h1 class="display-4 fw-bold">{{ $section->title }}</h1>
        </div>
        @break

    @case('sub_heading')
        <div class="section-sub-heading mb-3">
            <h2 class="h3 fw-semibold">{{ $section->title }}</h2>
        </div>
        @break

    @case('paragraph')
        <div class="section-paragraph mb-4">
            <p class="lead">{{ $section->content }}</p>
        </div>
        @break

    @case('rich_text')
        <div class="section-rich-text mb-4">
            {!! $section->content !!}
        </div>
        @break

    @case('single_image')
        <div class="section-single-image mb-4">
            @if($section->image)
                <img src="{{ asset('storage/' . $section->image) }}" class="img-fluid rounded shadow" alt="{{ $section->title }}">
            @endif
        </div>
        @break

    @case('two_images')
        <div class="section-two-images mb-4">
            <div class="row">
                @if($section->image)
                    <div class="col-md-6 mb-3">
                        <img src="{{ asset('storage/' . $section->image) }}" class="img-fluid rounded shadow" alt="Image 1">
                    </div>
                @endif
                @if($section->image2)
                    <div class="col-md-6 mb-3">
                        <img src="{{ asset('storage/' . $section->image2) }}" class="img-fluid rounded shadow" alt="Image 2">
                    </div>
                @endif
            </div>
        </div>
        @break

    @case('image_gallery')
        <div class="section-gallery mb-4">
            <h4 class="mb-3">{{ $section->title }}</h4>
            <div class="row">
                @if($section->gallery && is_array($section->gallery))
                    @foreach($section->gallery as $image)
                        <div class="col-md-4 mb-3">
                            <img src="{{ asset('storage/' . $image) }}" class="img-fluid rounded shadow-sm" alt="Gallery Image">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        @break

    @case('video')
        <div class="section-video mb-4">
            <h4 class="mb-3">{{ $section->title }}</h4>
            <div class="ratio ratio-16x9">
                <video controls>
                    <source src="{{ asset('storage/' . $section->video_url) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        @break

    @case('youtube_embed')
        <div class="section-youtube mb-4">
            <h4 class="mb-3">{{ $section->title }}</h4>
            <div class="ratio ratio-16x9">
                <iframe src="{{ $section->video_url }}" allowfullscreen></iframe>
            </div>
        </div>
        @break

    @case('table')
        <div class="section-table mb-4">
            <h4 class="mb-3">{{ $section->title }}</h4>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    {!! $section->content !!}
                </table>
            </div>
        </div>
        @break

    @case('bullet_list')
        <div class="section-bullet-list mb-4">
            <h4 class="mb-3">{{ $section->title }}</h4>
            <ul class="list-group">
                @if($section->items && is_array($section->items))
                    @foreach($section->items as $item)
                        <li class="list-group-item">{{ $item }}</li>
                    @endforeach
                @endif
            </ul>
        </div>
        @break

    @case('number_list')
        <div class="section-number-list mb-4">
            <h4 class="mb-3">{{ $section->title }}</h4>
            <ol class="list-group list-group-numbered">
                @if($section->items && is_array($section->items))
                    @foreach($section->items as $item)
                        <li class="list-group-item">{{ $item }}</li>
                    @endforeach
                @endif
            </ol>
        </div>
        @break

    @case('faq')
        <div class="section-faq mb-4">
            <h4 class="mb-3">{{ $section->title ?: 'Frequently Asked Questions' }}</h4>
            <div class="accordion" id="faqAccordion{{ $section->id }}">
                @if($section->items && is_array($section->items))
                    @foreach($section->items as $index => $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $section->id }}{{ $index }}">
                                <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" 
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $section->id }}{{ $index }}" 
                                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" 
                                        aria-controls="collapse{{ $section->id }}{{ $index }}">
                                    {{ $item['question'] }}
                                </button>
                            </h2>
                            <div id="collapse{{ $section->id }}{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" 
                                 aria-labelledby="heading{{ $section->id }}{{ $index }}" data-bs-parent="#faqAccordion{{ $section->id }}">
                                <div class="accordion-body">
                                    {{ $item['answer'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        @break

    @case('accordion')
        <div class="section-accordion mb-4">
            <h4 class="mb-3">{{ $section->title }}</h4>
            <div class="accordion" id="accordion{{ $section->id }}">
                @if($section->items && is_array($section->items))
                    @foreach($section->items as $index => $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="accHeading{{ $section->id }}{{ $index }}">
                                <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" 
                                        data-bs-toggle="collapse" data-bs-target="#accCollapse{{ $section->id }}{{ $index }}" 
                                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" 
                                        aria-controls="accCollapse{{ $section->id }}{{ $index }}">
                                    {{ $item['title'] }}
                                </button>
                            </h2>
                            <div id="accCollapse{{ $section->id }}{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" 
                                 aria-labelledby="accHeading{{ $section->id }}{{ $index }}" data-bs-parent="#accordion{{ $section->id }}">
                                <div class="accordion-body">
                                    {!! $item['content'] !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        @break

    @case('download_file')
        <div class="section-download mb-4">
            <div class="card bg-light">
                <div class="card-body">
                    <h5 class="card-title">{{ $section->title }}</h5>
                    @if($section->file)
                        <a href="{{ asset('storage/' . $section->file) }}" class="btn btn-primary" download>
                            <i class="fa fa-download me-2"></i>Download File
                        </a>
                    @endif
                </div>
            </div>
        </div>
        @break

    @case('quote')
        <div class="section-quote mb-4">
            <blockquote class="blockquote">
                <p class="mb-0">{{ $section->content }}</p>
                @if($section->title)
                    <footer class="blockquote-footer mt-2">{{ $section->title }}</footer>
                @endif
            </blockquote>
        </div>
        @break

    @case('call_to_action')
        <div class="section-cta mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body text-center py-5">
                    @if($section->title)
                        <h3 class="card-title mb-3">{{ $section->title }}</h3>
                    @endif
                    @if($section->content)
                        <p class="card-text mb-4">{{ $section->content }}</p>
                    @endif
                    @if($section->button_text && $section->button_link)
                        <a href="{{ $section->button_link }}" class="btn btn-light btn-lg">{{ $section->button_text }}</a>
                    @endif
                </div>
            </div>
        </div>
        @break

    @case('button')
        <div class="section-button mb-4">
            @if($section->button_text && $section->button_link)
                <a href="{{ $section->button_link }}" class="btn btn-primary btn-lg">{{ $section->button_text }}</a>
            @endif
        </div>
        @break

    @case('apply_now')
        <div class="section-apply-now mb-4">
            <div class="card bg-success text-white">
                <div class="card-body text-center py-5">
                    <h3 class="card-title mb-3">Apply Now</h3>
                    <p class="card-text mb-4">{{ $section->content ?? 'Ready to take the next step in your educational journey?' }}</p>
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                        <i class="fa fa-paper-plane me-2"></i>Apply Now
                    </a>
                </div>
            </div>
        </div>
        @break

    @case('contact_form')
        <div class="section-contact-form mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Contact Us</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('appointment.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" name="phone">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
        @break

    @case('related_pages')
        <div class="section-related-pages mb-4">
            <h4 class="mb-3">{{ $section->title ?: 'Related Pages' }}</h4>
            <div class="row">
                @if($section->items && is_array($section->items))
                    @foreach($section->items as $item)
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item['title'] }}</h5>
                                    <a href="{{ $item['url'] }}" class="btn btn-sm btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        @break

    @default
        <div class="section-default mb-4">
            @if($section->title)
                <h4>{{ $section->title }}</h4>
            @endif
            @if($section->content)
                <p>{{ $section->content }}</p>
            @endif
        </div>
@endswitch
