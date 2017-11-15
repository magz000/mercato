@extends('layouts.public.layouts')

@section('content')
    @include('layouts.public.navigation')
    @inject('OrderContent', 'App\Model\OrderContent')
    @inject('Product', 'App\Model\Product')
    @inject('Provider', 'App\Model\Provider')
    @inject('Order', 'App\Model\Order')

    <div class="container">
        <br/><br/><Br/>
        <div class="row">

            @include('layouts.users.side_nav')

            <div class="col-md-10">
                <div class="row">

                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4>Recent Orders</h4>
                                @foreach ($orders as $key => $order)
                                    <button data-toggle="collapse" class="btn btn-default" style="width: 100%; margin-top:10px; text-align: left;" data-target="#order_{{ $order->id }}">
                                        <div class="pull-left">
                                            #{{ $order->id }}
                                        </div>

                                        <div class="pull-right">
                                            <span class="label label-{{ $Order->state($order->status)['state'] }}">{{ $Order->state($order->status)['value'] }}</span>
                                        </div>
                                    </button>

                                    <div id="order_{{ $order->id }}" class="collapse">
                                        <Br/>
                                        <table class="table small" style="font-size: 10px;">
                                            <thead  style="border-bottom: 1px solid #ddd;">
                                                <th></th>
                                                <th>Product</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>Date & Time</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                                <th>Note</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($OrderContent->where('order_id', '=', $order->id)->get() as $content)
                                                    {{ $OrderContent->expire($content) ? '' : '' }}
                                                    <tr>
                                                        <td><div class="avatar med" style="background-image: url('{{ asset('img/uploads/' . $Product->find($content->product_id)->picture) }}')"></div></td>
                                                        <td>
                                                            {{ $Product->find($content->product_id)->name }}<br/>
                                                            Served By : <a href="{{ route('userPage', $Provider->find($content->provider_id)->username) }}">{{ $Provider->find($content->provider_id)->firstname . ' ' . $Provider->find($content->provider_id)->lastname }}</a>
                                                        </td>
                                                        <td>{{ $content->quantity }}</td>
                                                        <td>PHP {{ number_format($content->price, 2) }}</td>
                                                        <td>PHP {{ number_format($content->total, 2) }}</td>
                                                        <td>{{ date('M d, Y', strtotime($content->pickup_date)) . ' ' . $content->pickup_time }}</td>
                                                        <td>{{ $content->pickup_location }}</td>
                                                        <td><span class="label label-{{ $OrderContent->state($content->status)['state'] }}">{{ $OrderContent->state($content->status)['value'] }}</span></td>
                                                        <td><button type="button" data-toggle="tooltip" title="{{ $content->note }}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-eye"> </i></button></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4>Promotions</h4>
                                <br/>
                                <center>
                                    <img style="max-width: 100%" src="http://cravingsgroup.com/wp-content/uploads/2017/05/Cravings-logo-145-x50.png" alt="">
                                    <img style="max-width: 100%" src="http://cravingsgroup.com/wp-content/uploads/2017/05/Casa-Roces-Logo-300-x-300.jpg" alt="">
                                </center>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
