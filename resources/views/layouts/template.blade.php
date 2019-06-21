<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="images/logo-image.png" />
	<title>Home</title>

	@section('css')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{asset('css/template.css')}}">
	<link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
	<link rel="stylesheet" href="{{asset('css/slick.css')}}">
	@show

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light sticky-top">
		<a href="{{ url('/') }}"><img class="logo" src="{{asset('images/logo.png')}}" alt=""></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav pull-right">
				<li class="nav-item @yield('beranda-active')">
					<a class="nav-link" href="">@lang('content.Beranda') <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item @yield('materi-active')">
					<a class="nav-link" href="">@lang('content.Materi')</a>
				</li>
				<li class="nav-item @yield('library-active')">
					<a class="nav-link" href="">@lang('content.Perpustakaan')</a>
				</li>
				<li class="nav-item @yield('form-active')">
					<a class="nav-link" href="">Form</a>
				</li>
				<li class="nav-item @yield('acara-active')">
					<a class="nav-link" href="">Agenda</a>
				</li>
				@guest
				<li class="nav-item">
					<a class="nav-link link-masuk"  href="#" data-toggle="modal" data-target="#login">Login</a>
				</li>
				@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle link-logged-in" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->employee_name }} <span class="caret"></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="">@lang('content.Profil')</a>
						<a class="dropdown-item" href=""
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
							@lang('content.Keluar')
						</a>
						
					<form id="logout-form" action="" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</li>
			@endguest

		</ul>
	</div>
</nav>
<div id="top-shadow"></div>




<!-- Modal -->
<div class="modal modal-login fade" id="login" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="title">Mari belajar!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="">
					@csrf

					@if (Session::has('message'))
					<span class="invalid-feedback mb-4 pb-1" role="alert" style="display:block">
						<strong class="error-text">{{ Session::get('message') }}</strong>
					</span>
					@endif

					<label for="nik">NIK</label>
					<input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
					@if ($errors->has('username'))
					<span class="invalid-feedback mb-4 pb-1" role="alert">
						<strong class="error-text">{{ $errors->first('username') }}</strong>
					</span>
					@endif

					<label for="password">Kata Sandi</label>
					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
					@if ($errors->has('password'))
					<span class="invalid-feedback mb-4 pb-1" role="alert">
						<strong class="error-text">{{ $errors->first('password') }}</strong>
					</span>
					@endif

					<button type="submit" class="btn btn-masuk">Masuk</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal modal-login fade" id="update_password" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				@if (Session::has('message_update'))
					<span class="invalid-feedback text-center pb-1" role="alert" style="display:block;color:white;">
						<h5 class="modal-title reminder-text" id="title">{{ Session::get('message_update') }}</h5>
					</span>
				@endif
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="">
					@csrf
					<input type="hidden" name="_method" value="PATCH">
					<label for="nik">Kata Sandi Lama</label>
					<input id="current_password" type="password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" name="current_password" value="{{ old('current_password') }}" required autofocus>
					@if ($errors->has('current_password'))
					<span class="invalid-feedback mb-4 pb-1" role="alert">
						<strong class="error-text">{{ $errors->first('current_password') }}</strong>
					</span>
					@endif

					<label for="password">Kata Sandi Baru</label>
					<input id="new_password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
					@if ($errors->has('password'))
					<span class="invalid-feedback mb-4 pb-1" role="alert">
						<strong class="error-text">{{ $errors->first('password') }}</strong>
					</span>
					@endif

					<label for="password">Confirmasi Kata Sandi Baru</label>
					<input type="password" class="form-control" id="confirm_password" required>

					<button type="submit" class="btn btn-masuk">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal modal-login fade" id="alert_message" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				@if (Session::has('alert_message'))
					<h5 class="error-alert-text text-center">{{ Session::get('alert_message') }}</h5>
				@endif
			</div>
		</div>
	</div>
</div>

<div class="parent-content">
@yield('content')
</div>


<div class="container-fluid footer">
	<p>&copy 2018 Asuransi MAG | A Fairfax Company &nbsp;&nbsp;&nbsp;&nbsp;</p>
	<div class="language-wrapper">
		<a href="}">
			<img class="flag" width="20" height="20" src="{{asset('images/ina_flag.svg')}}">
		</a>
		<span style="color:white">|</span> 
		<a href="">
			<img class="flag" width="20" height="20" src="{{asset('images/uk_flag.svg')}}">
		</a>
	</div>
</div>

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>

<script>
	
	if($('.error-text').text() != ''){
		$("#login").modal();
	}

	if($('.reminder-text').text() != ''){
		$("#update_password").modal();
	}

	$('.autoplay').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		responsive: [
		    {
		      breakpoint: 900,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    },
		],
	});

	if($('.error-alert-text').text() != ''){
		$("#alert_message").modal();
	}

	$(window).scroll(function(){
	  var y = $(window).scrollTop();
	  if( y > 0 ){
	      $("#top-shadow").css({'display':'block', 'opacity':y/20});
	  } else {
	      $("#top-shadow").css({'display':'block', 'opacity':y/20});
	  }
	 });

	var new_password = document.getElementById("new_password"),confirm_password = document.getElementById("confirm_password");

	function validatePassword(){
	if(new_password.value != confirm_password.value) {
		confirm_password.setCustomValidity("Passwords Don't Match");
	} else {
		confirm_password.setCustomValidity('');
	}
	}

	new_password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>
@show



</body>
</html>