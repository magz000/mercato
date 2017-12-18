@extends('layouts.public.layouts')

@section('content')

     @include('layouts.public.navigation')

    <section class="__image-slider __search __checkout">

        <div class="__static-item">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <ul class="_checkoutProgressBar list-unstyled list-inline">
                                <li title="1" class="finished">Cart</li>
                                <li title="2" class="finished">Confirm Details</li>
                                <li title="3" class="active ">Payment</li>
                                <li title="4" class="pending">Pick Up</li>
                            </ul>
                        </center>
                    </div>
                </div>
            </div>
        </div>


        <div class="__slider-item" style="background-image: url('https://images.unsplash.com/photo-1424847651672-bf20a4b0982b?auto=format&fit=crop&w=1350&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D'); opacity: 0.5;"></div>
    </section>

    <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h1>Payment</h1>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-body">
                          <h5>Payment Methods</h5>

                          <div class="row">
                              <center>
                                 <div class="row">
                                     <div class="col-md-6">
                                        <form class="" action="{{ route('paymentProcess', [$oid, $uid, $enc]) }}" method="post">
                                            {{ csrf_field() }}
                                            <img width="200" src="{{ asset('img/paypal.png') }}" alt=""><Br/>
                                            <button class="btn btn-success">Pay via PayPal</button><Br/><Br/>
                                        </form>
                                     </div>

                                     <div class="col-md-6">
                                         <img width="200" src="{{ asset('img/paymaya.png') }}" alt=""><Br/>
                                         <button class="btn btn-success">Pay via PayMaya</button><Br/><Br/>
                                     </div>

                                     <div class="col-md-6 col-md-offset-3">
                                         <br/><br/>
                                         <img width="200" src="{{ asset('img/cravings.png') }}" alt=""><Br/><br/><Br/><br/>
                                         <button class="btn btn-success" data-toggle="modal" data-target="#__paywithTCG">Pay via TCG Card</button><Br/><Br/>
                                     </div>

                                    @if($order->discount > 0)
                                         <div class="col-md-6 col-md-offset-3">
                                             <br/><br/>


                                             {{-- <img width="200" src="{{ asset('img/cravings.png') }}" alt=""><Br/><br/><Br/><br/> --}}
                                            <button class="btn btn-success" data-toggle="modal" data-target="#__paywithTCG">Pay via Cash</button><Br/><Br/>

                                         </div>
                                     @endif

                                 </div>
                              </center>
                          </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-body" style="overflow: auto;">
                          <h5>Order Summary</h5>

                          <table class="table __cart">
                              <tbody>
                                  @php
                                      $carts = App\Model\OrderContent::where('order_id', '=', $order->id)->get();
                                      $grandtotal=$fees=0;
                                  @endphp
                                  @foreach ($carts as $key => $cart)
                                      @php
                                          $product = App\Model\Product::find($cart->product_id);
                                          $provider = App\Model\Provider::find($product->provider_id);
                                          $grandtotal += $cart->total;
                                          $fees += 20;
                                      @endphp
                                      <tr>
                                          <td class="hidden-xs hidden-sm">
                                              <div class="avatar med" style="background-image: url('{{ asset('img/uploads/' . $product->picture) }}');"></div>
                                          </td>
                                          <td style="width: 20%;">
                                                <h5 class="small" style="margin-bottom: -5px;">{{ $product->name }}</h5>
                                                <small>By {{ $provider->firstname . ' ' . $provider->lastname }}</small>
                                          </td>

                                          <td>
                                                <h6 class="label-h6">Pick-Up</h6>
                                                <h5>{{ $cart->pickup_location }}</h5>
                                          </td>

                                          <td>

                                                <h5 class="small">{{ date('d/m/y', strtotime($cart->pickup_date)) . ' ' . $cart->pickup_time }}</h5>
                                          </td>


                                          <td>
                                              <h6 class="label-h6">Price</h6>
                                              <h5>{{ number_format($cart->price, 2) }}</h5>
                                          </td>

                                          <td style="width: 10%;">
                                              <h6 class="label-h6">QTY</h6>
                                              <h5><input type="number" value="{{ $cart->quantity }}" style="width: 100%; border: none;"></h5>
                                          </td>

                                          <td>
                                              <h6 class="label-h6">Total</h6>
                                              <h5>{{ number_format($cart->total, 2) }}</h5>
                                          </td>
                                      </tr>

                                      @if ($cart->note != null)
                                          <tr id="note_{{ $cart->id }}">
                                              <td colspan="8">
                                                  <div class="form-group">
                                                      <label for="" class="small pull-left">Product Note</label>

                                                      <div class="clearfix"></div>
                                                      <textarea class="form-control" readonly data-plugin="text_limiter" data-counter="#note_counter_{{ $cart->id }}" data-limit="100" name="name" style="width: 100%; font-size: 10px;">{{ $cart->note }}</textarea>
                                                  </div>
                                              </td>
                                          </tr>
                                      @endif

                                      <tr style="border-bottom: 1px solid #e1e1e1;">
                                          <td colspan="8"></td>
                                      </tr>
                                  @endforeach
                                  <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td  data-toggle="tooltip" title="Admin fee is computed depending on the content of your cart, 20 multiplied by the number of line in your cart.">
                                          <br/>
                                          <h6 class="label-h6" style="margin: 0;">Admin Fee</h6>
                                          <h5 style="margin: 0;">{{ number_format($fees, 2) }}</h5>
                                      </td>
                                  </tr>

                                  @if ($order->discount != 0)
                                      <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td style="border-top: 1px solid #c1c1c1 !important;">
                                              <h6 class="label-h6" style="margin: 0;">Discount</h6>
                                              <h3 style="margin: 0;">-{{ number_format($grandtotal*($order->discount/100), 2) }}</h3>
                                          </td>
                                      </tr>
                                  @endif

                                  <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td style="border-top: 1px solid #c1c1c1 !important;">
                                          <h6 class="label-h6" style="margin: 0;">Grand Total</h6>
                                          @if ($order->discount != 0)
                                              <h3 style="margin: 0;">{{ number_format(($grandtotal - $grandtotal*($order->discount/100)) + $fees, 2) }}</h3>
                                          @else
                                              <h3 style="margin: 0;">{{ number_format($grandtotal + $fees, 2) }}</h3>
                                          @endif
                                      </td>
                                  </tr>
                              </tbody>
                          </table>


                      </div>
                    </div>
                </div>
            </div>
    </div>






    <div id="__paywithTCG" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->

      <form class="" action="{{ route('paymentTCGProcess', [$oid, $uid, $enc]) }}" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pay via The Craving Group Card</h4>
      </div>
      <div class="modal-body" style="padding: 20px;">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="First Name" readonly value="{{ ucwords(strtolower(Auth::guard('u')->user()->firstname)) }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Middle Name</label>
                        <input type="text" class="form-control" name="middlename" placeholder="Middle Name" readonly value="{{ ucwords(strtolower(Auth::guard('u')->user()->middlename)) }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" readonly value="{{ ucwords(strtolower(Auth::guard('u')->user()->lastname)) }}">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Employee Number</label>
                        <input type="number" name="employeeid" class="form-control" placeholder="Employee #" >
                    </div>
                </div>
            </div>


      </div>
      <div class="modal-footer">
        <button class="btn btn-success" type="submit">Pay</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
  </div>
</div>



@endsection
