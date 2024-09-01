@extends('layouts.layoutMaster')

@section('title', 'Редактирование типа заказа')

@section('content')
  <h4>Редактирование типа заказа</h4>

  <form method="POST" action="{{ route('handbooko.update', ['orderType' => $orderType->id]) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="name" class="form-label">Название:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $orderType->name }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Изменить тип заказа</button>
  </form>
@endsection
