<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('img/logo/fav.png') }}">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>34th National Rover Moot</title>

  <!-- STYLES -->
    <!-- BOOTSTRAP -->      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- FONT AWESOME -->   <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.css') }}"> 
  

    <!-- Custom styles -->
    <link href="{{ asset('css/core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet"> 
    <!-- DROPZONE -->       
    <link rel="stylesheet" href="{{ asset('vendor/dropzone/drop-zone.css') }}">

    
    <link href="{{ asset('vendor/animate/animate.min.css') }}" rel="stylesheet">
  <!-- /STYLES -->

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-0 fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger mb-0 d-none" href="{{ url('') }}">
       <img src="{{ asset('img/logo/1.png') }}" alt="Moot Logo"  style="max-width: 50px;" class="">
       34th NCRSM
      </a>
      <button class="navbar-toggler mb-1" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link mb-1"  href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mb-1" href="{{ url('/#about') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mb-1" href="{{ url('/#programme') }}">Programme</a>
          </li>

           @guest
           
              <li class="nav-item">
                <a class="nav-link mb-1" href="{{ url('/#register') }}">Register</a>
              </li>
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link mb-1" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                
            @else
                <li class="nav-item">
                    <a class="nav-link mb-1" href="{{ route('home') }}">{{ __('Moot') }}</a>
                </li>
                @if(Auth::user()->participant && Auth::user()->participant->application_status == 1 && Auth::user()->participant->payment_status == 1)
                @else
                <li class="nav-item">
                  <a class="nav-link mb-1" href="{{ route('moot.register') }}">Register</a>
                </li>
                @endif
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link  mb-1 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item mb-1" href="{{ route('profile') }}">Profile</a>
                        <a class="dropdown-item mb-1" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>

@yield('content')

<!-- back to top button -->
  <button title="Go to Top" data-tooltip="tooltip"  data-placement="bottom"  onclick="topFunction()" id="myBtn"><i class="fa fa-chevron-up"></i></button>
<!-- /back to top button -->
  
  {{-- mascot --}}
  {{-- <a href="">
    <img class="mascot-dialog wow bounceIn" src="{{ asset('/img/mascot/dialog.png') }}" alt="">
    <img class="mascot wow bounceIn" src="{{ asset('/img/mascot/1.png') }}"  alt="">
  </a> --}}
  {{-- /mascot --}}

  <!-- Footer -->
  <footer class="py-5 bg-footer">
    <div class="container">  
      <div class="col-12">
        <h5 class="mb10 text-center">Contact Us</p>
          <hr class=" bg-light">
        <div class="row">
          <div class="col-12 col-md col-sm-3 text-center">
            <h5 class="mb10"><small>Moot Organizing Commissioner</small> </p>
            <p><b>Mr. Srilath De Silva</b> <br> Asst. Chief Commissioner-Rovers & IT</p>
            <p><i class="fa fa-phone"></i>  +94-77 232 7065  </p>
            <p><i class="fa fa fa-envelope"></i> srilath.desilva@gmail.com  </p>
            <hr class=" bg-light">
          </div>
          <div class="col-12 col-md col-sm-3 text-center">
            <h5 class="mb10"><small>Moot Secretary</small> </p>
            <p><b>Mr. Kapila Priyantha</b> <br>Headquarter Commissioner</p>
            <p><i class="fa fa-phone"></i>  +94-77 364 3000  </p>
            <p><i class="fa fa fa-envelope"></i> kapilapriyantha1@gmail.com  </p>
            <hr class=" bg-light">
          </div>
          <div class="col-12 col-md col-sm-3 text-center">
            <h5 class="mb10"><small>Moot Co-Coordinator</small>  </p>
            <p><b>Mr. Saliya Dahanayaka</b> <br>Asst. District Commissioner</p>
            <p><i class="fa fa-phone"></i>  +94-77 777 5020  </p>
            <p><i class="fa fa fa-envelope"></i> saliya.dahanayake82@gmail.com  </p>
            <hr class=" bg-light">
          </div>
          <div class="col-12 col-md col-sm-3 text-center">
            <h5 class="mb10"><small>Moot Co-Coordinator </small> </p>
            <p><b>Mr. Janith Pathirana</b> <br>Asst. District Commissioner</p>
            <p><i class="fa fa-phone"></i>  +94-71 909 0945   </p>
            <p><i class="fa fa fa-envelope"></i> avishka.janith@gmail.com  </p>
            <hr class=" bg-light">
          </div>
        </div>
      </div>  
    </div>
    <div class="container">
      <div class="row w-100">
        <div class="col-12 text-center">
          <ul class="foote_bottom_ul">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/#about') }}">About</a></li>
            <li><a href="{{ url('/#programme') }}">Programme</a></li>
            <li><a href="{{ route('home') }}">Moot</a></li>
            <li><a href="{{ url('/#register') }}">Register</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container social_footer_ul text-center">
        <a class=" mx-2" href="https://www.facebook.com/slsarovers" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a class=" mx-2" href="https://twitter.com/RoverSri" target="_blank"><i class="fab fa-twitter"></i></a>
        <a class=" mx-2" href="https://www.youtube.com/channel/UCqnRNH1evcpbgMTuniu51Rw" target="_blank"><i class="fab fa-youtube"></i></a>
        <a class=" mx-2" href="https://www.instagram.com/rover_scouts_sl/" target="_blank"><i class="fab fa-instagram"></i></a>
    </div>
    <div class="container">   
      <div class="col-12 text-white mt-4 text-center">
          Copyright &copy;  {{ now()->year }}<strong><a target="_blank" href="" class="white"> SLSA</a> </strong>. All Rights Reserved 
      </div>                    
      <div class="col-12 credits text-center">
          Designed by <strong><a target="_blank" href="https://www.linkedin.com/in/dinusha-kulasooriya-599a68a6/" class="white">Dinusha D. Kulasooriya </a> </strong>
      </div>
    </div>
    <!-- /.container -->
  </footer>
  <!-- /Footer -->

