@extends('layouts.layoutMaster')
@extends('layouts.app')
@section('title', 'Басқару панелі')

@section('content')
  <h4>Жұмыс беті</h4>
  {{ $employees->links() }}

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-sm btn-outline-danger">Шығу</button>
  </form>

  <form action="{{ route('employees.index') }}" method="GET">
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

      <div class="col">
        <button type="submit" class="btn btn-primary">Іздеу</button>
      </div>
    </div>
  </form>
  @if (Auth::check())
    Қош келдіңіз, {{ Auth::user()->name }} !
  @else
    <p>
      Сәлем, қонақ!</p>
  @endif <br> <br>
  <a href="{{ route('employees.create') }}" class="btn btn-primary">Сотрудник қосу</a>

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
        @foreach($employees as $employee)
          <tr>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->surname }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone_number }}</td>
            <td>{{ $employee->date_of_birth }}</td>
            <td>{{ $employee->nationality }}</td>
            <td>{{ $employee->job_title }}</td>
            <td>{{ $employee->status->name }}</td>
            <td>{{ $employee->department->name }}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('employees.edit', ['employee' => $employee->id]) }}"><i class="ti ti-pencil me-2"></i>Өңдеу</a>
                  <form method="POST" action="{{ route('employees.destroy', ['employee' => $employee->id]) }}" onsubmit="return confirm('Сіз солтүстігіні өшіргіңіз келгеніне сенімдісіз бе?')">
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
  <p class="mt-3">{{ $employees->total() }} тіркелгі табылды</p>
@endsection

@section('scripts')
  <script>
    $(document).ready(function() {
      // Скрыть форму при загрузке страницы
      $('#filtersForm').hide();

      // Переключение видимости формы по нажатию кнопки
      $('#toggleFilters').click(function() {
        $('#filtersForm').toggle();
      });
    });
  </script>
@endsection
