@extends('layouts.public.layouts')

@section('content')

    @include('layouts.public.navigation')
    @inject('OrderRating', 'App\Model\OrderRating')

    <style>
        .search-btn {
            margin-top: 5px;
            margin-bottom: 20px;
            font-size: 20px;
            background-color: transparent;
            color: #262262;
        }

        .search-btn:hover, .search-btn:active, .search-btn:focus {
            color: #131130;
        }

        /*ul.pagination > li > a,*/
        /*ul.pagination > li > span{*/
        /*color: #262262!important;*/
        /*border-color: #262262 !important;*/
        /*}*/

        /*ul.pagination > li.active > span{*/
        /*color: #fff !important;*/
        /*background-color: #262262 !important;*/
        /*}*/

        /*ul.pagination > li > a:focus,*/
        /*ul.pagination > li > a:hover*/
        /*{*/
        /*z-index: 3 !important;*/
        /*color: #fff !important;*/
        /*background-color: #262262 !important;*/
        /*border-color: #262262 !important;*/
        /*}*/

    </style>

    <section class="__new __search" id="search-container">

        <div class="__static-item">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="_searchForm" style="margin-top: 50px;">
                            <form action="{{ route('resultPage') }}" class="_form">
                                <input type="hidden" name="type" value="1">
                                <div class="form-group col-md-5">
                                    <label for="" class="pull-left">Product</label>
                                    <div class="pull-right" style="margin-top: -2px; margin-bottom: 2px;">
                                        <span class="label {!! $input->type == 1 ? 'label-primary' : 'label-default' !!} __opt-categ"
                                              data-category="1" style="cursor: pointer">Search By Category</span>
                                        <span class="label {!! $input->type == 2 ? 'label-primary' : 'label-default' !!} __opt-categ"
                                              data-category="2" style="cursor: pointer">Search Dishes</span>
                                    </div>

                                    <div class="clearfix"></div>
                                    <div data-categ="1"
                                         class="__categ-failed" {!! $input->type == 1 ? '' : 'style="display: none;"' !!}>
                                        <select name="category" id="" class="form-control">
                                            <option value="0">All Dishes</option>
                                            @foreach ($MainCategories as $category)
                                                <optgroup label="{{ $category->name }}">
                                                    <option value="{{ $category->id }}" {{ $input->category == $category->id ? 'selected' : '' }}>
                                                        All {{ $category->name }}</option>
                                                    @foreach ($SubCategories($category->id) as $key => $sub)
                                                        <option value="{{ $sub->id }}" {{ $input->category == $sub->id ? 'selected' : '' }}>{{ $sub->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div data-categ="2"
                                         class="__categ-failed" {!! $input->type == 2 ? '' : 'style="display: none;"' !!}>
                                        <input type="text" class="form-control" name="product_name"
                                               placeholder="Search for a dish..." value="{{ $input->product_name }}">
                                    </div>

                                </div>

                                <div class="form-group col-md-3" style="color: #000;">
                                    <div class="joined">
                                        <label for="">Date</label>
                                        <input type="date" class="form-control datepicker" name="date"
                                               placeholder="Date" value="{{ $input->date }}">
                                    </div>
                                    <div class="joined">
                                        <label for="">Time</label>
                                        <select name="time" id="" class="form-control">


                                            <option value="9:00 AM" {{ $input->time == '9:00 AM' ? 'selected' : '' }}>
                                                9:00 AM
                                            </option>
                                            <option value="11:00 AM" {{ $input->time == '11:00 AM' ? 'selected' : '' }}>
                                                11:00 AM
                                            </option>
                                            <option value="12:00 PM" {{ $input->time == '12:00 PM' ? 'selected' : '' }}>
                                                12:00 NN
                                            </option>
                                            <option value="02:00 PM" {{ $input->time == '02:00 PM' ? 'selected' : '' }}>
                                                02:00 PM
                                            </option>
                                            <option value="04:00 PM" {{ $input->time == '04:00 PM' ? 'selected' : '' }}>
                                                04:00 PM
                                            </option>
                                            <option value="06:00 PM" {{ $input->time == '06:00 PM' ? 'selected' : '' }}>
                                                06:00 PM
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="">Pick-up Station</label>
                                    <select name="location" id="" class="form-control">
                                        @foreach ($Locations as $location)
                                            <option value="{{ $location->id }}" {{ $input->location == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
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

        <div class="__slider-item"
             style="background-image: url('https://images.unsplash.com/photo-1424847651672-bf20a4b0982b?auto=format&fit=crop&w=1350&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D')"></div>

    </section>



    <div class="container" style="background-color: transparent;">

        <div class="row">
            <button class="search-btn btn pull-right" id="search-btn"><i class="fa fa-search"></i> &nbsp;Search</button>
        </div>

        <div class="row">
            <div class="col-md-12">


                <div class="pull-right">
                    <form class="pull-right" id="filter-form" action="{{ route('resultPage') }}">

                        <input type="hidden" name="type" value="{{$input->type}}">
                        <input type="hidden" name="category" value="{{$input->category}}">
                        <input type="hidden" name="date" value="{{$input->date}}">
                        <input type="hidden" name="time" value="{{$input->time}}">
                        <input type="hidden" name="location" value="{{$input->location}}">
                        <input type="hidden" name="sort" value="{{$input->sort}}">

                        <div class="dropdown pull-right">
                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Filter
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu filter" style="padding: 3px;">
                                <li class="dropdown-header">Price Range</li>
                                <li style="padding: 5px;">
                                    Php <input type="text" name="amount_from" id="amount-from" readonly
                                           style="border:0; display: inline; width: 20%; text-align: center;" value="{{$input->amount_from}}">
                                    -
                                    Php <input type="text" name="amount_to" id="amount-to" readonly
                                           style="border:0;  display: inline; width: 20%; text-align: center;" value="{{$input->amount_to}}">
                                </li>
                                <li>
                                    <div id="slider-range"></div>
                                </li>
                                <li style="padding: 5px">
                                    <button id="filter-btn-submit" type="submit" class="btn btn-primary pull-right" style="padding: 2px; font-size: 10px;">
                                        Submit
                                    </button>
                                </li>

                                {{--<li class="divider"></li>--}}
                                {{--<li class="dropdown-header">Filter By Chef</li>--}}
                                {{--<li style="padding: 5px;">--}}
                                {{--<select name="category" id="" style="width: 100%;" class="form-control"></select>--}}
                                {{--</li>--}}
                            </ul>
                        </div>

                    </form>


                    <form class="pull-right" id="sort-form" action="{{ route('resultPage') }}">

                        <input type="hidden" name="type" value="{{$input->type}}">
                        <input type="hidden" name="category" value="{{$input->category}}">
                        <input type="hidden" name="date" value="{{$input->date}}">
                        <input type="hidden" name="time" value="{{$input->time}}">
                        <input type="hidden" name="location" value="{{$input->location}}">
                        <input type="hidden" name="amount_from" value="{{$input->amount_from}}">
                        <input type="hidden" name="amount_to" value="{{$input->amount_to}}">
                        <input type="hidden" id="sort-by" name="sort" value="">

                        <div class="dropdown pull-right" style="margin-right: 20px;">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Sort By
                                <span class="caret"></span></button>


                            <ul class="dropdown-menu">
                                <li class="dropdown-header">Sort By Price</li>
                                <li><a onclick="sort(1)">High to Low</a></li>
                                <li><a onclick="sort(2)">Low to High</a></li>
                                {{--<li class="divider"></li>--}}
                                {{--<li class="dropdown-header">Sort By Rating</li>--}}
                                {{--<li><a onclick="sort(3)">High to Low</a></li>--}}
                                {{--<li><a onclick="sort(4)">Low to High</a></li>--}}
                            </ul>


                        </div>

                    </form>
                </div>


                <div>
                    @if ($results != null)
                        {{$results->appends(Input::except('page'))->links()}}
                    @endif
                </div>

            </div>
            <Br/>
            <div class="col-md-12">

                @if ($results != null)
                    <div class="row display-flex" style="margin: 5px">


                        @foreach ($results as $key => $product)
                            <div class="col-md-3 col-xs-6 col-sm-6" style="padding: 0px 5px 0px 5px" data-toggle="modal"
                                 data-target="#_loginModal">
                                {{--<div class="col-md-3 col-xs-6 col-sm-6" style="padding: 0px 5px 0px 5px" data-toggle="modal"--}}
                                {{--data-target="#product-modal{{$product->id}}">--}}

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
                                                @if ($product->sale_price != 0 || $product->sale_price != null)
                                                    <h5 class="price">{{ number_format($product->sale_price, 2) }}</h5>
                                                    <h5 class="price" style="margin-top: -10px;">
                                                        <small>From</small>
                                                        <small style="text-decoration: line-through;">{{ number_format($product->price, 2) }}</small>
                                                    </h5>
                                                @else
                                                    <h5 class="price">{{ number_format($product->price, 2) }}</h5>
                                                    <h5 class="price" style="margin-top: -10px;">&nbsp;</h5>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <a href="{{ route('userPage',  $Provider($product->provider_id)->username) }}">
                                                <div class="col-md-12">
                                                    <div class="avatar small pull-left"
                                                         style="background-image: url('{{ asset('img/providers/'. $Provider($product->provider_id)->picture) }}');"></div>
                                                    <div class="pull-left" style="margin-left: 10px; margin-top: -3px;">
                                                        <h6>
                                                            <small>By</small>
                                                        </h6> {{ $Provider($product->provider_id)->firstname . ' ' .  $Provider($product->provider_id)->lastname }}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        @if (Auth::guard('u')->check())
                                            <div class="add-to-cart">
                                                <center>
                                                    <form class="" action="{{ route('addCartPage') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="prid" value="{{ $product->id }}">
                                                        <input type="hidden" name="crdate" value="{{ $input->date }}">
                                                        <input type="hidden" name="crtime" value="{{ $input->time }}">
                                                        <input type="hidden" name="loca" value="{{ $input->location }}">
                                                        <button class="btn btn-primary btn-xs">Add to Cart</button>
                                                    </form>
                                                </center>
                                            </div>
                                        @else
                                            <div class="add-to-cart">
                                                <center>
                                                    <button class="btn btn-disabled btn-xs"
                                                            onclick="alert('Login First')">Add to Cart
                                                    </button>
                                                </center>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{--<div id="product-modal{{$product->id}}" class="modal fade" role="dialog">--}}
                            {{--<div class="modal-dialog">--}}
                            {{--<div class="modal-content">--}}
                            {{--<div class="modal-body">--}}
                            {{--<div class="__img">--}}
                            {{--<div style="background-image: url('{{ asset('img/uploads/' . $product->picture) }}')"></div>--}}
                            {{--</div>--}}

                            {{--<div class="content">--}}
                            {{--<center>--}}
                            {{--<select class="example" readonly>--}}
                            {{--@for ($i=1; $i <= 5; $i++)--}}
                            {{--<option value="{{ $i }}" {{ $OrderRating->get_rating($product->id) == $i ? 'selected' : '' }}>{{ $i }}</option>--}}
                            {{--@endfor--}}
                            {{--</select>--}}
                            {{--</center>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-md-7 col-xs-7 col-sm-7">--}}
                            {{--<h6 class="title">{{ $product->name }}</h6>--}}
                            {{--</div>--}}

                            {{--<div class="col-md-5 col-xs-5 col-sm-5">--}}
                            {{--<h6>PHP</h6>--}}
                            {{--@if ($product->sale_price != 0 || $product->sale_price != null)--}}
                            {{--<h5 class="price">{{ number_format($product->sale_price, 2) }}</h5>--}}
                            {{--<h5 class="price" style="margin-top: -10px;">--}}
                            {{--<small>From</small>--}}
                            {{--<small style="text-decoration: line-through;">{{ number_format($product->price, 2) }}</small>--}}
                            {{--</h5>--}}
                            {{--@else--}}
                            {{--<h5 class="price">{{ number_format($product->price, 2) }}</h5>--}}
                            {{--<h5 class="price" style="margin-top: -10px;">&nbsp;</h5>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                            {{--<a href="{{ route('userPage',  $Provider($product->provider_id)->username) }}">--}}
                            {{--<div class="col-md-12">--}}
                            {{--<div class="avatar small pull-left"--}}
                            {{--style="background-image: url('{{ asset('img/providers/'. $Provider($product->provider_id)->picture) }}');"></div>--}}
                            {{--<div class="pull-left"--}}
                            {{--style="margin-left: 10px; margin-top: -3px;">--}}
                            {{--<h6>--}}
                            {{--<small>By</small>--}}
                            {{--</h6> {{ $Provider($product->provider_id)->firstname . ' ' .  $Provider($product->provider_id)->lastname }}--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</a>--}}
                            {{--</div>--}}

                            {{--@if (Auth::guard('u')->check())--}}
                            {{--<div class="add-to-cart">--}}
                            {{--<center>--}}
                            {{--<form class="" action="{{ route('addCartPage') }}"--}}
                            {{--method="post">--}}
                            {{--{{ csrf_field() }}--}}
                            {{--<input type="hidden" name="prid"--}}
                            {{--value="{{ $product->id }}">--}}
                            {{--<input type="hidden" name="crdate"--}}
                            {{--value="{{ $input->date }}">--}}
                            {{--<input type="hidden" name="crtime"--}}
                            {{--value="{{ $input->time }}">--}}
                            {{--<input type="hidden" name="loca"--}}
                            {{--value="{{ $input->location }}">--}}
                            {{--<button class="btn btn-primary btn-xs">Add to Cart--}}
                            {{--</button>--}}
                            {{--</form>--}}
                            {{--</center>--}}
                            {{--</div>--}}
                            {{--@else--}}
                            {{--<div class="add-to-cart">--}}
                            {{--<center>--}}
                            {{--<button class="btn btn-disabled btn-xs">Add to Cart</button>--}}
                            {{--</center>--}}
                            {{--</div>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        @endforeach


                    </div>

                @else
                    <div class="col-md-12">

                        <center>
                            <h3>No Results</h3>
                        </center>
                    </div>
                @endif
            </div>
        </div>
        <div>
            @if ($results != null)
                <center>{{$results->appends(Input::except('page'))->links()}}</center>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // window.scrollTo(0, 500);

        //$('.__new').hide();

        $('#search-btn').click(function () {
            $(this).hide();

            //$('.__new').show();

            $('#search-container').css({'height': '600px'});
        });

        function sort(val) {
            $('#sort-by').val(val);

            $('#sort-form').submit();
        }

        $('#filter-btn-submit').click(function(){
            $('#filter-form').submit();
        });

        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 2000,
            values: [{{$input->amount_from != null ? $input->amount_from : 150}}, {{$input->amount_to != null ? $input->amount_to : 1500}}],
            slide: function slide(event, ui) {
                $("#amount-from").val(ui.values[0]);
                $("#amount-to").val(ui.values[1]);
            }
        });

        $("#amount-from").val($("#slider-range").slider("values", 0));
        $("#amount-to").val($("#slider-range").slider("values", 1));


    </script>


@endsection
