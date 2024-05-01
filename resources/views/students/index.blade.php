@extends('layouts.layoutMaster')
@extends('layouts.app')
@section('title', 'Басқару панелі')

@section('content')
  <h4>Жұмыс беті</h4>
  {{ $students->links() }}

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <form action="{{ route('students.index') }}" method="GET">
    <div class="row mb-3">
      <div class="col">
        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Аты">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Тегі	">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="surname" id="surname" placeholder="Әкесінің аты">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="email" id="email" placeholder="Электронды пошта">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="department_name" id="department_name" placeholder="Департамент">
      </div>

      {{--      <div class="col">--}}
{{--        <select class="form-select" name="department_id" id="department_id" aria-label="Департамент">--}}
{{--          <option selected>Департамент</option>--}}
{{--          @foreach($departments as $department)--}}
{{--            <option value="{{ $department->id }}">{{ $department->name }}</option>--}}
{{--          @endforeach--}}
{{--        </select>--}}
{{--      </div>--}}
      <div class="col">
        <button type="submit" class="btn btn-primary">Поиск</button>
      </div>
    </div>
  </form>

  <a href="{{ route('students.create') }}" class="btn btn-primary">Сотрудник қосу</a>

  <div class="card">
    <h5 class="card-header">Қызметшілер таблицасы</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
        <tr>
          <th>Аты</th>
          <th>Тегі</th>
          <th>Әкесінің аты</th>
          <th>Электронды пошта</th>
          <th>Телефон нөмірі</th>
          <th>Туған күні</th>
          <th>Миллиеті</th>
          <th>Жұмыс тақырыбы</th>
          <th>Мәртебесі</th>
          <th>Бөлімі</th>
          <th>Әрекеттер</th>
        </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        @foreach($students as $student)
          <tr>
            <td>{{ $student->first_name }}</td>
            <td>{{ $student->last_name }}</td>
            <td>{{ $student->surname }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone_number }}</td>
            <td>{{ $student->date_of_birth }}</td>
            <td>{{ $student->nationality }}</td>
            <td>{{ $student->job_title }}</td>
            <td>{{ $student->status->name }}</td>
            <td>{{ $student->department->name }}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('students.edit', ['student' => $student->id]) }}"><i class="ti ti-pencil me-2"></i>Өңдеу</a>
                  <form method="POST" action="{{ route('students.destroy', ['student' => $student->id]) }}" onsubmit="return confirm('Сіз солтүстігіні өшіргіңіз келгеніне сенімдісіз бе?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item"><i class="ti ti-trash me-2"></i>Жою</button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <p class="mt-3">{{ $students->total() }} тіркелгі табылды</p>
@endsection
