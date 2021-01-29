@extends('layouts.admin')

@section('content')


<div class="container  min-vh-100 my-5 pt-5">
    <div class="row pt-5">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">    
        <li class="breadcrumb-item"><a class="mb-0" href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">News</li>
    </ol>
    </nav>
        <div class="col-lg-12  mx-0">
            <div class="py-5">
                <div class="container px-0">      
                    <div class="row justify-content-between px-4">          
                    <h2 class="mb-4 text-dark">Upload News:</h2>
                    <button  class="btn btn-primary w-25" title="Create User" data-tooltip="tooltip"  data-placement="bottom" data-toggle="modal" data-target="#createNewsModal">
                        <i class="fa fa-plus"></i>
                    </button>
                    </div>
                </div>
                <div class="container px-0 mt-5">
                        <h2 class="mb-4 text-dark">News</h2>
                    <div class="row justify-content-center px-4">
                        @foreach($newss as $news)
                        <div class="col-lg-3">
                            <div class="row">
                                <div class="img position-relative w-100 m-1">
                                    <img src="{{ asset('/storage/news/'.$news->image) }}" width="100%" height="auto" alt="">
                                    <button style="top: 50%; left: 50%;  transform: translate(-50%, -50%);
                                    -ms-transform: translate(-50%, -50%);" type="button" class="btn  btn-outline-danger position-absolute" id="btnDeleteNews" onclick="delete_news({{ $news->id }})">
                                        <i class="fa fa-trash"></i>
                                        <span id="btnDeleteNewsSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    </button>
    
                                </div>
                            </div>

                        </div>    
                       
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@include('portal.admin.news.modals')

@endsection

@include('portal.admin.news.scripts')