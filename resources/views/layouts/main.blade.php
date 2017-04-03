<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        @yield('title','Mazad Online')
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('dist/css/foundation.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}"/>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


</head>
<body>
<div class="topnav">
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <!-- Logo -->
                    <div class="logo">
                        <img src="images/logo.png" style="height: 70px; width: 70px;"/>

                    </div>
                </div>

                <div class="col-md-3 pull-right">
                    <div class="navbar navbar-inverse" role="banner" id="edit">
                        <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation" >
                            <ul class="nav navbar-nav">
                                    <!-- Authentication Links -->
                                    @if (Auth::guest())
                                        <a href="{{ route('login') }}">Login</a>
                                        <a href="{{ route('register') }}">Register</a>
                                    @else
                                        <a href="{{ url('/admin') }}">{{Auth::user()->name}}</a>
                                        <a href="{{url('/logout')}}">Logout</a>
                                    @endif
                                </ul>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
</div><div class="page-content">
    @if(Session::has('message'))
        <div class="alert alert-info">
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif

</div><!--/Page Content-->


@yield('content')


<script src="{{ asset('dist/js/vendor/jquery.js') }}"></script>
<script src="{{ asset('dist/js/app.js') }}"></script>
</body>
</html>
