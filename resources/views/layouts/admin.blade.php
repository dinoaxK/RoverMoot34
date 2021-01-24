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
  
  <title>34th National Rover Moot-Admin</title>

  <!-- STYLES -->
    <!-- BOOTSTRAP -->      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- FONT AWESOME -->   <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.css') }}"> 
  

    <!-- Custom styles -->
    <link href="{{ asset('css/core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet"> 
    <!-- DROPZONE -->       
    <link rel="stylesheet" href="{{ asset('vendor/dropzone/drop-zone.css') }}">
  <!-- /STYLES -->

</head>

<body id="page-top" class="bg-light">

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
           @guest
                
            @else
                <li class="nav-item">
                    <a class="nav-link mb-1" href="{{ route('admin.home') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-1" href="{{ route('admin.register') }}">Registration</a>
                </li>
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

    <!-- Custom JavaScript -->
    <script src="{{ asset('js/core.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
  <!-- /SCRIPTS -->

</body>

<script type="text/javascript">


  //Get the button:
  mybutton = document.getElementById("myBtn");
  
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

    // show hide background on mobile nav bar
    $('.navbar-toggler').click(function(e) {
      $('.navbar').toggleClass('bg-0');
      $('.navbar').toggleClass('bg-rover');
      $('.navbar').toggleClass('navbar-light');
      $('.navbar').toggleClass('navbar-dark');

    });
  })
</script>

@yield('script')

</html>
