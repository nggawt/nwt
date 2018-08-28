<!DOCTYPE html>
<html dir="rtl" lang="he">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">-->
        <link href="{{ URL::to('styles/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::to('styles/admin_main.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::to('styles/admin_pages.css') }}" rel="stylesheet" type="text/css">
        <title>
            @yield('title')
        </title>
            @yield('styles')
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.33.3/es6-shim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/systemjs/0.19.20/system-polyfills.js"></script> -->
        
    </head>
<body>   
<div class="containr-fluid">
    <header class="head col-sm-12">

        @include('dashboard.layout.admin_header')
    </header>
    <aside class="col-sm-2 navright">
        @if(isset($page->id) && action('PagesController@pageEditor',$page->id) === url()->full())
            @yield('admin_nav')
        @else
            @include('dashboard.layout.admin_nav')
        @endif
    </aside>

    <section class="sec_tools  col-sm-10 pull-left">
        @yield('tools')
    </section>
    <section class="main_sec  col-sm-10 pull-left">
        @yield('section')
    </section>
</div>
@include('dashboard.layout.admin_footer')
        
<script src="{{ URL::to('script/jquery-1.11.3.js') }}"></script>
<script src="{{ URL::to('script/bootstrap.min.js') }}"></script>
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApdTJA_ijwYSBKpffHDH2UEhtEbe1Gbj0&libraries=geometry,places,drawing&language=heb&region=IL&callback=geoMap"></script> -->
<script src="{{ URL::to('script/ajaxRequest.js') }}"></script>
<!-- <script src="{{ URL::to('script/canvasLib.js') }}"></script> -->
<!-- <script src="{{ URL::to('script/geo.js') }}"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->
@yield('scripts')

<script>
       
</script>
</body>
</html>