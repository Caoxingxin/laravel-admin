@inject('schoolData','App\Http\Services\SchoolDataListServices')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>后台管理系统</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/nav.js') }}" defer></script>
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/welcome2.js')}}"></script>

    <!-- Fonts -->
    <link href="https://s0.pstatp.com/cdn/expire-1-M/font-awesome/5.1.0/css/all.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/welcome2.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/nav.css')}}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/head-school') }}">
                    {{ config('app.name', '轻音') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="row cl">
                    <div class="col-md-24">
                        <ul class="nav navbar-nav" style="font-size: 30px">
                            <li class="active"><a href="{{ url('/head-school') }}" class="btn btn-default"
                                                  style="margin: 10px;width: 90px">总部</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown"
                                   style="margin: 10px;width: 90px">
                                    学校
                                    <b class="caret"></b>
                                </a>
                                <ul class="school_select dropdown-menu" style="padding: 10px;width: 200px">
                                    @foreach($schoolData->schoolData() as $item)
                                        <li value="{{$item->name}}">
                                            <a href="{{action('School\SchoolController@list',['school_id'=>$item->id])}}">{{ $item->name }}</a>
                                        </li>
                                        <li class="divider"></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li style="width:200px;">
                            <span class="btn btn-default" style="margin: 10px;width: 150px">当前学校：
                                @if(isset($school_name))
                                    <input type="hidden" id="school_name" value="{{$school_name}}">
                                </input>
                                @endif
                            </span>
                            </li>
                        </ul>
                    </div>
                </div>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    @yield('nav')
{{--    @yield('content')--}}
</div>
</body>
</html>
