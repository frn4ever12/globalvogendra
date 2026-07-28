@props([
    'activities' => []
])

<div class="activity-section fade-in">
    <div class="activity-header">
        <h3 class="activity-title">Recent Activity</h3>
    </div>
    <div class="activity-timeline">
        @foreach($activities as $activity)
        <div class="activity-item">
            <div class="activity-content">
                <div class="activity-title">{{ $activity['title'] ?? 'Activity' }}</div>
                <div class="activity-time">{{ $activity['time'] ?? 'Just now' }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
