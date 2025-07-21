@extends('layout.app') {{-- Optional, remove if not using layouts --}}

@section('content')
<div class="container mt-5">
    <div class="p-5 bg-light border rounded shadow row justify-content-center">
        <h2>Add New Student</h2>
        <div class="col text-end">
            <a href="{{ route('students.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </div>

        {{-- ✨ Validation Error Message Block --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.store') }}" class="row g-3" method="POST">
            @csrf
            <div class="mb-3 fs-6 fw-bold">
                <label for="number" class="form-label">Student Number</label>
                <input type="text" name="number" id="number" class="form-control border-primary"
                       value="{{ old('number', $newNumber) }}" placeholder="STU000" readonly>
            </div>

            <div class="col-md-6 fs-6 fw-bold">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control border-primary" value="{{ old('name') }}" required>
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 fs-6 fw-bold">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control border-primary" required>
                    <option value="">Choose Gender</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="col-md-6 fs-6 fw-bold">
                <label for="year">Year</label>
                <input type="text" name="year" id="year" class="form-control border-primary" value="{{ old('year') }}" required>
                @error('year')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 fs-6 fw-bold">
                <label for="major_id">Major</label>
                <select name="major_id" id="major_id" class="form-control border-primary" required>
                    <option value="">Choose Major</option>
                    @foreach($majors as $major)
                        <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                            {{ $major->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save Student</button>
        </form>
    </div>
</div>
@endsection
