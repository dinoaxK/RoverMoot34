@extends('layouts.admin')

@section('content')


<div class="container  min-vh-100 my-5 pt-5">
    <div class="row pt-5">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">    
        <li class="breadcrumb-item"><a class="mb-0" href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
    </nav>
        <div class="col-lg-12  mx-0">
            <div class="py-5">
                <div class="container px-0">                
                    <h2 class="mb-4 text-dark">Create Admin Users</h2>
                </div>
                <div class="container px-0 mt-5">
                    <div class="row justify-content-between px-4">
                        <h2 class="mb-4 text-dark">Users</h2>
                        <button title="Create User" data-tooltip="tooltip"  data-placement="bottom" data-toggle="modal" data-target="#createUserModal"  class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    </div>
                    <table class="table table-bordered yajra-datatable text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>status</th>
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
@include('portal.admin.users.modals')

@endsection

@include('portal.admin.users.scripts')