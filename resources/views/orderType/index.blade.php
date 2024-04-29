@extends('layouts.layoutMaster')

@section('title', 'Тапсырыс Түрлері')

@section('content')
  <h4>Тапсырыс Түрлері</h4>

  <a href="{{ route('handbooko.create') }}" class="btn btn-primary mb-3">Жаңа Тапсырыс Түрі Құру</a>

  @if ($orderTypes->count() > 0)
    <div class="table-responsive">
      <table class="table">
        <thead>
        <tr>
          <th>ID</th>
          <th>Атауы</th>
          <th>Статус</th>
          <th>Әрекеттер</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orderTypes as $orderType)
          <tr>
            <td>{{ $orderType->id }}</td>
            <td>{{ $orderType->name }}</td>
            <td>{{ $orderType->status->name }}</td>
            <td>
              <a href="{{ route('handbooko.edit', $orderType->id) }}" class="btn btn-primary btn-sm">Өңдеу</a>
              <form action="{{ route('handbooko.destroy', $orderType->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Сіз сол тапсырыс түрін жоюға сенімдісіз бе?')">Жою</button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  @else
    <p>Тапсырыс түрлері табылмады.</p>
  @endif
@endsection
