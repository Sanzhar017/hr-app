<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <!-- Подключаем Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Подключаем кастомные стили -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border: none;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }
    .card-header {
      background-color: #007bff;
      color: #fff;
      font-weight: bold;
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">{{ __('HR app') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                     value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
              @error('name')
              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
              @enderror
            </div>

            <div class="form-group">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                     value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
              @error('email')
              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
              @enderror
            </div>

            <div class="form-group">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                     name="password" required autocomplete="new-password" placeholder="Password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
              @enderror
            </div>

            <div class="form-group">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                     autocomplete="new-password" placeholder="Confirm Password">
            </div>

            <div class="form-group mb-0">
              <button type="submit" class="btn btn-primary btn-block">
                {{ __('Register') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Подключаем Bootstrap JS (необходимо для некоторых функций Bootstrap) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
