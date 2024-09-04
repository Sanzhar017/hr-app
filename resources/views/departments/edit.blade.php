@extends('layouts.layoutMaster')
@extends('layouts.app')

@section('title', 'Бөлімді өңдеу')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Редактирование департамента') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('handbookd.update', $department->id) }}">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="name">{{ __('Название') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $department->name }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary">{{ __('Редактирование департамента') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
