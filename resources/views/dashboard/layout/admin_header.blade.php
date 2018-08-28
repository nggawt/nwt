<div class="row">
    
    
    <div class="col-sm-10 pull-left">
        <div class="row">
            
            <div class="dial col-sm-2 col-sm-offset-2 btn-group pull-left">
                <a href="{{ route('admin') }}" class="btn btn-primary btn-sm">דשבורד <span class="glyphicon glyphicon-dashboard"></span></a>
                @if(Auth::check())<a href="{{ route('logout') }}" class="btn btn-danger btn-sm"> התנתק</a>@endif
            </div>
            <!-- navbar-inverse -->
            <nav class="main_nav navbar-inverse col-sm-8 pull-right">
                    
                <div class="navBarCast navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <i>תפריט</i>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            
                    <ul class="navCostom nav navbar-nav">
                        <li><a href="{{ route('wellcome') }}">עבור לאתר</a></li>
                        <!--<li class="hidden-xs">|</li>-->
                        <li><a href="{{ route('web') }}">בניית אתרים</a></li>
                        <!--<li class="hidden-xs">|</li>-->
                        <li><a href="{{ route('article.index') }}">בלוג</a></li>
                        <!--<li class="hidden-xs">|</li>-->
                        <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                        <!--<li class="hidden-xs">|</li>-->
                        <li><a href="{{ route('about') }}">אודות</a></li>
                        <!--<li class="hidden-xs">|</li>-->
                        <li><a href="{{ route('contact') }}">צור קשר</a></li>
                    </ul> 
                </div>
            </nav>
        </div>
    </div>
</div>