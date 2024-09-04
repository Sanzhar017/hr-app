@extends('layouts.layoutMaster')

@section('title', 'Типы приказов')

@section('content')
  <h4>Типы приказов</h4>

  <a href="{{ route('handbooko.create') }}" class="btn btn-primary mb-3">Создать новый тип приказа</a>

  @if ($orderTypes->count() > 0)
    <div class="table-responsive">
      <table class="table">
        <thead>
        <tr>
          <th>ID</th>
          <th>Название</th>
          <th>Статус</th>
          <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orderTypes as $orderType)
          <tr>
            <td>{{ $orderType->id }}</td>
            <td>{{ $orderType->name }}</td>
            <td>{{ $orderType->status->name }}</td>
            <td>
              <a href="{{ route('handbooko.edit', $orderType->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
              <form action="{{ route('handbooko.destroy', $orderType->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить этот тип заказа?')">Удалить</button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  @else
    <p>Типы приказов не найдены.</p>
  @endif
@endsection
