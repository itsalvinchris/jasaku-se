<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- font -->
    <link
      href="https://fonts.googleapis.com/css?family=Heebo:700|Rajdhani|Roboto+Condensed"
      rel="stylesheet"
    />
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/about-us.css') }}" >
    <!-- font awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    />

    <!--Bootstrap local-->
    <script src="/assets/bootstrap/css/bootstrap.min.css"></script>
    <script src="/assets/jquery/jquery-3.3.1.min.js"></script>
    <title>Jasaku</title>
  </head>
  <body>
    <div class="header">
      <nav class="navbar fixed-top navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{url('/')}}">Jasaku</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            {{-- <li class="nav-item active">
              <a class="nav-link" href="#">Home </a>
            </li> --}}
            <li class="nav-item initial-scale">
              <form class="form-inline">
                <input
                  id="form-search-size"
                  class="form-control mr-sm-2"
                  type="search"
                  placeholder="Search"
                  aria-label="Search"
                />
                <button
                  class="btn btn-outline-success my-2 my-sm-0"
                  type="submit"
                >
                  Search
                </button>
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
    <div class="container">
      <div class="au-main">
        <h1 class="visi-title">Visi</h1>
        <h6 class="visi-desc">
          Becoming Indonesia's Leading Services E-Commerce Portal
        </h6>
        <img src="{{ asset('images/network.png') }}" class="au-main-img" />
        <h1 class="misi-title">Misi</h1>
        <h6 class="misi-desc">
          1. Providing Innovative Technology Advancement in the E-Commerce Industry
        </h6>
        <h6 class="misi-desc2">
          2. Providing the Best Access to Freelance Job Vacancies
        </h6>
        <h6 class="misi-desc3">
          3. Providing Easiest Way to Connect Service Provider and Customer
        </h6>
        <h6 class="misi-desc4">
          4. Providing Best Customer Experience
        </h6>
      </div>

      <div class="ourfounder-main">
        <div class=" founder-row-title">
          <h1>Our Founder</h1>
        </div>
        <div class="founder-row">
          <div class="founder">
            <div class="founder-title">
              <img src="{{ asset('images/natan.png') }}" alt="" class="founder-img" />
              <h5>Nathan Priyasadie</h5>
              <h6>Chief Executive Officer</h6>
            </div>
            {{-- <div class="founder-description">
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Voluptates autem officiis illo totam omnis, aliquid incidunt?
                Voluptas minus fugiat numquam, voluptatem autem.
              </p>
            </div> --}}
          </div>
          <div class="founder">
            <div class="founder-title">
              <img src="{{ asset('images/emil.png') }}" alt="" class="founder-img" />
              <h5>Emilda</h5>
              <h6>Chief Finance Officer</h6>
            </div>
            {{-- <div class="founder-description">
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Voluptates autem officiis illo totam omnis, aliquid incidunt?
                Voluptas minus fugiat numquam, voluptatem autem.
              </p>
            </div> --}}
          </div>
        </div>
        <div class="founder-row">
          <div class="founder">
            <div class="founder-title">
              <img src="{{ asset('images/ca.png') }}" alt="" class="founder-img" />
              <h5>Christopher Alvin</h5>
              <h6>Chief Technology Officer</h6>
            </div>
            {{-- <div class="founder-description">
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Voluptates autem officiis illo totam omnis, aliquid incidunt?
                Voluptas minus fugiat numquam, voluptatem autem.
              </p>
            </div> --}}
          </div>
        </div>
        <div class="founder-row">
          <div class="founder">
            <div class="founder-title">
              <img src="{{ asset('images/megga.png') }}" alt="" class="founder-img" />
              <h5>Megga Eunike Cristilia Ginzel</h5>
              <h6>Chief Marketing Officer</h6>
            </div>
            {{-- <div class="founder-description">
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Voluptates autem officiis illo totam omnis, aliquid incidunt?
                Voluptas minus fugiat numquam, voluptatem autem.
              </p>
            </div> --}}
          </div>
          <div class="founder">
            <div class="founder-title">
              <img src="{{ asset('images/tata.png') }}" alt="" class="founder-img" />
              <h5>Natasya</h5>
              <h6>Chief Product Officer</h6>
            </div>
            {{-- <div class="founder-description">
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Voluptates autem officiis illo totam omnis, aliquid incidunt?
                Voluptas minus fugiat numquam, voluptatem autem.
              </p>
            </div> --}}
          </div>
        </div>
      </div>
      <div class="carousel"></div>
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
