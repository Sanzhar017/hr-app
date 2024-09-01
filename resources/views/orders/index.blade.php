@extends('layouts.layoutMaster')
@extends('layouts.app')

@section('title', 'Заказы сотрудников')

@section('content')
  {{ $orders->links() }}

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <h4>Заказы сотрудников</h4>

  <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Создать заказ</a>

  <table class="table">
    <thead>
    <tr>
      <th>ID</th>
      <th>Имя</th>
      <th>Фамилия</th>
      <th>Тип заказа</th>
      <th>Номер заказа</th>
      <th>Дата заказа</th>
      <th>Тема</th>
      <th>Старый статус</th>
      <th>Текущий статус</th>
      <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($orders as $order)
      <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->employee->first_name }}</td>
        <td>{{ $order->employee->last_name }}</td>
        <td>{{ $order->orderType->name }}</td>
        <td>{{ $order->order_number }}</td>
        <td>{{ $order->order_date }}</td>
        <td>{{ $order->title }}</td>
        <td>{{ $order->oldStatus->name }}</td>
        <td>
          @if($order->currentStatus->name === 'работает')
            <span class="status-green">{{ $order->currentStatus->name }}</span>
          @elseif($order->currentStatus->name === 'уволен')
            <span class="status-red">{{ $order->currentStatus->name }}</span>
          @elseif($order->currentStatus->name === 'отпуск')
            <span class="status-gray">{{ $order->currentStatus->name }}</span>
          @else
            {{ $order->employee->status->name }}
          @endif
        </td>
        <td>
          <div class="btn-group" role="group" aria-label="Действия заказа">
            <a href="{{ route('orders.show', ['employee' => $order->employee, 'order' => $order->id]) }}" class="btn btn-info">Просмотр</a>
            <a href="{{ route('orders.edit', ['employee' => $order->employee, 'order' => $order->id]) }}" class="btn btn-warning">Редактировать</a>
            <form method="POST" action="{{ route('orders.destroy', ['employee' => $order->employee, 'order' => $order->id]) }}" style="display: inline-block;" onsubmit="return confirm('Вы уверены, что хотите удалить этот заказ?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <p class="mt-3">Найдено {{ $orders->total() }} записей заказов</p>
@endsection
