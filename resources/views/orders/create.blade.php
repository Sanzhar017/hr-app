@extends('layouts.layoutMaster')
@extends('layouts.app')
@section('title', 'Create Student Order')

@section('content')
  <h4>Create Student Order</h4>

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <form method="POST" action="{{ route('orders.store') }}">
    @csrf
    <div class="mb-3">
      <label for="student_id" class="form-label">Student:</label>
      <select class="form-select" id="student_id" name="student_id[]" required multiple>
        @foreach($students as $student)
          <option value="{{ $student->id }}">{{ $student->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="order_type_id" class="form-label">Order Type:</label>
      <select class="form-select" id="order_type_id" name="order_type_id" required>
        @foreach($orderTypes as $orderType)
          <option value="{{ $orderType->id }}">{{ $orderType->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="order_number" class="form-label">Order Number:</label>
      <input type="text" class="form-control" id="order_number" name="order_number" value="{{ old('order_number') }}" required>
    </div>

    <div class="mb-3">
      <label for="order_date" class="form-label">Order Date:</label>
      <input type="date" class="form-control" id="order_date" name="order_date" value="{{ old('order_date') }}" required>
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">Title:</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
    </div>

    <div class="mb-3">
      <label for="old_status_id" class="form-label">Old Status:</label>
      <select class="form-select" id="old_status_id" name="old_status_id" required>
        @foreach($statuses as $status)
          <option value="{{ $status->id }}">{{ $status->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="s_status_id" class="form-label">Current Status:</label>
      <select class="form-select" id="s_status_id" name="s_status_id" required>
        @foreach($statuses as $status)
          <option value="{{ $status->id }}">{{ $status->name }}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Order</button>
  </form>
@endsection
