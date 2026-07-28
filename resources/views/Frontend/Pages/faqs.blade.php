@extends('Frontend.includes.main')
@section('head')
    <style>
        .accordion-button:focus {
            outline: none;
            box-shadow: none;
        }
    </style>
@endsection
@section('content')
    <div class="container my-5">
        <section class="container">
            <div class="m-0 my-4 row align-items-center">
                <div class="col-sm-12 col-md-6">
                    <h1 class=" animate-section-item" style="color:#0056b3; font-weight: bold;"> Study Abroad <span
                            class="text-danger">FAQ</span></h1>
                </div>
            </div>
        </section>
        <div class="accordion row" id="faqAccordion">
            @foreach ($faqs as $index => $faq)
                <div class="accordion-item col-sm-12 col-md-6">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                            aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}"
                            style="background-color: white;outline: 0;">
                            {{ $faq->question }}
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}"
                        class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                        aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
