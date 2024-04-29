@extends('layouts.layoutMaster')

@section('title', 'Статус Құру')

@section('content')
  <h4>Статус Құру</h4>

  <form method="POST" action="{{ route('statuses.store') }}">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Атауы:</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <button type="submit" class="btn btn-primary">Статус Құру</button>
  </form>
@endsection
