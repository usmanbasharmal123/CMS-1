<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--styling the button-->


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    {{-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet"> --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

    <link href="{{ asset('app/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('app/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('app/css/style-responsive.min.css') }}" rel="stylesheet">
    <link href="{{ asset('app/css/default.css') }}" rel="stylesheet">
	<!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{ asset('plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet">
	<!-- ================== END PAGE LEVEL STYLE ================== -->







    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>


                                   <img src="{{ asset(Auth::user()->profile->avatar)}}"  width="50px" height="50px" style="border-radius:50%;">

                                        {{-- asset({{Auth::user()->profile->avatar}}) --}}
                                    {{ Auth::user()->name }} <span class="caret"></span>

                                </a>


                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
{{-- content started from here --}}
        <main class="py-4">

        <div class="container">
            <div class="row">
                @if(Auth::check())
                <div class="col-lg-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                        <a href="{{route('homee')}}" >Home</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('post.create')}}" >Create new post</a>
                        </li>
                        <li class="list-group-item">
                                <a href="{{route('posts')}}" >All Posts</a>
                            </li>
                            <li class="list-group-item">
                                    <a href="{{route('post.trash')}}" >Tarshed Posts</a>
                                </li>
                        <li class="list-group-item">
                        <a href="{{route('category.create')}}" >Create new category</a>
                        </li>
                        <li class="list-group-item">
                                <a href="{{route('categories')}}" >All Categories</a>
                        </li>

                       <li class="list-group-item">
                       <a href="{{route('categories.trush')}}" >Trashed Categories</a>
                       </li>
                       <li class="list-group-item">
                            <a href="{{route('tags')}}" >Tags</a>
                        </li>
                        <li class="list-group-item">
                                <a href="{{route('tag.create')}}" >Create Tag</a>
                            </li>
                            @if(Auth::user()->admin)
                            <li class="list-group-item">
                                    <a href="{{route('users')}}" >Users</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('user.create')}}" >Create New User</a>
                                </li>

                            @endif
                            <li class="list-group-item">
                                <a href="{{route('user.profile')}}" >My Profile</a>
                            </li>
                            @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{route('settings')}}" >Settings</a>
                            </li>
                            @endif
                    </ul>
                </div>
                @endif
                <div class="col-lg-8">
                        @yield('content')
                </div>
            </div>
        </div>
       </main>
    </div>
    {{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> --}}
    <script src="{{ asset('js/app.js') }}" ></script>
<script src="{{ asset('js/toastr.min.js') }}" ></script>


<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ asset('plugins/pace/pace.min.js') }}" ></script>
<script src="{{ asset('plugins/jquery/jquery-1.9.1.min.js') }}" ></script>
<script src="{{ asset('plugins/jquery/jquery-migrate-1.1.0.min.js') }}" ></script>
<script src="{{ asset('plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}" ></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" ></script>

<!--[if lt IE 9]>
    <script src="assets/crossbrowserjs/html5shiv.js"></script>
    <script src="assets/crossbrowserjs/respond.min.js"></script>
    <script src="assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }}" ></script>
<script src="{{ asset('plugins/jquery-cookie/jquery.cookie.js') }}" ></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->

<script src="{{ asset('plugins/gritter/js/jquery.gritter.js') }}" ></script>

<script src="{{ asset('plugins/flot/jquery.flot.min.js') }}" ></script>

<script src="{{ asset('plugins/flot/jquery.flot.time.min.js') }}" ></script>

<script src="{{ asset('plugins/flot/jquery.flot.resize.min.js') }}" ></script>

<script src="{{ asset('plugins/flot/jquery.flot.pie.min.js') }}" ></script>

<script src="{{ asset('plugins/sparkline/jquery.sparkline.js') }}" ></script>

<script src="{{ asset('plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js') }}" ></script>

<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" ></script>

<script src="{{ asset('js/dashboard.min.js') }}" ></script>
<script src="{{ asset('js/apps.min.js') }}" ></script>

<!-- ================== END PAGE LEVEL JS ================== -->

{{-- <script>
    $(document).ready(function() {
        App.init();
        Dashboard.init();
    });
</script> --}}
{{-- <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53034621-1', 'auto');
  ga('send', 'pageview');
</script> --}}

{{-- ////////////////////////////////////// --}}
<script>
    @if(Session::has('success'))

        toastr.success("{{ Session::get('success')}}")

    @endif
    @if(Session::has('info'))
    toastr.info("{{Session::get('info')}}")
    @endif
</script>
@yield('scripts')
</body>
</html>
