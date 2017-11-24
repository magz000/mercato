@extends('layouts.admin.layouts')

@section('content')
    @include('layouts.admin.navigation')

    <div class="container">
        <br/><br/><br/>
        <div class="row">

            @include('layouts.admin.side_nav')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Add New Product Category</h4>

                        <br/>
                        <form class="" action="{{ route('admin.location.add.process') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Pick-up Point Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Color</label>
                                        <div class="clearfix"></div>
                                        <div class="col-md-3">
                                            <input type="color" name="color" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"><br/></div>
                            <button id="_submit" class="btn btn-success">Add Pick-up Point</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
