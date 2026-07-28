@extends('Frontend.includes.main')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header-section {
            background: linear-gradient(180deg, #E8F2FC, #D9EAFB);
            padding: 50px 0;
            text-align: center;
        }

        .header-section h1 {
            color: #1a1a75;
            font-weight: bold;
        }

        .event-details {
            font-family: Arial, sans-serif;
            margin-top: 30px;
        }

        .event-header {
            color: #1a1a75;
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .event-card {
            background-color: #f8fbff;
            border: 1px solid #d3e7f9;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .event-card .card-body {
            padding: 30px 20px;
        }

        .icon {
            font-size: 2rem;
            color: #1a1a75;
            margin-bottom: 10px;
        }

        .event-info p {
            margin-bottom: 10px;
            line-height: 1.6;
            color: #333;
        }

        .overlay {
            background: rgba(255, 255, 255, 0.5);
        }
    </style>
@endsection

@section('content')
    <section class="header-section position-relative">
        <div class="content position-relative z-2 py-4">
            <h1>{{ $event->title }}</h1>
        </div>
    </section>

    <div class="container event-details">
        <h2 class="event-header">Event Details</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card event-card">
                    <div class="card-body text-center">
                        <div class="icon">
                            <i class="bi bi-calendar"></i>
                        </div>
                        <h5>📅 {{ $event->date }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card event-card">
                    <div class="card-body text-center">
                        <div class="icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h5>🗺️ {{ $event->location }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="event-info mt-4">
            <p><strong>Description:</strong> {{ $event->description }}</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
