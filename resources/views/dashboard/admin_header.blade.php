
<header class="head">
<!--            <div class="logo">
            <h1>NWT.co.il</h1>
            <h2>שרותי עיצוב ובניית אתרים</h2>
        </div>-->
            <nav class="main_nav navbar navbar-inverse col-sm-10 pull-left">
                    
                    <div class="navBarCast navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <i>תפריט</i>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse col-sm-6 navbar-right" id="bs-example-navbar-collapse-1">
<!--                            <div class="navBarCast navbar-header pull-right">
                                <a class="navbar-brand pull-right" href="#">
                                    <img src="{{ asset('images/orangeLoggo150.png') }}" alt="Brand" />
                                </a>
                            </div>-->
                        <ul class="navCostom nav navbar-nav">
                            <li class="hovered"><a href="{{ route('home') }}">עבור לאתר</a></li>
                            <!--<li class="hidden-xs">|</li>-->
                            <li class="hovered"><a href="{{ route('web') }}">בניית אתרים</a></li>
                            <!--<li class="hidden-xs">|</li>-->
                            <li class="hovered"><a href="{{ route('article.index') }}">בלוג</a></li>
                            <!--<li class="hidden-xs">|</li>-->
                            <li class="hovered"><a href="{{ route('Portfolio') }}">Portfolio</a></li>
                            <!--<li class="hidden-xs">|</li>-->
                            <li class="hovered"><a href="{{ route('about') }}">אודות</a></li>
                            <!--<li class="hidden-xs">|</li>-->
                            <li class="hovered"><a href="{{ route('concat') }}">צור קשר</a></li>
                        </ul> 
                    </div>
                    <form class="navCostom navbar-form col-sm-2" role="search">
                        <div class="form-group">
                          <input type="text" class="input-sm form-control" placeholder="חפש">
                        </div>
                        <button type="submit" class="btn btn-default btn-sm form-control">חפש <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                  </form>
<!--                    <form class="visible-xs" role="search">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="חפש">
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-default">חפש <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </div>
                  </form>-->
            </nav>
</header>
