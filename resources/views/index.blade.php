@extends('layouts.web')

@section('content')
  <header class="bg-dark min-vh-100" style="background-image: url({{ asset('img/background/1.jpg') }}); padding: 200px 0 200px;">
    <div class="container ">
      <div class="row">
        <div class="col-lg-5 order-lg-1 text-right">
          <img src="{{ asset('img/logo/1.png') }}" alt="Moot Logo"  style="max-width: 100%;" class="mb-5">
        </div>
        <div class="col-lg-7 order-lg-2">
          <h1 class="hero-header">34th National <br> Rover Scout Moot</h1>
          <p class="lead" style="font-size: 18px; font-weight: 500;">Welcome to the first ever national rover scout moot</p>
          
          <a href="#about" class="btn btn-lg btn-outline-rover">Lets Start</a>
        </div>
      </div>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>About the Moot</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus sequi voluptatum quidem optio! Nisi assumenda illum, facilis doloremque quam obcaecati magnam, consequatur vel beatae totam tempore, vitae ducimus a autem.</p>
          
        </div>
      </div>
    </div>
  </section>

  <section id="programme" class="bg-light text-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Programme</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="register">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Register</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
        </div>
      </div>
    </div>
  </section>
@endsection