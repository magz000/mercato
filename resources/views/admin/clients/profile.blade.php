@extends('layouts.public.layouts')

@section('content')
    @include('layouts.public.navigation')
    @inject('OrderContent', 'App\Model\OrderContent')
    @inject('Product', 'App\Model\Product')
    @inject('Provider', 'App\Model\Provider')
    @inject('Order', 'App\Model\Order')

    <div class="container">
        <br/><br/><Br/>
        <div class="row">

            @include('layouts.admin.side_nav')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Profile</h4>
                        <br/>
                        {{--<form class="" action="{{ route('userProfileProcess') }}" method="post">--}}
{{--                            {{ csrf_field() }}--}}
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Profile Picture</label>
                                    <center>
                                        <div id="upload-demo"></div>
                                        {{--<label for="upload" class="btn btn-primary btn-xs">--}}
                                            {{--Choose a File--}}
                                            {{--<input type="file" class="hidden" id="upload" value="Choose a file" accept="image/*" />--}}
                                            {{--<textarea name="image_base64" class="hidden"></textarea>--}}
                                        {{--</label>--}}
                                    </center>
                                </div>

                                <div class="col-md-8">
                                    <br/>
                                    <br/>
                                    <div class="row">

                                        @if($client->is_establishment == 1)
                                            <div class="form-group col-md-10">
                                                <label for="">Establishment Name</label>
                                                <input type="text" name="firstname" class="form-control" value="{{ $client->firstname .' '. $client->lastname }}">
                                            </div>

                                        @else
                                            <div class="form-group col-md-4">
                                                <label for="">First Name</label>
                                                <input type="text" name="firstname" class="form-control" value="{{ $client->firstname }}">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Middle Name</label>
                                                <input type="text" name="middlename" class="form-control" value="{{ $client->middlename }}">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Last Name</label>
                                                <input type="text" name="lastname" class="form-control" value="{{ $client->lastname }}">
                                            </div>


                                        @endif



                                        <div class="form-group col-md-6">
                                            <label for="">Street</label>
                                            <input type="text" name="street" value="{{ $client->street }}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Baranggay</label>
                                            <input type="text" name="barangay" value="{{ $client->barangay }}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">City</label>
                                            <input type="text" name="city" value="{{ $client->city }}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">State</label>
                                            <input type="text" name="state" value="{{ $client->state }}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Postal Code</label>
                                            <input type="text" name="postal_code" value="{{ $client->postal_code }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--<button id="_submit" class="pull-right btn btn-success" {{$client->is_establishment == 1 ? 'disabled' : ''}}>Update Profile</button>--}}
                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('stylesheet')
    <link rel="stylesheet" href="/bower_components/Croppie/croppie.css">
@endsection

@section('scripts')
    <script src="/bower_components/Croppie/croppie.min.js" charset="utf-8"></script>
    <script type="text/javascript">
        $(function() {
            var el = document.getElementById('upload-demo');

            var vanilla = new Croppie(el, {
                url     : "{{ $client->picture == '' ? asset('img/placeholder.jpg') : asset('img/users/'. $client->picture) }}",
                viewport: { width: 300, height: 300 },
                boundary: { width: 300, height: 300 },
            });

            $('#_submit').click(function() {
                vanilla.result('base64').then(function(data) {
                    $('textarea[name="image_base64"]').val(data);
                });
            });

            $('#upload').on('change', function() {
                var reader = new FileReader();
                reader.onload = function (e) {
                    vanilla.bind({
                        url: e.target.result
                    });
                }

                reader.readAsDataURL(this.files[0]);
            });

            $('select[name="category"]').select2();

        });
    </script>
@endsection
