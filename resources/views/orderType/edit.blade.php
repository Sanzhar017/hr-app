@extends('layouts.layoutMaster')

@section('title', 'Тапсырыс Түрін Өңдеу')

@section('content')
  <h4>Тапсырыс Түрін Өңдеу</h4>

  <form method="POST" action="{{ route('handbooko.update', ['orderType' => $orderType->id]) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="name" class="form-label">Атауы:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $orderType->name }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Тапсырыс Түрін Өзгерту</button>
  </form>
@endsection
