@extends('layouts.public.layouts')

@section('content')
    @include('layouts.providers.navigation')

    <div class="container">
        <div class="row">
            <br/><Br/><br/>
            @include('layouts.providers.side_nav')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 >Edit Product</h4>
                        <br/>
                        <form class="" action="{{ route('providerProductEditProcess', $product->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Image</h4>
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
                                    <h4>Product Details</h4>
                                    <Br/>
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $product->name }}">
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Price</label>
                                                <input type="number" name="price" class="form-control" placehoder="Price" value="{{ $product->price }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Quantity</label>
                                                <input type="number" name="quantity" class="form-control" placehoder="Quantity" value="{{ $product->qty }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select name="category" id="" class="form-control">
                                            @foreach ($MainCategories as $category)
                                                <optgroup label="{{ $category->name }}">
                                                    @foreach ($SubCategories($category->id) as $key => $sub)
                                                            <option value="{{ $sub->id }}" {{ $product->category_id == $sub->id ? 'selected' : '' }}>{{ $sub->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" placeholder="Product Description" class="form-control">{{ $product->description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Available From</label>
                                                <input type="text" name="start" class="form-control datetimepicker" value="{{ $product->day_start }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Available To</label>
                                                <input type="text" name="end" class="form-control datetimepicker" value="{{ $product->day_end }}">
                                            </div>

                                            <div class="col-md-12">
                                                <Br/>
                                                <label for="non_expiry" data-toggle="tooltip" title="Date Availability will be disregarded if checked">
                                                    <input type="checkbox" name="non_expiry" value="1" id="non_expiry" {{ $product->non_expiry == 1 ? 'checked' : '' }}> Available All the Time
                                                </label>
                                                <br/>
                                                <label for="display" data-toggle="tooltip" title="If Checked it will be displayed on Search Result.">
                                                    <input type="checkbox" name="status" value="1" id="display" checked> Display on Search
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <button id="_submit" class="btn btn-success pull-right">Save Product</button>
                                    <br/>
                                </div>
                            </div>
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
            var el = document.getElementById('upload-demo');

            var vanilla = new Croppie(el, {
                url     : "{{ asset('img/uploads/' . $product->picture) }}",
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
