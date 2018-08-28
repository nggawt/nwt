
<header class="head navbar-fixed-top">
<!--            <div class="logo">
            <h1>NWT.co.il</h1>
            <h2>שרותי עיצוב ובניית אתרים</h2>
        </div>-->
        <div class="header_top">
                
                <div class="container">
                    <div class="row">
                        @if(!Auth::check())
                        
                        
                        <div class="dial col-sm-2 hidden-xs pull-left btn-group" role="group">
                            <a href="{{ route('admin') }}" class="btn btn-primary btn-sm pull-left">ניהול</a>
                            <a href="{{ route('users.create') }}" class="btn btn-success btn-sm pull-left">הרשמה</a>
                        </div>
                        
                        <div class="form_login hidden-xs col-sm-6 pull-right">
                            <form class="form-inline" action="{{ route('users.logIn') }}" method="post">
                                
                                <div class="form-group">
                                    <label for="conn">
                                        <span class="connect"> התחבר</span>
                                        <span class="glyphicon glyphicon-hand-left" aria-hidden="true"></span>
                                    </label>
                                    <input class="input-sm form-control" type="email" name="email" id="conn" placeholder="אימייל" />
                                </div>
                                <div class="form-group">
                                    <label for="pass">
                                        <span class="glyphicon glyphicon-hand-left" aria-hidden="true"></span>
                                    </label>
                                    <input class="input-sm form-control" type="password" name="password" id="pass" placeholder="סיסמה" />
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-default btn-sm" type="submit" name="submit">
                                        שלח 
                                        <span class="glyphicon glyphicon-send costum" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                            </form>
                        </div>
                        @include('errors.errors')

                        @endif
                        @if(Auth::check())
                        <div class="dial col-sm-2 hidden-xs pull-left btn-group">
                            <a href="{{ route('admin') }}" class="btn btn-primary btn-sm pull-left">ניהול</a>
                            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm pull-left"> התנתק</a>
                        </div>
                        <div class="btn-group form_login col-sm-7">
                            <div class="btn-group pull-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('article.create') }}">כתוב פוסט</a>
                                <a href="#" class="btn btn-success btn-sm"><span> {{ Auth::User()->first_name }}</span> אתה מחובר כעת</a>
                            </div>
                        </div>
                        
                        @endif
                        @if(Session('fail'))
                            <span style="color:red">{{ Session('fail') }}</span>
                        @endif
                    </div>
                </div>
        </div>
        <div class="header_bottom">
            <nav class="main_nav navbar navbar-inverse">
                <div class="container">
                    
                    <div class="navBarCast navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <i>תפריט</i>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse row" id="bs-example-navbar-collapse-1">
<!--                            <div class="navBarCast navbar-header pull-right">
                                <a class="navbar-brand pull-right" href="#">
                                    <img src="{{ asset('images/orangeLoggo150.png') }}" alt="Brand" />
                                </a>
                            </div>-->
                            <ul class="navCostom nav navbar-nav navbar-right col-sm-12 col-md-8">
                                <li class="hovered"><a href="{{ route('wellcome') }}">דף הבית</a></li>
                                <!--<li class="hidden-xs">|</li>-->
                                <li class="hovered"><a href="{{ route('web') }}">בניית אתרים</a></li>
                                <!--<li class="hidden-xs">|</li>-->
                                <li class="hovered"><a href="{{ route('article.index') }}">בלוג</a></li>
                                <!--<li class="hidden-xs">|</li>-->
                                <li class="hovered"><a href="{{ route('portfolio') }}">Portfolio</a></li>
                                <!--<li class="hidden-xs">|</li>-->
                                <li class="hovered"><a href="{{ route('about') }}">אודות</a></li>
                                <!--<li class="hidden-xs">|</li>-->
                                <li class="hovered"><a href="{{ route('contact') }}">צור קשר</a></li>
                            </ul>
                            <form class="navCostom navbar-form navbar-nav col-sm-4 col-md-4 hidden-sm pull-left" role="search">
                                <div class="form-group">
                                  <input type="text" class="input-sm form-control" placeholder="חפש">
                                </div>
                                <input type="submit" class="btn btn-default btn-sm" value='חפש' />
                          </form>
                    </div>
<!--                    <form class="visible-xs" role="search">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="חפש">
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-default">חפש <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </div>
                  </form>-->
                </div>
            </nav>
        </div>
</header>
