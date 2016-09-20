<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="cyber campus-inseo">
    <meta name="keyword" content="atletik">
    {{ HTML::style("template/admin/img/jatim.png", array('type'=>'image/x-icon', 'rel'=>'shortcut icon')) }}

    <title>SIPAP</title>

    <!-- Bootstrap core CSS -->
    <link href="template/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="template/front/css/theme.css" rel="stylesheet">
    <link href="template/front/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="template/front/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="template/front/css/flexslider.css"/>
    <link href="template/front/assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link href="template/front/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />

    <link rel="stylesheet" href="template/front/assets/revolution_slider/css/rs-style.css" media="screen">
    <link rel="stylesheet" href="template/front/assets/revolution_slider/rs-plugin/css/settings.css" media="screen">

    <!-- Custom styles for this template -->
    <link href="template/front/css/style.css" rel="stylesheet">
    <link href="template/front/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!--header start-->
    <header class="header-frontend">
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="{{ URL::to('/') }}"><b>{{HTML::image('template/admin/img/jatim.png', 'Jatim', array( 'height' => 55, 'width' => 'auto', 'title' => 'Jatim'))}} Sistem Informasi Perdagangan Antar Pulau</b></span></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li><a href="#login" data-toggle="modal">Login</a></li>
                        <li><a href="#">Bantuan</a></li>
                        <li><input type="text" placeholder=" Search" class="form-control search"></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--header end-->
    @include('layouts.partials.alert')
     <!-- revolution slider start -->
     <div class="fullwidthbanner-container main-slider">
         <div class="fullwidthabnner">
             <ul id="revolutionul" style="display:none;">
                 <!-- 1st slide -->
                 <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="5400" data-thumb="">
                     <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                     <img src="template/front/img/banner/slider-bg2.jpg" alt="">
                     <div class="caption lft slide_title"
                          data-x="10"
                          data-y="125"
                          data-speed="400"
                          data-start="1500"
                          data-easing="easeOutExpo">
                         Selamat Datang di SIPAP JATIM
                     </div>
                     <div class="caption lft slide_subtitle dark-text"
                          data-x="10"
                          data-y="180"
                          data-speed="400"
                          data-start="2000"
                          data-easing="easeOutExpo">
                         Sistem Informasi Perdagangan Antar Pulau Jawa Timur
                     </div>
                     <div class="caption lft start"
                          data-x="640"
                          data-y="55"
                          data-speed="400"
                          data-start="2000"
                          data-easing="easeOutBack"  >
                         {{-- <img src="template/front/img/banner/2.jpg" alt="Image 2"> --}}
                     </div>
                 </li>

                 <!-- 2nd slide  -->
                 <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="5400" data-thumb="">
                     <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                     <img src="template/front/img/banner/slider-bg1.jpg" alt="">
                     <div class="caption lft slide_title"
                          data-x="10"
                          data-y="125"
                          data-speed="400"
                          data-start="1500"
                          data-easing="easeOutExpo">
                         Sistem Informasi Perdagangan Antar Pulau
                     </div>
                     <div class="caption lft slide_subtitle dark-text"
                          data-x="10"
                          data-y="180"
                          data-speed="400"
                          data-start="2000"
                          data-easing="easeOutExpo">
                         Melayani masyarakat dalam bidang perdagangan
                     </div>
                     <div class="caption lft start"
                          data-x="640"
                          data-y="55"
                          data-speed="400"
                          data-start="2000"
                          data-easing="easeOutBack"  >
                         {{-- <img src="template/front/img/banner/2.jpg" alt="Image 2"> --}}
                     </div>
                 </li>

                 <!-- 3st slide -->
                 <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="5400" data-thumb="">
                     <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                     <img src="template/front/img/banner/slider-bg3.jpg" alt="">
                     <div class="caption lft slide_title"
                          data-x="10"
                          data-y="125"
                          data-speed="400"
                          data-start="1500"
                          data-easing="easeOutExpo">
                         SIPAP
                     </div>
                     <div class="caption lft slide_subtitle dark-text"
                          data-x="10"
                          data-y="180"
                          data-speed="400"
                          data-start="2000"
                          data-easing="easeOutExpo">
                         Siap menyediakan komoditi antar pulau
                     </div>
                     <div class="caption lft start"
                          data-x="640"
                          data-y="55"
                          data-speed="400"
                          data-start="2000"
                          data-easing="easeOutBack"  >
                         {{-- <img src="template/front/img/banner/2.jpg" alt="Image 2"> --}}
                     </div>
                 </li>
             </ul>
            <div class="tp-bannertimer tp-top"></div>
         </div>
     </div>
     <!-- revolution slider end -->
    <!--footer start-->
      <b><font size="3"><p style="padding: 25px 0px 0px 25px">&copy {{date('Y')}} Dinas Perindustrian dan Perdagangan Provinsi Jawa Timur</p></font></b>
    <!--footer end-->

    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                  {{ Form::open(array('url' => '/authenticate', 'class' => 'form-signin')) }}
                  <div class="login-wrap">
                    {{ Form::text('email', null, array('class'=>'form-control','placeholder'=>'User ID', 'autofocus')) }}
                    <br>
                    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                  </div>
                </div>
                <div class="modal-footer">
                  {{ Form::submit('Masuk', array('class'=>'btn btn-success')) }}
                  <button data-dismiss="modal" class="btn btn-danger" type="button"> Batal</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- modal -->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="template/front/js/jquery.js"></script>
    <script src="template/front/js/jquery-1.8.3.min.js"></script>
    <script src="template/front/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="template/front/js/hover-dropdown.js"></script>
    <script defer src="template/front/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="template/front/assets/bxslider/jquery.bxslider.js"></script>

    <script type="text/javascript" src="template/front/js/jquery.parallax-1.1.3.js"></script>

    <script src="template/front/js/jquery.easing.min.js"></script>
    <script src="template/front/js/link-hover.js"></script>

    <script src="template/front/assets/fancybox/source/jquery.fancybox.pack.js"></script>

    <script type="text/javascript" src="template/front/assets/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="template/front/assets/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!--common script for all pages-->
    <script src="template/front/js/common-scripts.js"></script>

    <script src="template/front/js/revulation-slide.js"></script>

  <script>
      RevSlide.initRevolutionSlider();

      $(window).load(function() {
          $('[data-zlname = reverse-effect]').mateHover({
              position: 'y-reverse',
              overlayStyle: 'rolling',
              overlayBg: '#fff',
              overlayOpacity: 0.7,
              overlayEasing: 'easeOutCirc',
              rollingPosition: 'top',
              popupEasing: 'easeOutBack',
              popup2Easing: 'easeOutBack'
          });
      });

      $(window).load(function() {
          $('.flexslider').flexslider({
              animation: "slide",
              start: function(slider) {
                  $('body').removeClass('loading');
              }
          });
      });

      //    fancybox
      jQuery(".fancybox").fancybox();
  </script>
  </body>
</html>
