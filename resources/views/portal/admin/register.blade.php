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


        <div class="col-lg-12  mx-0 ">
            <div class="">
                <div class="container px-0 mt-5">
                    <h2 class="mb-4 text-dark">Participant Registrations</h2>            
                    <div class="card bg-transparent border-0">
                        <div class="card-body text-dark">
                            <form action="">
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control form-control-sm" id="name" aria-describedby="nameHelp"/>
                                        <small id="nameHelp" class="form-text text-muted">Enter Name Here</small>
                                    </div>
                                    <div class="form-group col">
                                      <label for="nic">NIC</label>
                                      <input type="text" class="form-control form-control-sm" id="nic" aria-describedby="nicHelp"/>
                                      <small id="nicHelp" class="form-text text-muted">Enter NIC Here</small>
                                    </div>               
                                    <div class="form-group col">
                                      <label for="application">Application Status</label>
                                      <select id="application" name="application" class="form-control form-control-sm">
                                        <option value="">select here---</option>
                                        <option value="0">Pending</option>
                                        <option value="1">Approved</option>
                                        <option value="2">Declined</option>
                                      </select>
                                    </div>              
                                    <div class="form-group col">
                                      <label for="payment">Payment Status</label>
                                      <select id="payment" name="payment" class="form-control form-control-sm">
                                        <option value="">select here---</option>
                                        <option value="0">Pending</option>
                                        <option value="1">Approved</option>
                                        <option value="2">Declined</option>
                                      </select>
                                    </div>              
                                    <div class="form-group col">
                                      <label for="registration">Registration Status</label>
                                      <select id="registration" name="registration" class="form-control form-control-sm">
                                        <option value="">select here---</option>
                                        <option value="0">Pending</option>
                                        <option value="1">Application Submit</option>
                                        <option value="2">Verification Submit</option>
                                        <option value="3">Registered</option>
                                      </select>
                                    </div> 
                                </div>
                            </form>
                        </div>
                    </div>
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