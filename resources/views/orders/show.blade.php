@extends('layouts.layoutMaster')

@section('title', 'Студенттің тапсырысын көрсету')

@section('content')
  <h4>Қызметкер туралы ақпарат</h4>

  <div class="mb-3">
    <strong>ID:</strong> {{ $order->id }}
  </div>

  <div class="mb-3">
    <strong>Студент:</strong> {{ $order->student->name }}
  </div>

  <div class="mb-3">
    <strong>Тапсырыс түрі:</strong> {{ $order->orderType->name }}
  </div>

  <div class="mb-3">
    <strong>Тапсырыс нөмірі:</strong> {{ $order->order_number }}
  </div>

  <div class="mb-3">
    <strong>Тапсырыс күні:</strong> {{ $order->order_date }}
  </div>

  <div class="mb-3">
    <strong>Тақырыбы:</strong> {{ $order->title }}
  </div>

  <div class="mb-3">
    <strong>Ескі мәртебесі:</strong> {{ $order->oldStatus->name }}
  </div>

  <div class="mb-3">
    <strong>Ағымдағы мәртебесі:</strong> {{ $order->currentStatus->name }}
  </div>

  <a href="{{ route('orders.index') }}" class="btn btn-primary">Артқа</a>
@endsection
