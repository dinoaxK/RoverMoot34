@extends('layouts.admin')

@section('content')


<div class="container min-vh-100 mt-5 mb-5 pt-5">
    <div class="row pt-5">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col">
            <div class="card bg-primary">
                <div class="card-body">
                    <h1>{{ App\Models\User::where('email_verified_at', '!=', Null)->count() }}</h1>
                    <p>Genuine <br>Users</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-danger">
                <div class="card-body">
                    <h1>{{ App\Models\User::where( 'email_verified_at', '!=', Null )->leftJoin('participants', 'users.id', '=', 'participants.user_id')->where('participants.id',Null)->count() }}</h1>
                    <p>Not Attempted <br> to Register</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-secondary">
                <div class="card-body">
                    <h1>{{ App\Models\Participant::where('application_submit', 0)->where('application_status', Null)->count() }}</h1>
                    <p>Pending Applications</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-primary">
                <div class="card-body">
                    <h1>{{ App\Models\Participant::where('application_submit', 1)->where('payment_submit', 1)->where('application_proof', Null)->count() }}</h1>
                    <p>Application Proof Pending</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-secondary">
                <div class="card-body">
                    <h1>{{ App\Models\Participant::where('application_proof', '!=', Null)->where('payment_status', Null)->where('application_status', Null)->count() }}</h1>
                    <p>Pending Registrations</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-success">
                <div class="card-body">
                    <h1>{{ App\Models\Participant::where('application_status', 1)->where('payment_status', 1)->count() }}</h1>
                    <p>Successful Registrations</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class=" text-center text-dark">District Distribution</h2>
                </div>
                <div id="chart_div1" class="col"></div>
                <div id="chart_div2" class="col"></div>
            </div>
        </div>
        </div>
        <div class="col-lg-12 mt-5">
            <div class="card text-dark" style=" max-height: 500px;overflow:auto;">
                <div class="card-header">Activity Log</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>activity</th>
                                <th>reference</th>
                                <th>performed by</th>
                                <th>performed at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activities as $activity)
                            <tr>
                                <td>{{ $activity->id }}</td>
                                <td>{{ $activity->activity }}</td>
                                <td>{{ $activity->reference }}</td>
                                <td>{{ $activity->user }}</td>
                                <td>{{ $activity->created_at }}</td>
                            </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@include('portal.admin.home.scripts')