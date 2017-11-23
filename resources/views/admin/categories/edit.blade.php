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
                        <h4>Update Product Category</h4>

                        <br/>
                        <form class="" action="{{ route('admin.category.edit.process', $categ->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Category Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $categ->name }}">
                                    </div>

                                    <div class="form-group">
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-primary {{ $categ->parent == null ? 'active' : '' }}" style="width: 150px;">
                                              <input type="radio" name="category_type" id="option2" value="1" autocomplete="off" {{ $categ->parent == null ? 'checked' : '' }}>
                                              Main Category
                                            </label>

                                            <label class="btn btn-primary {{ $categ->parent == null ? '' : 'active' }}" style="width: 150px;">
                                              <input type="radio" name="category_type" id="option3" value="2" autocomplete="off" {{ $categ->parent == null ? '' : 'checked' }}>
                                              Sub Category
                                            </label>
                                          </div>
                                    </div>

                                    <div class="form-group __1" {!! $categ->parent != null ? 'style="display: none;"' : '' !!}>
                                        <center>
                                            <div id="upload-demo"></div>
                                            <label for="upload" class="btn btn-primary btn-xs">
                                                Choose a File
                                                <input type="file" class="hidden" id="upload" value="Choose a file" accept="image/*" />
                                                <textarea name="image_base64" class="hidden"></textarea>
                                            </label>
                                        </center>
                                    </div>

                                    <div class="form-group __2" {!! $categ->parent != null ? '' : 'style="display: none;"' !!} >
                                        <label for="">Sub Category of</label>
                                        <select name="parent" id="" class="form-control">
                                            @foreach ($categories as $key => $value)
                                                <option value="{{ $value->id }}" {{ $categ->parent != null && $categ->parent == $value->id ? 'selected' : ''  }}>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button id="_submit" class="btn btn-success">Update Category</button>
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
                url     : "{{ $categ->parent == null ? asset('img/categories/' . $categ->image) : asset('img/placeholder.jpg') }}",
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


            $('input[name="category_type"]').change(function() {
                var v = $(this).val();

                $('.__1').slideToggle('fast');
                $('.__2').slideToggle('fast');

            });
        });
    </script>
@endsection