<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="428285994301669"
        theme_color="#881919">
      </div>

  <!-- SCRIPTS -->
    <script src="{{ asset('js/app.js') }}" differ></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- SWEET ALERT 2 -->
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.js') }}"></script>
    <!-- /SWEET ALERT 2 -->
    <!-- DROPZONE JS--> <script src="{{ asset('vendor/dropzone/drop-zone.js') }}"></script>

    
  <script src="{{ asset('vendor/easing/easing.min.js') }}"></script>
  <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
  <script src="{{ asset('vendor/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('vendor/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('vendor/superfish/superfish.min.js') }}"></script>

    <!-- Custom JavaScript -->
    <script src="{{ asset('js/core.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    
  <!-- /SCRIPTS -->

  <!-- Flyzoo script v3 -->
<!-- <script type="text/javascript">
(function () {
 window._FlyzooApplicationId="602134684fb4d51ab0141e2d602132b7bb547e4bc011c605";
 var fz = document.createElement('script'); fz.type = 'text/javascript'; fz.async = true;
 fz.src = '//widget.flyzoo.co/scripts/flyzoo.start.js';
 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(fz, s);
})();
</script> -->

</body>

<script type="text/javascript">

  
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};
  
  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }
  
  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  }


  
  $(function () {
    $('.carousel').carousel({
      interval: 2000
    });

    // Initiate the wowjs
    new WOW().init();

    // jQuery counterUp
    $('[data-toggle="counter-up"]').counterUp({
      delay: 20,
      time: 3000
    });

    $(".toggle-password").click(function() {

      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $('#password');
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
    
  //Get the button:
  mybutton = document.getElementById("myBtn");
    //tooltip initiation
    $('[data-tooltip="tooltip"]').tooltip()

    //on scroll navbar
    $(window).scroll(function() {
      var navbar = $(".navbar");
      var navbar_brand = $(".navbar-brand")
      var scroll = $(window).scrollTop();

      if (scroll >= 100) {
        navbar.removeClass('bg-0').addClass("bg-rover");
        navbar.removeClass('navbar-light').addClass('navbar-dark');
        navbar_brand.removeClass('d-none')
      } else {
        navbar.removeClass("bg-rover").addClass('bg-0');
        navbar.removeClass('navbar-dark').addClass('navbar-light');
        navbar_brand.addClass('d-none')
      }
    });


  })
</script>

@yield('script')

</html>
