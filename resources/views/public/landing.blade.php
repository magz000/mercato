@extends('layouts.public.layouts')

@section('content')

        <style media="screen">
            ul.dropdown-menu li {
                margin: 0px;
            }
        </style>

        <section class="__image-slider">
            <div class="__static-item">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="_searchForm">
                              <form action="{{ route('resultPage') }}" class="_form">
                                <input type="hidden" name="type" value="1">
                                <div class="form-group col-md-5">
                                  <label for="" class="pull-left">Product</label>
                                <div class="pull-right" style="margin-top: -2px; margin-bottom: 2px;">
                                    <span class="label label-primary __opt-categ" data-category="1" style="cursor: pointer">Search By Category</span>
                                    <span class="label label-default __opt-categ" data-category="2" style="cursor: pointer">Search Dishes</span>
                                </div>

                                <div class="clearfix"></div>
                                <div data-categ="1" class="__categ-failed">
                                    <select name="category" id="" class="form-control">
                                        @foreach ($MainCategories as $category)
                                            <optgroup label="{{ $category->name }}">
                                                <option value="{{ $category->id }}">All {{ $category->name }}</option>
                                                @foreach ($SubCategories($category->id) as $key => $sub)
                                                        <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>

                                <div data-categ="2" class="__categ-failed" style="display: none;">
                                    <input type="text" class="form-control" name="product_name" placeholder="Search for a dish...">
                                </div>

                                </div>

                                <div class="form-group col-md-3">
                                  <div class="joined">
                                    <label for="">Date</label>
                                    <input id="date" type="text" class="form-control" name="date" placeholder="date" value="{{ date('Y-m-d') }}">
                                  </div>
                                  <div class="joined">
                                    <label for="">Time</label>
                                    <select name="time" id="" class="form-control">
                                        <option value="9:00 AM">9:00 AM</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="form-group col-md-2">
                                  <label for="">Pick-up Station</label>
                                  <select name="location" id="" class="form-control">
                                    <option value="Katipunan">Katipunan</option>
                                    <option value="Cubao">Cubao</option>
                                    <option value="Marikina">Marikina</option>
                                  </select>
                                </div>

                                <div class="col-md-1">
                                  <button class="submit btn btn-primary btn-xl">Search</button>
                                </div>

                                <div class="clearfix"></div>
                              </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="__static-item">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <br/><br/>
                            <h2 class="logo">Virtual Mercato</h2>
                            <div class="clearfix"></div>
                            <small class="logo-by">by CCA</small>
                        </div>

                        <div class="col-md-9" style="text-align: right;">
                            <br/><br/>
                                <br/>
                            <ul class="list-unstyled list-inline" style="margin-top: 10px;">
                                @if (!Auth::guard('u')->check())
                                    <li><a href="#" data-toggle="modal" data-target="#_loginModal">Sign In</a></li>
                                @else
                                    <li>
                                        <div class="dropdown">
                                            <div class=" dropdown-toggle" type="button" data-toggle="dropdown">
                                                {{ Auth::guard('u')->user()->firstname .  ' ' . Auth::guard('u')->user()->lastname }}
                                                <span class="caret"></span></div>
                                            </button>

                                            <ul class="dropdown-menu">
                                              <li><a href="{{ route('userDashboardPage') }}">Dashboard</a></li>
                                              <li><a href="{{ route('userOrderPage') }}">Orders</a></li>
                                              <li><a href="{{ route('userProfilePage') }}">Profiles</a></li>
                                            </ul>


                                        </div>
                                    </li>
                                    <li><a href="#" data-toggle="modal" data-target="#__cartModal">Cart</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="__slider-item" style="background-image: url('https://images.unsplash.com/photo-1424847651672-bf20a4b0982b?auto=format&fit=crop&w=1350&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D')"></div>
        </section>

        <div class="container __main-content">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h3 class="title white">Featured Chefs</h3>
                    <div class="__card padding">

                        <div id="myCarousel" class="carousel slide" data-ride="carousel"  data-interval="6000">


                          <!-- Wrapper for slides -->
                          <div class="carousel-inner">
                            <div class="item active">

                                <div class="row">
                                    <div class="col-md-4"><Br/>
                                        <center>
                                            <div class="avatar" style="background-image: url('https://www.hestancue.com/wp-content/themes/hestan/images/get-start-pic-1.jpg');"></div>
                                            <br>
                                            <select class="example" readonly>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5" selected>5</option>
                                            </select>
                                        </center>
                                    </div>

                                    <div class="col-md-8">
                                        <h2 class="pull-left">Chef Cravings</h2>
                                        <div class="pull-right" style="margin-top: 30px;"><span class="label label-primary">View Profile</span></div>
                                        <div class="clearfix"></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam accusantium rem excepturi, expedita nobis vitae.</p>
                                        <span class="label label-primary">Frozen</span> <span class="label label-primary">Cakes</span> <span class="label label-primary">Porks</span>
                                    </div>
                                </div>

                            </div>

                            <div class="item">
                                <div class="row">
                                    <div class="col-md-4"><Br/>
                                        <center>
                                            <div class="avatar" style="background-image: url('https://www.hestancue.com/wp-content/themes/hestan/images/get-start-pic-1.jpg');"></div>
                                            <br>
                                            <select class="example" readonly>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5" selected>5</option>
                                            </select>
                                        </center>
                                    </div>

                                    <div class="col-md-8">
                                        <h2 class="pull-left">Chef Cravings</h2>
                                        <div class="pull-right" style="margin-top: 30px;"><span class="label label-primary">View Profile</span></div>
                                        <div class="clearfix"></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam accusantium rem excepturi, expedita nobis vitae.</p>
                                        <span class="label label-primary">Frozen</span> <span class="label label-primary">Cakes</span> <span class="label label-primary">Porks</span>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="row">
                                    <div class="col-md-4"><Br/>
                                        <center>
                                            <div class="avatar" style="background-image: url('https://www.hestancue.com/wp-content/themes/hestan/images/get-start-pic-1.jpg');"></div>
                                            <br>
                                            <select class="example" readonly>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5" selected>5</option>
                                            </select>
                                        </center>
                                    </div>

                                    <div class="col-md-8">
                                        <h2 class="pull-left">Chef Cravings</h2>
                                        <div class="pull-right" style="margin-top: 30px;"><span class="label label-primary">View Profile</span></div>
                                        <div class="clearfix"></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam accusantium rem excepturi, expedita nobis vitae.</p>
                                        <span class="label label-primary">Frozen</span> <span class="label label-primary">Cakes</span> <span class="label label-primary">Porks</span>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                          </div>

                          <div class="clearfix"></div>
                          <br/>
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                              <li data-target="#myCarousel" data-slide-to="1"></li>
                              <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                        </div>


                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <h3 class="title white">Featured Foods</h3>
                    <div class="__card">
                        <div id="foodCarousel" class="carousel slide" data-ride="carousel"  data-interval="5000">

                            <div class="clearfix"></div>
                              <!-- Indicators -->
                              <ol class="carousel-indicators">
                                <li data-target="#foodCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#foodCarousel" data-slide-to="1"></li>
                                <li data-target="#foodCarousel" data-slide-to="2"></li>
                              </ol>
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner">
                            <div class="item active">

                                <div class="row">
                                    <div class="col-md-4">
                                        <center>
                                            <div class="food_avatar" style="background-image: url('http://mercato.chefsandbutlers.net/cmplx/product/42');"></div>

                                        </center>
                                    </div>

                                    <div class="col-md-8 padding-content">
                                        <h2>Chicken & Pesto Penne</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam accusantium rem excepturi, expedita nobis vitae.</p>
                                        <span class="label label-primary">Pasta</span>
                                    </div>
                                </div>

                            </div>

                            <div class="item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <center>
                                            <div class="food_avatar" style="background-image: url('http://mercato.chefsandbutlers.net/cmplx/product/53');"></div>

                                        </center>
                                    </div>

                                    <div class="col-md-8 padding-content">
                                        <h2>Bagoong Rice</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam accusantium rem excepturi, expedita nobis vitae.</p>
                                        <span class="label label-primary">Seafood</span>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <center>
                                            <div class="food_avatar" style="background-image: url('http://mercato.chefsandbutlers.net/cmplx/product/6');"></div>

                                        </center>
                                    </div>

                                    <div class="col-md-8 padding-content">
                                        <h2>Pina Colada Pork Ribs</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam accusantium rem excepturi, expedita nobis vitae.</p>
                                        <span class="label label-primary">Pork</span>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                          </div>


                        </div>

                    </div>
                </div>
            </div>

                <h3 class="title">Food Categories</h3>
                    <div id="itemslide" class="row">
                                <div class="col-md-3">
                                    <div class="__card full_bg" style="background-image: url('http://mercato.chefsandbutlers.net/cmplx/product/21');">
                                        <div class="inner"><p>Pasta</p></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="__card full_bg" style="background-image: url('http://mercato.chefsandbutlers.net/cmplx/product/3');">
                                        <div class="inner"><p>Pasta</p></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="__card full_bg" style="background-image: url('http://mercato.chefsandbutlers.net/cmplx/product/37');">
                                        <div class="inner"><p>Pasta</p></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="__card full_bg" style="background-image: url('http://mercato.chefsandbutlers.net/cmplx/product/48');">
                                        <div class="inner"><p>Pasta</p></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="__card full_bg" style="background-image: url('http://mercato.chefsandbutlers.net/cmplx/product/21');">
                                        <div class="inner"><p>Pasta</p></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="__card full_bg" style="background-image: url('http://mercato.chefsandbutlers.net/cmplx/product/26');">
                                        <div class="inner"><p>Pasta</p></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="__card full_bg" style="background-image: url('http://mercato.chefsandbutlers.net/cmplx/product/24');">
                                        <div class="inner"><p>Pasta</p></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="__card full_bg" style="background-image: url('http://mercato.chefsandbutlers.net/cmplx/product/23');">
                                        <div class="inner"><p>Pasta</p></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="__card full_bg" style="background-image: url('http://mercato.chefsandbutlers.net/cmplx/product/22');">
                                        <div class="inner"><p>Pasta</p></div>
                                    </div>
                                </div>
                    </div>



        </div>

@endsection
