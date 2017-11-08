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

          <form action="{{ route('loginProviderPage') }}" method="post">
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
                  @endphp
                  @foreach ($carts as $key => $cart)
                      @php
                          $product = App\Model\Product::find($cart->product_id);
                          $provider = App\Model\Provider::find($product->provider_id);
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
              </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <a href="{{ route('checkoutPage', uniqid()) }}"><button type="button" class="btn btn-success">Proceed Checkout</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endif
