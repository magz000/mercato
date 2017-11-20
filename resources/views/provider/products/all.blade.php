@extends('layouts.public.layouts')

@section('content')
    @include('layouts.providers.navigation')

    @inject('ProductModel', 'App\Model\Product')
    @inject('CategoryModel', 'App\Model\ProductCategory')


    <style media="screen">
    .table > tbody > tr > td {
         vertical-align: middle;
        }
    </style>

    <div class="container">
        <div class="row">
            <br/><Br/><br/>
            @include('layouts.providers.side_nav')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="pull-left">Product List</h4>
                        <div class="pull-right" style="margin-top: 11px;">
                            <a href="{{ route('providerProductAddPage') }}"><button class="btn btn-success btn-xs">Add Product</button></a>
                        </div>
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
                                <th>Options</th>
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
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-default btn-xs" data-toggle="dropdown">Options <span class="caret"></span></button>
                                                <ul class="dropdown-menu small">
                                                    <li class="small"><a href="{{ route('providerProductEditPage', $product->id) }}">Edit</a></li>
                                                    <li class="small"><a href="#">Delete</a></li>
                                                    @if ($product->sale_price == null)
                                                        <li class="small"><a href="#">Put On Sale</a></li>
                                                    @else
                                                        <li class="small"><a href="#">Remove On Sale</a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
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
