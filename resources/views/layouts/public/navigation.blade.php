<nav>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="logo">Virtual Mercato</h4>
            </div>

            <div class="col-md-9" style="text-align: right;">
                <ul class="list-unstyled list-inline" style="margin-top: 10px;">
                    @if (!Auth::guard('u')->check())
                        <li><a href="#" data-toggle="modal" data-target="#_loginModal">Sign In</a></li>
                    @else
                        <li><a href="#">{{ Auth::guard('u')->user()->firstname .  ' ' . Auth::guard('u')->user()->lastname }}</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
