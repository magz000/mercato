@extends('layouts.admin.layouts')

@section('content')
    @include('layouts.admin.navigation')

    <div class="container">

        <style media="screen">
            .table > tbody > tr > td {
                 vertical-align: middle;
            }
        </style>

        <Br/><br/><Br/>
        <div class="row">

            @include('layouts.admin.side_nav')

            @inject('OrderContentModel', 'App\Model\OrderContent')
            @inject('OrderModel',        'App\Model\Order')
            @inject('ProductModel',      'App\Model\Product')
            @inject('ProviderModel',      'App\Model\Provider')
            @inject('OrderRatingModel',      'App\Model\OrderRating')
            @inject('ProductModel',      'App\Model\Product')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <th></th>
                                <th>Full Name</th>
                                <th># of Orders</th>
                                <th>Expense</th>
                                <th>Profit</th>
                                <th>Is Establishment</th>
                                <th>Option</th>
                            </thead>

                            <tbody>
                                @foreach ($clients as $key => $client)
                                    <tr>
                                        <td><div class="avatar med" style="background-image: url('{{ asset('img/users/' . $client->picture) }}')"></div></td>
                                        <td>{{ $client->firstname . ' ' . $client->lastname }}</td>
                                        <td>{{ $OrderModel->where('user_id', '=', $client->id)->count() }}</td>
                                        <td>PHP {{ number_format($OrderModel->where('user_id', '=', $client->id)->sum('total') + $OrderModel->where('user_id', '=', $client->id)->sum('service_charge') + $OrderModel->where('user_id', '=', $client->id)->sum('tax'), 2) }}</td>
                                        <td>PHP {{ number_format($OrderModel->where('user_id', '=', $client->id)->sum('service_charge'), 2) }}</td>
                                        <td>{{ $client->is_establishment == 1 ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-default dropdown-toggle btn-xs" type="button" data-toggle="dropdown">
                                                    Options <span class="caret"></span>
                                                </button>

                                                <ul class="dropdown-menu">
                                                    <li class="small"><a href="{{ route('admin.client.profile', $client->id) }}">Profile</a></li>
                                                    <li class="small"><a href="{{ route('admin.client.orders', $client->id) }}">Order List</a></li>
                                                    <li class="small"><a href="{{ route('admin.client.activities', $client->id) }}">Activities</a></li>
                                                    <li class="small"><a href="{{ route('admin.client.location', $client->id) }}">Limit Location</a></li>
                                                    <li class="small"><a href="{{ route('admin.client.changeestablishment', $client->id) }}">Change Is Establishment</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <center>
                            {{ $clients->links() }}
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
