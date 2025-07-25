@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="p-4 bg-light border rounded shadow row justify-content-center">
        <h2>Edit Student</h2>

        <form action="{{ route('students.update', $student->id) }}" class="row g-3" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="number" class="form-label">Student Number</label>
                <input type="text" name="number" id="number" class="form-control" value="{{ $student->number }}" placeholder="STU000" readonly>
            </div>

            <div class="col-md-6 fs-6 fw-bold">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}" class="form-control" required>
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 fs-6 fw-bold">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="col-md-6 fs-6 fw-bold">
                <label for="year">Year:</label>
                <input type="text" name="year" id="year" value="{{ old('year', $student->year) }}" class="form-control" required>
                @error('year')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 fs-6 fw-bold">
                <label for="major_id">Major</label>
                <select name="major_id" id="major_id" class="form-control" required>
                    <option value="">Choose Major</option>
                    @foreach($majors as $major)
                        <option value="{{ $major->id }}" {{ old('major_id', $student->major_id) == $major->id ? 'selected' : '' }}>
                            {{ $major->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary col-md-3">Update Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary col-md-3">Back</a>
        </form>
    </div>
</div>
@endsection
