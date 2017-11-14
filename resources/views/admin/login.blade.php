@extends('layouts.admin.layouts')

@section('content')

    <style media="screen">
        body {
            background: url('{{ asset('img/admin_login.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>

    <div id="__loginAdmin" class="modal fade" role="dialog">
      <div class="modal-dialog modal-sm" style="width: 335px; margin-top: calc(18% - 150px);">
          <center>
              <h1 style="color: #fff;">Virtual Mercato</h1>
          </center>

          {{ bcrypt("password") }}
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Admin Login</h4>
          </div>
          <form class="" action="{{ route('admin.login.process') }}" method="post">
              {{ csrf_field() }}
              <div class="modal-body">
                  <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" placeholder="Email Address" name="email" class="form-control">
                  </div>

                  <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" placeholder="Password" name="password" class="form-control">
                  </div>
                  <div class="g-recaptcha" data-sitekey="6LfbczUUAAAAANmfvHO3pKYkwTkVzP2a_kmOYD5L"></div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success">Login</button>
              </div>
          </form>
        </div>

      </div>
    </div>

    <button type="button"  class="btn btn-default btn-xs hidden" data-toggle="modal" data-target="#__loginAdmin" data-backdrop="static" data-keyboard="false">complexus.net</button>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function() {
            $('[data-target="#__loginAdmin"]').click();
        });
    </script>
@endsection
