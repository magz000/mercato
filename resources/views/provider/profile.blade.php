@extends('layouts.public.layouts')

@section('content')
    @include('layouts.public.navigation')
    @inject('OrderContent', 'App\Model\OrderContent')
    @inject('Product', 'App\Model\Product')
    @inject('Provider', 'App\Model\Provider')
    @inject('Order', 'App\Model\Order')
    @inject('Location', 'App\Model\Location')
    @inject('ProviderLocation', 'App\Model\ProviderLocation')

    <div class="container">
        <br/><br/><Br/>
        <div class="row">

            @include('layouts.users.side_nav')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Profile</h4>
                        <br/>
                        <form class="" action="{{ route('providerProfileProcess') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Profile Picture</label>
                                    <center>
                                        <div id="upload-demo"></div>
                                        <label for="upload" class="btn btn-primary btn-xs">
                                            Choose a File
                                            <input type="file" class="hidden" id="upload" value="Choose a file" accept="image/*" />
                                            <textarea name="image_base64" class="hidden"></textarea>
                                        </label>
                                    </center>
                                </div>

                                <div class="col-md-8">
                                    <br/>
                                    <br/>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="">First Name</label>
                                            <input type="text" name="firstname" class="form-control" value="{{ Auth::guard('p')->user()->firstname }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Middle Name</label>
                                            <input type="text" name="middlename" class="form-control" value="{{ Auth::guard('p')->user()->middlename }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Last Name</label>
                                            <input type="text" name="lastname" class="form-control" value="{{ Auth::guard('p')->user()->lastname }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">Street</label>
                                            <input type="text" name="street" value="{{ Auth::guard('p')->user()->street }}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Baranggay</label>
                                            <input type="text" name="barangay" value="{{ Auth::guard('p')->user()->barangay }}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">City</label>
                                            <input type="text" name="city" value="{{ Auth::guard('p')->user()->city }}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">State</label>
                                            <input type="text" name="state" readonly value="{{ Auth::guard('p')->user()->state }}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Postal Code</label>
                                            <input type="text" name="postal_code" value="{{ Auth::guard('p')->user()->postal_code }}" class="form-control">
                                        </div>

                                        <div class="col-md-12">
                                            <h2>Locations</h2>

                                            <div class="form-group">
                                                <select name="location[]" id="" class="form-control" multiple placeholder="Search for Location">
                                                  @foreach ($Location->all() as $location)
                                                      @php
                                                        $select = $ProviderLocation->where('provider_id','=', Auth::guard('p')->user()->id)->where('location', '=', $location->id)->first();
                                                      @endphp
                                                      <option value="{{ $location->id }}" {{ $select != null ? 'selected' : '' }}>{{ $location->name }}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <h2>Profile Page</h2>

                                            <div class="form-group">
                                                <label for="">Bio</label>
                                                <textarea name="bio" class="form-control" placeholder="Write someting about yourself...">{{ Auth::guard('p')->user()->bio }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button id="_submit" class="pull-right btn btn-success">Update Profile</button>
                        </form>
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

            $('select[name="location[]"]').select2({
                placeholder : 'Search Location',
                duplicate : false
            });

            var el = document.getElementById('upload-demo');

            var vanilla = new Croppie(el, {
                url     : "{{ Auth::guard('p')->user()->picture == '' ? asset('img/placeholder.jpg') : asset('img/providers/'. Auth::guard('p')->user()->picture) }}",
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
