<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl pace-done sidenav-toggled">
    <!-- Navbar-->
    <header class="app-header">
      <!-- Sidebar toggle button-->
      @guest

      @else
        <a class="app-sidebar__toggle toogled" style="width: 50px;" href="" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      @endguest
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!--Notification Menu-->
        @guest
          <li class="nav-item" style="margin-top: 0.5%;">
              <a class="nav-link" style="color: white;" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item" style="margin-top: 0.5%;">
              @if (Route::has('register'))
                  <a class="nav-link" style="color: white;" href="{{ route('register') }}">Register</a>
              @endif
          </li>
        @else
          <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have 1 new notifications.</li>
              <div class="app-notification__content">
                  <li>
                    <a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Transaction complete</p>
                        <p class="app-notification__meta">2 days ago</p>
                      </div>
                    </a>
                  </li>
                </div>
              </div>
              <li class="app-notification__footer"><a href="">See all notifications.</a></li>
            </ul>
          </li>
          <!-- User Menu-->
          <li class="dropdown"><a href="#" class="app-nav__item"  data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
              <li><a class="dropdown-item" href="{{ route('user.logout') }}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </li>
        @endguest
      </ul>
    </header>
    <!-- Sidebar menu-->
    @guest
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
      <aside class="app-sidebar">

      </aside>
    @else
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
      <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar img" src="/storage/avatars/{{ Auth::user()->avatar }}" alt="User Image">
          <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
          </div>
        </div>
        <ul class="app-menu">
          <li><a class="app-menu__item" href="{{ route('profile') }}"><i class="app-menu__icon fa fa-user-circle-o"></i><span class="app-menu__label">Profile</span></a></li>
          <li><a class="app-menu__item" href="{{ route('news') }}"><i class="app-menu__icon fa fa-th-large"></i><span class="app-menu__label">News</span></a></li>
        </ul>
      </aside>
    @endguest
    <main class="app-content">
      @yield('content')
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('js/plugins/pace.min.js') }}"></script>
  </body>
</html>
