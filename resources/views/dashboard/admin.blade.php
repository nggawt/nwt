@extends('dashboard.layout.admin_master')
@section('title')
    Admin
@endsection

@section('styles')
    <link href="{{ URL::to('styles/datepickr.css') }}" rel="stylesheet" type="text/css">

   <style type="text/css">
       /*#myCan{
            border-left: 1px solid green;
            border-bottom: 1px solid green;
            border-right: 1px solid green;
       }*/
       #myCan{
            background: rgba(75,85,127,.2);
            border-radius: 5px;
            padding: 10px;
       }
   </style>

@endsection
@section('section')
<div class="visitors row">
    <hr>
    <div class="col-sm-3 users">
        <div class="panel panel-default row">
            <div class="panel-heading col-sm-12">
                <h3 class="panel-title">צפיות
                    <span class="castom-circle pull-left">
                        <i class="pull-right">סה"כ</i>
                        <i class="pull-left bg-primary cast">
                            @if(count($views))
                            <?php $allView = []; ?>
                                @foreach($views as $view)
                                    <?php $allView = $allView?$allView + $view:$view; ?>
                                @endforeach
                                {{ $allView }}
                            @endif
                        </i>
                    </span>
            </h3>
            </div>
            <div class="panel-body col-sm-12">
                <h4>הדפים הנצפים ביותר</h4>
                <hr>
                @if(count($views))
                <ol>
                    <?php $isTrue = true; ?>
                    @foreach($views as $key => $val)
                        
                        <li class=" {{ ($isTrue)?'bg-primary': ''}}"> {{ $key }} <span class="pull-left">{{ $val }} </span></li>
                    <?php $isTrue = false; ?>
                    @endforeach
                </ol>
                @endif
            </div>
            <div class="panel-footer col-sm-12">
                <a href="{{ route('pages.index') }}" class="btn btn-link pull-left">הצג כל נתוני הדפים</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3 users">
        <div class="panel panel-default row">
            <div class="panel-heading col-sm-12">
                <h3 class="panel-title">
                    משתמשים רשומים
                    

                    <span class="castom-circle pull-left">
                        <i class="pull-right">סה"כ</i>
                        <i class="pull-left bg-primary cast">@if(count($users)) {{ count($users) }} @endif</i>
                    </span>

                </h3>
            </div>
            <div class="panel-body col-sm-12">
                <h4>נרשמו לאחרונה</h4>
                <hr>
                @if(count($users))
                <ol>
                    <?php 
                        $isFirst = true; 
                        $users = collect($users)->take(4);
                    ?>
                    @foreach($users as $user)

                        <li class=" {{ ($isFirst)?'bg-primary': ''}}"> {{ $user->first_name }} {{ $user->last_name }} <span class="pull-left">
                            {{
                                $user->created_at->hour .":". $user->created_at->minute ." ". $user->created_at->day ."/". $user->created_at->month ."/". $user->created_at->year
                            }} </span></li>
                        <?php $isFirst = false; ?>

                    @endforeach
                </ol>
                @endif
            </div>
            <div class="panel-footer col-sm-12">
                <!-- Panel footer -->
                <a href="{{ route('users.index') }}" class="btn btn-link pull-left">הצג כל הרשומים</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3 users">
        <div class="panel panel-default row">
            <div class="panel-heading col-sm-12">
                <h3 class="panel-title">ביקורים</h3>
            </div>
            <div class="panel-body col-sm-12">
                Panel content
            </div>
            <div class="panel-footer col-sm-12">
                Panel footer
            </div>
        </div>
    </div>
    <div class="col-sm-3 users">
        <div class="panel panel-default row">
            <div class="panel-heading col-sm-12">
                <h3 class="panel-title">הזמנות</h3>
            </div>
            <div class="panel-body col-sm-12">
                Panel content
            </div>
            <div class="panel-footer col-sm-12">
                Panel footer
            </div>
        </div>
    </div>
</div>
<div class="row">
    <hr>
    <div id ="parent" class="col-sm-5">
        <form class="pull-right form-inline" action="{{ route('test') }}" method="GET">
            {{ csrf_field() }}
            <div class="form-group">
                <select id="selected" name="list" class="form-control" onchange="getValue(this)">
                      <option id="daily">יומי</option>
                      <option id="weekly">שבועי</option>
                      <option id="monthly">חודשי</option>
                      <option id="yearly">שנתי</option>
                </select>
            </div>

            <div class="form-group">
                <input id="datepickr" name="pickDate" type="text" class="form-control" onclick="runDateCalendar(this)" placeholder="בחר תאריך">
                <!--
                <span class="glyphicon glyphicon-calendar" onclick="runDateCalendar(this)"></span>
                <label for="between">בין התאריכים</label>
                 <input id="between" type="text" class="form-control" onclick="runDateCalendar(this)" name="pickDate" placeholder="בחר תאריך"> -->

                <!-- <input type="submit" class="form-control pull-left" value="שלח"> -->
            </div>
            <div class="form-group">
                <label for="datepickr" style="font-size: 1.9em;margin-bottom: 0; padding-right: 5px;"><span style="margin-top: .15em;" class="glyphicon glyphicon-calendar"></span></label>
            </div>

        </form>
        <!-- <canvas id="myCan" class="img-responsive"></canvas> -->
        <canvas id="myChart"></canvas>
    </div>

    <div class=" content-admin col-sm-5">
        <!-- <object type="application/svg+xml" data="statistic.svg">
            <embed class="responsive" src="images/statistic.svg">
        </object> -->
        <!-- <h1>Admin page</h1>
        <h1>{{ request()->server('HTTP_USER_AGENT') }}</h1> -->
    </div>
    <div class="col-sm-2">
        <h5 style="color:red;text-align: center;"> {{ $pageInc }} current url is: {{ $currentUrl }} <br /> {{ $tz }} {{ $date }} </h5>
    </div> 
    <!-- <div class="row">
        <div id="chartContainer" style="height;z-index: 999: 300px; width: 100%;"></div>
    </div>  -->

       <!--  <div class="col-sm-5">
            <div id="map"></div>

            <iframe id="google_maps" width="100%" height="500px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.uk?output=embed"></iframe>
        </div> -->


</div>

@endsection
@section('scripts')
        <script src="{{ URL::to('script/Chart.js') }}"></script>
        <script src="{{ URL::to('script/canvas.js') }}"></script>
        <script src="{{ URL::to('script/datepickr.js') }}"></script>

@endsection