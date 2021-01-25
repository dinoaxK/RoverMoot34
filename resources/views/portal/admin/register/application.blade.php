@extends('layouts.admin')

@section('content')
<div class="container min-vh-80 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-9 mt-5">
            <div class="py-5">

                 <div class="row">
                    <div class="col-6">
                        <button class="btn btn-lg btn-success w-100" onclick="approve()">Approve</button>
                    </div>
                    <div class="col-6">                
                        <button class="btn btn-lg btn-danger w-100" onclick="decline()">Decline</button>
                    </div>
                </div>           

                <div class="row">
                    <div class="col-12">              
                        <img src="{{ asset('storage/participants/applications/'.$participant->application_proof) }}" width="100%" alt="Application">
                    </div>
                </div>  

                <div class="row mt-3">
                    <div class="col-6">
                        <button class="btn btn-lg btn-success w-100" onclick="approve()">Approve</button>
                    </div>
                    <div class="col-6">                
                        <button class="btn btn-lg btn-danger w-100" onclick="decline()">Decline</button>
                    </div>
                </div>  

            </div>
        </div>
    </div>
</div>


@include('portal.admin.register.application.scripts')

@endsection
