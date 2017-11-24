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
    <link rel="stylesheet" href="/bower_components/datetimepicker/jquery.datetimepicker.css" />
    <!-- endbower -->
    <!-- endbuild -->


    <link rel="stylesheet" href="/bower_components/jquery-bar-rating/dist/themes/fontawesome-stars.css" />

    <!-- build:css styles/main.css -->
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/mobile.css">
    <!-- endbuild -->

    <!-- build:js scripts/vendor/modernizr.js -->
    <script src="/bower_components/modernizr/modernizr.js"></script>
    <!-- endbuild -->
  </head>
  <body>
    <!--[if IE]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    @yield('content')
    @include('public.modals')

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='https://www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','UA-XXXXX-X');ga('send','pageview');
</script>

@yield('stylesheet')
<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- build:js scripts/vendor.js -->
<!-- bower:js -->
<script src="/bower_components/jquery/dist/jquery.js"></script>
<script src="/bower_components/modernizr/modernizr.js"></script>
<script src="/bower_components/jquery-touchswipe/jquery.touchSwipe.js"></script>
<script src="/bower_components/FilmRoll/js/jquery.film_roll.min.js"></script>
<script src="/bower_components/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/bower_components/php-date-formatter/js/php-date-formatter.js"></script>
<script src="/bower_components/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
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


@yield('scripts')
<script type="text/javascript">
    $(function() {

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                $.notify(
                  "{{ $error }}",
                  { position:"top center" }
                );
            @endforeach
        @endif

        @if(session('success'))
        $.notify(
          "{{ session('success') }}",
          "success",
          { position:"top center" }
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



</body>

</html>
