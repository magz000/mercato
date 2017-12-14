
@inject('Cart', 'App\Model\Cart')

<nav>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="logo"><a style="color: #fff;" href="{{ route('landingPage') }}">Virtual Mercato</a></h4>
            </div>

            <div class="col-md-9" style="text-align: right;">
                <ul class="list-unstyled list-inline" style="margin-top: 10px;">
                    @if (!Auth::guard('u')->check())
                        <li><a href="#" data-toggle="modal" data-target="#_loginModal">Sign In</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#_SignUpModal">Sign Up</a></li>
                    @else
                        <li>
                            <div class="dropdown">
                                <div class=" dropdown-toggle" type="button" data-toggle="dropdown">
                                    {{ Auth::guard('u')->user()->firstname .  ' ' . Auth::guard('u')->user()->lastname }}
                                    <span class="caret"></span></div>
                                </button>

                                <ul class="dropdown-menu">
                                  <li><a href="{{ route('userDashboardPage') }}"> <i class="fa fa-fw fa-dashboard"> </i> Dashboard</a></li>
                                  <li><a href="{{ route('userOrderPage') }}"> <i class="fa fa-fw fa-list"> </i> Orders</a></li>
                                  <li><a href="{{ route('userProfilePage') }}"> <i class="fa fa-fw fa-user"> </i> Profiles</a></li>
                                  <li><a href="{{ route('logoutUserPage') }}"> <i class="fa fa-fw fa-sign-out"> </i> Logout</a></li>
                                </ul>


                            </div>
                        </li>
                        <li><a href="#" data-toggle="modal" data-target="#__cartModal" style="color:#fff; text-decoration: none;">
                            <i class="glyphicon glyphicon-shopping-cart"></i> <span class="badge" style="background: red;">{{ $Cart->where('user_id', '=', Auth::guard('u')->user()->id)->sum('quantity') }}</span> - <span><small>PHP</small>{{ number_format($Cart->where('user_id', '=', Auth::guard('u')->user()->id)->sum('total'), 2) }}</span>
                        </a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
