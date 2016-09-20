<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="inseo">
    <meta name="keyword" content="Atletik, Unesa">
    {{-- <link rel="shortcut icon" href="img/fav.png"> --}}
    {{ HTML::style("template/admin/img/jatim.png", array('type'=>'image/x-icon', 'rel'=>'shortcut icon')) }}

    <title>@yield('title') | SIPAP</title>

    <!-- Bootstrap core CSS -->
    {{HTML::style("template/admin/css/bootstrap.min.css")}}
    {{HTML::style("template/admin/css/bootstrap-reset.css")}}
    <!--external css-->
    {{HTML::style("template/admin/assets/font-awesome/css/font-awesome.css")}}
    @yield('asset')
    <!-- Custom styles for this template -->
    {{HTML::style("template/admin/css/style.css")}}
    {{HTML::style("template/admin/css/style-responsive.css")}}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips"></div>
          </div>
          <!--logo start-->
          <a href="{{ URL::to('dashboard') }}" class="logo" >SI<span>PAP</span></a>
          <!--logo end-->
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <li>
                      <input type="text" class="form-control search" placeholder="Search">
                  </li>
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          {{-- {{ HTML::image('admin/img/avatar1_small.jpg') }} --}}
                          {{-- <img alt="" src="admin/img/avatar1_small.jpg"> --}}
                          <span class="username">{{ Sentry::getUser()->first_name . ' ' . Sentry::getUser()->last_name }}</span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                          <li><a href="{{ URL::to('admin/settings') }}"><i class="fa fa-cog"></i> Settings</a></li>
                          <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                          <li><a href="{{ URL::to('logout') }}"><i class="fa fa-key"></i> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  @include('dashboard.navigations.admin')
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              @include('layouts.partials.alert')
              @include('layouts.partials.validation')
              @yield('content')
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 &copy; Cyber Campus Unesa - inseo. ALL Rights Reserved.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    @yield('script')
    {{HTML::script('template/admin/js/bootstrap.min.js')}}
    {{HTML::script('template/admin/js/jquery.dcjqaccordion.2.7.js', array('class'=>'include', 'type'=>'text/javascript'))}}
    {{HTML::script('template/admin/js/jquery.scrollTo.min.js')}}
    {{HTML::script('template/admin/js/jquery.nicescroll.js', array('class'=>'text/javascript'))}}
    {{HTML::script('template/admin/js/respond.min.js')}}

    <!--common script for all pages-->
    {{HTML::script('template/admin/js/common-scripts.js')}}
  </body>
</html>
