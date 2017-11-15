@extends('layouts.admin.layouts')

@section('content')
    @include('layouts.admin.navigation')

    @inject('ProductCategoryModel', 'App\Model\ProductCategory')
    @inject('ProductModel', 'App\Model\Product')

    <div class="container">
        <br/><br/><br/>
        <div class="row">

            @include('layouts.admin.side_nav')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Add New Product Category</h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
