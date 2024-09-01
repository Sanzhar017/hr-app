@extends('layouts.layoutMaster')
@extends('layouts.app')
@section('title', 'Редактирование сотрудника')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            <h4>Редактирование сотрудника</h4>
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

            <form method="POST" action="{{ route('employees.update', ['employee' => $employee->id]) }}">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="first_name" class="form-label">Имя:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>
              </div>

              <div class="mb-3">
                <label for="last_name" class="form-label">Фамилия:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}" required>
              </div>

              <div class="mb-3">
                <label for="surname" class="form-label">Отчество:</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ $employee->surname }}" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Электронная почта:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
              </div>

              <div class="mb-3">
                <label for="phone_number" class="form-label">Номер телефона:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $employee->phone_number }}" required>
              </div>

              <div class="mb-3">
                <label for="date_of_birth" class="form-label">Дата рождения:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $employee->date_of_birth }}" required>
              </div>

              <div class="mb-3">
                <label for="nationality" class="form-label">Национальность:</label>
                <input type="text" class="form-control" id="nationality" name="nationality" value="{{ $employee->nationality }}" required>
              </div>

              <div class="mb-3">
                <label for="job_title" class="form-label">Название работы:</label>
                <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $employee->job_title }}" required>
              </div>

              <div class="mb-3">
                <label for="status_id" class="form-label">Статус:</label>
                <select class="form-select" id="status_id" name="status_id" required>
                  @foreach($statuses as $status)
                    <option value="{{ $status->id }}" {{ $status->id == $employee->status_id ? 'selected' : '' }}>{{ $status->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="department_id" class="form-label">Отдел:</label>
                <select class="form-select" id="department_id" name="department_id" required>
                  @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $department->id == $employee->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                  @endforeach
                </select>
              </div>

              <button type="submit" class="btn btn-primary">Изменить сотрудника</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
