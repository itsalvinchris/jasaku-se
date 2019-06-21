<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    

    <!-- Styles -->
    {{-- <link href="{{asset('css/meteor.min.css')}}" rel="stylesheet" type="text/css"/> --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap/css/bootstrap.min.css')}}">
    {{-- <link href="{{asset('css/fullcalendar.css')}}" rel="stylesheet" type="text/css"/> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('history') }}"
                                        >
                                        History
                                     </a>
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

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Dashboard</div>
            
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            
                                You are logged in!<br>
            
                                <table class="table table-responsive text-center" id="product_table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th></th>
                                            <th>@lang('input.Nama')</th>
                                            <th>@lang('input.Deskripsi')</th>
                                            <th>@lang('input.Harga')</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $key => $product)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td id="image{{$product->id}}"><img src="{{url('storage/'.$product->images)}}" alt="" srcset="" class="img-responsive" style="width: 200px; height:200px"></td>
                                                <td id="name{{$product->id}}">{{$product->name}}</td>
                                                <td id="description{{$product->id}}">{{$product->description}}</td>
                                                <td id="price{{$product->id}}">{{$product->price}}</td> 
                                                <td>
                                                    <a class="btn btn-primary btn-edit" href={{url('buy/'.$product->id)}}>@lang('content.Beli')</a>
                                                    {{-- <button id="btn-buy#{{$product->id}}" data-toggle="modal" href='#modal-buy' class="btn btn-primary btn-edit">@lang('content.Beli')</button> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
       
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
