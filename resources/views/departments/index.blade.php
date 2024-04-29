@extends('layouts.layoutMaster')
@extends('layouts.app')

@section('title', 'Бөлімдер')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Бөлімдер') }}</div>


          <div class="card-body">
            <a href="{{ route('handbookd.create') }}" class="btn btn-primary mb-3">{{ __('Бөлімді құру') }}</a>

            <table class="table">
              <thead>
              <tr>
                <th scope="col">{{ __('Атауы') }}</th>
                <th scope="col">{{ __('Әрекеттер') }}</th>
              </tr>
              </thead>
              <tbody>
              @foreach($departments as $department)
                <tr>
                  <td>{{ $department->name }}</td>
                  <td>
                    <a href="{{ route('handbookd.edit', $department->id) }}" class="btn btn-sm btn-primary">{{ __('Өңдеу') }}</a>
                    <form action="{{ route('handbookd.destroy', $department->id) }}" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">{{ __('Жою') }}</button>
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
