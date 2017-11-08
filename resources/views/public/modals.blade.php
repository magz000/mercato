<div id="_loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 350px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign In</h4>
      </div>

      <div class="modal-body">

          @if (session('signin_error'))
              <div class="alert alert-danger">
                  {{ session('signin_error') }}
              </div>
          @endif

          <form action="{{ route('loginProviderPage') }}" method="post">
              {{ csrf_field() }}
              <div class="form_group">
                  <label for="">E-Mail</label>
                  <input type="text" placeholder="Email" name="email" class="form-control">
              </div>
              <Br/>
              <div class="form_group">
                  <label for="">Password</label>
                  <input type="password" placeholder="Password" name="password" class="form-control">
              </div>
              <br/>

              <div class="g-recaptcha" data-sitekey="6LfbczUUAAAAANmfvHO3pKYkwTkVzP2a_kmOYD5L"></div>

              <br/>
              <button class="btn btn-primary">Sign In</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
