<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Archive</title>
    <style>

    .loaderCon{
        background: rgba(0,0,0,0.8);
        width:100%;
        height: 100%;
        top: 0;
        left: 0;
        position:fixed;
        z-index: 99;
        display: none;
    }
    .loader {
    position: relative;
    top:280px;
    left: 620px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 170px;
  height: 170px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
        .username{
            position: relative;
            top: 18px;
            right:-5px;
        }
        body{
            padding: 0;
            margin: 0;
        }
        /*.preloader{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            transition:1s;
        }

        .preloader:before{
            content: '';
            position: absolute;
            left: 0;
            width: 50%;
            height: 100%;
            background: black;
            transition: 1s;
        }
        .preloader.complete:before{
            left: -50%;
        }
        .preloader:after{
            content: '';
            position: absolute;
            right: 0;
            width: 50%;
            height: 100%;
            background: black;
            transition: 1s;
        }
        .preloader.complete:after{
            right: -50%;
        }*/

        .loaderCon p{
            color: white;
            font-size:30px;
            position: relative;
            top:180px;
            left: 400px;
        }
        
    </style>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        
    $(window).on('load',function() {
        $('.preloader').addClass('complete');
        $(".container").removeAttr("hidden");
        $(".sc").removeAttr("hidden");
    })
    </script>
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
                        Archive System 
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
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

    @yield('tb')

    <!-- Scripts -->
    <script src='https://code.jquery.com/jquery-3.3.1.js'></script>
    <script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js'></script>
   

    <script>
    $(document).ready(function() {
    $('#example').DataTable();
      $(function() {
    $('#wew').click(function() {
        $(".loaderCon").show();
        setTimeOut(function(){
            $("loaderCon").hide();
        },60000)
    })
})

    });
</script>
</body>
</html>
