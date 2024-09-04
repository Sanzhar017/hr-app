@extends('layouts.layoutMaster')

@section('title', 'Статус Құру')

@section('content')
  <h4>Создать Статус</h4>

  <form method="POST" action="{{ route('statuses.store') }}">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Название</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <button type="submit" class="btn btn-primary">Создать Статус</button>
  </form>
@endsection
