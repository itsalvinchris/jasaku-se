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
  <link rel="stylesheet" type="text/css" href="{{asset('css/productlist.css')}}" >
  
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
 

  <title>List of Services</title>
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

  <div class="category1">
      <h1 style="color: white; display: none;">All Services</h1>    
  </div>
 
    {{-- <div  class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="{{url('images/webad.jpg')}}" class="d-block w-50" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{url('images/webad.jpg')}}" class="d-block w-50" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{url('images/webad.jpg')}}" class="d-block w-50" alt="...">
          </div>
        </div>
  </div> --}}

 
</div>
<div class="large-container">
<div class="left-container">
    <div class="category">
        @if(isset($category))
        <h1>{{$category->categories}}</h1>
        @else
        <h1>All Services</h1>
        @endif  
    </div>
  <div class="category-box">
      <br>
      <p class="font-weight-bold">Search by Name</p>
      <hr>
      <form class="form-inline">
          <input id="form-search-sizeside" class="form-control mr-sm-2" type="search" placeholder2="Search" aria-label="Search">
        </form>
      <br> 
      <p class="font-weight-bold">Category</p>
      <hr>
      <div class="category-side">
          <a href="">Professional</a>
          <a href="">Student</a>
          <a href="">Beginner</a>
      </div>
      <br>
      <p class="font-weight-bold">Price</p> 
      <hr>
        <div class="form-group">
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder2="minimum price">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder2="maximum price">
        </div>
      <p class="font-weight-bold">Rating</p>
      <hr>
      <div class="rating">
          <div class="ratingstars">
                <div class="form-check">
                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                </div>
                <img src="{{url('images/yellows.png')}}" alt="">
                <img src="{{url('images/yellows.png')}}" alt="">
                <img src="{{url('images/yellows.png')}}" alt="">
                <img src="{{url('images/yellows.png')}}" alt="">
                <img src="{{url('images/yellows.png')}}" alt="">
          </div>
          <div class="ratingstars">
                <div class="form-check">
                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                </div>
                <img src="{{url('images/yellows.png')}}" alt="">
                <img src="{{url('images/yellows.png')}}" alt="">
                <img src="{{url('images/yellows.png')}}" alt="">
                <img src="{{url('images/yellows.png')}}" alt="">
          </div>
          <div class="ratingstars">
                <div class="form-check">
                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                </div>
                <img src="{{url('images/yellows.png')}}" alt="">
                <img src="{{url('images/yellows.png')}}" alt="">
                <img src="{{url('images/yellows.png')}}" alt="">
                
          </div>
          
          <div class="ratingstars">
                <div class="form-check">
                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                </div>
                <img src="{{url('images/yellows.png')}}" alt="">
                <img src="{{url('images/yellows.png')}}" alt="">
               
          </div>
         
          <div class="ratingstars">
                <div class="form-check">
                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                </div>
                <img src="{{url('images/yellows.png')}}" alt="">
               
          </div>
      </div>
      <br>
    </div>
      <div class="decor">
        <img src="{{url('images/decor.png')}}" alt="">
      </div>
  
