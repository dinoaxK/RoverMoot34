<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('img/logo/fav.png') }}">

  <title>34th National Rover Moot</title>

  <!-- STYLES -->
    <!-- BOOTSTRAP -->      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- FONT AWESOME -->   <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.css') }}">
  <!-- /STYLES -->

  <!-- Custom styles -->
  <link href="{{ asset('css/scrolling-nav.css') }}" rel="stylesheet">
  <link href="{{ asset('css/form.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-rover fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger mb-0" href="{{ url('') }}">
       <img src="{{ asset('img/logo/1.png') }}" alt="Moot Logo"  style="max-width: 50px;" class="">
       34th NRSM
      </a>
      <button class="navbar-toggler mb-1" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link mb-1" href="{{ url('/#about') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mb-1" href="{{ url('/#programme') }}">Programme</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mb-1" href="{{ url('/#register') }}">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mb-1" href="{{ route('login') }}">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

@yield('content')

<!-- back to top button -->
  <button title="Go to Top" data-tooltip="tooltip"  data-placement="bottom"  onclick="topFunction()" id="myBtn"><i class="fa fa-chevron-up"></i></button>
<!-- /back to top button -->
  

  <!-- Footer -->
  <footer class="py-5 bg-dark">
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

    <!-- Custom JavaScript -->
    <script src="{{ asset('js/scrolling-nav.js') }}"></script>
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

  })
</script>


</html>
