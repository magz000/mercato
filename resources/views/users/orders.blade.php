@extends('layouts.public.layouts')

@php
use App\Model\OrderRating;
use App\Model\OrderContent;
use App\Model\Order;
use App\Model\Product;
use App\Model\Provider;
@endphp

@section('content')
    @include('layouts.public.navigation')

    <style media="screen">
        td {
            border-top: none !important;
        }
    </style>

    <div class="container">
        <br/><Br/><br/>
        <div class="row">

            @include('layouts.users.side_nav')

            <div class="col-md-10">

                @foreach ($orders as $order)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="pull-left small">{{ $order->firstname . ' ' . $order->lastname }}</div>
                            <div class="pull-right small"><span class="label label-{{ Order::state($order->status)['state'] }}">{{ Order::state($order->status)['value'] }}</span></div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="panel-body">
                            <form class="" action="{{ route('userRatingProcess', [$order->id, $order->user_id, md5($order->id . 'cmplx' . $order->user_id)]) }}" method="post">
                                {{ csrf_field() }}
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
                                        @foreach ($contents($order->id) as $content)
                                            {{ OrderContent::expire($content) ? '' : '' }}
                                            <tr>
                                                <td><div class="avatar med" style="background-image: url('{{ asset('img/uploads/' . Product::find($content->product_id)->picture) }}')"></div></td>
                                                <td>
                                                    {{ Product::find($content->product_id)->name }}<br/>
                                                    Served By : <a href="{{ route('userPage', Provider::find($content->provider_id)->username) }}">{{ Provider::find($content->provider_id)->firstname . ' ' . Provider::find($content->provider_id)->lastname }}</a>
                                                </td>
                                                <td>{{ $content->quantity }}</td>
                                                <td>PHP {{ number_format($content->price, 2) }}</td>
                                                <td>PHP {{ number_format($content->total, 2) }}</td>
                                                <td>{{ date('M d, Y', strtotime($content->pickup_date)) . ' ' . $content->pickup_time }}</td>
                                                <td>{{ $content->pickup_location }}</td>
                                                <td><span class="label label-{{ OrderContent::state($content->status)['state'] }}">{{ OrderContent::state($content->status)['value'] }}</span></td>
                                                <td><button type="button" data-toggle="tooltip" title="{{ $content->note }}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-eye"> </i></button></td>
                                            </tr>

                                            <tr>
                                                <td colspan="9" style="border-bottom: 1px solid #ddd;">
                                                    @if ($content->status == 3 && OrderRating::is_rated($content->id) == null)
                                                        <input type="hidden" name="ocid[]" value="{{ $content->id }}">

                                                        <label for="" class="small">What do you think about the food?</label>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <Br/>
                                                                <center>
                                                                    <select name="rating__{{ $content->id }}" class="__rating">
                                                                      <option value="1" data-html="Very Good">1</option>
                                                                      <option value="2" data-html="Good">2</option>
                                                                      <option value="3" data-html="Average">3</option>
                                                                      <option value="4" data-html="Poor">4</option>
                                                                      <option value="5" data-html="Very Poor">5</option>
                                                                    </select>
                                                                </center>
                                                            </div>

                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <textarea name="message__{{ $content->id }}" id="" cols="30" class="form-control" placeholder="Message"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if (OrderRating::is_rated($content->id) != null)
                                                        @php
                                                            $rating = OrderRating::where('content_id', '=', $content->id)->get()->first();
                                                        @endphp
                                                        <label for="" class="small">What do you think about the food?</label>
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
                                        @if (OrderContent::rating($order->id) && !OrderRating::all_rated($contents($order->id)))
                                            <button class="btn btn-success btn lg">Submit Rating</button>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <div class="pull-right" style="text-align: right;">
                                            @php
                                                $discount = 0;
                                            @endphp
                                            @if ($order->discount != 0)
                                                @php
                                                    $discount = $order->total*($order->discount/100);
                                                @endphp
                                                <small>PHP</small>
                                                <h3 style="margin-top: -5px;"><small style="font-size: 12px;">Discount </small> {{ number_format($order->total*($order->discount/100), 2) }}</h3>
                                            @endif

                                            <small>PHP</small>
                                            <h3 style="margin-top: -5px;"><small style="font-size: 12px;">Order Total </small> {{ number_format($order->total - $discount, 2) }}</h3>

                                            <small>PHP</small>
                                            <h3 style="margin-top: -5px;"><small style="font-size: 12px;">Service Charge </small> {{ number_format($order->service_charge, 2) }}</h3>
                                            <small>PHP</small>
                                            <h3 style="margin-top: -5px;"><small style="font-size: 12px;">Grand Total </small> {{ number_format(($order->total - $discount) + $order->service_charge, 2) }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
