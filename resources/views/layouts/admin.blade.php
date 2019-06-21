<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="{{asset('images/logo-image.png')}}" />
  <title>JASAKU | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  @section('css')
  <link rel="stylesheet" href="{{asset('css/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('css/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  {{-- <link rel="stylesheet" href="css/admin/dist/css/skins/skin-blue.min.css"> --}}
  <link rel="stylesheet" href="{{asset('css/admin/custom.css')}}">
  <link rel="stylesheet" href="{{asset('css/admin/admin-style.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  @show
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{url('admin')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      {{-- <span class="logo-mini"><b>JASAKU</b></span> --}}
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg pull-left"><b>JASAKU</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

            <span class="language">
              <a href="{{url('admin/change-language/id')}}">
                <img class="flag" src="{{asset('images/ina_flag.svg')}}"> 
              </a>
              <span class="flag-seperator">|</span>
              <a href="{{url('admin/change-language/en')}}">
                <img class="flag" src="{{asset('images/uk_flag.svg')}}">
              </a>
            </span>

            <li class="dropdown user user-menu pull-right">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="">Admin <i class="fa fa-angle-down"></i></span>
              </a>
              <!-- <ul class="dropdown-menu">           
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul> -->
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href=""
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      @lang('sidebar.Keluar')
                  </a>

                <form id="logout-form" action="{{url('admin/logout')}}" method="POST" style="display: none;">
                      @csrf
                </form>
              </div>

            </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview @yield('home-active-dropdown')">
          <a href="#"><i class="fa fa-file"></i> <span>@lang('sidebar.Konten Home')</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('product-active')">
              <a href="{{url('admin/')}}"><i class="ml"></i><span>@lang('sidebar.Produk')</span></a>
            </li>
          </ul>
          <ul class="treeview-menu">
            <li class="@yield('history-active')">
              <a href="{{url('admin/history-transactions')}}"><i class="ml"></i><span>@lang('sidebar.Sejarah Transaksi')</span></a>
            </li>
          </ul>
          <ul class="treeview-menu">
            <li class="@yield('verify-active')">
              <a href="{{url('admin/verify')}}"><i class="ml"></i><span>@lang('sidebar.Verifikasi Pembayaran')</span></a>
            </li>
          </ul>
          <ul class="treeview-menu">
            <li class="@yield('contact-active')">
              <a href="{{url('admin/contact-us')}}"><i class="ml"></i><span>Contact Us</span></a>
            </li>
          </ul>

        </li>
 
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
        <p>@yield('subtitle')</p>
    </section> --}}

    <!-- Main content -->
    <section class="content container-fluid">

      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
@section('js')
<script src="{{asset('css/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('css/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('css/admin/dist/js/adminlte.min.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
@show
</body>
</html>