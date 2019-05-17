@extends('layouts.public.layouts')

@section('content')

    @inject('Product', 'App\Model\Product')
    @inject('Setting', 'App\Model\Setting')
    @inject('ProductCategory', 'App\Model\ProductCategory')
    @inject('Provider', 'App\Model\Provider')
    @inject('OrderRating', 'App\Model\OrderRating')
    @inject('Cart', 'App\Model\Cart')

    <style type="stylesheet">
        ul.dropdown-menu li {
            margin: 0px;
        }
    </style>

    <section class="__image-slider">
        <div class="__static-item">
            <div class="container">
                <div class="row">
                    <br><br><br><br>
                    <div class="col-md-12">
                        <div class="_searchForm">
                            <form action="{{ route('resultPage') }}" class="_form">
                                <input type="hidden" name="type" value="1">
                                <div class="form-group col-md-5">
                                    <label for="" class="pull-left">Product</label>
                                    <div class="pull-right" style="margin-top: -2px; margin-bottom: 2px;">
                                        <span class="label label-primary __opt-categ" data-category="1"
                                              style="cursor: pointer">Search By Category</span>
                                        <span class="label label-default __opt-categ" data-category="2"
                                              style="cursor: pointer">Search Dishes</span>
                                    </div>

                                    <div class="clearfix"></div>
                                    <div data-categ="1" class="__categ-failed">
                                        <select name="category" id="" class="form-control">
                                            <option value="0">All Dishes</option>
                                            @foreach ($MainCategories as $category)
                                                <optgroup label="{{ $category->name }}">
                                                    <option value="{{ $category->id }}">
                                                        All {{ $category->name }}</option>
                                                    @foreach ($SubCategories($category->id) as $key => $sub)
                                                        <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div data-categ="2" class="__categ-failed" style="display: none;">
                                        <input type="text" class="form-control" name="product_name"
                                               placeholder="Search for a dish...">
                                    </div>

                                </div>

                                <div class="form-group col-md-3" style="color: #000 !important; z-index: 9999 !important;">
                                    <div class="joined">
                                        <label for="">Date</label>
                                        <input id="date" type="date" class="form-control" name="date" placeholder="date"
                                               value="{{ date('Y-m-d', strtotime('tomorrow')) }}">
                                    </div>
                                    <div class="joined">
                                        <label for="">Time</label>
                                        <select name="time" id="" class="form-control">
                                            <option value="9:00 AM">9:00 AM</option>
                                            <option value="11:00 AM">11:00 AM</option>
                                            <option value="12:00 PM">12:00 NN</option>
                                            <option value="02:00 PM">02:00 PM</option>
                                            <option value="04:00 PM">04:00 PM</option>
                                            <option value="06:00 PM">06:00 PM</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="">Location</label>
                                    <select name="location" id="" class="form-control">
                                        @foreach ($Locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
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
                                <li><a href="{{ route('login') }}" style="color: white; font-size: 1.75rem;">Sign In</a>
                                </li>
                                <li><a href="{{ route('register') }}"
                                       style="color: white; font-size: 1.75rem;">Register</a></li>
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
                                            <li><a href="{{ route('logoutUserPage') }}">Logout</a></li>
                                        </ul>


                                    </div>
                                </li>

                                <li><a href="#" data-toggle="modal" data-target="#__cartModal"
                                       style="color:#fff; text-decoration: none;">
                                        <i class="glyphicon glyphicon-shopping-cart"></i> <span class="badge"
                                                                                                style="background: red;">{{ $Cart->where('user_id', '=', Auth::guard('u')->user()->id)->sum('quantity') }}</span>
                                        - <span><small>PHP</small>{{ number_format($Cart->where('user_id', '=', Auth::guard('u')->user()->id)->sum('total'), 2) }}</span>
                                    </a></li>
                                {{--<li><a href="#" data-toggle="modal" data-target="#__cartModal">Cart</a></li>--}}
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="__slider-item">
            <video id="video" autoplay loop preload="none">
                <source src="{{ asset('img/vid_banner.mp4') }}" type="video/mp4">
                <source src="mov_bbb.ogg" type="video/ogg">
                Your browser does not support HTML5 video.
            </video>
        </div>
    </section>

    <br><br><br>
    <div class="container __main-content">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <h3 class="title white">Featured Chefs</h3>
                <div class="__card padding">

                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="6000">


                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">

                            @foreach ($Setting->pull('featured_chefs', 'array') as $key => $value)
                                @php
                                    $pr = $Provider->find($value);
                                @endphp
                                <div class="item {{ $key == 0 ? 'active' : '' }}">
                                    <div class="row">
                                        <div class="col-md-4"><Br/>
                                            <center>
                                                <div class="avatar"
                                                     style="background-image: url('{{ asset('img/providers/' . $pr->picture) }}');"></div>
                                                <br>

                                                <select class="example" readonly>
                                                    @for ($i=1; $i <= 5; $i++)
                                                        <option value="{{ $i }}" {{ $OrderRating->get_provider_rating($pr->id) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </center>
                                        </div>

                                        <div class="col-md-8">
                                            <h2 class="pull-left">{{ $pr->firstname . ' ' . $pr->lastname }}</h2>
                                            <div class="pull-right" style="margin-top: 30px;"><a
                                                        href="{{ route('userPage', $pr->username) }}"><span
                                                            class="label label-primary">View Profile</span></a></div>
                                            <div class="clearfix"></div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam
                                                accusantium rem excepturi, expedita nobis vitae.</p>
                                            <span class="label label-primary">Frozen</span> <span
                                                    class="label label-primary">Cakes</span> <span
                                                    class="label label-primary">Porks</span>
                                        </div>
                                    </div>

                                </div>
                            @endforeach


                            <div class="clearfix"></div>
                        </div>
                        <br/>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @for ($i = 0; $i < count($Setting->pull('featured_chefs', 'array')); $i++)
                                <li data-target="#myCarousel"
                                    data-slide-to="{{ $i }}" {!! $i == 0 ? 'class="active"' : '' !!}></li>
                            @endfor
                        </ol>
                    </div>


                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <h3 class="title white">Featured Foods</h3>
                <div class="__card" style="padding-bottom: .25rem">
                    <div id="foodCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">

                        <div class="clearfix"></div>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @for ($i = 0; $i < count($Setting->pull('features_foods', 'array')); $i++)
                                <li data-target="#foodCarousel"
                                    data-slide-to="{{ $i }}" {!! $i == 0 ? 'class="active"' : '' !!}></li>
                            @endfor
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @foreach ($Setting->pull('features_foods', 'array') as $key => $value)
                                @php
                                    $pr = $Product->find($value);
                                @endphp

                                <div class="item {{ $key == 0 ? 'active' : ''  }}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <center>
                                                <div class="food_avatar"
                                                     style="background-image: url('{{ asset('img/uploads/' . $pr->picture) }}');"></div>
                                            </center>
                                        </div>

                                        <div class="col-md-8 padding-content">
                                            <h2>{{ $pr->name }}</h2>
                                            <select class="example" readonly>
                                                @for ($i=1; $i <= 5; $i++)
                                                    <option value="{{ $i }}" {{ $OrderRating->get_rating($pr->id) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <p>{{ $pr->description }}</p>
                                            <span class="label label-primary">{{ $ProductCategory->find($pr->category_id)->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>


                    </div>

                </div>
            </div>
        </div>

        <h3 class="title">Food Categories</h3>
        <Br/>
        <div id="itemslide" class="row">
            @foreach ($MainCategories as $key => $category)
                <div class="col-md-3">
                    <div class="__card full_bg"
                         style="background-image: url('{{ asset('img/categories/' . $category->image) }}');">
                        <div class="inner"><p>{{ $category->name }}</p></div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

@endsection


@section('script')

@endsection