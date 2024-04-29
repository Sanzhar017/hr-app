@extends('layouts.layoutMaster')

@section('title', 'Create Order Type')

@section('content')
  <h4>Create Order Type</h4>

  <form method="POST" action="{{ route('handbooko.store') }}">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Name:</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
      <label for="status_id" class="form-label">Status:</label>
      <select class="form-select" id="status_id" name="status_id" required>
        <option value="">Select Status</option>
        @foreach($statuses as $status)
          <option value="{{ $status->id }}">{{ $status->name }}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Order Type</button>
  </form>
@endsection
