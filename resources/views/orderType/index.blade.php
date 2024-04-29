@extends('layouts.layoutMaster')

@section('title', 'Order Types')

@section('content')
  <h4>Order Types</h4>

  <a href="{{ route('handbooko.create') }}" class="btn btn-primary mb-3">Create New Order Type</a>

  @if ($orderTypes->count() > 0)
    <div class="table-responsive">
      <table class="table">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orderTypes as $orderType)
          <tr>
            <td>{{ $orderType->id }}</td>
            <td>{{ $orderType->name }}</td>
            <td>{{ $orderType->status->name }}</td>
            <td>
              <a href="{{ route('handbooko.edit', $orderType->id) }}" class="btn btn-primary btn-sm">Edit</a>
              <form action="{{ route('handbooko.destroy', $orderType->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order type?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  @else
    <p>No order types found.</p>
  @endif
@endsection
