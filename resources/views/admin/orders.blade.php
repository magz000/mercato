@extends('layouts.admin.layouts')

@section('content')
    @include('layouts.admin.navigation')

    @inject('OrderContentModel', 'App\Model\OrderContent')
    @inject('OrderModel',        'App\Model\Order')
    @inject('ProductModel',      'App\Model\Product')
    @inject('ProviderModel',      'App\Model\Provider')
    @inject('OrderRatingModel',      'App\Model\OrderRating')

    <div class="container">

        <style media="screen">
            td {
                border-top: none !important;
            }
        </style>


        <br/><Br/><br/>
        <div class="row">

            @include('layouts.admin.side_nav')

            <div class="col-md-10">
                @foreach ($orders as $order)
                    @php
                        $contents = $OrderContentModel->where('order_id', '=', $order->id)->get();
                    @endphp

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="pull-left small">{{ $order->firstname . ' ' . $order->lastname }}</div>
                            <div class="pull-right small"><span class="label label-{{ $OrderModel->state($order->status)['state'] }}">{{ $OrderModel->state($order->status)['value'] }}</span></div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="panel-body">
                            <table class="table small">
                                <thead  style="border-bottom: 1px solid #ddd;">
                                    <th></th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Pickup Date & Time</th>
                                    <th>Pikcup Location</th>
                                    <th>Status</th>
                                    <th>Note</th>
                                </thead>
                                <tbody>
                                    @foreach ($contents as $content)
                                        {{ $OrderContentModel->expire($content) ? '' : '' }}
                                        <tr>
                                            <td><div class="avatar med" style="background-image: url('{{ asset('img/uploads/' . $ProductModel->find($content->product_id)->picture) }}')"></div></td>
                                            <td>
                                                {{ $ProductModel->find($content->product_id)->name }}<br/>
                                                Served By : <a href="{{ route('userPage', $ProviderModel->find($content->provider_id)->username) }}">{{ $ProviderModel->find($content->provider_id)->firstname . ' ' . $ProviderModel->find($content->provider_id)->lastname }}</a>
                                            </td>
                                            <td>{{ $content->quantity }}</td>
                                            <td>PHP {{ number_format($content->price, 2) }}</td>
                                            <td>PHP {{ number_format($content->total, 2) }}</td>
                                            <td>{{ date('M d, Y', strtotime($content->pickup_date)) . ' ' . $content->pickup_time }}</td>
                                            <td>{{ $content->pickup_location }}</td>
                                            <td><span class="label label-{{ $OrderContentModel->state($content->status)['state'] }}">{{ $OrderContentModel->state($content->status)['value'] }}</span></td>
                                            <td>
                                                @if ($content->note != "")
                                                    <button type="button" data-toggle="tooltip" title="{{ $content->note }}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-eye"> </i></button>
                                                @endif
                                            </td>

                                        </tr>

                                        <tr>
                                            <td colspan="9" style="border-bottom: 1px solid #ddd;">
                                                @if ($content->status == 3 && $OrderRatingModel->is_rated($content->id) == null)

                                                @endif

                                                @if ($OrderRatingModel->is_rated($content->id) != null)
                                                    @php
                                                        $rating = $OrderRatingModel->where('order_id', '=', $content->id)->get()->first();
                                                    @endphp

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <center>
                                                                <select class="__rating_selected">
                                                                  <option value="1" {{ $rating->value == 1 ? 'selected' : '' }} data-html="Very Good">1</option>
                                                                  <option value="2" {{ $rating->value == 2 ? 'selected' : '' }} data-html="Good">2</option>
                                                                  <option value="3" {{ $rating->value == 3 ? 'selected' : '' }} data-html="Average">3</option>
                                                                  <option value="4" {{ $rating->value == 4 ? 'selected' : '' }} data-html="Poor">4</option>
                                                                  <option value="5" {{ $rating->value == 5 ? 'selected' : '' }} data-html="Very Poor">5</option>
                                                                </select>
                                                            </center>
                                                        </div>

                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                {{ $rating->message }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-md-9">

                                </div>

                                <div class="col-md-3">
                                    <div class="pull-right" style="text-align: right;">
                                        <small>PHP</small>
                                        <h3 style="margin-top: -5px;"><small style="font-size: 12px;">Order Total </small> {{ number_format($order->total, 2) }}</h3>
                                        <small>PHP</small>
                                        <h3 style="margin-top: -5px;"><small style="font-size: 12px;">Service Charge </small> {{ number_format($order->service_charge, 2) }}</h3>
                                        <small>PHP</small>
                                        <h3 style="margin-top: -5px;"><small style="font-size: 12px;">Grand Total </small> {{ number_format($order->total + $order->service_charge, 2) }}</h3>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
