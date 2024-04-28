@extends('layouts.layoutMaster')
@extends('layouts.app')

@section('title', 'Student Orders')

@section('content')
  {{ $orders->links() }}

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <h4>Student Orders</h4>

  <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Create Order</a>

  <table class="table">
    <thead>
    <tr>
      <th>ID</th>
      <th>Student</th>
      <th>Order Type</th>
      <th>Order Number</th>
      <th>Order Date</th>
      <th>Title</th>
      <th>Old Status</th>
      <th>Current status</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($orders as $order)
      <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->student->name }}</td>
        <td>{{ $order->orderType->name }}</td>
        <td>{{ $order->order_number }}</td>
        <td>{{ $order->order_date }}</td>
        <td>{{ $order->title }}</td>
        <td>{{ $order->oldStatus->name }}</td>
        <td>
          @if($order->currentStatus->name === 'обучается')
            <span class="status-green">{{ $order->currentStatus->name }}</span>
          @elseif($order->currentStatus->name === 'отчислен')
            <span class="status-red">{{ $order->currentStatus->name }}</span>
          @elseif($order->currentStatus->name === 'абитурент')
            <span class="status-gray">{{ $order->currentStatus->name }}</span>
          @else
            {{ $student->status->name }}
          @endif
        </td>
        <td>
          <div class="btn-group" role="group" aria-label="Order Actions">
            <a href="{{ route('orders.show', ['student' => $order->student, 'order' => $order->id]) }}" class="btn btn-info">View</a>
            <a href="{{ route('orders.edit', ['student' => $order->student, 'order' => $order->id]) }}" class="btn btn-warning">Edit</a>
            <form method="POST" action="{{ route('orders.destroy', ['student' => $order->student, 'order' => $order->id]) }}" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this order?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <p class="mt-3">Найдено {{ $orders->total() }} записей</p>
@endsection
