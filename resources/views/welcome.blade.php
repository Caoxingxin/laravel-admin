<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/welcome.js')}}"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">


    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

    </style>
    <link href="{{asset('css/welcome.css')}}" rel="stylesheet">
</head>
<body id="app">
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="content">
        <div class="pen-title">
            <h1>Laravel-admin后台管理系统</h1>
        </div>
        <div class="rerun">
            <div class="container">
                <div class="card"></div>
                <div class="card">
                    <h1 class="title">Login</h1>
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <!-- 输入邮箱 -->
                        <div class="input-container">
                            <input id="#{label}" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="#{label}">{{ __('E-Mail Address') }}</label>
                            <div class="bar"></div>
                        </div>
                        <!-- 输入密码 -->
                        <div class="input-container">
                            <input id="#{label}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="#{label}">Password</label>
                            <div class="bar"></div>
                        </div>
                        <!-- 登录 -->
                        <div class="button-container">
                            <button><span>Go</span></button>
                        </div>
                        <div class="footer"><a>Forgot your password?</a></div>
                    </form>
                </div>
                <div class="card alt">
                    <div class="toggle"></div>
                    <h1 class="title">{{ __('Register') }}
                        <div class="close"></div>
                    </h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-container">
                            <input type="#{type}" id="#{label}" required="required"/>
                            <label for="#{label}">Username</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="#{type}" id="#{label}" required="required"/>
                            <label for="#{label}">E-mmail</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="#{type}" id="#{label}" required="required"/>
                            <label for="#{label}">Password</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="#{type}" id="#{label}" required="required"/>
                            <label for="#{label}">Repeat Password</label>
                            <div class="bar"></div>
                        </div>
                        <div class="button-container">
                            <button><span>Next</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
