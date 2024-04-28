@extends('layouts.layoutMaster')

@section('title', 'Show Student Order')

@section('content')
  <h4>Infomation student</h4>

  <div class="mb-3">
    <strong>ID:</strong> {{ $order->id }}
  </div>

  <div class="mb-3">
    <strong>Student:</strong> {{ $order->student->name }}
  </div>

  <div class="mb-3">
    <strong>Order Type:</strong> {{ $order->orderType->name }}
  </div>

  <div class="mb-3">
    <strong>Order Number:</strong> {{ $order->order_number }}
  </div>

  <div class="mb-3">
    <strong>Order Date:</strong> {{ $order->order_date }}
  </div>

  <div class="mb-3">
    <strong>Title:</strong> {{ $order->title }}
  </div>

  <div class="mb-3">
    <strong>Old Status:</strong> {{ $order->oldStatus->name }}
  </div>

  <div class="mb-3">
    <strong>Current Status:</strong> {{ $order->currentStatus->name }}
  </div>

  <a href="{{ route('orders.index') }}" class="btn btn-primary">Back</a>
@endsection
