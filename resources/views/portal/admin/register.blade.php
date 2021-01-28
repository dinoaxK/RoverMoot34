@extends('layouts.admin')

@section('content')


<div class="container  min-vh-100 my-5 pt-5">
    <div class="row pt-5">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">    
        <li class="breadcrumb-item"><a class="mb-0" href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registration</li>
    </ol>
    </nav>
        <div class="col-lg-12  mx-0 mt-5">
            <div class="py-5">
                <div class="container px-0 mt-5">
                    <h2 class="mb-4 text-dark">Participant Registrations</h2>
                    <table class="table table-bordered yajra-datatable text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>District</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Mobile</th>
                                <th>Residence</th>
                                <th>Payment Ref</th>
                                <th>Payment</th>
                                <th>Application</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('portal.admin.register.modals')
@endsection

@include('portal.admin.register.scripts')