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
    <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Heebo:700|Rajdhani|Roboto+Condensed" rel="stylesheet">
   
    <title>Log In</title>
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
                  <input id="form-search-size" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
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
              <li class="nav-item">
                <a class="nav-link" href="{{url('login')}}">Login</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-outline-success my-2 my-sm-0" href="{{url('register')}}">Sign Up</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="body-login">
        <div class="container main">
            <div class="row">
              <div class="col main-kiri">
                  <!-- caurosel -->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ asset('images/creativity.png') }}" class="d-block w-100" alt="caurosel-1">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('images/data.png') }}" class="d-block w-100" alt="caurosel-2">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('images/responsive.png') }}" class="d-block w-100" alt="caurosel-3">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
              </div>
              <div class="col main-kanan">
                <h1>Welcome Back!</h1>
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                    <div class="form-group row padding-add">
                          <div class="col-sm-10">
                            <input type="text"class="form-control-plaintext" id="email" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            <div class="line"></div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                          </div>
                    </div>
                    <div class="form-group row padding-add">
                        <div class="col-sm-10">
                        <input type="password" class="form-control-plaintext" id="inputPassword" placeholder="Password" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        
                        <div class="line-2"></div>
                      </div>
                        <a href="{{ route('password.request') }}"><p id="frgt-Pass">Forgot Password?</p></a>
                    </div>
                    <div class="container padding-add">
                        <div class="row">
                            <div class="col-sm">
                            </div>
                            <div class="col-sm">
                                <div>
                                  <button class="btn" type="submit">Login</button>
                                </div>
                            </div>
                            <div class="col-sm">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="padding-add" id="login-hyper">
                    <p>Don't have an account?
                    <a href="SignUp.html">Sign Up</a>
                    </p>
                </div>
              </div>
            </div>
        </div>
      </div>
</body>
</html>