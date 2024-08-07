<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Tani Pedia</title>
  @yield("headScript")
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{!! asset('admin/assets/css/style.css') !!}">
  <link rel="stylesheet" href="{!! asset('admin/assets/css/components.css') !!}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>          
        </form>
        @guest
            <ul class="navbar-nav navbar-right">
              <li>
                <a href="/login" class="btn bg-white text-primary">Login</a>    
              </li>
            </ul>            
        @endguest
        @auth
          <ul class="navbar-nav navbar-right">          
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="{!! asset('admin/assets/img/avatar/avatar-2.png') !!}" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}!</div></a>
              <div class="dropdown-menu dropdown-menu-right">                
                <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger">
                  
                </a>
                <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  <i class="fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                
              </div>
            </li>
          </ul>
        @endauth
        
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{route('admin.home')}}">Tani Pedia</a>
          </div>
          
          
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="menu-header">Users Menu</li>
            <li class="nav-item dropdown @if(request()->routeIs('users.*')) active @endif">
                <a href="{{ route('users.index') }}" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Users</span></a>
                <ul class="dropdown-menu">                  
                    <li class="@if(request()->routeIs('users.index')) active @endif"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                    <li class="@if(request()->routeIs('users.create')) active @endif"><a class="nav-link" href="{{ route('users.create') }}">Add User</a></li>
                </ul>
            </li>

            <li class="menu-header">Farms Menu</li>
            <li class="nav-item dropdown @if(request()->routeIs('admin.farms.*')) active @endif">
                <a href="{{ route('admin.farms.index') }}" class="nav-link has-dropdown"><i class="fas fa-tractor"></i><span>Farm</span></a>
                <ul class="dropdown-menu">                  
                    <li class="@if(request()->routeIs('admin.farms.index')) active @endif"><a class="nav-link" href="{{ route('admin.farms.index') }}">Farms</a></li>
                    <li class="@if(request()->routeIs('admin.farms.create')) active @endif"><a class="nav-link" href="{{ route('admin.farms.create') }}">Add Farm</a></li>
                </ul>
            </li>

            <li class="menu-header">Products Menu</li>
            <li class="nav-item dropdown @if(request()->routeIs('admin.products.*')) active @endif">
                <a href="{{ route('admin.products.index') }}" class="nav-link has-dropdown"><i class="fas fa-boxes"></i><span>Products</span></a>
                <ul class="dropdown-menu">                  
                    <li class="@if(request()->routeIs('admin.products.index')) active @endif"><a class="nav-link" href="{{ route('admin.products.index') }}">Products</a></li>
                    <li class="@if(request()->routeIs('admin.products.create')) active @endif"><a class="nav-link" href="{{ route('admin.products.create') }}">Add Product</a></li>
                </ul>
            </li>

            <li class="menu-header">Informations Menu</li>
            <li class="nav-item dropdown @if(request()->routeIs('admin.informations.*')) active @endif">
                <a href="{{ route('admin.informations.index') }}" class="nav-link has-dropdown"><i class="fas fa-info-circle"></i><span>Informations</span></a>
                <ul class="dropdown-menu">                  
                    <li class="@if(request()->routeIs('admin.informations.index')) active @endif"><a class="nav-link" href="{{ route('admin.informations.index') }}">Informations</a></li>
                    <li class="@if(request()->routeIs('admin.informations.create')) active @endif"><a class="nav-link" href="{{ route('admin.informations.create') }}">Add Information</a></li>
                </ul>
            </li>

            <li class="menu-header">Messages Menu</li>
            <li class="nav-item dropdown @if(request()->routeIs('admin.messages.*')) active @endif">
                <a href="{{ route('admin.messages.index') }}" class="nav-link has-dropdown"><i class="fas fa-envelope"></i><span>Messages</span></a>
                <ul class="dropdown-menu">                  
                    <li class="@if(request()->routeIs('admin.messages.index')) active @endif"><a class="nav-link" href="{{ route('admin.messages.index') }}">Messages</a></li>
                    <li class="@if(request()->routeIs('admin.messages.create')) active @endif"><a class="nav-link" href="{{ route('admin.messages.create') }}">Add Message</a></li>
                </ul>
            </li>

            <li class="menu-header">Subdistricts Menu</li>
            <li class="nav-item dropdown @if(request()->routeIs('admin.subdistricts.*')) active @endif">
                <a href="{{ route('admin.subdistricts.index') }}" class="nav-link has-dropdown"><i class="fas fa-map"></i><span>Subdistricts</span></a>
                <ul class="dropdown-menu">                  
                    <li class="@if(request()->routeIs('admin.subdistricts.index')) active @endif"><a class="nav-link" href="{{ route('admin.subdistricts.index') }}">Subdistricts</a></li>
                    <li class="@if(request()->routeIs('admin.subdistricts.create')) active @endif"><a class="nav-link" href="{{ route('admin.subdistricts.create') }}">Add Subdistrict</a></li>
                </ul>
            </li>

            <li class="menu-header">Villages Menu</li>
            <li class="nav-item dropdown @if(request()->routeIs('admin.villages.*')) active @endif">
                <a href="{{ route('admin.villages.index') }}" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Villages</span></a>
                <ul class="dropdown-menu">                  
                    <li class="@if(request()->routeIs('admin.villages.index')) active @endif"><a class="nav-link" href="{{ route('admin.villages.index') }}">Villages</a></li>
                    <li class="@if(request()->routeIs('admin.villages.create')) active @endif"><a class="nav-link" href="{{ route('admin.villages.create') }}">Add Village</a></li>
                </ul>
            </li>
          </ul>


            
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                @yield('breadcrumb')
            </div>
          </div>
          @yield('main-content')
        </section>
      </div>

    </div>
  </div>
  	
  @yield("bodyScript")

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{!! asset('admin/assets/js/stisla.js') !!}"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
  <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="../node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Template JS File -->
  <script src="{!! asset('admin/assets/js/scripts.js') !!}"></script>
  <script src="{!! asset('admin/assets/js/custom.js') !!}"></script>

  <!-- Page Specific JS File -->
  <script src="{!! asset('admin/assets/js/page/index-0.js') !!}"></script>
  <script src="{!! asset('admin/assets/js/page/bootstrap-modal.js') !!}"></script>
</body>
</html>
