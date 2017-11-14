@extends('layouts.admin.layouts')

@section('content')
    @include('layouts.admin.navigation')

    <div class="container">
        <Br/><Br/><Br/>
        <div class="row">

            @include('layouts.admin.side_nav')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Acitivities of {{ $client->firstname . ' ' . $client->lastname }}</h4>
                        <table class="table">
                            <thead>
                                <th>IP Address</th>
                                <th>Table</th>
                                <th>Action</th>
                                <th>Date</th>
                            </thead>
                            <tbody>
                                @foreach ($activities as $key => $activity)
                                    <tr>
                                        <td>{{ $activity->ip_address }}</td>
                                        <td>{{ $activity->action_to }}</td>
                                        <td>{{ $activity->action }}</td>
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
