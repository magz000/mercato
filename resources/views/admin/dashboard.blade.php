@extends('layouts.admin.layouts')

@section('content')
    @include('layouts.admin.navigation')

    @inject('Client', 'App\Model\User')
    @inject('Provider', 'App\Model\Provider')
    @inject('Product', 'App\Model\Product')
    @inject('Order', 'App\Model\Order')
    @inject('OrderContent', 'App\Model\OrderContent')
    @inject('Report', 'App\Model\Reports')
    @inject('Location', 'App\Model\Location')

    <div class="container">
        <br/><br/><br/>
        <div class="row">

            @include('layouts.admin.side_nav')

            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4>No. of Clients</h4>
                                <center>
                                    <h1>{{ $Client->all()->count() }}</h1>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4>No. of Providers</h4>
                                <center>
                                    <h1>{{ $Provider->all()->count() }}</h1>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4>No. of Products</h4>
                                <center>
                                    <h1>{{ $Product->all()->count() }}</h1>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4>No. of Orders</h4>
                                <center>
                                    <h1>{{ $OrderContent->all()->count() }}</h1>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4>No. of Expired Contents</h4>
                                <center>
                                    <h1>{{ $OrderContent->where('status', '=', '4')->count() }}</h1>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4>No. of Completed Orders</h4>
                                <center>
                                    <h1>{{ $OrderContent->where('status', '=', '3')->count() }}</h1>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h5 class="pull-left">{{ $input->sr != null ? $input->sr : 'Daily' }} Sales Graphical Chart</h5>
                                <div class="pull-right" style="padding-top: 8px;">
                                    <a href="{{ route('admin.dashboard') }}?sr=Daily"><button class="btn btn-default btn-xs">Daily</button></a>
                                    <a href="{{ route('admin.dashboard') }}?sr=Weekly"><button class="btn btn-default btn-xs">Weekly</button></a>
                                    <a href="{{ route('admin.dashboard') }}?sr=Monthly"><button class="btn btn-default btn-xs">Monthly</button></a>
                                    <a href="{{ route('admin.dashboard') }}?sr=Annually"><button class="btn btn-default btn-xs">Annually</button></a>
                                </div>
                                <div class="clearfix"></div>

                                <canvas id="myChart" width="undefined" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h5 class="pull-left">{{ $input->slr != null ? $input->slr : 'Daily' }} Sales of Location Graphical Chart</h5>
                                {{-- <div class="pull-right" style="padding-top: 8px;">
                                    <a href="{{ route('admin.dashboard') }}?slr=Daily"><button class="btn btn-default btn-xs">Daily</button></a>
                                    <a href="{{ route('admin.dashboard') }}?slr=Weekly"><button class="btn btn-default btn-xs">Weekly</button></a>
                                    <a href="{{ route('admin.dashboard') }}?slr=Monthly"><button class="btn btn-default btn-xs">Monthly</button></a>
                                    <a href="{{ route('admin.dashboard') }}?slr=Anually"><button class="btn btn-default btn-xs">Annually</button></a>
                                </div> --}}
                                <div class="clearfix"></div>

                                <canvas id="LocationChart" width="undefined" height="100"></canvas>
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

            @php
                $locations = $Location->all();
                $plocs = array();
                $total = array();
                $color = array();
                foreach ($locations as $key => $location) {
                    $plocs[] = explode('-', $location->name)[0];
                    $total[] = $OrderContent->where('pickup_location', '=', $location->id)->where('status', '=', 4)->sum('total');
                    $color[] = $location->color;
                }
            @endphp

            var ctx2 = document.getElementById("LocationChart");
            var myChart = new Chart(ctx2, {
                "type":"horizontalBar",
                "data":{
                    "labels":[{!! '"'. implode('","', $plocs) . '"' !!}],
                    "datasets":[
                        {
                            "label":"Total Sales",
                            "data":[{{ implode(',', $total) }}],
                            "fill":false,
                            "backgroundColor":[
                                {!! '"'. implode('","', $color) . '"' !!}
                            ]
                        }
                    ]
                },
                    "options":{
                        "scales":{
                            "yAxes":[
                                {
                                    "ticks":{
                                        "beginAtZero":true
                                    }
                                }
                            ]
                        }
                    }
                }
            );


            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                "type":"line",
                "data":{
                    "labels":["0", {!! '"'. implode('","', $Report->sales_graph($input->sr)['label']) . '"' !!}],
                    "datasets":[
                        {
                            "label":"Sales",
                            "data":[0, {{ implode(',', $Report->sales_graph($input->sr)['sales']) }}],
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
