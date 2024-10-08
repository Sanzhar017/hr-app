@extends('layouts.layoutMaster')

@section('title', 'Статусты Өзгерту')

@section('content')
  <h4>Изменить статус</h4>

  <form method="POST" action="{{ route('statuses.update', ['status' => $status->id]) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Название:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $status->name }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Изменить статус</button>
  </form>
@endsection
