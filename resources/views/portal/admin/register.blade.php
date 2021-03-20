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
                            <form id="searcItems" action="{{ route('paricipant.list.export.excel') }}" method="GET">
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control form-control-sm" name="name" id="name" aria-describedby="nameHelp"/>
                                        <small id="nameHelp" class="form-text text-muted">Enter Name Here</small>
                                    </div>
                                    <div class="form-group col">
                                      <label for="nic">NIC</label>
                                      <input type="text" class="form-control form-control-sm" name="nic" id="nic" aria-describedby="nicHelp"/>
                                      <small id="nicHelp" class="form-text text-muted">Enter NIC Here</small>
                                    </div>    
                                    <div class="form-group col">
                                      <label for="district">District</label>
                                      <select id="district" name="district" class="form-control form-control-sm">
                                        <option value="">select here---</option>
                                        @foreach($districts as $district)                                          
                                        <option value="{{ $district->name }}">{{ $district->name }}</option>
                                        @endforeach
                                      </select>
                                    </div>           
                                    {{-- <div class="form-group col">
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
                                    </div>               --}}
                                    <div class="form-group col">
                                      <label for="registration">Registration Status</label>
                                      <select id="registration" name="registration" class="form-control form-control-sm">
                                        <option value="">select here---</option>
                                        <option value="0">Submit Pending</option>
                                        <option value="1">Verification Pending</option>
                                        <option value="2">Verification Submit</option>
                                        <option value="3">Registered</option>
                                      </select>
                                    </div> 
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="w-100">
                      <button onclick="export_excel()" class="btn btn-lg btn-outline-success float-right"><i class="fa fa-file-excel"></i> Export (Excel)</a>
                      <button onclick="email_model()" class="btn btn-lg btn-outline-primary float-right mx-1"><i class="fa fa-envelope"></i> Send Email</a>
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