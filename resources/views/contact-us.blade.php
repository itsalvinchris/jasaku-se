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
    <link rel="stylesheet" type="text/css" href="{{asset('css/contact-us.css')}}" >
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Heebo:700|Rajdhani|Roboto+Condensed" rel="stylesheet">
   
    <title>Contact Us</title>
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
      <div class="body-login">
        <div class="container main">
            <div class="row">
              <div class="col main-kiri">
                            <!-- content-1 -->
                            <div class="card border w-75 rounded border-primary rounded-lg w-100">
                              <div class="card-body w-100">
                                <h5 class="card-title title">Contact Us</h5>
                                <form action="{{url('/contact-us')}}" method="POST">
                                  @csrf
                                  <div class="form-group row padding-add">
                                    <div class="col-sm-10">
                                        @if(Auth::check())
                                        <input type="text" class="form-control-plaintext" id="inputName" name="name" value="{{Auth::user()->name}}" disabled>
                                        @else
                                        <input type="text" class="form-control-plaintext" id="inputName" name="name" placeholder="Name" required>
                                        @endif
                                        <div class="line"></div>
                                    </div>
                                  </div>
                                  <div class="form-group row padding-add">
                                      <div class="col-sm-10">
                                          @if(Auth::check())
                                            <input type="email" class="form-control-plaintext" id="inputEmail" name="email" value="{{Auth::user()->email}}" disabled>
                                          @else
                                            <input type="email" class="form-control-plaintext" id="inputEmail" name="email" placeholder="Email" required>
                                          @endif
                                          <div class="line-2"></div>
                                      </div>
                                  </div>
                                  <div class="form-group padding-add">
                                    <label>Message</label>
                                    <textarea name="message" class="form-control w-100" rows="5"></textarea>
                                  </div>
                                    <div class="submit">
                                        <button class="btn" type="submit">Submit</button>
                                    </div>
                                </form>
                              </div>
                            </div>
              </div>
              <div class="col main-kanan">
                    <div class="card">
                            <iframe width="500px" height="500px"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1849.3526479300501!2d106.7807880936486!3d-6.201359456658698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6dcc7d2c4ad%3A0x209cb1eef39be168!2sUniversitas+Bina+Nusantara+Anggrek!5e0!3m2!1sid!2sid!4v1558061686011!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="container main-kanan-contact text-center">
                            <div class="row" width="100%">
                              <div class="col padding-min">
                                <img class="icon" src="{{url('images/placeholder.png')}}" alt="placeholder-icon">
                              </div>
                              <div class="col padding-min">
                                  <p class="icon-text">Bina Nusantara University Anggrek</p>
                              </div>
                              <div class="col padding-min">
                                  <img class="icon" src="{{url('images/phone-call.png')}}" alt="phonecall-icon">
                              </div>
                              <div class="col padding-min">
                                  <p class="icon-text-2">(0251)83214567</p>
                              </div>
                              <div class="col padding-min">
                                  <img class="icon" src="{{url('images/envelope.png')}}" alt="envelope-icon">
                              </div>
                              <div class="col padding-min">
                                  <p class="icon-text-2">cs@jsku.id</p>
                              </div>
                            </div>
                     </div>
              </div>
            </div>
        </div>
      </div>
</body>
</html>