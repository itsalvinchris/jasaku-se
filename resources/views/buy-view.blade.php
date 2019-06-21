<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Heebo:700|Rajdhani|Roboto+Condensed" rel="stylesheet">
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/product-view.css') }}">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <title>Jasaku</title>
</head>
<body>
<div class="header">       
    <nav class="navbar fixed-top navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="{{url('/')}}">Jasaku</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          {{-- <li class="nav-item active">
            <a class="nav-link" href="#">Home </a>
          </li> --}}
          <li  class="nav-item initial-scale">
            <form class="form-inline">
              <input id="form-search-size" class="form-control mr-sm-2" type="search" placeholder2="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{url('/product-list')}}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/about-us')}}">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/contact-us')}}">Contact Us</a>
            </li>
            @if(Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="{{url('/history')}}">History</a>
            </li>
            @endif
            <li class="nav-item">
              @if(Auth::check())
                  <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
              @else
                  <a class="nav-link" href="{{'/login'}}">Login</a>
              @endif
              </li>
              <li class="nav-item">
              @if(Auth::check())
                  <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              @else
                  <a class="btn btn-outline-success my-2 my-sm-0" href="{{url('register')}}">Sign Up</a>
              @endif
            </li>
        </ul>
      </div>
    </nav>
  </div>
  <div class="product-view">
    <div class="product-view-left">
      <img class="product-img-view" style="width: 550px; height: 550px" src="{{url('storage/'.$product->images)}}">
    </div>
    <div class="product-view-right">
    <p class="product-title">{{$product->name}}</p>
      <div class="product-details">
        <div class="rating">
          <i class="fas fa-star clickable"></i>
          <i class="fas fa-star clickable"></i>
          <i class="fas fa-star clickable"></i>
          <i class="far fa-star clickable"></i>
          <i class="far fa-star clickable"></i>
        </div>
        <div class="vertical-line"></div>
        <div>
          <p>120 rating</p>
        </div>
        <div class="vertical-line"></div>
        <div class="product-love">
          <i class="fa fa-heart" aria-hidden="true"> </i>
          <span>Favourite(4.129)</span>
        </div>
      </div>
    <div class="product-price"> Rp. {{$product->price}} </div>
      <div class="product-owner-place my-3  ">
        <i class="far fa-user"><span>{{$product->person_name}}</span></i>
        <i class="fas fa-file-alt"><span>{{$product->description}}</span></i>
      </div>
      <div class="product-btn">
        @if(Auth::check())
        <button class="product-cart">
          <i class="far fa-bookmark"><span class="btn-details">Bookmark</span></i>
        </button>
        <button class="product-buy">
          <i class="fas fa-dollar-sign"><span class="btn-details"><a href="{{ url('book/'.$p_id)}}" style="color:black; text-decoration: none;">Buy Now</a></span></i>
        </button>
          @else
            <button class="product-buy">
              <i class="fas fa-dollar-sign"><span class="btn-details"><a href="{{ url('book/'.$p_id)}}" style="color:black; text-decoration: none;">Login</a></span></i>
            </button>
           @endif
        </button>
      </div>
    </div>
  </div>
</body>
</html>