@extends('layouts.layoutMaster')

@section('title', 'Редактирование заказа')

@section('content')
  <h4>Редактирование заказа</h4>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('orders.update', $order->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="employee_id" class="form-label">Сотрудник:</label>
      <select class="form-select" id="employee_id" name="employee_id" required>
        @foreach($employees as $employee)
          <option value="{{ $employee->id }}" {{ $order->employee_id == $employee->id ? 'selected' : '' }}>
            {{ $employee->first_name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="order_type_id" class="form-label">Тип заказа:</label>
      <select class="form-select" id="order_type_id" name="order_type_id" required>
        @foreach($orderTypes as $orderType)
          <option value="{{ $orderType->id }}" {{ $order->order_type_id == $orderType->id ? 'selected' : '' }}>
            {{ $orderType->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="order_number" class="form-label">Номер заказа:</label>
      <input type="text" class="form-control" id="order_number" name="order_number" value="{{ $order->order_number }}" required>
    </div>

    <div class="mb-3">
      <label for="order_date" class="form-label">Дата заказа:</label>
      <input type="date" class="form-control" id="order_date" name="order_date" value="{{ $order->order_date }}" required>
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">Тема:</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ $order->title }}" required>
    </div>

    <div class="mb-3">
      <label for="old_status_id" class="form-label">Старый статус:</label>
      <select class="form-select" id="old_status_id" name="old_status_id" required>
        @foreach($statuses as $status)
          <option value="{{ $status->id }}" {{ $order->old_status_id == $status->id ? 'selected' : '' }}>
            {{ $status->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="s_status_id" class="form-label">Текущий статус:</label>
      <select class="form-select" id="s_status_id" name="s_status_id" required>
        @foreach($statuses as $status)
          <option value="{{ $status->id }}" {{ $order->s_status_id == $status->id ? 'selected' : '' }}>
            {{ $status->name }}
          </option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Редактировать заказ</button>
  </form>
@endsection
