@extends('layouts.layoutMaster')

@section('title', 'Студентті жасау')

@section('content')
  <h4>Қызметкер жасау</h4>

  <form method="POST" action="{{ route('employees.store') }}">
    @csrf

    <div class="mb-3">
      <label for="first_name" class="form-label">Аты:</label>
      <input type="text" class="form-control" id="first_name" name="first_name" required>
    </div>

    <div class="mb-3">
      <label for="last_name" class="form-label">Тегі:</label>
      <input type="text" class="form-control" id="last_name" name="last_name" required>
    </div>

    <div class="mb-3">
      <label for="surname" class="form-label">Әкесінің аты:</label>
      <input type="text" class="form-control" id="surname" name="surname" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Электронды пошта:</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
      <label for="phone_number" class="form-label">Телефон нөмірі:</label>
      <input type="text" class="form-control" id="phone_number" name="phone_number" required>
    </div>

    <div class="mb-3">
      <label for="date_of_birth" class="form-label">Туған күні:</label>
      <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
    </div>

    <div class="mb-3">
      <label for="nationality" class="form-label">Миллиеті:</label>
      <input type="text" class="form-control" id="nationality" name="nationality" required>
    </div>

    <div class="mb-3">
      <label for="job_title" class="form-label">Жұмыс тақырыбы:</label>
      <input type="text" class="form-control" id="job_title" name="job_title" required>
    </div>

    <div class="mb-3">
      <label for="status_id" class="form-label">Мәртебесі:</label>
      <select class="form-select" id="status_id" name="status_id" required>
        <option value="">Мәртебесін таңдаңыз</option>
        @foreach($statuses as $status)
          <option value="{{ $status->id }}">{{ $status->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="department_id" class="form-label">Бөлімі:</label>
      <select class="form-select" id="department_id" name="department_id" required>
        <option value="">Бөлімді таңдаңыз</option>
        @foreach($departments as $department)
          <option value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Қызметкерді жасау</button>
  </form>
@endsection
