@extends('layouts.public.layouts')

@section('content')
    @include('layouts.providers.navigation')

    <div class="container">
        <br/><br/></br>
        <div class="row">

            @include('layouts.providers.side_nav')

            @inject('OrderContentModel', 'App\Model\OrderContent')
            @inject('OrderModel',        'App\Model\Order')
            @inject('ProductModel',      'App\Model\Product')
            @inject('ProviderModel',      'App\Model\Provider')
            @inject('OrderRatingModel',      'App\Model\OrderRating')
            @inject('ProductModel',      'App\Model\Product')



            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h5>No. of Pending Orders</h5>
                                <center>
                                    <h1>{{ $OrderContentModel->where('provider_id', '=', Auth::guard('p')->user()->id)->where('status', '=', 0)->groupBy('order_id')->count() }}</h1>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h5>No. of Completed Orders</h5>
                                <center>
                                    <h1>{{ $OrderContentModel->where('provider_id', '=', Auth::guard('p')->user()->id)->groupBy('order_id')->count() }}</h1>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h5>Total Sales</h5>
                                <center>
                                    <h1>{{ number_format($OrderContentModel->where('provider_id', '=', Auth::guard('p')->user()->id)->where('status', '=', '3')->sum('total'), 2) }}</h1>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h5 class="pull-left">Monthly Sales Graphical Chart</h5>
                                <div class="pull-right" style="padding-top: 8px;">
                                    <button class="btn btn-default btn-xs">Daily</button>
                                    <button class="btn btn-default btn-xs">Weekly</button>
                                    <button class="btn btn-default btn-xs">Monthly</button>
                                    <button class="btn btn-default btn-xs">Annually</button>
                                </div>
                                <div class="clearfix"></div>

                                <canvas id="myChart" width="undefined" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(function() {
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                "type":"line",
                "data":{
                    "labels":["January","February","March","April","May","June","July"],
                    "datasets":[
                        {
                            "label":"Sales",
                            "data":[65,59,80,81,56,55,40],
                            "fill":false,
                            "borderColor":"rgb(75, 192, 192)",
                            "lineTension":0.1
                        }
                    ]
                },
                "options":{

                }
            }
        );
    });
    </script>
@endsection
