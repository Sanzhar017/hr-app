@extends('layouts.layoutMaster')

@section('title', 'Statuses')

@section('content')
  <h4>Statuses</h4>

  <a href="{{ route('statuses.create') }}" class="btn btn-primary mb-3">Create New Status</a>

  @if ($statuses->count() > 0)
    <div class="table-responsive">
      <table class="table">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($statuses as $status)
          <tr>
            <td>{{ $status->id }}</td>
            <td>{{ $status->name }}</td>
            <td>
              <a href="{{ route('statuses.edit', ['status' => $status->id]) }}" class="btn btn-primary btn-sm">Edit</a>
              <form action="{{ route('statuses.destroy', ['status' => $status->id]) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this status?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  @else
    <p>No statuses found.</p>
  @endif
@endsection
