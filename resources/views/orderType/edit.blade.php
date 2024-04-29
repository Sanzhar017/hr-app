@extends('layouts.layoutMaster')

@section('title', 'Edit Order Type')

@section('content')
  <h4>Edit Order Type</h4>

  <form method="POST" action="{{ route('handbooko.update', ['handbooko' => $orderType->id]) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="name" class="form-label">Name:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $orderType->name }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Order Type</button>
  </form>
@endsection
