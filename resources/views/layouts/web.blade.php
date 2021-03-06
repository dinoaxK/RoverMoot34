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
       34th NRSM
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
  

  <!-- Footer -->
  <footer class="py-5 bg-footer">
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
      interval: 4000
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
