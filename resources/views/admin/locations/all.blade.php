@extends('layouts.admin.layouts')

@section('content')
    @include('layouts.admin.navigation')

    @inject('ProductCategoryModel', 'App\Model\ProductCategory')
    @inject('ProductModel', 'App\Model\Product')
    @inject('ProviderLocation', 'App\Model\ProviderLocation')

    <div class="container">
        <br/><br/><br/>
        <div class="row">

            @include('layouts.admin.side_nav')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="pull-left">Pickup Locations</h4>
                        <a href="{{ route('admin.location.add') }}" style="margin-top: 7px;" class="pull-right"><button class="btn-primary btn-xs">Add new Pickup Location</button></a>

                        <div class="clearfix"></div>
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>No. of Providers</th>
                                <th>Option</th>
                            </thead>
                            <tbody>
                                @foreach ($locations as $key => $location)
                                    <tr>
                                        <td>{{ $location->name }}</td>
                                        <td>{{ $ProviderLocation->where('location', '=', $location->id)->count() }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-default dropdown-toggle btn-xs" type="button" data-toggle="dropdown">
                                                    Options <span class="caret"></span>
                                                </button>

                                                <ul class="dropdown-menu">
                                                    <li class="small"><a href="{{ route('admin.location.edit', $location->id) }}">Edit</a></li>
                                                    <li class="small"><a href="{{ route('admin.provider.products', $location->id) }}">Delete</a></li>
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
