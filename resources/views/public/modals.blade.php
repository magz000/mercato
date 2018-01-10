@if (Auth::guard('u')->check())

    <div id="__cartModal" class="modal fade" role="dialog">
        <div class="modal-dialog __cart">

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
                                    $location = App\Model\Location::find($cart->pickup_location);
                                    $grandtotal += $cart->total;
                                    $fees += 20;
                                @endphp
                                <tr>
                                    <td colspan="7" style="border-bottom: 1px solid #ddd !important;">
                                        <form class="pull-right" action="{{ route('deleteCartProcess') }}"
                                              method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                            <input type="hidden" name="_method" value="delete"/>
                                            <input type="submit" class="btn btn-danger btn-xs" style="margin-top: 15px;"
                                                   value="X">


                                        </form>

                                        <a class="btn btn-danger btn-xs" style="margin-top: 15px; opacity: 0;">X</a>

                                        <div class="row ">

                                            <div class="col-md-4">
                                                <div class="avatar med"
                                                     style="background-image: url('{{ asset('img/uploads/' . $product->picture) }}');"></div>

                                                <h5 style="margin-bottom: -5px; width:150px !important;">{{ $product->name }}</h5>
                                                <small>By {{ $provider->firstname . ' ' . $provider->lastname }}</small>
                                            </div>
                                            <div class="col-md-5 cart-content">

                                                <input hidden class="cart-id" value="{{ $cart->id }}">

                                                {{-- <small class="label-h6">Pick-Up</small> --}}
                                                <br>
                                                <small><span
                                                            style="color: #ababab;">Pick-Up: </span> {{ $location->name }}
                                                </small>

                                                <br>
                                                <small><span
                                                            style="color: #ababab;">Date & Time: </span> {{ date('d M Y', strtotime($cart->pickup_date)) . ' ' . $cart->pickup_time }}
                                                </small>

                                                <br>
                                                <small><span
                                                            style="color: #ababab;">Price: </span> {{number_format($cart->price, 2)}}
                                                    <input hidden class="cart-price" value="{{ $cart->price, 2 }}">
                                                </small>

                                                <br>
                                                <small><span style="color: #ababab;">QTY: </span> <input min='1'
                                                                                                         class='cart-qty'
                                                                                                         type="number"
                                                                                                         value="{{ $cart->quantity }}"
                                                                                                         style="width: auto;">
                                                </small>

                                                <br>
                                                <small><span style="color: #ababab;">Total: </span> <input readonly
                                                                                                           style="border: none;"
                                                                                                           class="cart-total"
                                                                                                           value="{{ number_format($cart->total, 2) }}"/>
                                                </small>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- <td>
                                        <div class="avatar med" style="background-image: url('{{ asset('img/uploads/' . $product->picture) }}');"></div>
                                    </td>
                                    <td style="width: 20%;">
                                          <h5 style="margin-bottom: -5px;">{{ $product->name }}</h5>
                                          <small>By {{ $provider->firstname . ' ' . $provider->lastname }}</small>
                                    </td>

                                    <td>
                                          <h6 class="label-h6">Pick-Up</h6>
                                          <h5>{{ $location->name }}</h5>
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
                                        <form class="" action="{{ route('deleteCartProcess') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                            <input type="hidden" name="_method" value="delete" />
                                            <button class="btn btn-danger btn-xs" style="margin-top: 15px;">X</button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td data-toggle="tooltip"
                                    title="Admin fee is computed depending on the content of your cart, 20 multiplied by the number of line in your cart.">
                                    <h6 class="label-h6" style="margin: 0;">Admin Fee</h6>
                                    <h5 style="margin: 0;" id="fees">{{ number_format($fees, 2) }}</h5>
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
                                    <h3 style="margin: 0;"
                                        id="grandtotal">{{ number_format($grandtotal + $fees, 2) }}</h3>
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
                        <a href="{{ route('checkoutPage', uniqid()) }}">
                            <button id="proceedCheckout" type="button" class="btn btn-success">Proceed Checkout</button>
                        </a>
                    @endif
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <style>
        .tooltip {
            font-size: 12px !important;
        }
    </style>
