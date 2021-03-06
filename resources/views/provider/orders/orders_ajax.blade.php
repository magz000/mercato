@inject('OrderModel',        'App\Model\Order')
@inject('OrderContentModel', 'App\Model\OrderContent')
@inject('ProductModel',      'App\Model\Product')
@inject('ProviderModel',      'App\Model\Provider')
@inject('OrderRatingModel',      'App\Model\OrderRating')

<span class="pull-right" id="countdown-timer" style="color:red; font-size: 1.75rem"> </span><br><br>

@foreach ($order_ids as $key => $order_id)
    @php
        $order = $OrderModel->find($order_id);
        $contents = $OrderContentModel->where('order_id', '=', $order_id)->where('provider_id', '=', Auth::guard('p')->user()->id)->get();
        $count_pending = $OrderContentModel->where('order_id', '=', $order_id)
                            ->where('provider_id', '=', Auth::guard('p')->user()->id)
                            ->where('status', '=', 0)->count();
    @endphp

    <div class="panel panel-default" {!! $count_pending > 0 ? 'style="border: 7px solid #00f"' : ''  !!}>
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
                <th>Pickup Location</th>
                <th>Status</th>
                <th>Note</th>
                <th>Option</th>
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

                        @if($order->discount > 0)
                            <td>In Store - Table {{ $order->table_no }}</td>
                        @else
                            <td>{{ $content->pickup_location }}</td>
                        @endif


                        <td><span class="label label-{{ $OrderContentModel->state($content->status)['state'] }}">{{ $OrderContentModel->state($content->status)['value'] }}</span></td>
                        <td><button type="button" data-toggle="tooltip" title="{{ $content->note }}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-eye"> </i></button></td>
                        <td>
                            @if ($content->status < 3)
                                <button type="button"  class="btn btn-default btn-xs __updateTrigger" data-ocid="{{ $content->id }}" data-status="{{ $content->status }}" data-toggle="modal" data-target="#__updateOrder"><i class="fa fa-fw fa-pencil"> </i></button>
                            @else
                                -
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td colspan="10" style="border-bottom: 1px solid #ddd;">
                            @if ($content->status == 3 && $OrderRatingModel->is_rated($content->id) == null)

                            @endif

                            @if ($OrderRatingModel->is_rated($content->id) != null)
                                @php
                                    $rating = $OrderRatingModel->where('content_id', '=', $content->id)->get()->first();
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
        </div>

    </div>
@endforeach