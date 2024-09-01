@extends('layouts.layoutMaster')
@extends('layouts.app')

@section('title', 'Создание заказа сотрудника')

@section('content')
  <h4>Создание заказа сотрудника</h4>

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <form method="POST" action="{{ route('orders.store') }}">
    @csrf
    <div class="mb-3">
      <label for="employee_id" class="form-label">Сотрудники:</label>
      <select class="form-select" id="employee_id" name="employee_id[]" required multiple>
        @foreach($employees as $employee)
          <option value="{{ $employee->id }}">{{ $employee->first_name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="order_type_id" class="form-label">Тип заказа:</label>
      <select class="form-select" id="order_type_id" name="order_type_id" required>
        @foreach($orderTypes as $orderType)
          <option value="{{ $orderType->id }}">{{ $orderType->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="order_number" class="form-label">Номер заказа:</label>
      <input type="text" class="form-control" id="order_number" name="order_number" value="{{ old('order_number') }}" required>
    </div>

    <div class="mb-3">
      <label for="order_date" class="form-label">Дата заказа:</label>
      <input type="date" class="form-control" id="order_date" name="order_date" value="{{ old('order_date') }}" required>
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">Тема:</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
    </div>

    <div class="mb-3">
      <label for="old_status_id" class="form-label">Старый статус:</label>
      <select class="form-select" id="old_status_id" name="old_status_id" required>
        @foreach($statuses as $status)
          <option value="{{ $status->id }}">{{ $status->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="s_status_id" class="form-label">Текущий статус:</label>
      <select class="form-select" id="s_status_id" name="s_status_id" required>
        @foreach($statuses as $status)
          <option value="{{ $status->id }}">{{ $status->name }}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Создать заказ</button>
  </form>
@endsection
