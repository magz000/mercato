@extends('layouts.public.layouts')

@section('content')


         <style media="screen">
             body {
                 background: url("{{ asset('img/login-bg.jpg') }}");
                 background-size: cover;
             }

             footer {
                 color: #fff;
             }
         </style>

     @include('layouts.public.navigation')


     <div class="container">
         <div class="row">
             <div class="col-md-8">

             </div>

             <div class="col-md-4">
                 <Br/><Br/>
                 <div class="panel panel-default">
                     <div class="panel-body">
                         <h4 style="margin-top: 0px !important;">Sign In</h4>
                         @if (session('signin_error'))
                             <div class="alert alert-danger">
                                 {{ session('signin_error') }}
                             </div>
                         @endif

                         <form action="{{ route('loginUserPage') }}" method="post">
                             {{ csrf_field() }}
                             <input type="hidden" name="referrer" value="{{ old('referrer') == null ? url()->previous() : old('referrer') }}">
                             <center>
                                 <div class="btn-group" data-toggle="buttons">
                                     <label class="btn btn-primary active" style="width: 150px;">
                                       <input type="radio" name="user_type" id="option2" value="1" autocomplete="off" checked>
                                       <i class="fa fa-user" style="font-size: 64px;"></i><Br>
                                       Buyer
                                     </label>

                                     <label class="btn btn-primary" style="width: 150px;">
                                       <input type="radio" name="user_type" id="option3" value="2" autocomplete="off">
                                       <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDI5NyAyOTciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDI5NyAyOTc7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNjRweCIgaGVpZ2h0PSI2NHB4Ij4KPHBhdGggZD0iTTI5Ni4wMzMsMTA4LjIyYzAtMzcuOTY3LTMwLjg3Ny02OC44NTUtNjguODMtNjguODU1Yy0xLjY0OSwwLTMuMzE0LDAuMDYyLTQuOTg3LDAuMTg3QzIwNS44ODQsMTQuOTk3LDE3OC4yMTUsMCwxNDguNSwwICBjLTI5LjcxNCwwLTU3LjM4MywxNS03My43MTUsMzkuNTUyYy0xLjY3My0wLjEyNS0zLjMzOC0wLjE4Ny00Ljk4Ny0wLjE4N2MtMzcuOTU0LDAtNjguODMxLDMwLjg4OC02OC44MzEsNjguODU1ICBjMCwzNC42MzcsMjUuNzA0LDYzLjM2OCw1OS4wMzEsNjguMTQydjk1LjE1N2MwLDE0LjA1MSwxMS40MywyNS40ODEsMjUuNDgsMjUuNDgxaDEyNi4wNDRjMTQuMDUxLDAsMjUuNDgtMTEuNDMxLDI1LjQ4LTI1LjQ4MSAgdi05NS4xNTdDMjcwLjMzLDE3MS41ODgsMjk2LjAzMywxNDIuODU2LDI5Ni4wMzMsMTA4LjIyeiBNMjExLjUyMiwyNzcuMzk5SDg1LjQ3OWMtMy4xODYsMC01Ljg4LTIuNjkzLTUuODgtNS44ODF2LTk1LjE0NyAgYzkuNjAyLTEuMzYsMTguNzE4LTQuNzIyLDI2Ljk0MS05Ljk1YzEyLjYxMyw2LjgyMiwyNi45NTgsMTAuNjUxLDQxLjk2LDEwLjY1MXMyOS4zNDYtMy44MjksNDEuOTU5LTEwLjY1ICBjOC4yMjUsNS4yMjcsMTcuMzQyLDguNTg5LDI2Ljk0Myw5Ljk0OXY5NS4xNDdDMjE3LjQwMiwyNzQuNzA2LDIxNC43MDksMjc3LjM5OSwyMTEuNTIyLDI3Ny4zOTl6IE0yMjcuMjAzLDE1Ny40NzEgIGMtNi41OTcsMC0xMi45NzQtMS4yODktMTguOS0zLjc2NmMxMS45MjctMTAuOTM0LDIwLjk0My0yNS4xNDYsMjUuNDctNDEuNDc5YzEuNDQ1LTUuMjE2LTEuNjExLTEwLjYxNy02LjgyNy0xMi4wNjMgIGMtNS4yMTctMS40NDUtMTAuNjE2LDEuNjEyLTEyLjA2Myw2LjgyN2MtOC4yMzYsMjkuNzIzLTM1LjUzNCw1MC40ODEtNjYuMzgzLDUwLjQ4MXMtNTguMTQ2LTIwLjc1OC02Ni4zODMtNTAuNDgxICBjLTEuNDQ1LTUuMjE2LTYuODQzLTguMjcyLTEyLjA2My02LjgyN2MtNS4yMTYsMS40NDUtOC4yNzIsNi44NDctNi44MjcsMTIuMDYzYzQuNTI2LDE2LjMzMywxMy41NDMsMzAuNTQ2LDI1LjQ3LDQxLjQ3OSAgYy01LjkyNiwyLjQ3Ny0xMi4zMDMsMy43NjYtMTguODk5LDMuNzY2Yy0yNy4xNDYsMC00OS4yMy0yMi4wOTQtNDkuMjMtNDkuMjUxYzAtMjcuMTU4LDIyLjA4NS00OS4yNTQsNDkuMjMtNDkuMjU0ICBjMi43NDQsMCw1LjU2OSwwLjI0Niw4LjM5NywwLjczYzQuMDgyLDAuNjk2LDguMTctMS4yNDcsMTAuMi00Ljg2MWMxMi4yMDUtMjEuNzMzLDM1LjIzNi0zNS4yMzQsNjAuMTA0LTM1LjIzNCAgczQ3Ljg5OSwxMy41MDIsNjAuMTA2LDM1LjIzNWMyLjAyOSwzLjYxNCw2LjExNSw1LjU1NywxMC4yLDQuODZjMi44MjgtMC40ODQsNS42NTMtMC43Myw4LjM5Ni0wLjczICBjMjcuMTQ1LDAsNDkuMjI5LDIyLjA5Niw0OS4yMjksNDkuMjU0QzI3Ni40MzMsMTM1LjM3NywyNTQuMzQ4LDE1Ny40NzEsMjI3LjIwMywxNTcuNDcxeiIgZmlsbD0iI0ZGRkZGRiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
                                       <Br/>
                                       Provider
                                     </label>
                                   </div>
                             </center>

                               <Br/><Br/>
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

                             <br/><br/>
                             {{--No Account Yet? <a href="#" data-toggle="modal" data-target="#_SignUpModal">Sign Up Here</a>--}}
                         </form>

                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection
