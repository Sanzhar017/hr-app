@extends('layouts.layoutMaster')

@section('title', 'Edit Order')

@section('content')
  <h4>Edit Order</h4>

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
      <label for="student_id" class="form-label">Student:</label>
      <select class="form-select" id="student_id" name="student_id" required>
        @foreach($students as $student)
          <option value="{{ $student->id }}" {{ $order->student_id == $student->id ? 'selected' : '' }}>
            {{ $student->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="order_type_id" class="form-label">Order Type:</label>
      <select class="form-select" id="order_type_id" name="order_type_id" required>
        @foreach($orderTypes as $orderType)
          <option value="{{ $orderType->id }}" {{ $order->order_type_id == $orderType->id ? 'selected' : '' }}>
            {{ $orderType->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="order_number" class="form-label">Order Number:</label>
      <input type="text" class="form-control" id="order_number" name="order_number" value="{{ $order->order_number }}" required>
    </div>

    <div class="mb-3">
      <label for="order_date" class="form-label">Order Date:</label>
      <input type="date" class="form-control" id="order_date" name="order_date" value="{{ $order->order_date }}" required>
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">Title:</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ $order->title }}" required>
    </div>

    <div class="mb-3">
      <label for="old_status_id" class="form-label">Old Status:</label>
      <select class="form-select" id="old_status_id" name="old_status_id" required>
        @foreach($statuses as $status)
          <option value="{{ $status->id }}" {{ $order->old_status_id == $status->id ? 'selected' : '' }}>
            {{ $status->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="s_status_id" class="form-label">Current Status:</label>
      <select class="form-select" id="s_status_id" name="s_status_id" required>
        @foreach($statuses as $status)
          <option value="{{ $status->id }}" {{ $order->s_status_id == $status->id ? 'selected' : '' }}>
            {{ $status->name }}
          </option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Order</button>
  </form>
@endsection
