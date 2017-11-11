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
                                <li title="2" class="active">Confirm Details</li>
                                <li title="3" class="pending">Payment</li>
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
        <form class="" action="{{ route('checkoutProcess', uniqid()) }}" method="post">
            {{ csrf_field() }}
            <div class="row">

                <div class="col-md-12">
                    <h1>Checkout</h1>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-body">
                          <h5>Personal Information</h5>

                          <div class="row">
                              <div class="form-group col-md-4">
                                  <label for="firstname">First Name</label>
                                  <input type="text" placeholder="First Name" name="firstname" class="form-control" value="{{ Auth::guard('u')->user()->firstname }}">
                              </div>
                              <div class="form-group col-md-4">
                                  <label for="firstname">Middle Name</label>
                                  <input type="text" placeholder="Middle Name" name="middlename" class="form-control" value="{{ Auth::guard('u')->user()->middlename }}">
                              </div>
                              <div class="form-group col-md-4">
                                  <label for="firstname">Last Name</label>
                                  <input type="text" placeholder="Last Name" name="lastname" class="form-control" value="{{ Auth::guard('u')->user()->lastname }}">
                              </div>

                              <div class="col-md-6 form-group">
                                  <label for="firstname">Street</label>
                                  <input type="text" placeholder="Street" name="street" class="form-control" value="{{ Auth::guard('u')->user()->street }}">
                              </div>

                              <div class="col-md-6 form-group">
                                  <label for="firstname">Barangay</label>
                                  <input type="text" placeholder="Barangay" name="barangay" class="form-control" value="{{ Auth::guard('u')->user()->barangay }}">
                              </div>

                              <div class="col-md-6 form-group">
                                  <label for="firstname">City</label>
                                  <input type="text" name="city" placeholder="City" class="form-control" value="{{ Auth::guard('u')->user()->city }}">
                              </div>

                              <div class="col-md-6 form-group">
                                  <label for="firstname">State</label>
                                  <input type="text" placeholder="State" readonly name="state" class="form-control" value="Metro Manila">
                              </div>

                              <div class="col-md-6 form-group">
                                  <label for="firstname">Contact #</label>
                                  <input type="text" placeholder="Contact #" name="contact" class="form-control" value="{{ Auth::guard('u')->user()->contact }}">
                              </div>
                          </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-body" style="overflow: auto;">
                          <h5>Cart Summary</h5>

                          <table class="table __cart">
                              <tbody>
                                  @php
                                      $carts = App\Model\Cart::where('user_id', '=', Auth::guard('u')->user()->id)->get();
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
                                                <div style="line-height: 120%; font-size: 10px; !important; margin-top: 5px;" class="small">By {{ $provider->firstname . ' ' . $provider->lastname }}</div>
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

                                          <td>
                                              <button type="button" class="btn btn-default btn-xs" style="margin-top: 10px;" data-toggle="collapse" data-target="#note_{{ $cart->id }}"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAzUExURQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKMFRskAAAARdFJOU970vYWYJjcDDXXNYkqwGaym0zoysgAAALdJREFUGBmtj0tuxDAMQylLlvyLnfuftnTazLSYLKuFDTxSBIV4HDzS+IVN8svzxsPbJy4V6U2vkKwLItNk/Alp1UsbBZ6Oe4HZniLUwmpEB588Y4fYiImSEb1EMQh040LlFMHR2452+Llx1XCpkev6Dm5OGcFeyVZ5lVjOdYSZrQD0FrS3ubMrL1GeUy8hm55OHHNl1qKMZQntTKtv3IXFrxnDKR96udXu2B+VH910fAzx0/wL/gK2Cwz4gOFUhwAAAABJRU5ErkJggg=="></button>
                                          </td>
                                      </tr>

                                      <tr id="note_{{ $cart->id }}" class="collapse">
                                          <td colspan="8">
                                              <div class="form-group">
                                                  <label for="" class="small pull-left">Product Note</label>
                                                  <label for="" class="small pull-right">Character Limit <span id="note_counter_{{ $cart->id }}" >100</span></label>

                                                  <div class="clearfix"></div>
                                                  <textarea class="form-control" data-plugin="text_limiter" data-counter="#note_counter_{{ $cart->id }}" data-limit="100" name="note_product_{{ $cart->id }}" style="width: 100%; font-size: 12px; resize: none;"></textarea>
                                              </div>
                                          </td>
                                      </tr>

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
                              </tbody>
                          </table>


                      </div>
                    </div>
                </div>
            </div>
            <br/><br/>
            <button class="btn btn-success pull-right">Proceed to Payment</button>
        </form>
    </div>
@endsection
