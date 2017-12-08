@extends('layouts.public.layouts')

@section('content')

     @include('layouts.public.navigation')

    <section class="__image-slider __search __checkout">

        <div class="__static-item">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <center><Br/><Br/>
                            <h1>Thank you for Purchasing!</h1>
                            <a href="{{ route('landingPage') }}"><button class="btn btn-primary">Continue Shopping</button></a>
                        </center>
                    </div>
                </div>
            </div>
        </div>


        <div class="__slider-item" style="background-image: url('https://images.unsplash.com/photo-1424847651672-bf20a4b0982b?auto=format&fit=crop&w=1350&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D'); opacity: 0.5;"></div>
    </section>

    <div class="container">
            <div class="row">

                @if (App\Model\Order::find($oid)->discount != 0)
                    <div class="col-md-12">
                        <h1>Thank you, for Dining In.</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                          <div class="panel-body">
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                          </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <h1>Pickup Instruction</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                          <div class="panel-body">
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                          </div>
                        </div>
                    </div>
                @endif

                <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-body" style="overflow: auto;">
                          <h5>Order Summary</h5>

                          <table class="table __cart">
                              <tbody>
                                  @php
                                      $order = App\Model\Order::find($oid);
                                      $carts = App\Model\OrderContent::where('order_id', '=', $oid)->get();
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
@endsection
