@extends('layouts.admin.layouts')

@section('content')
    @include('layouts.admin.navigation')

    <div class="container">
        <Br/><Br/><Br/>
        <div class="row">

            @include('layouts.admin.side_nav')

            @inject('ProductModel', 'App\Model\Product')
            @inject('CategoryModel', 'App\Model\ProductCategory')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="pull-left">Product List of {{ $provider->firstname . ' ' . $provider->lastname }}</h4>
                        <div class="clearfix"></div>

                        <table class="table small">
                            <thead>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Qty</th>
                                <th>Availability</th>
                                <th>Delivery</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>
                                            <div class="avatar med" style="background-image: url('{{ asset('img/uploads/' . $product->picture) }}')"></div>
                                        </td>
                                        <td style="width: 15%;">{{ $product->name }}</td>
                                        <td><small>PHP</small> {{ number_format($product->price, 2) }}</td>
                                        <td>{{ $CategoryModel->find($product->category_id)->name }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>{{ $product->non_expiry == 1 ? 'Available all the time' : date('M d, Y', strtotime($product->day_start)) . ' to ' . date('M d, Y', strtotime($product->day_end)) }}</td>
                                        <td>{{ $ProductModel->delivery_type($product->delivery_type) }}</td>
                                        <td>{{ $ProductModel->status($product->status) }}</td>
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
