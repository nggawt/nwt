@extends('dashboard.layout.admin_master')
@section('Admin')
    Admin
@endsection

@section('styles')
   <style type="text/css">
       #myCan{
            border-left: 1px solid green;
            /*border-bottom: 1px solid green;*/
            border-right: 1px solid green;
       }
   </style>

@endsection
@section('section')

<div class="visitors row">
    <div class="col-md-2 col-sm-4 text-center users">
        <div class="panel panel-default row">
            <div class="panel-heading col-sm-3">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body col-sm-9">
                Panel content
            </div>
            <div class="panel-footer col-sm-12">
                Panel footer
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4 text-center users">
        <div class="panel panel-default row">
            <div class="panel-heading col-sm-3">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body col-sm-9">
                Panel content
            </div>
            <div class="panel-footer col-sm-12">
                Panel footer
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4 text-center users">
        <div class="panel panel-default row">
            <div class="panel-heading col-sm-3">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body col-sm-9">
                Panel content
            </div>
            <div class="panel-footer col-sm-12">
                Panel footer
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4 text-center users">
        <div class="panel panel-default row">
            <div class="panel-heading col-sm-3">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body col-sm-9">
                Panel content
            </div>
            <div class="panel-footer col-sm-12">
                Panel footer
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4 text-center users">
        <div class="panel panel-default row">
            <div class="panel-heading col-sm-3">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body col-sm-9">
                Panel content
            </div>
            <div class="panel-footer col-sm-12">
                Panel footer
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4 text-center users">
        <div class="panel panel-default row">
            <div class="panel-heading col-sm-3">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body col-sm-9">
                Panel content
            </div>
            <div class="panel-footer col-sm-12">
                Panel footer
            </div>
        </div>
    </div>
</div>
<div id ="parent" class="col-sm-5">
    <h2 class="h2">דוח חודשי</h2>
    <canvas id="myCan" class="img-responsive"></canvas>
</div>

<div class=" content-admin col-sm-5">
    <object type="application/svg+xml" data="statistic.svg">
        <embed class="responsive" src="images/statistic.svg">
    </object>
    <!-- <h1>Admin page</h1>
    <h1>{{ request()->server('HTTP_USER_AGENT') }}</h1> -->
</div>  
   <!--  <div class="col-sm-5">
        <div id="map"></div>

        <iframe id="google_maps" width="100%" height="500px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.uk?output=embed"></iframe>
    </div> -->

@endsection
