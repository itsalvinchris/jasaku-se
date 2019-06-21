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
    {{-- <link rel="stylesheet" href="{{asset('css/bootstrap/css/bootstrap.min.css')}}"> --}}

    <!-- Styles -->
    {{-- <link href="{{asset('css/meteor.min.css')}}" rel="stylesheet" type="text/css"/> --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap/css/bootstrap.min.css')}}">
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
                                            <th>Order ID</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>@lang('input.Harga')</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($history as $key => $his)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td id="book_id{{$his->id}}">{{$his->book_id}}</td>
                                                <td id="date{{$his->id}}">{{$his->date}}</td>
                                                <td id="hour{{$his->id}}">{{$his->hour}}</td>
                                                <td id="price{{$his->id}}">
                                                @php
                                                    $split = explode("-",$his->hour);
                                                    $split_jam_before = explode(".",$split[0]);
                                                    $split_jam_after = explode(".",$split[1]);
                                                    $jam = $split_jam_after[0] - $split_jam_before[0];
                                                    $total_price = $jam * App\Product::where('id',$his->product_id)->first()->price;
                                                    //dd($total_price);
                                                @endphp
                                                {{$total_price}}
                                                </td>  
                                                <td>
                                                    @if($his->status == "Not paid")
                                                        <button id="btn-upload-payment#{{$his->book_id}}" data-toggle="modal" href='#modal-upload-payment' class="btn btn-primary btn-edit btn-payment">Upload Payment Receipt</button>
                                                    @elseif($his->status == "Paid")
                                                        <button class="btn btn-success">Paid</button>
                                                    @elseif($his->status == "On Payment Review")
                                                        <button class="btn btn-success">On Payment Review</button>
                                                    @endif
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
            
            <div class="modal fade" id="modal-upload-payment">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Upload Payment Receipt</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <form id="product-buy" action="{{url("history/")}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <h4>Bank Name</h4>
                                <input type="text" name="paymet_bank_name" id="payment-bank-name" class="form-control" placeholder="Bank Name">
                                <h4>Receipt Number</h4>
                                <input type="text" name="paymet_bank_receipt_number" id="payment-bank-name" class="form-control" placeholder="Bank Name">
                                <h4>Date</h4>
                                <input type="date" name="paymet_bank_date" id="payment-bank-name" placeholder="Bank Name" format="dd/MM/yyyy">
                                <h4>Upload Payment Receipt Image</h4>
                                <input type="file" name="payment_receipt" id="payment-receipt">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Verify Payment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
       
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            //$('#mission_table').DataTable();

            $(".btn-payment").click( (event) => {
                console.log("test");
                const id = event.currentTarget.id;
                const index = id.substr(19);
                $('#product-buy').attr('action',"{{url( 'verify-payment') }}/"+index);
            });
        });
    </script>
</body>
</html>