</div>
  <div class="right-container">
      {{-- <div class="upper-menu">
            <div class="choice">
                    <div class="form-row align-items-center">
                        <div class="col">
                          <label class="mr-sm-2" for="inlineFormCustomSelect"></label>
                          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Filter</option>
                            <option value="1">Newest-Oldest</option>
                            <option value="2">Oldest-Newest</option>
                          </select>
                        </div>
                    </div>
                <p>1-20 Search Results out of 100</p>
            </div>
        </div> --}}
        @php
        if($products != null){
          $counter =0;
          $total_product = count($products);
          $baris = (int)ceil($total_product / 8); 
        }
        else {
          
        } 

        @endphp
        @if($products!=null)

        @for ($i = 1; $i <= $baris; $i++)
            @if($i == $baris)
            <div class="service-provided">
                @for ($j = ($baris-1)*8; $j < $total_product; $j++)
                <a href="{{url('buy/'.$products[$j]->id)}}">
                    <div class="service">
                        <img style="width: 125px; height: 90px;"id="image{{$products[$j]->id}}" src="{{url('storage/'.$products[$j]->images)}}" class="camera" alt="">
                        <br><br>
                        <a id="name{{$products[$j]->id}}" style="text-decoration: none;" class="font-weight-bold" href="{{url('buy/'.$products[$j]->id)}}">{{$products[$j]->name}}</a>
                        <p id="price{{$products[$j]->id}}">{{$products[$j]->price}}</p> 
                        <div class="stars">
                            <img src="{{url('images/yellows.png')}}" alt="">
                            <img src="{{url('images/yellows.png')}}" alt="">
                            <img src="{{url('images/yellows.png')}}" alt="">
                            <img src="{{url('images/star.png')}}" alt="">
                            <img src="{{url('images/star.png')}}" alt="">
                        </div>
                        <div class="service-provider">
                            <img src="{{url('images/avatar.png')}}" alt="">
                            <p>{{$products[$j]->person_name}}</p>
                        </div>
                        <div class="location">
                            <img src="{{url('images/placeholder2.png')}}" alt="">
                            <p>Jakarta</p>
                            </div>
                    </div>
                </a>
                @endfor
            </div>
            @else
            <div class="service-provided">
                @for ($j = ($i-1)*8; $j < 8*$i; $j++)
                <a href="{{url('buy/'.$products[$j]->id)}}">
                    <div class="service">
                        <img style="width: 125px; height: 90px;"id="image{{$products[$j]->id}}" src="{{url('storage/'.$products[$j]->images)}}" class="camera" alt="">
                        <br><br>
                        <a id="name{{$products[$j]->id}}" style="text-decoration: none;" class="font-weight-bold" href="{{url('buy/'.$products[$j]->id)}}">{{$products[$j]->name}}</a>
                        <p id="price{{$products[$j]->id}}">{{$products[$j]->price}}</p> 
                        <div class="stars">
                            <img src="{{url('images/yellows.png')}}" alt="">
                            <img src="{{url('images/yellows.png')}}" alt="">
                            <img src="{{url('images/yellows.png')}}" alt="">
                            <img src="{{url('images/star.png')}}" alt="">
                            <img src="{{url('images/star.png')}}" alt="">
                        </div>
                        <div class="service-provider">
                            <img src="{{url('images/avatar.png')}}" alt="">
                            <p>{{$products[$j]->person_name}}</p>
                        </div>
                        <div class="location">
                            <img src="{{url('images/placeholder2.png')}}" alt="">
                            <p>Jakarta</p>
                            </div>
                    </div>
                </a>
                @endfor
            </div>

            @endif
            
        @endfor

        @else
            <h1 style="margin-left: 50px;">Product Not Found</h1>
        @endif
        
        {{-- <div class="service-provided">
                @foreach($products as $key => $product)
                <div class="service">
                    <img style="width: 125px; height: 90px;"id="image{{$product->id}}" src="{{url('storage/'.$product->images)}}" class="camera" alt="">
                    <br><br>
                    <a id="name{{$product->id}}" class="font-weight-bold" href="">{{$product->name}}</a>
                    <p price{{$product->id}}>{{$product->price}}</p> 
                    <div class="stars">
                        <img src="{{url('images/yellows.png')}}" alt="">
                        <img src="{{url('images/yellows.png')}}" alt="">
                        <img src="{{url('images/yellows.png')}}" alt="">
                        <img src="{{url('images/star.png')}}" alt="">
                        <img src="{{url('images/star.png')}}" alt="">
                    </div>
                    <div class="service-provider">
                        <img src="{{url('images/avatar.png')}}" alt="">
                        <p>{{$product->person_name}}</p>
                    </div>
                    <div class="location">
                        <img src="{{url('images/placeholder2.png')}}" alt="">
                        <p>Jakarta</p>
                        </div>
                </div>
                @endforeach --}}

              {{-- <div class="page-views">
                <nav aria-label="Page navigation example" class="page-view">
                    <ul class="pagination">
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                    </ul>
                </nav>
              </div> --}}
            {{-- </div> --}}
        </div>
    </div>
</body>
</html>