@extends('layouts.admin')

@section('content')


<div class="container min-vh-100 mt-5 mb-5 pt-5">
    <div class="row pt-5">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
    </nav>
        <div class="col-lg-12 mt-5">
            <div class="py-5">
                @if(Auth::user()->participant && Auth::user()->participant->application_status == 1)

                @else
                    <div class="alert alert-warning" role="alert">
                        <h2 class="alert-heading">Dashboard Under Construction!</h4>
                        <p>Dashboard will be available as soon!! </p>
                        <p class="mb-0">Stay tuned for the First Ever Virtual National Rover Scout Moot...</p>
                    </div>          
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