@else


    <style media="screen">
        .btn-group .btn.active {
            opacity: 1 !important;
        }

        .btn-group .btn {
            opacity: 0.3;
        }

    </style>

    <div id="_loginModal" class="modal fade justify-content-center" role="dialog">
        <div class="modal-dialog" style="width: 350px; margin-left: auto; margin-right: auto;">

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

                        <center>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary active" style="width: 150px;">
                                    <input type="radio" name="user_type" id="option2" value="1" autocomplete="off"
                                           checked>
                                    <i class="fa fa-user" style="font-size: 64px;"></i><Br>
                                    Buyer
                                </label>

                                <label class="btn btn-primary" style="width: 150px;">
                                    <input type="radio" name="user_type" id="option3" value="2" autocomplete="off">
                                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDI5NyAyOTciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDI5NyAyOTc7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNjRweCIgaGVpZ2h0PSI2NHB4Ij4KPHBhdGggZD0iTTI5Ni4wMzMsMTA4LjIyYzAtMzcuOTY3LTMwLjg3Ny02OC44NTUtNjguODMtNjguODU1Yy0xLjY0OSwwLTMuMzE0LDAuMDYyLTQuOTg3LDAuMTg3QzIwNS44ODQsMTQuOTk3LDE3OC4yMTUsMCwxNDguNSwwICBjLTI5LjcxNCwwLTU3LjM4MywxNS03My43MTUsMzkuNTUyYy0xLjY3My0wLjEyNS0zLjMzOC0wLjE4Ny00Ljk4Ny0wLjE4N2MtMzcuOTU0LDAtNjguODMxLDMwLjg4OC02OC44MzEsNjguODU1ICBjMCwzNC42MzcsMjUuNzA0LDYzLjM2OCw1OS4wMzEsNjguMTQydjk1LjE1N2MwLDE0LjA1MSwxMS40MywyNS40ODEsMjUuNDgsMjUuNDgxaDEyNi4wNDRjMTQuMDUxLDAsMjUuNDgtMTEuNDMxLDI1LjQ4LTI1LjQ4MSAgdi05NS4xNTdDMjcwLjMzLDE3MS41ODgsMjk2LjAzMywxNDIuODU2LDI5Ni4wMzMsMTA4LjIyeiBNMjExLjUyMiwyNzcuMzk5SDg1LjQ3OWMtMy4xODYsMC01Ljg4LTIuNjkzLTUuODgtNS44ODF2LTk1LjE0NyAgYzkuNjAyLTEuMzYsMTguNzE4LTQuNzIyLDI2Ljk0MS05Ljk1YzEyLjYxMyw2LjgyMiwyNi45NTgsMTAuNjUxLDQxLjk2LDEwLjY1MXMyOS4zNDYtMy44MjksNDEuOTU5LTEwLjY1ICBjOC4yMjUsNS4yMjcsMTcuMzQyLDguNTg5LDI2Ljk0Myw5Ljk0OXY5NS4xNDdDMjE3LjQwMiwyNzQuNzA2LDIxNC43MDksMjc3LjM5OSwyMTEuNTIyLDI3Ny4zOTl6IE0yMjcuMjAzLDE1Ny40NzEgIGMtNi41OTcsMC0xMi45NzQtMS4yODktMTguOS0zLjc2NmMxMS45MjctMTAuOTM0LDIwLjk0My0yNS4xNDYsMjUuNDctNDEuNDc5YzEuNDQ1LTUuMjE2LTEuNjExLTEwLjYxNy02LjgyNy0xMi4wNjMgIGMtNS4yMTctMS40NDUtMTAuNjE2LDEuNjEyLTEyLjA2Myw2LjgyN2MtOC4yMzYsMjkuNzIzLTM1LjUzNCw1MC40ODEtNjYuMzgzLDUwLjQ4MXMtNTguMTQ2LTIwLjc1OC02Ni4zODMtNTAuNDgxICBjLTEuNDQ1LTUuMjE2LTYuODQzLTguMjcyLTEyLjA2My02LjgyN2MtNS4yMTYsMS40NDUtOC4yNzIsNi44NDctNi44MjcsMTIuMDYzYzQuNTI2LDE2LjMzMywxMy41NDMsMzAuNTQ2LDI1LjQ3LDQxLjQ3OSAgYy01LjkyNiwyLjQ3Ny0xMi4zMDMsMy43NjYtMTguODk5LDMuNzY2Yy0yNy4xNDYsMC00OS4yMy0yMi4wOTQtNDkuMjMtNDkuMjUxYzAtMjcuMTU4LDIyLjA4NS00OS4yNTQsNDkuMjMtNDkuMjU0ICBjMi43NDQsMCw1LjU2OSwwLjI0Niw4LjM5NywwLjczYzQuMDgyLDAuNjk2LDguMTctMS4yNDcsMTAuMi00Ljg2MWMxMi4yMDUtMjEuNzMzLDM1LjIzNi0zNS4yMzQsNjAuMTA0LTM1LjIzNCAgczQ3Ljg5OSwxMy41MDIsNjAuMTA2LDM1LjIzNWMyLjAyOSwzLjYxNCw2LjExNSw1LjU1NywxMC4yLDQuODZjMi44MjgtMC40ODQsNS42NTMtMC43Myw4LjM5Ni0wLjczICBjMjcuMTQ1LDAsNDkuMjI5LDIyLjA5Niw0OS4yMjksNDkuMjU0QzI3Ni40MzMsMTM1LjM3NywyNTQuMzQ4LDE1Ny40NzEsMjI3LjIwMywxNTcuNDcxeiIgZmlsbD0iI0ZGRkZGRiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
                                    <Br/>
                                    Provider
                                </label>
                            </div>
                        </center>

                        <Br/><Br/>
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

                        <br/><br/>
                        No Account Yet? <a href="#" data-toggle="modal" data-target="#_SignUpModal">Sign Up Here</a>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>






    <div id="_SignUpModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sign Up as a <span id="_signas">Buyer</span></h4>
                </div>

                <div class="modal-body">

                    @if (session('signin_error'))
                        <div class="alert alert-danger">
                            {{ session('signin_error') }}
                        </div>
                    @endif

                    <form action="{{ route('createUserProcess') }}" method="post">
                        {{ csrf_field() }}
                        <center>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary active" style="width: 150px;">
                                    <input type="radio" class="radio" name="user_type" id="option2" value="1"
                                           autocomplete="off" checked>
                                    <i class="fa fa-user" style="font-size: 64px;"></i><Br>
                                    Buyer
                                </label>

                                <label class="btn btn-primary" style="width: 150px;">
                                    <input type="radio" class="radio" name="user_type" id="option3" value="2"
                                           autocomplete="off">
                                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDI5NyAyOTciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDI5NyAyOTc7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNjRweCIgaGVpZ2h0PSI2NHB4Ij4KPHBhdGggZD0iTTI5Ni4wMzMsMTA4LjIyYzAtMzcuOTY3LTMwLjg3Ny02OC44NTUtNjguODMtNjguODU1Yy0xLjY0OSwwLTMuMzE0LDAuMDYyLTQuOTg3LDAuMTg3QzIwNS44ODQsMTQuOTk3LDE3OC4yMTUsMCwxNDguNSwwICBjLTI5LjcxNCwwLTU3LjM4MywxNS03My43MTUsMzkuNTUyYy0xLjY3My0wLjEyNS0zLjMzOC0wLjE4Ny00Ljk4Ny0wLjE4N2MtMzcuOTU0LDAtNjguODMxLDMwLjg4OC02OC44MzEsNjguODU1ICBjMCwzNC42MzcsMjUuNzA0LDYzLjM2OCw1OS4wMzEsNjguMTQydjk1LjE1N2MwLDE0LjA1MSwxMS40MywyNS40ODEsMjUuNDgsMjUuNDgxaDEyNi4wNDRjMTQuMDUxLDAsMjUuNDgtMTEuNDMxLDI1LjQ4LTI1LjQ4MSAgdi05NS4xNTdDMjcwLjMzLDE3MS41ODgsMjk2LjAzMywxNDIuODU2LDI5Ni4wMzMsMTA4LjIyeiBNMjExLjUyMiwyNzcuMzk5SDg1LjQ3OWMtMy4xODYsMC01Ljg4LTIuNjkzLTUuODgtNS44ODF2LTk1LjE0NyAgYzkuNjAyLTEuMzYsMTguNzE4LTQuNzIyLDI2Ljk0MS05Ljk1YzEyLjYxMyw2LjgyMiwyNi45NTgsMTAuNjUxLDQxLjk2LDEwLjY1MXMyOS4zNDYtMy44MjksNDEuOTU5LTEwLjY1ICBjOC4yMjUsNS4yMjcsMTcuMzQyLDguNTg5LDI2Ljk0Myw5Ljk0OXY5NS4xNDdDMjE3LjQwMiwyNzQuNzA2LDIxNC43MDksMjc3LjM5OSwyMTEuNTIyLDI3Ny4zOTl6IE0yMjcuMjAzLDE1Ny40NzEgIGMtNi41OTcsMC0xMi45NzQtMS4yODktMTguOS0zLjc2NmMxMS45MjctMTAuOTM0LDIwLjk0My0yNS4xNDYsMjUuNDctNDEuNDc5YzEuNDQ1LTUuMjE2LTEuNjExLTEwLjYxNy02LjgyNy0xMi4wNjMgIGMtNS4yMTctMS40NDUtMTAuNjE2LDEuNjEyLTEyLjA2Myw2LjgyN2MtOC4yMzYsMjkuNzIzLTM1LjUzNCw1MC40ODEtNjYuMzgzLDUwLjQ4MXMtNTguMTQ2LTIwLjc1OC02Ni4zODMtNTAuNDgxICBjLTEuNDQ1LTUuMjE2LTYuODQzLTguMjcyLTEyLjA2My02LjgyN2MtNS4yMTYsMS40NDUtOC4yNzIsNi44NDctNi44MjcsMTIuMDYzYzQuNTI2LDE2LjMzMywxMy41NDMsMzAuNTQ2LDI1LjQ3LDQxLjQ3OSAgYy01LjkyNiwyLjQ3Ny0xMi4zMDMsMy43NjYtMTguODk5LDMuNzY2Yy0yNy4xNDYsMC00OS4yMy0yMi4wOTQtNDkuMjMtNDkuMjUxYzAtMjcuMTU4LDIyLjA4NS00OS4yNTQsNDkuMjMtNDkuMjU0ICBjMi43NDQsMCw1LjU2OSwwLjI0Niw4LjM5NywwLjczYzQuMDgyLDAuNjk2LDguMTctMS4yNDcsMTAuMi00Ljg2MWMxMi4yMDUtMjEuNzMzLDM1LjIzNi0zNS4yMzQsNjAuMTA0LTM1LjIzNCAgczQ3Ljg5OSwxMy41MDIsNjAuMTA2LDM1LjIzNWMyLjAyOSwzLjYxNCw2LjExNSw1LjU1NywxMC4yLDQuODZjMi44MjgtMC40ODQsNS42NTMtMC43Myw4LjM5Ni0wLjczICBjMjcuMTQ1LDAsNDkuMjI5LDIyLjA5Niw0OS4yMjksNDkuMjU0QzI3Ni40MzMsMTM1LjM3NywyNTQuMzQ4LDE1Ny40NzEsMjI3LjIwMywxNTcuNDcxeiIgZmlsbD0iI0ZGRkZGRiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
                                    <Br/>
                                    Provider
                                </label>
                            </div>
                        </center>

                        <Br/><Br/>


                        <div class="row">
                            <div class="col-md-6">
                                <h4>Account Information</h4>
                                <div class="form_group">
                                    <label for="">E-Mail <span style="color: red">*</span></label>
                                    <input type="text" placeholder="Email" value="{{ old('semail') }}" name="semail"
                                           class="form-control">
                                </div>
                                <Br/>
                                <div class="form_group">
                                    <label for="">Password <span style="color: red">*</span></label>
                                    <input type="password" placeholder="Password" name="spassword" class="form-control">
                                </div>
                                <br/>
                                <div class="form_group">
                                    <label for="">Confirm Password <span style="color: red">*</span></label>
                                    <input type="password" placeholder="Confirm Password" name="srepassword"
                                           class="form-control">
                                </div>
                                <br/>

                                <div class="g-recaptcha" data-sitekey="6LfbczUUAAAAANmfvHO3pKYkwTkVzP2a_kmOYD5L"></div>
                            </div>
                            <div class="col-md-6">
                                <h4>Personal Information</h4>
                                <div class="form_group">
                                    <label for="">First Name <span style="color: red">*</span></label>
                                    <input type="text" placeholder="First Name" value="{{ old('sfirstname') }}"
                                           name="sfirstname" class="form-control">
                                </div>
                                <Br/>
                                <div class="form_group">
                                    <label for="">Last Name <span style="color: red">*</span></label>
                                    <input type="text" placeholder="Last Name" value="{{ old('slastname') }}"
                                           name="slastname" class="form-control">
                                </div>
                                <Br/>
                                <div class="form_group">
                                    <label for="">Contact <span style="color: red">*</span></label>
                                    <input type="number" placeholder="Contact Number" value="{{ old('scontact') }}"
                                           name="scontact" class="form-control">
                                </div>
                                <Br/>
                                <div class="form_group">
                                    <label for="">Date of Birth <span style="color: red">*</span></label>
                                    <input type="text" placeholder="Birthday" value="{{ old('sbirthday') }}"
                                           name="sbirthday" class="form-control birthday">
                                </div>
                            </div>
                        </div>

                        <br/>
                        <button class="btn btn-primary pull-right">Sign Up</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>




@endif
