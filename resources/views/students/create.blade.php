@extends('layouts.layoutMaster')

@section('title', 'Create Student')

@section('content')
  <h4>Create Student</h4>

  <form method="POST" action="{{ route('students.store') }}">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Name:</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
      <label for="status_id" class="form-label">Status ID:</label>
      <input type="text" class="form-control" id="status_id" name="status_id" required>
    </div>


    <button type="submit" class="btn btn-primary">Create Student</button>
  </form>
@endsection
