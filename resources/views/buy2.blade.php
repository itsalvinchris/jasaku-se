<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap/css/bootstrap.min.css')}}">

    <!-- Styles -->
    <link href="{{asset('css/meteor.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/fullcalendar.css')}}" rel="stylesheet" type="text/css"/>
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
                                <h3 class="panel-title">Jadwal</h3>
                                <br><br>
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
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
    </div>

    


    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
       
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jquery.blockui.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
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
                        url : "http://localhost:8000/api/bookfield/getschedule/{{$p_id}}",
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

