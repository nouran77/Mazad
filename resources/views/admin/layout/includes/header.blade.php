<div class="topnav">
 <div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <img src="images/logo.png" style="width:70px; height: 70px; "/>

                </div>
            </div>






            <div class="col-md-4 pull-right">
                <div class="navbar navbar-inverse" role="banner" id="edit">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation" >
                        <ul class="nav navbar-nav">
                                <!-- Authentication Links -->
                                @if (Auth::guest())
                                    <a href="{{ route('login') }}">Login</a>
                                    <a href="{{ route('register') }}">Register</a>
                                @else
                                    <a href="{{ url('/') }}">Home</a>
                                    <a href="{{url('/logout')}}">Logout</a>
                                @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div>
</div>