@extends('layouts.layoutMaster')

@section('title', 'Просмотр заказа студента')

@section('content')
  <h4>Информация о сотруднике</h4>

  <div class="mb-3">
    <strong>ID:</strong> {{ $order->id }}
  </div>

  <div class="mb-3">
    <strong>Сотрудник:</strong> {{ $order->employee->first_name }}
  </div>

  <div class="mb-3">
    <strong>Тип заказа:</strong> {{ $order->orderType->name }}
  </div>

  <div class="mb-3">
    <strong>Номер заказа:</strong> {{ $order->order_number }}
  </div>

  <div class="mb-3">
    <strong>Дата заказа:</strong> {{ $order->order_date }}
  </div>

  <div class="mb-3">
    <strong>Тема:</strong> {{ $order->title }}
  </div>

  <div class="mb-3">
    <strong>Старый статус:</strong> {{ $order->oldStatus->name }}
  </div>

  <div class="mb-3">
    <strong>Текущий статус:</strong> {{ $order->currentStatus->name }}
  </div>

  <a href="{{ route('orders.index') }}" class="btn btn-primary">Назад</a>
@endsection
