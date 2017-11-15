@extends('layouts.public.layouts')

@section('content')
     @include('layouts.public.navigation')
    @inject('OrderRating', 'App\Model\OrderRating')
        <section class="__image-slider __profile">



            <div class="__static-item">
                <div class="container">
                    <div class="row __profile">
                        <div class="col-md-3">
                            <center>
                                <div class="avatar big" style="background-image: url('{{ asset('img/providers/' . $Provider->picture) }}'); border: 3px solid rgba(0, 0, 0, 0.4); box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4);"></div>
                                <br/>
                                <select class="example" readonly>
                                    @for ($i=1; $i <= 5; $i++)
                                        <option value="{{ $i }}" {{ $OrderRating->get_provider_rating($Provider->id) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </center>
                        </div>

                        <div class="col-md-9">
                            <h1>{{ $Provider->firstname . ' ' . $Provider->lastname }}</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum tempore est ut natus voluptate optio aperiam quo aliquam distinctio soluta illo excepturi, incidunt perspiciatis voluptas? Dicta temporibus sint earum veniam.</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="__slider-item" style="background-image: url('https://images.unsplash.com/photo-1424847651672-bf20a4b0982b?auto=format&fit=crop&w=1350&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D'); opacity: 0.4;"></div>
        </section>


        <div class="container __main-content __profile">


            <div class="row">


                        <div class="col-md-12">
                            <h3 class="title white">Featured Foods</h3>
                        </div>

                <div class="col-md-6 col-xs-6 col-sm-6">
                    <div class="__card">

                            <div class="row">
                                <div class="col-md-4">
                                    <center>
                                        <div class="food_avatar" style="background-image: url('http://mercato.chefsandbutlers.net/cmplx/product/32'); max-width: 100%;"></div>
                                    </center>
                                </div>

                                <div class="col-md-8 padding-content">
                                    <h2>Twix Cheesecake</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam accusantium rem excepturi, expedita nobis vitae.</p>
                                    <span class="label label-primary">Cake</span>
                                </div>
                            </div>

                    </div>
                </div>
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <div class="__card">

                            <div class="row">
                                <div class="col-md-4">
                                    <center>
                                        <div class="food_avatar" style="background-image: url('http://mercato.chefsandbutlers.net/cmplx/product/42'); max-width: 100%;"></div>
                                    </center>
                                </div>

                                <div class="col-md-8 padding-content">
                                    <h2>Chicken & Pesto Penne</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam accusantium rem excepturi, expedita nobis vitae.</p>
                                    <span class="label label-primary">Pasta</span>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <div class="dropdown pull-right">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Filter
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu filter">
                              <li class="dropdown-header">Price Range</li>
                              <li style="padding: 5px;">
                                  <div id="slider-range"></div>
                                   <input type="text" id="amount" readonly style="border:0; color:#ccc;">
                              </li>
                              <li class="divider"></li>
                              <li class="dropdown-header">Filter By Category</li>
                              <li style="padding: 5px;">
                                  <select name="category" id="" style="width: 100%;" class="form-control"></select>
                              </li>

                              <li class="divider"></li>
                              <li class="dropdown-header">Filter By Availability</li>
                              <li style="padding: 10px;">
                                  <div class="form-group" style="margin-bottom: 5px;">
                                      <label for=""><small>Date</small></label>
                                      <input type="text" class="form-control input-sm">
                                  </div>

                                  <div class="form-group">
                                      <label for=""><small>Time</small></label>
                                      <input type="text" class="form-control input-sm">
                                  </div>
                              </li>

                              <li class="divider"></li>
                              <li style="padding: 10px;">
                                  <center>
                                      <button class="btn btn-primary btn-xs">Filter Items</button>
                                  </center>
                              </li>
                            </ul>
                          </div>

                        <div class="dropdown pull-right" style="margin-right: 20px;">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Sort By
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li class="dropdown-header">Sort By Price</li>
                              <li><a href="">High to Low</a></li>
                              <li><a href="">Low to High</a></li>
                              <li class="divider"></li>
                                <li class="dropdown-header">Sort By Rating</li>
                                <li><a href="">High to Low</a></li>
                                <li><a href="">Low to High</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
                <Br/><Br/><br/>
                <div class="col-md-12">
                    <div class="row display-flex">

                        @foreach ($Products as $product)
                            <div class="col-md-3 col-xs-6 col-sm-6">
                                <div class="__card __search_item">
                                    <div class="__img">
                                        <div style="background-image: url('{{ asset('img/uploads/' . $product->picture) }}')"></div>
                                    </div>

                                    <div class="content">
                                        <center>
                                            <select class="example" readonly>
                                                @for ($i=1; $i <= 5; $i++)
                                                    <option value="{{ $i }}" {{ $OrderRating->get_rating($product->id) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </center>
                                        <div class="row">
                                            <div class="col-md-7 col-xs-7 col-sm-7">
                                                <h6 class="title">{{ $product->name }}</h6>
                                            </div>

                                            <div class="col-md-5 col-xs-5 col-sm-5">
                                                <h6>PHP</h6>
                                                <h5 class="price">{{ number_format($product->price, 2) }}</h5>
                                                @if ($product->sale_price != 0 || $product->sale_price != null)
                                                    <h5 class="price" style="margin-top: -10px;"><small>From </small><small  style="text-decoration: line-through;">1,234.00</small></h5>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="add-to-cart">
                                            <br/>
                                            <center>
                                                <button class="btn btn-primary btn-xs">Add to Cart</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
@endsection
