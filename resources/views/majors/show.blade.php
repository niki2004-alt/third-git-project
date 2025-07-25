<div class="container">
    <h2>Major: {{ $major->name }}</h2>

    <h4 class="mt-4">Subjects under this Major:</h4>
    @if ($major->subjects->count())
        <ul class="list-group">
            @foreach ($major->subjects as $subject)
                <li class="list-group-item">{{ $subject->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No subjects found for this major.</p>
    @endif
</div>
