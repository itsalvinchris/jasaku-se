<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{url('css/bootstrap/css/bootstrap.min.css')}}">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="{{url('css/bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Heebo:700|Rajdhani|Roboto+Condensed" rel="stylesheet">
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
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
  <div class="main"> 
    <h1>Jasaku</h1>
    <h6>We connect services to people</h6>
    <a href="{{url('product-list')}}"><button class="btn"><h4 style="line-height: 0; display:flex; align-items: center;">Use our services<h4></button></a>
  </div>
  <div class="numbering">
    <div>
      <h1>120+</h1>
      <h6>Users</h6>
    </div>
    <div>
      <h1>100+</h1>
      <h6>Service Providers</h6>
    </div>
    <div>
      <h1>240+</h1>
      <h6>Services Booked</h6>
    </div>
  </div>

  <div class="main-categories">
    <div class="categories">
      @foreach($categories as $category)
      <a style="text-decoration: none;"href="{{url('product-list?category='.$category->categories)}}">
          <div>
              <img src="{{ url('storage/').'/'.$category->icon}}" alt="" srcset="">
              <p style="margin-bottom: 0px;">{{$category->categories}}</p>
          </div>
      </a>
      @endforeach
      {{-- <div>
        <img src="{{ asset('images/profesi-artist.png')}}" alt="" srcset="">
        <p style="margin-bottom: 0px;">Artist</p>
      </div> --}}
      {{-- <div>
        <img src="{{ asset('images/profesi-education.png')}}" alt="" srcset="">
        <p style="margin-bottom: 0px;">Education</p>
      </div>
      <div>
        <img src="{{ asset('images/profesi-health.png')}}" alt="" srcset="">
        <p style="margin-bottom: 0px;">Health</p>
      </div>
      <div>
        <img src="{{ asset('images/profesi-photographer.png')}}" alt="" srcset="">
        <p style="margin-bottom: 0px;">Photographer</p>
      </div>
      <div>
        <img src="{{ asset('images/profesi-programmer.png')}}" alt="" srcset="">
        <p style="margin-bottom: 0px;">Programmer</p>
      </div>
      <div>
        <img src="{{ asset('images/profesi-technician.png')}}" alt="" srcset="">
        <p style="margin-bottom: 0px;">Technician</p>
      </div> --}}
    </div>
    {{-- <center>
      <button class="btn btn-categories">More...</button>
    </center> --}}
  </div>

  {{-- <div class="vendor">
    <div class="vendor-left">
      <p class="vendor-title">TOP SP</p>
      <p class="vendor-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur iste culpa voluptatibus ex optio rerum repudiandae earum dignissimos, perspiciatis corporis? Nostrum, vel! Eligendi dignissimos ipsam necessitatibus reiciendis eveniet voluptatibus minima?</p>
    </div>
    <div class="vendor-right">
      <p >TOP SP</p>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur iste culpa voluptatibus ex optio rerum repudiandae earum dignissimos, perspiciatis corporis? Nostrum, vel! Eligendi dignissimos ipsam necessitatibus reiciendis eveniet voluptatibus minima?</p>
    </div>
  </div> --}}

  <div class="testimony" id="testimony" style="display:flex; justify-content: center;">
    <div style="" class="items">
      <h1>Testimony</h1>
      <h4>Aplikasi yang sangat memudahkan masyarakat yang membutuhkan jasa.
      </h4>
      <div class="rating rating-size">
          <i class="fas fa-star clickable"></i>
          <i class="fas fa-star clickable"></i>
          <i class="fas fa-star clickable"></i>
          <i class="fas fa-star clickable"></i>
          <i class="fas fa-star clickable"></i>
        </div>
    </div>
    <div style="padding-left: 200px;"class="items">
      <h1>Bill Gates</h1>
      <h4>Founder of Microsoft</h4>
      <img style="width: 300px; height: 300px;"src="{{asset('images/billgates.png')}}" alt="">
      {{-- <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
             Dolore minima asperiores doloremque odio mollitia nostrum libero,
             quod, ipsam unde cumque quasi blanditiis qui facilis
             enim repellendus ab voluptatem aut eligendi!
      </h6> --}}
    </div>
  </div>
  
  <div class="carousel">
         
  </div>
  
  <div class="footer">
    <a href="https://www.instagram.com/jasakuofficial/" class="fab fa-instagram"></a>
    <a href="#" class="fab fa-facebook"></a>
    <a href="#" class="fab fa-twitter"></a>
    <a href="#" class="fab fa-linkedin"></a>
    <a href="#" class="fab fa-youtube"></a>
    <a href="#" class="fab fa-whatsapp"></a>
  </div>
  
</body>
</html>