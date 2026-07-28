@props([
    'title',
    'chartId',
    'type' => 'line',
    'data',
    'options' => []
])

<div class="chart-card fade-in">
    <div class="chart-card-header">
        <h3 class="chart-card-title">{{ $title }}</h3>
    </div>
    <div class="chart-card-body">
        <canvas id="{{ $chartId }}"></canvas>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('{{ $chartId }}');
    if (ctx) {
        new Chart(ctx, {
            type: '{{ $type }}',
            data: {{ json_encode($data) }},
            options: {{ json_encode(array_merge([
                'responsive' => true,
                'maintainAspectRatio' => false,
                'plugins' => [
                    'legend' => [
                        'position' => 'bottom',
                    ]
                ]
            ], $options)) }}
        });
    }
});
</script>
