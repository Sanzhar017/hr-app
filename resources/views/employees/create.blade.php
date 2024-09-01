@extends('layouts.layoutMaster')

@section('title', 'Создание сотрудника')

@section('content')
  <h4>Создание сотрудника</h4>

  <form method="POST" action="{{ route('employees.store') }}">
    @csrf

    <div class="mb-3">
      <label for="first_name" class="form-label">Имя:</label>
      <input type="text" class="form-control" id="first_name" name="first_name" required>
    </div>

    <div class="mb-3">
      <label for="last_name" class="form-label">Фамилия:</label>
      <input type="text" class="form-control" id="last_name" name="last_name" required>
    </div>

    <div class="mb-3">
      <label for="surname" class="form-label">Отчество:</label>
      <input type="text" class="form-control" id="surname" name="surname" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Электронная почта:</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
      <label for="phone_number" class="form-label">Номер телефона:</label>
      <input type="text" class="form-control" id="phone_number" name="phone_number" required>
    </div>

    <div class="mb-3">
      <label for="date_of_birth" class="form-label">Дата рождения:</label>
      <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
    </div>

    <div class="mb-3">
      <label for="nationality" class="form-label">Национальность:</label>
      <input type="text" class="form-control" id="nationality" name="nationality" required>
    </div>

    <div class="mb-3">
      <label for="job_title" class="form-label">Название работы:</label>
      <input type="text" class="form-control" id="job_title" name="job_title" required>
    </div>

    <div class="mb-3">
      <label for="status_id" class="form-label">Статус:</label>
      <select class="form-select" id="status_id" name="status_id" required>
        <option value="">Выберите статус</option>
        @foreach($statuses as $status)
          <option value="{{ $status->id }}">{{ $status->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="department_id" class="form-label">Отдел:</label>
      <select class="form-select" id="department_id" name="department_id" required>
        <option value="">Выберите отдел</option>
        @foreach($departments as $department)
          <option value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Создать сотрудника</button>
  </form>
@endsection
