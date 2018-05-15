<nav>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="logo">Virtual Mercato</h4>
            </div>

            <div class="col-md-9" style="text-align: right;">
                <ul class="list-unstyled list-inline" style="margin-top: 10px;">

                        <li>
                            <div class="dropdown">
                                <div class=" dropdown-toggle" type="button" data-toggle="dropdown">
                                    {{ Auth::guard('a')->user()->firstname .  ' ' . Auth::guard('a')->user()->lastname }}
                                    <span class="caret"></span></div>
                                </button>

                                <ul class="dropdown-menu">
                                  <li><a href="{{ route('admin.dashboard') }}"> <i class="fa fa-fw fa-dashboard"> </i> Dashboard</a></li>
                                  <li><a href="{{ route('admin.orders') }}"> <i class="fa fa-fw fa-list"> </i> Orders</a></li>
                                  <li><a href="{{ route('admin.providers') }}"> <i class="fa fa-fw fa-cutlery"> </i> Providers</a></li>
                                  <li><a href="{{ route('admin.clients') }}"> <i class="fa fa-fw fa-users"> </i> Clients</a></li>
{{--                                  <li><a href="{{ route('admin.profile') }}"> <i class="fa fa-fw fa-user"> </i> Profiles</a></li>--}}
                                  <li><a href="{{ route('admin.logout') }}"> <i class="fa fa-fw fa-sign-out"> </i> Logout</a></li>
                                </ul>


                            </div>
                        </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
