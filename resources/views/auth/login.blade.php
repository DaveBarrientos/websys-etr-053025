<head>
  <title>ADMIN Login Panel</title>
  @include('backend.layouts.head')
  <style>
    body {
      background-color:rgb(163, 32, 38) !important; /* Darker red */
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }
    .login-container {
      max-width: 500px;
      width: 100%;
      padding: 0 15px;
    }
    .card {
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3), 
                  0 5px 10px rgba(0, 0, 0, 0.2),
                  inset 0 -1px 1px rgba(255, 255, 255, 0.1) !important;
      transition: all 0.3s ease;
    }
    .card:hover {
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4), 
                  0 8px 15px rgba(0, 0, 0, 0.3),
                  inset 0 -1px 1px rgba(255, 255, 255, 0.1) !important;
      transform: translateY(-2px);
    }
  </style>
</head>

<body>
  <div class="login-container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Admin Login Panel</h1>
          </div>
          <form class="user" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required autocomplete="email">
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password" required autocomplete="current-password">
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-success btn-user btn-block">
              Login
            </button>
          </form>
          <hr>
          <div class="text-center">
            @if (Route::has('password.request'))
              <a class="btn btn-link small" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
              </a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>