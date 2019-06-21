<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}
  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Heebo:700|Rajdhani|Roboto+Condensed" rel="stylesheet">
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/product-buy.css')}}">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    {{-- <link href="{{asset('css/meteor.min.css')}}" rel="stylesheet" type="text/css"/> --}}
    <link href="{{asset('css/fullcalendar.css')}}" rel="stylesheet" type="text/css"/>

  <title>Document</title>
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
            <a class="nav-link" href="{{url('/')}}">Home </a>
          </li> --}}
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
  <div class="product-buy-body">
    <div class="calender">
  
    </div>
    <div class="product-buy-details" style="display: flex; justify-content: center;">
        <div style="height: 95vh; width: 95vh;"class="row">
            <h3 class="panel-title">Jadwal</h3>
            <br><br>
            <div id="calendar"></div>
        </div>
      {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
      </button> --}}
    
      <!-- Modal -->
      {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Confirm</button>
            </div>
          </div>
        </div>
      </div> --}}

      {{-- --Modal --}}
      <div class="modal fade" id="calendarModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel"></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     </div>

                <form method="POST" action="{{url('book/'.$p_id)}}">
                @csrf
                    <div class="modal-body">
                             
                    <h3 class="panel-title">Data Pemesan</h3>
                        <div>
                            <h4>Nama</h4>
                            <input required type="text" placeholder="Nama" class="form-control" name="name">
                            <h4>Alamat</h4>
                            <input required type="text" placeholder="Email" class="form-control" name="address">
                            <h4>No. Telepon</h4>
                            <input required type="text" placeholder="No. Telepon" class="form-control" name="phone">
                            <input type="hidden" name="date" id="dateInput">
                        </div>
                        <br><br>
                    
                        <h3 class="panel-title">Waktu</h3>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Jam</th>
                                        <th>Status</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>

                                <tbody id="scheduleList">
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                                                            
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Pilih</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

      {{-- --Modal --}}
    </div>
  </div>
    {{-- <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script> --}}
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jquery.blockui.js')}}"></script>
    {{-- <script src="{{asset('js/.bootstrap.min.js')}}"></script> --}}
    <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('js/waves.min.js')}}"></script>
    <script src="{{asset('js/meteor.min.js')}}"></script>
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('js/fullcalendar.js')}}"></script>
  <script>
        $('#calendar').fullCalendar({
            events: [
                //array of events
                {
                    // title  : 'event2',
                    // start  : '2018-06-26',
                    // end    : '2018-06-27',
                }
            ],

            dayClick: function(date){
                
                $(this).click(function(){
                    console.log("test");
                    $.ajax({
                        url : "https://jasaku.christopheralvin.xyz/api/bookfield/getschedule/{{$p_id}}",
                        type : "POST",
                        data : {date : date.format(), field : $('#fieldChoice').find(":selected").attr('value')},
                        success: function(result){
                            console.log(Array.isArray(result))
                            if(Array.isArray(result)){
                                $("#fieldChoice").prop("selectedIndex", 0);
                                var count;
                        $("#calendarModal").modal('show');
                        $("#calendarModal").addClass("show");
                        $(".modal-backdrop.in").addClass("show"); 
                    // $("#calendarModal").addClass("show");
                    // $("#calendarModal").modal('show');
                                $("#myModalLabel").text(date.format());
                                $("#dateInput").attr("value",$("#myModalLabel").text());
                                try {
                                    var text = $('.final').attr('id');
                                    count = Number(text.substr(12,2)) +1;
                                } catch (error) {
                                    count = result.length;
                                }
                                for(var i = 0 ; i < Number(count) ; i++){
                                $('#scheduleList'+i).remove()
                                }
                                for(var i = 0 ; i < result.length ; i++){
                                    $('#scheduleList').append('<tr id="scheduleList'+i+'"><th>'+result[i].hour+'</th><th id="status'+i+'"></th><th><input value="'+result[i].hour +'" type="checkbox" name="time-book[]" id="chosen-input'+i+'"></th></tr>')
                                    if(result[i].status == 'v'){
                                        $('#status'+i).css("background-color","red");
                                        $('#chosen-input'+i).css("display", "none");
                                    }
                                    else{
                                        $('#status'+i).css("background-color","green")
                                    }
                                    if(i == result.length - 1){
                                        $('#scheduleList'+i).addClass("final");
                                    }
                                }
                            }
                            else{
                                alert(result);
                            }
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown) { 
                            $("#calendarModal").modal('show');
                            $("#calendarModal").addClass("show");
                            $(".modal-backdrop.in").addClass("show"); 
                        }
                        
                    })
                });
            }
        })
    </script>
</body>
</html>