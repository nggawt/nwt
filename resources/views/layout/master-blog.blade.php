<!DOCTYPE html>
<html dir="rtl" lang="heb">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">-->
        <link href="{{ URL::to('styles/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::to('styles/main.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::to('styles/pages.css') }}" rel="stylesheet" type="text/css">
        <title>@yield('title')</title>
        @yield('styles')
    </head>
    <body>
<!--        <div class="page-header">
                <h1>Nwt.co.il <small>עיצוב ובניית אתרים</small></h1>
            </div>-->
<div class="wrraper">
        @include('pages.header')
        <div class="main_content container">
            <div class="inner-contant row">
                <section class="main_sec col-xs-9">
                    @yield('section')
                </section>
                <aside class="main_sidebar col-xs-3">
                    @yield('sidebar')
                </aside>
            </div>
        </div>
        
        <div class="colors" style="direction: ltr;position: fixed;left: 0px;font-size: 12px;width:200px;top:45%;background: rgba(221,220,225,1);padding: 20px;text-align: center">
            <div style="background: rgba(239,241,244,1);height: 60px;padding: 10px;line-height: 60px">rgba(234, 236, 239, 1);</div>
            <div style="background: rgba(74,84,127,1);height: 60px;padding: 10px;line-height: 60px">rgba(74,84,127,1);</div>
            <div style="background: rgba(84,94,127,1);height: 60px;padding: 10px;line-height: 60px">rgba(84,94,127,1);</div>
        </div>
        
</div>
@include('pages.footer')
        <script src="{{ URL::to('script/jquery-1.11.3.js') }}"></script>
        <script src="{{ URL::to('script/bootstrap.min.js') }}"></script>
        <script>
            $(function(){
                //alert('hhhh');
            });
        </script>
    </body>
</html>