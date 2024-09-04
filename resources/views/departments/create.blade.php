@extends('layouts.layoutMaster')
@extends('layouts.app')

@section('title', 'Создание департамента')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Создание департамента') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('handbookd.store') }}">
              @csrf

              <div class="form-group">
                <label for="name">{{ __('Название') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
              </div>

              <div class="form-group mb">
                <button type="submit" class="btn btn-primary  ">{{ __('Создать') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
