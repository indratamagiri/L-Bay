<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        L-Bay
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:60px;">
                                    <img src="{{url('/uploads/avatars/'. Auth::user()->avatar)}}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%; ">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li>
                                      <a class=" glyphicon glyphicon-home" href="{{ url('/home') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('user-home').submit();">
                                          Home
                                      </a>

                                      <form id="user-home" action="{{ url('/home') }}" method="get" style="display: none;">
                                        {{ csrf_field() }}
                                      </form>
                                  </li>
                                  <li>
                                      <a class=" glyphicon glyphicon-shopping-cart" href="{{ url('profile/cart')}}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('user-cart').submit();">
                                          Cart
                                          <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                                      </a>

                                      <form id="user-cart" action="{{ url('profile/cart/')}}" method="get" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                  </li>

                                  <li>
                                      <a class="glyphicon glyphicon-user" href="{{ url('profile') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('user-form').submit();">
                                          Profile
                                      </a>

                                      <form id="user-form" action="{{ url('profile') }}" method="get" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                  </li>

                                  <li>
                                      <a class="glyphicon glyphicon-usd" href="{{ url('profile/history') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('user-history').submit();">
                                          Order <!--history -->
                                      </a>

                                      <form id="user-history" action="{{ url('profile/history') }}" method="get" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                  </li>

                                    <li>
                                        <a  class="glyphicon glyphicon-log-out" chref="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <script   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->

  <script src="https://checkout.stripe.com/checkout.js"></script>
     <script src="https://code.jquery.com/jquery-3.1.1.min.js"
             integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
             crossorigin="anonymous"></script>
  <script src="{{ URL::to('js/checkout.js') }}"></script>
  <!-- Latest compiled and minified JavaScript -->

</body>
</html>
