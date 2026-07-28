@props([
    'title',
    'value',
    'icon',
    'color' => 'primary',
    'trend' => null,
    'trendValue' => null,
    'link' => null
])

<div class="stat-card fade-in">
    <div class="stat-card-header">
        <div class="stat-card-icon {{ $color }}">
            <i class="fas fa-{{ $icon }}"></i>
        </div>
        @if($trend && $trendValue)
        <div class="stat-card-trend {{ $trend }}">
            <i class="fas fa-{{ $trend === 'up' ? 'arrow-up' : 'arrow-down' }}"></i>
            <span>{{ $trendValue }}%</span>
        </div>
        @endif
    </div>
    <div class="stat-card-value count-up" data-value="{{ $value }}">0</div>
    <div class="stat-card-label">{{ $title }}</div>
    @if($link)
    <div class="stat-card-footer">
        <a href="{{ $link }}">View Details <i class="fas fa-arrow-right ms-1"></i></a>
    </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const counter = document.querySelector('.stat-card-value[data-value="{{ $value }}"]');
    if (counter) {
        const target = parseInt(counter.getAttribute('data-value'));
        animateCounter(counter, target);
    }
});

function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(function() {
        current += increment;
        if (current >= target) {
            element.textContent = target.toLocaleString();
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current).toLocaleString();
        }
    }, 30);
}
</script>
