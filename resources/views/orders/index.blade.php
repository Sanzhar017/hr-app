@extends('layouts.layoutMaster')
@extends('layouts.app')

@section('title', 'Қызметкерлердің тапсырыстары')

@section('content')
  {{ $orders->links() }}

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <h4>Қызметкерлердің тапсырыстары</h4>

  <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Тапсырысты жасау</a>

  <table class="table">
    <thead>
    <tr>
      <th>ID</th>
      <th>Аты</th>
      <th>Тегі</th>
      <th>Тапсырыс түрі</th>
      <th>Тапсырыс нөмірі</th>
      <th>Тапсырыс күні</th>
      <th>Тақырыбы</th>
      <th>Ескі мәртебесі</th>
      <th>Ағымдағы мәртебесі</th>
      <th>Әрекеттер</th>
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
          <div class="btn-group" role="group" aria-label="Тапсырыс әрекеттері">
            <a href="{{ route('orders.show', ['employee' => $order->employee, 'order' => $order->id]) }}" class="btn btn-info">Көру</a>
            <a href="{{ route('orders.edit', ['employee' => $order->employee, 'order' => $order->id]) }}" class="btn btn-warning">Өңдеу</a>
            <form method="POST" action="{{ route('orders.destroy', ['employee' => $order->employee, 'order' => $order->id]) }}" style="display: inline-block;" onsubmit="return confirm('Сіз солтүстігіні өшіргіңіз келгеніне сенімдісіз бе?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Жою</button>
            </form>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <p class="mt-3">Тапсырыстар {{ $orders->total() }} жазбалар табылды</p>
@endsection
