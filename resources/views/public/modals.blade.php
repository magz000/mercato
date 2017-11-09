@if (Auth::guard('u')->check())
    <div id="__cartModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg __cart">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cart</h4>
      </div>
      <div class="modal-body">
          <table class="table __cart">
              <tbody>
                  @php
                      $carts = App\Model\Cart::where('user_id', '=', Auth::guard('u')->user()->id)->get();
                      $grandtotal=$fees=0;
                  @endphp

                  @if (count($carts) >= 1)
                      @foreach ($carts as $key => $cart)
                          @php
                              $product = App\Model\Product::find($cart->product_id);
                              $provider = App\Model\Provider::find($product->provider_id);
                              $grandtotal += $cart->total;
                              $fees += 20;
                          @endphp
                          <tr>
                              <td>
                                  <div class="avatar med" style="background-image: url('{{ route('productResources', $product->id) }}');"></div>
                              </td>
                              <td style="width: 20%;">
                                    <h5 style="margin-bottom: -5px;">{{ $product->name }}</h5>
                                    <small>By {{ $provider->firstname . ' ' . $provider->lastname }}</small>
                              </td>

                              <td>
                                    <h6 class="label-h6">Pick-Up</h6>
                                    <h5>{{ $cart->pickup_location }}</h5>
                              </td>

                              <td>
                                    <h6 class="label-h6">Date & Time</h6>
                                    <h5>{{ date('d M Y', strtotime($cart->pickup_date)) . ' ' . $cart->pickup_time }}</h5>
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

                              <td>
                                  <button class="btn btn-danger btn-xs" style="margin-top: 15px;">X</button>
                              </td>
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
                              <h6 class="label-h6" style="margin: 0;">Admin Fee</h6>
                              <h5 style="margin: 0;">{{ number_format($fees, 2) }}</h5>
                          </td>
                      </tr>

                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="border-top: 1px solid #c1c1c1 !important;">
                              <h6 class="label-h6" style="margin: 0;">Grand Total</h6>
                              <h3 style="margin: 0;">{{ number_format($grandtotal + $fees, 2) }}</h3>
                          </td>
                      </tr>
                  @else
                      <tr>
                          <td colspan="8">
                              <center>
                                  <p>Your Cart is Currently Empty.</p>
                              </center>
                          </td>
                      </tr>
                  @endif
              </tbody>
          </table>
      </div>
      <div class="modal-footer">
        @if (count($carts) >= 1)
            <a href="{{ route('checkoutPage', uniqid()) }}"><button type="button" class="btn btn-success">Proceed Checkout</button></a>
        @endif
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<style>
    .tooltip  {
     font-size: 12px !important;
    }
</style>
@else
    <div id="_loginModal" class="modal fade" role="dialog">
      <div class="modal-dialog" style="width: 350px;">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Sign In</h4>
          </div>

          <div class="modal-body">

              @if (session('signin_error'))
                  <div class="alert alert-danger">
                      {{ session('signin_error') }}
                  </div>
              @endif

              <form action="{{ route('loginUserPage') }}" method="post">
                  {{ csrf_field() }}
                  <div class="form_group">
                      <label for="">E-Mail</label>
                      <input type="text" placeholder="Email" name="email" class="form-control">
                  </div>
                  <Br/>
                  <div class="form_group">
                      <label for="">Password</label>
                      <input type="password" placeholder="Password" name="password" class="form-control">
                  </div>
                  <br/>

                  <div class="g-recaptcha" data-sitekey="6LfbczUUAAAAANmfvHO3pKYkwTkVzP2a_kmOYD5L"></div>

                  <br/>
                  <button class="btn btn-primary">Sign In</button>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
@endif
