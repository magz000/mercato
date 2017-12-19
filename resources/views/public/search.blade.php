@extends('layouts.public.layouts')

@section('content')

     @include('layouts.public.navigation')
     @inject('OrderRating', 'App\Model\OrderRating')

    <section class="__image-slider __search">

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
                                <span class="label {!! $input->type == 1 ? 'label-primary' : 'label-default' !!} __opt-categ" data-category="1" style="cursor: pointer">Search By Category</span>
                                <span class="label {!! $input->type == 2 ? 'label-primary' : 'label-default' !!} __opt-categ" data-category="2" style="cursor: pointer">Search Dishes</span>
                            </div>

                            <div class="clearfix"></div>
                            <div data-categ="1" class="__categ-failed"  {!! $input->type == 1 ? '' : 'style="display: none;"' !!}>
                                <select name="category" id="" class="form-control">
                                    <option value="0">All Dishes</option>
                                    @foreach ($MainCategories as $category)
                                        <optgroup label="{{ $category->name }}">
                                            <option value="{{ $category->id }}" {{ $input->category == $category->id ? 'selected' : '' }}>All {{ $category->name }}</option>
                                            @foreach ($SubCategories($category->id) as $key => $sub)
                                                    <option value="{{ $sub->id }}" {{ $input->category == $sub->id ? 'selected' : '' }}>{{ $sub->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>

                            <div data-categ="2" class="__categ-failed" {!! $input->type == 2 ? '' : 'style="display: none;"' !!}>
                                <input type="text" class="form-control" name="product_name" placeholder="Search for a dish..." value="{{ $input->product_name }}">
                            </div>

                            </div>

                            <div class="form-group col-md-3">
                              <div class="joined">
                                <label for="">Date</label>
                                <input id="date" type="text" class="form-control" name="date" placeholder="Date" value="{{ $input->date }}">
                              </div>
                              <div class="joined">
                                <label for="">Time</label>
                                <select name="time" id="" class="form-control">
                                    <option value="9:00 AM" {{ $input->time == '9:00 AM' ? 'selected' : '' }}>9:00 AM</option>
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


        <div class="__slider-item" style="background-image: url('https://images.unsplash.com/photo-1424847651672-bf20a4b0982b?auto=format&fit=crop&w=1350&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D')"></div>
    </section>

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
                               <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                          </li>
                          <li class="divider"></li>
                          <li class="dropdown-header">Filter By Chef</li>
                          <li style="padding: 5px;">
                              <select name="category" id="" style="width: 100%;" class="form-control"></select>
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

                    @if ($results != null)
                        @foreach ($results as $key => $product)
                            <div class="col-md-3 col-xs-6 col-sm-6" data-toggle="modal" data-target="#_loginModal">
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
                                                    <h5 class="price" style="margin-top: -10px;"><small>From </small><small  style="text-decoration: line-through;">{{ number_format($product->price, 2) }}</small></h5>
                                                @else
                                                    <h5 class="price">{{ number_format($product->price, 2) }}</h5>
                                                    <h5 class="price" style="margin-top: -10px;">&nbsp;</h5>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <a href="{{ route('userPage',  $Provider($product->provider_id)->username) }}">
                                                <div class="col-md-12">
                                                    <div class="avatar small pull-left" style="background-image: url('{{ asset('img/providers/'. $Provider($product->provider_id)->picture) }}');"></div>
                                                    <div class="pull-left" style="margin-left: 10px; margin-top: -3px;"><h6><small>By</small></h6> {{ $Provider($product->provider_id)->firstname . ' ' .  $Provider($product->provider_id)->lastname }}</div>
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
                                                    <button class="btn btn-disabled btn-xs" >Add to Cart</button>
                                                </center>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        window.scrollTo(0, 500);
    </script>


@endsection
