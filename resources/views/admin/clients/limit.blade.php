@extends('layouts.admin.layouts')

@section('content')
    @include('layouts.admin.navigation')

    <div class="container">
        <Br/><Br/><Br/>
        <div class="row">

            @include('layouts.admin.side_nav')


            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Limited Location of {{ $client->firstname . ' ' . $client->lastname }}</h4>

                        <button class="btn btn-success"  data-toggle="modal" data-target="#add-location-modal">Add Location</button>

                        <table class="table">
                            <thead>
                            <th>Location Name</th>
                            <th>Action</th>
                            </thead>

                            <tbody>
                            @foreach ($client->location as $key => $location)
                                <tr>
                                    <td>{{ $key+1 . '.) ' . $location->location->name }}</td>

                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle btn-xs" type="button"
                                                    data-toggle="dropdown">
                                                Options <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">
                                                <li class="small"><a class="delete-btn" data-id="{{$location->id}}" data-toggle="modal" data-target="#delete-location-modal">Delete</a></li>
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


    <div id="add-location-modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">

            <form id="delete-form" class="form-horizontal" method="POST" action="{{route('admin.client.location.add', $client->id)}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title"><b>Create BEO</b></h5>
                    </div>
                    <div class="modal-body" style="padding: 10px;">
                        {{ csrf_field() }}
                        <div class="row" style="padding: 0px 15px;">
                            <div class="form-group col-md-10">
                                <label for="">Pick-up Station</label>
                                <select name="location" id="" class="form-control">
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--<input type="hidden" name="_method" value="delete"/>--}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div id="delete-location-modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">

            <form id="delete-form" class="form-horizontal" method="POST" action="{{route('admin.client.location.delete')}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title"><b>Delete Location</b></h5>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this location limit?.</p>

                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="delete"/>
                        <input type="hidden" id="delete-id" name="id"/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $('.delete-btn').click(function(){
            // $('#delete-form').attr('action', '/admin/client/' + $(this).attr('data-id') + '/location/delete');
            $('#delete-id').val($(this).attr('data-id'));

            console.log($('#delete-form').attr('action'));
        });
    </script>
@endsection