<nav class="navbar navbar-expand-lg bg-white fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ route('welcome') }}"><img src="{{ asset('images/logo.png') }}" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
          @if(Route::is('welcome'))
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('welcome') }}">Home</a>
          </li>
          <li class="nav-item">
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#information">Information</a>
          </li>
          @endif
        </ul>
      <div class="d-flex" role="search">
        @if(isset(auth()->user()->id))
          <div class="btn-group" role="group">
            <button id="authDropdown" type="button" class="btn btn-login dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }} 
            </button>
              <ul class="dropdown-menu" aria-labelledby="authDropdown">
              <!-- <li><a class="dropdown-item" href="#">Dropdown link</a></li> -->
              <li><a class="dropdown-item" href="{{ route('my-farm') }}">My Farm</a></li>
              <li><a class="dropdown-item" href="{{route('logout')}}"
                
                onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  
                    {{ __('Logout') }}
                </a></li>
              

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
          </div>
        @else
          <a href="{{ route('login') }}" class="btn btn-login">Login</a>
        @endif
      </div>
    </div>
  </div>
</nav>