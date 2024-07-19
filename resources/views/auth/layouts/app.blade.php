<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tani Pedia</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('style/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/auth.css') }}" />
  </head>
  <body>
    <main>
      <div class="left"></div>
      <div class="right p-5">
        <a href="">
          <img src="{{ asset('images/logo.png') }}">
        </a>
        <div class="content">
          <div class="content-body">
            <div class="mb-3">
              <div class="message">{{ Route::is('login') ? 'Welcome Back' : 'Hello!' }}</div>
              <div class="title">{{ Route::is('login') ? 'Login to your account' : 'Register your account' }}</div>
            </div>
            @yield('content')
            <div class="mt-3">
              @if (session('success'))
                <div class="alert alert-success py-2" role="alert">
                  <small>{{ session('success') }}</small>
                </div>
              @endif
              @if(session('failed'))
                <div class="alert alert-danger py-2" role="alert">
                  <small>{{ session('failed') }}</small>
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="text-center footer-button">
          @if(Route::is('login'))
            Don't have an account? <a href="{{ route('regist') }}" class="text--primary ">Register now</a>
          @else
            Already have an account? <a href="{{ route('login') }}" class="text--primary ">Login now</a>
          @endif
        </div>
      </div>
    </main>
  </body>
</html>