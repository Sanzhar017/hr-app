@extends('layouts.layoutMaster')

@section('title', 'Статустар')

@section('content')
  <h4>Статусы</h4>

  <a href="{{ route('statuses.create') }}" class="btn btn-primary mb-3">Добавить новый статус</a>

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
              <a href="{{ route('statuses.edit', ['status' => $status->id]) }}" class="btn btn-primary btn-sm">Изменить</a>
              <form action="{{ route('statuses.destroy', ['status' => $status->id]) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Подтвердите: вы уверены, что хотите удалить этот статус?')">Удалить</button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  @else
    <p>Статусов не нашли.</p>
  @endif
@endsection
