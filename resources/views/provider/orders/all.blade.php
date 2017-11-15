@extends('layouts.public.layouts')

@section('content')
    @include('layouts.providers.navigation')


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

        <br><br><br>

        <div class="row">

            @include('layouts.providers.side_nav')
            <div class="col-md-10">
                @foreach ($order_ids as $key => $order_id)
                    @php
                        $order = $OrderModel->find($order_id);
                        $contents = $OrderContentModel->where('order_id', '=', $order_id)->where('provider_id', '=', Auth::guard('p')->user()->id)->get();
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
                                            <td>{{ $content->pickup_location }}</td>
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
            </div>
        </div>
    </div>

    <div id="__updateOrder" class="modal fade" role="dialog">
      <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Update Order Status</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label for="">Status</label>
                  <input type="hidden" name="content_id" value="">
                  <select name="content_status" id="" class="form-control">
                      <option value="0">Pending</option>
                      <option value="1">Cooking</option>
                      <option value="2">Ready for Pickup</option>
                  </select>

              </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="__updateOrderBtn" class="btn btn-success" data-dismiss="modal">Update Order</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript">
        $(function() {

            $('#__updateOrderBtn').click(function() {
                $(this).attr('disabled', 'disabled').html('<i class="fa fa-refresh  fa-spin fa-fw"></i> Saving...');
                $.ajax({
                    url: '{{ route('order.content.update') }}',
                    method : 'POST',
                    data : {content_id : $('input[name="content_id"]').val(), status : $('select[name="content_status"]').val()},
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if(data == "1") {
                            location.reload();
                        }
                    }
                });
            });

            $('.__updateTrigger').click(function() {
                var ocid = $(this).attr('data-ocid');
                $('input[name="content_id"]').val(ocid);
                $('select[name="content_status"]').val($(this).attr('data-status'));
            });
        });
    </script>
@endsection
