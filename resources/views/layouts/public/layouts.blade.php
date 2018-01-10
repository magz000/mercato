<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MERCATOV2</title>

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- build:css styles/vendor.css -->
    <!-- bower:css -->

{{--<link rel="stylesheet" href="/bower_components/datetimepicker/jquery.datetimepicker.css" />--}}
<!-- endbower -->
    <!-- endbuild -->
    <link rel="stylesheet"
          href="https://chefsandbutlers.net/res/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">


    <link rel="stylesheet" href="/bower_components/jquery-bar-rating/dist/themes/fontawesome-stars.css"/>
    <link rel="stylesheet" href="/bower_components/jquery-ui/themes/base/jquery-ui.min.css"/>

    <!-- build:css styles/main.css -->
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/mobile.css">
    <!-- endbuild -->

    <!-- build:js scripts/vendor/modernizr.js -->
    <script src="/bower_components/modernizr/modernizr.js"></script>
    <!-- endbuild -->

    <style type="stylesheet">
        body.modal-open {
            position: fixed !important;
            width: 100% !important;
        }

    </style>


</head>
<body>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->


@yield('content')
@include('public.modals')

{{-- <div class="chat__support">
    <div class="chat__conversation">

    </div>
    <div class="chat__activate">
        <i class="glyphicon glyphicon-comment"></i>
    </div>
</div> --}}

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = 'https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X');
    ga('send', 'pageview');
</script>

@yield('stylesheet')
<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- build:js scripts/vendor.js -->
<!-- bower:js -->
<script src="/bower_components/jquery/dist/jquery.js"></script>

<script src="https://chefsandbutlers.net/res/moment/min/moment.min.js" charset="utf-8"></script>

<script src="/bower_components/modernizr/modernizr.js"></script>
<script src="/bower_components/jquery-touchswipe/jquery.touchSwipe.js"></script>
<script src="/bower_components/FilmRoll/js/jquery.film_roll.min.js"></script>
<script src="/bower_components/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/bower_components/php-date-formatter/js/php-date-formatter.js"></script>
{{--<script src="/bower_components/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>--}}
<script src="/bower_components/jquery-bar-rating/jquery.barrating.js"></script>
<script src="/bower_components/select2/dist/js/select2.js"></script>
<script src="/bower_components/jquery-ui/jquery-ui.js"></script>
<script src="/bower_components/chart.js/dist/Chart.min.js"></script>
<!-- endbower -->
<!-- endbuild -->

<!-- build:js scripts/plugins.js -->
<script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/affix.js"></script>
<script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/alert.js"></script>
<script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js"></script>
<script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js"></script>
<script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/modal.js"></script>
<script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/transition.js"></script>
<script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/button.js"></script>
<script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/popover.js"></script>
<script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/carousel.js"></script>
<script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/scrollspy.js"></script>
<script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/collapse.js"></script>
<script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/tab.js"></script>
<!-- endbuild -->


<script src="https://chefsandbutlers.net/res/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"
        charset="utf-8"></script>

@yield('scripts')

<script type="text/javascript">
    $(function () {
        $('.radio').change(function () {
            if ($(this).val() == 1) {
                $('#_signas').html('Buyer');
            } else {
                $('#_signas').html('Provider');
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        $.notify(
            "{{ $error }}",
            {position: "top center"}
        );
        @endforeach
        @endif

        @if(session('success'))
        $.notify(
            "{{ session('success') }}",
            "success",
            {position: "top center"}
        );
        @endif

    });
</script>

<!-- build:js scripts/main.js -->
<script src="/js/notify.min.js"></script>
<script src="/js/main.js"></script>
<!-- endbuild -->

<script type="text/javascript">
    $('[data-toggle="tooltip"]').tooltip();
</script>

<script>

    $('#date').click(function () {
        $('.bootstrap-datetimepicker-widget.bottom').addClass('top').removeClass('bottom');
    });


    $('.cart-content').each(function () {
        var price = parseFloat($(this).children('small').children('.cart-price').val());

        var parent = $(this);

        var id = $(this).children('.cart-id').val();

        $(this).children('small').children('.cart-qty').change(function () {
            var quantity = parseInt($(this).val())

            $('#proceedCheckout').attr('disabled', true);

            var total = quantity * price;
            parent.children('small').children('.cart-total').val(addCommas(total));

            var grandtotal = 0;
            $('.cart-content').each(function () {
                grandtotal += parseInt($(this).children('small').children('.cart-qty').val()) * parseFloat($(this).children('small').children('.cart-price').val());

            });

            grandtotal += parseFloat($('#fees').text());

            $.ajax({
                url: "{{route('updateQuantity')}}",
                type: "GET",
                data: {
                    id: id,
                    quantity: quantity,
                    total: total
                },
                success: function (data) {
                    console.log('success updating');

                    $('#proceedCheckout').removeAttr('disabled');

                    $('#grandtotal').text(addCommas(grandtotal));

                }
            });


        });
    });


    function addCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = '.00'
        if (x.length > 1) {
            if (x[1].length > 2) {
                x2 = '.' + x[1].substr(0, 2);
            } else if (x[1].length == 2) {
                x2 = '.' + x[1];
            } else {
                x2 = '.' + x[1] + '0';
            }

        }

        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

</script>
</body>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <ul class="list-unstyled">
                    <li>Home</li>
                    <li>About Us</li>
                    <li>FAQS</li>
                </ul>
            </div>

            <div class="col-md-3 col-xs-6">
                <ul class="list-unstyled">
                    <li>Contact Us</li>
                    <li>Apply as Provider</li>
                </ul>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3"><img style="max-width: 100%;"
                                               src="{{ asset('img/partners/partner_cravings.png') }}" alt=""></div>
                    <div class="col-md-3"><img style="max-width: 100%;"
                                               src="{{ asset('img/partners/partner_cca.png') }}" alt=""></div>
                    <div class="col-md-3"><img style="max-width: 100%;"
                                               src="{{ asset('img/partners/partner_epic.png') }}" alt=""></div>
                    <div class="col-md-3"><img style="max-width: 100%;"
                                               src="{{ asset('img/partners/partner_asha.png') }}" alt=""></div>
                </div>
            </div>


            <div class="clearfix"></div>
            <br/>
            <div class="col-md-12">
                © 2017 Virtual Mercato. All rights reserved.
            </div>
        </div>
    </div>
</footer>
</html>
