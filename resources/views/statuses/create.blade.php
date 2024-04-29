@extends('layouts.layoutMaster')

@section('title', 'Create Status')

@section('content')
  <h4>Create Status</h4>

  <form method="POST" action="{{ route('statuses.store') }}">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Name:</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <button type="submit" class="btn btn-primary">Create Status</button>
  </form>
@endsection
