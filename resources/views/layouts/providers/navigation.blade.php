<nav>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="logo">Virtual Mercato</h4>
            </div>

            <div class="col-md-9" style="text-align: right;">
                <ul class="list-unstyled list-inline" style="margin-top: 10px;">
                    @if (!Auth::guard('p')->check())
                        <li><a href="#" data-toggle="modal" data-target="#_loginModal">Sign In</a></li>
                    @else
                        <li>
                            <div class="dropdown">
                                <div class=" dropdown-toggle" type="button" data-toggle="dropdown">
                                    {{ Auth::guard('p')->user()->firstname .  ' ' . Auth::guard('p')->user()->lastname }}
                                    <span class="caret"></span></div>
                                </button>

                                <ul class="dropdown-menu">
                                  <li><a href="{{ route('providerDashboardPage') }}"> <i class="fa fa-fw fa-dashboard"> </i> Dashboard</a></li>
                                  <li><a href="{{ route('providerOrderPage') }}"> <i class="fa fa-fw fa-list"> </i> Orders</a></li>
                                  <li><a href="{{ route('providerOrderPage') }}"> <i class="fa fa-fw fa-cutlery"> </i> Products</a></li>
                                  <li><a href="{{ route('providerOrderPage') }}"> <i class="fa fa-fw fa-star"> </i> Ratings</a></li>
                                  <li><a href="{{ route('providerProfilePage') }}"> <i class="fa fa-fw fa-user"> </i> Profiles</a></li>
                                  <li><a href="{{ route('logoutUserPage') }}"> <i class="fa fa-fw fa-sign-out"> </i> Logout</a></li>
                                </ul>


                            </div>
                        </li>
                        <li><a href="#" data-toggle="modal" data-target="#__cartModal">Cart</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
