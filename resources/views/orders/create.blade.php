@extends('layouts.layoutMaster')
@extends('layouts.app')
@section('title', 'Қызметкердің тапсырысын құру')

@section('content')
  <h4>Қызметкердің тапсырысын құру</h4>

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <form method="POST" action="{{ route('orders.store') }}">
    @csrf
    <div class="mb-3">
      <label for="student_id" class="form-label">Қызметкерлер:</label>
      <select class="form-select" id="student_id" name="student_id[]" required multiple>
        @foreach($students as $student)
          <option value="{{ $student->id }}">{{ $student->first_name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="order_type_id" class="form-label">Тапсырыс түрі:</label>
      <select class="form-select" id="order_type_id" name="order_type_id" required>
        @foreach($orderTypes as $orderType)
          <option value="{{ $orderType->id }}">{{ $orderType->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="order_number" class="form-label">Тапсырыс нөмірі:</label>
      <input type="text" class="form-control" id="order_number" name="order_number" value="{{ old('order_number') }}" required>
    </div>

    <div class="mb-3">
      <label for="order_date" class="form-label">Тапсырыс күні:</label>
      <input type="date" class="form-control" id="order_date" name="order_date" value="{{ old('order_date') }}" required>
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">Тақырыбы:</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
    </div>

    <div class="mb-3">
      <label for="old_status_id" class="form-label">Ескі мәртебесі:</label>
      <select class="form-select" id="old_status_id" name="old_status_id" required>
        @foreach($statuses as $status)
          <option value="{{ $status->id }}">{{ $status->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="s_status_id" class="form-label">Ағымдағы мәртебесі:</label>
      <select class="form-select" id="s_status_id" name="s_status_id" required>
        @foreach($statuses as $status)
          <option value="{{ $status->id }}">{{ $status->name }}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Тапсырыс құру</button>
  </form>
@endsection
