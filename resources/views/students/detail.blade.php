@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="card bg-info" style="width:30rem;">
        <div class="card-header fs-3 text-center border-1">
            Student Information - Major: {{ $student->major->name ?? 'N/A' }}
        </div>

        <ul class="list-group list-group-flush fs-5 border-2">
            <li class="list-group-item border-primary">Number: {{ $student->number }}</li>
            <li class="list-group-item border-primary">Name: {{ $student->name }}</li>
            <li class="list-group-item border-primary">Year: {{ $student->year }}</li>
            <li class="list-group-item border-primary">Major: {{ $student->major->name ?? 'N/A' }}</li>
        </ul>
    </div>

    <h4 class="mt-4">Subjects under this Major:</h4>

    @if ($student->major && $student->major->subjects->count())
        <ul class="list-group">
            @foreach ($student->major->subjects as $subject)
                <li class="list-group-item border-primary">{{ $subject->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No subjects found for this major.</p>
    @endif
</div>
@endsection
