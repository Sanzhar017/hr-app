@extends('layouts.layoutMaster')

@section('title', 'Тапсырыс Түрін Құру')

@section('content')
  <h4>Тапсырыс Түрін Құру</h4>

  <form method="POST" action="{{ route('handbooko.store') }}">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Атауы:</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
      <label for="status_id" class="form-label">Статус:</label>
      <select class="form-select" id="status_id" name="status_id" required>
        <option value="">Статусты таңдаңыз</option>
        @foreach($statuses as $status)
          <option value="{{ $status->id }}">{{ $status->name }}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Тапсырыс Түрін Құру</button>
  </form>
@endsection
