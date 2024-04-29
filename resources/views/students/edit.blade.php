@extends('layouts.layoutMaster')
@extends('layouts.app')
@section('title', 'Edit Student')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            <h4>Edit Student</h4>
          </div>
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('students.update', ['student' => $student->id]) }}">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $student->first_name }}" required>
              </div>

              <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $student->last_name }}" required>
              </div>

              <div class="mb-3">
                <label for="surname" class="form-label">Surname:</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ $student->surname }}" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
              </div>

              <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $student->phone_number }}" required>
              </div>

              <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $student->date_of_birth }}" required>
              </div>

              <div class="mb-3">
                <label for="nationality" class="form-label">Nationality:</label>
                <input type="text" class="form-control" id="nationality" name="nationality" value="{{ $student->nationality }}" required>
              </div>

              <div class="mb-3">
                <label for="job_title" class="form-label">Job Title:</label>
                <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $student->job_title }}" required>
              </div>

              <div class="mb-3">
                <label for="status_id" class="form-label">Status:</label>
                <select class="form-select" id="status_id" name="status_id" required>
                  @foreach($statuses as $status)
                    <option value="{{ $status->id }}" {{ $status->id == $student->status_id ? 'selected' : '' }}>{{ $status->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="department_id" class="form-label">Department:</label>
                <select class="form-select" id="department_id" name="department_id" required>
                  @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $department->id == $student->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                  @endforeach
                </select>
              </div>

              <button type="submit" class="btn btn-primary">Update Student</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
