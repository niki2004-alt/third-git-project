@extends('layouts.app')

@section('title', 'Students List')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Students List</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="{{ route('students.create') }}" class="btn btn-sm btn-outline-primary me-2">Register</a>
      <a href="{{ route('students.index') }}" class="btn btn-sm btn-outline-secondary">Update</a>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Gender</th>
          <th>Year</th>
          <th>Major</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($students as $student)
          <tr>
            <td>{{ $student->number }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->gender }}</td>
            <td>{{ $student->year }}</td>
            <td>{{ $student->major->name ?? 'N/A' }}</td>
            <td>
              <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
              <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
              <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                  onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center">No students found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
