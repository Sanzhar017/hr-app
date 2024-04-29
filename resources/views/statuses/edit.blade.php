@extends('layouts.layoutMaster')

@section('title', 'Статусты Өзгерту')

@section('content')
  <h4>Статусты Өзгерту</h4>

  <form method="POST" action="{{ route('statuses.update', ['status' => $status->id]) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="name" class="form-label">Атауы:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $status->name }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Статусты Өзгерту</button>
  </form>
@endsection
