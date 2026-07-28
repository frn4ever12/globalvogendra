@extends('Frontend.includes.main')
@section('head')
@endsection
@section('content')
    <section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5">
            <h1 style="color: #0047AB; ">GLOBAL EXCEL</h1>
            <h1 style="color: #FF0000;">Events</h1>
        </div>
    </section>
    <div class="container">
        <section class="container border-bottom p-3">
            <h2 class="text-center mb-5" style="color: red; font-weight: bold;">Events</h2>
            <div class="row" id="event-list">
                @foreach ($events as $event)
                    <div class="col-md-4 mb-4">
                        <div class="card p-3">
                            <img src="{{ $event->image ? asset('storage/' . $event->image) : asset('images/default-event.jpg') }}"
                                class="card-img-top" alt="Event Image">

                            <div class="card-body">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::words($event->description,10)  }}</p>
                                <small class="text">
                                    {{ \Carbon\Carbon::parse($event->date)->format('d M Y, l') }} <br>
                                    {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
                                    @if ($event->end_time)
                                        - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                                    @endif
                                    <br>
                                    {{ $event->location }}
                                </small>
                            </div>

                            <div class="card-footer bg-white text-center">
                                <a href="{{ route('details', ['id' => $event->id]) }}"
                                    class="text-primary fw-bold mt-2">KNOW MORE
                                    <span>&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    </section>
@endsection
