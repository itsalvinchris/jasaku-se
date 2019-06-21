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
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="./css/history.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <title>History</title>
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
          <li class="nav-item initial-scale">
            <form class="form-inline">
              <input id="form-search-size" class="form-control mr-sm-2" type="search" placeholder="Search"
                aria-label="Search">
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
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</button>
            @endif
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <div class="history-body">
    <div class="history-title">
      <h1>Checkout Status</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-hover" style="overflow-y: auto">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Order ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($history as $key => $his)
            <tr>
                <th scope="row">{{++$key}}</th>
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
                @endphp
                {{$total_price}}
                </td>  
                <td>
                    @if($his->status == "Not paid")
                        {{-- <button id="btn-upload-payment#{{$his->book_id}}" data-toggle="modal" href='#modal-upload-payment' class="btn btn-primary btn-edit btn-payment">Upload Payment Receipt</button> --}}
                        <button id="btn-upload-payment#{{$his->book_id}}" class="btn btn-primary btn-edit btn-payment" data-toggle="modal" href='#modal-upload-payment'>
                        Upload Payment Receipt
                        </button>
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
    <!-- Modal -->
    <div class="modal fade" id="modal-upload-payment" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Upload Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span id="span-modal-close" aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body p-2">
            <div class="text-center">
              <img src="./images/img-placeholder.png" id="pay-img" class="payment-image img-responsive" alt="...">
              
              <form id="payment-modal" class="payment-modal" action="{{url("verify-payment/")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="payment_receipt" id="payment-receipt">
                    <label class="custom-file-label text-left" for="customFile" id="file-name">Choose File</label>
                </div>
                <div class="form-group row">
                  <label for="inputReceiptNo" class="col-sm-3 col-form-label">Receipt No</label>
                  <div class="col-sm-9">
                        <input type="text" class="form-control" name="paymet_bank_receipt_number" id="payment-bank-name" placeholder="Receipt No">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputBankName" class="col-sm-3 col-form-label">Bank Name</label>
                  <div class="col-sm-9">
                        <input type="text" class="form-control" name="paymet_bank_name" id="payment-bank-name" placeholder="Bank Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="example-date-input" class="col-3 col-form-label">Date</label>
                  <div class="col-9">
                        <input class="form-control" type="date" name="paymet_bank_date" id="payment-bank-name">
                  </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button id="modal-close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>
        </form>
        </div>
      </div>
    </div>

  </div>
    <script type="text/javascript">
        
    jQuery(document).ready(function($) {
        //$('#mission_table').DataTable();

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pay-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#payment-receipt").change(function(){
            readURL(this);
        });

        $(".btn-payment").click( (event) => {
            const id = event.currentTarget.id;
            const index = id.substr(19);
            $('#payment-modal').attr('action',"{{url( 'verify-payment') }}/"+index);
        });

        $("#span-modal-close").click( (event) => {
            $('#pay-img').attr('src', "./images/img-placeholder.png");
            $('#file-name').html("Choose File");
        });

        $("#modal-close").click( (event) => {
            $('#pay-img').attr('src', "./images/img-placeholder.png");
            $('#file-name').html("Choose File");
        });

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        
    });
    </script>
</body>
</html>