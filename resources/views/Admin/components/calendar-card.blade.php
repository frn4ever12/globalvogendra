@props([
    'events' => [],
    'appointments' => []
])

<div class="calendar-section fade-in">
    <div class="calendar-header">
        <h3 class="calendar-title">Calendar</h3>
        <div class="calendar-date" id="current-calendar-date"></div>
    </div>
    <div class="calendar-events">
        @if($events->count() > 0)
        <div class="calendar-card">
            <h4 class="calendar-card-title">Upcoming Events</h4>
            @foreach($events->take(5) as $event)
            <div class="calendar-event">
                <div class="calendar-event-icon">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="calendar-event-content">
                    <div class="calendar-event-title">{{ $event->title ?? 'Event' }}</div>
                    <div class="calendar-event-time">{{ $event->date ?? 'TBD' }}</div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        
        @if($appointments->count() > 0)
        <div class="calendar-card">
            <h4 class="calendar-card-title">Upcoming Appointments</h4>
            @foreach($appointments->take(5) as $appointment)
            <div class="calendar-event">
                <div class="calendar-event-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="calendar-event-content">
                    <div class="calendar-event-title">{{ $appointment->name ?? 'Appointment' }}</div>
                    <div class="calendar-event-time">{{ $appointment->date ?? 'TBD' }}</div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateElement = document.getElementById('current-calendar-date');
    if (dateElement) {
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        dateElement.textContent = now.toLocaleDateString('en-US', options);
    }
});
</script>
