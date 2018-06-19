<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/img/icon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ $title_page }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="{{ asset('plugins/materialize/css/materialize.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css')  }}">
    @yield('imported_css')
    <meta name="google" value="notranslate">
</head>
<body class="body-front" style="background-image:url('{{ asset('/img/background_body.jpg')}}');">    
    <main>
        @include('front.layouts.partials._navbar')
        @yield('content')
    </main>
    @include('front.layouts.partials._footer')
</body>
    <script src="{{ asset('plugins/materialize/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/fgs.js') }}"></script>
    <script type="text/javascript">
        $('.button-collapse').sideNav();     
        $("#session_msg").delay(3000).hide(600);
        $('select').material_select(); 
        $('.carousel.carousel-slider').carousel({
          fullWidth: true
        });
        autoplay()
        function autoplay() {
            $('.carousel.carousel-slider').carousel('next');
            setTimeout(autoplay, 15000);
        }

        (function($) {
          $(function() {
            $('.dropdown-button').dropdown({
              inDuration: 300,
              outDuration: 225,
              hover: true,
              belowOrigin: true,
              alignment: 'right' 
            });
          });
        })(jQuery);
      </script>
    @yield('js')
</html>
