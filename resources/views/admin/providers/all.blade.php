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
                                <th># of Products</th>
                                <th># of Orders</th>
                                <th>Sales</th>
                                <th>Profit</th>
                                <th>Option</th>
                            </thead>

                            <tbody>
                                @foreach ($providers as $key => $provider)
                                    <tr>
                                        <td><div class="avatar med" style="background-image: url('{{ asset('img/providers/' . $provider->picture) }}')"></div></td>
                                        <td>{{ $provider->firstname . ' ' . $provider->lastname }}</td>
                                        <td>{{ $ProductModel->where('provider_id', '=', $provider->id)->count() }}</td>
                                        <td>{{ $OrderContentModel->where('provider_id', '=', $provider->id)->groupBy('order_id')->count() }}</td>
                                        <td>{{ number_format($OrderContentModel->where('provider_id', '=', $provider->id)->sum('total'), 2) }}</td>
                                        <td>{{ number_format($OrderContentModel->where('provider_id', '=', $provider->id)->count() * 20, 2) }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-default dropdown-toggle btn-xs" type="button" data-toggle="dropdown">
                                                    Options <span class="caret"></span>
                                                </button>

                                                <ul class="dropdown-menu">
                                                    <li class="small"><a href="{{ route('admin.provider.profile', $provider->id) }}">Profile</a></li>
                                                    <li class="small"><a href="{{ route('admin.provider.products', $provider->id) }}">Product List</a></li>
                                                    <li class="small"><a href="{{ route('admin.provider.orders', $provider->id) }}">Order List</a></li>
                                                    <li class="small"><a href="{{ route('admin.provider.activities', $provider->id) }}">Activities</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <center>
                            {{ $providers->links() }}
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
