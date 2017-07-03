<!DOCTYPE html>
<html dir="rtl" lang="he">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">-->
        <link href="{{ URL::to('styles/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::to('styles/main.css') }}" rel="stylesheet" type="text/css">
        <title>@yield('title')</title>
        @yield('styles')
    </head>
    <body>
<!--        <div class="page-header">
                <h1>Nwt.co.il <small>עיצוב ובניית אתרים</small></h1>
            </div>-->
            
<div class="wrraper">
    @include('pages.header')
        <div class="main_content">
            <!--<img class="static-bg" src="images/bg6.png" alt="bg-static" />-->
            <div class="inner-contant">
                <section class="main_sec">
                    @yield('section')
                </section>
                <aside class="main_sidebar">
                    @yield('sidebar')
                </aside>
                <section class="second_sec">
                    @yield('section_second')
                </section>
                <section class="thired_sec">
                    @yield('section_thired')
                </section>
            </div>
        </div>
</div>
        <!-- <div class="colors" style="direction: ltr;position: fixed;left: 0px;font-size: 12px;width:200px;top:45%;background: rgba(221,220,225,1);padding: 20px;text-align: center">
            <div style="background: rgba(239,241,244,1);color:black;height: 60px;padding: 10px;line-height: 60px">rgba(234, 236, 239, 1);</div>
            <div style="background: rgba(74,84,127,1);color:white;height: 60px;padding: 10px;line-height: 60px">rgba(74,84,127,1);</div>
            <div style="background: rgba(84,94,127,1);color:white;height: 60px;padding: 10px;line-height: 60px">rgba(84,94,127,1);</div>
            <div style="background: rgba(20,30,50,1);color:white;height: 60px;padding: 10px;line-height: 60px">rgba(20,30,50,1);</div>
            
        </div> -->
        
        @include('pages.footer')
        <script src="{{ URL::to('script/jquery-1.11.3.js') }}"></script>
        <script src="{{ URL::to('script/bootstrap.min.js') }}"></script>
        <script src="{{ URL::to('script/main.js') }}"></script>
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