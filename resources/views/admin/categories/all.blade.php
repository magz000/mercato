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
                        <h4>Product Categories</h4>
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Sub Of</th>
                                <th># of Products</th>
                                <th>Option</th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->parent !== null ? $ProductCategoryModel->find($category->parent)->name : '-' }}</td>
                                        <td>{{ $ProductModel->where('category_id', '=', $category->id)->count() }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-default dropdown-toggle btn-xs" type="button" data-toggle="dropdown">
                                                    Options <span class="caret"></span>
                                                </button>

                                                <ul class="dropdown-menu">
                                                    <li class="small"><a href="{{ route('admin.provider.profile', $category->id) }}">Edit</a></li>
                                                    <li class="small"><a href="{{ route('admin.provider.products', $category->id) }}">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
