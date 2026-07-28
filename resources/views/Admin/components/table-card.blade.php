@props([
    'title',
    'columns',
    'rows',
    'link' => null
])

<div class="table-card fade-in">
    <div class="table-card-header">
        <h3 class="table-card-title">{{ $title }}</h3>
        @if($link)
        <a href="{{ $link }}" class="btn btn-sm btn-primary">View All</a>
        @endif
    </div>
    <div class="table-card-body">
        <table class="table">
            <thead>
                <tr>
                    @foreach($columns as $column)
                    <th>{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                <tr>
                    @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
