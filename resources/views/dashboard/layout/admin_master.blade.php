<!DOCTYPE html>
<html dir="rtl" lang="he">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">-->
        <link href="{{ URL::to('styles/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::to('styles/admin_main.css') }}" rel="stylesheet" type="text/css">
        <title>@yield('Admin')</title>
        @yield('styles')
    </head>
    <body>
    
        
            <div class="containr-fluid">
                <div class="row">
                    @include('dashboard.admin_header')
                </div>
                <div class="row">
                    @include('dashboard.admin_nav')
                    <section class="main_sec  col-sm-10 pull-left">
                        @yield('section')
                    </section>
                </div>
                <!-- <aside class="main_sidebar">
                    @yield('sidebar')
                </aside> -->
            </div>
        @include('dashboard.admin_footer')
        
        <script src="{{ URL::to('script/jquery-1.11.3.js') }}"></script>
        <script src="{{ URL::to('script/bootstrap.min.js') }}"></script>
        <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApdTJA_ijwYSBKpffHDH2UEhtEbe1Gbj0&libraries=geometry,places,drawing&language=heb&region=IL&callback=geoMap"></script> -->
        
        <script src="{{ URL::to('script/canvasLib.js') }}"></script>
        <script src="{{ URL::to('script/main.js') }}"></script>
        <script src="{{ URL::to('script/geo.js') }}"></script>
        <script src="{{ URL::to('script/canvas.js') }}"></script>
        <script>
            $(function(){
//                alert('hhhh');
//                var  path = document.getElementById('carrousel');
//                console.log(path.tagName);
//                path.style.position = "relative";
//                path.style.left = 200 + "px";
            });
        </script>
    </body>
</html>