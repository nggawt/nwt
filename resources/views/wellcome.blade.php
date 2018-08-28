    @extends('layout.master')

    @section('title') Nwt.co.il @endsection

    @section('styles')
        <link href="{{ URL::to('styles/home.css') }}" rel="stylesheet" type="text/css">
    @endsection

    @section('section')
        
        @if(isset($blog))
        <ul>
            @foreach($blog as $blo)
                <li>{{ $blo->title . " " . $blo->body }}</li>
            @endforeach
        </ul>
        @endif
        <div class="inner_sec">
            <div class="main_banner">
                <div class="container">

                    <div class="inner_banner row">
                        @if(isset($users))
                        <ul>
                            @foreach($users as $user)
                                <li>{{ $user->first_name . " " . $user->last_name }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <div class="main_banner_costum col-xs-12">
    <!--                        <img class="img-responsive" src="../images/bg.png" alt="bg" />-->
                            <h2>
                                אתר מיקצועי מותאם לעסק שלך ימנף אותו למקום ראשון 

                            </h2>
                            <h3>
             קדם את העסק שלך                 ,<span>צור קשר עכשיו</span>

                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sendRequest">
                <div class="container">
                    <div class="row">
                        
                        <form class="form-inline col-xs-12" action="sendEmail.php" method="post">
                            <div class="form-group">
                                <label class="control-label" for="firstName">שם</label>
                                <input class="form-control" type="text" name="firstName" id="firstName" >
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="lastname">שם משפחה</label>
                                <input class="form-control" type="text" name="lastName" id="lastname" >
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email">אימייל</label>
                                <input class="form-control" type="email" name="email" id="email" >
                            </div>
                                <input class="btn btn-success" type="submit" name="submit" value="שלח" />
                                <input type="hidden" name="_token" value="{{ Session::token() }}" />
                        </form>
                    </div>
                </div>
            </div>
            <!--<div class="jumbotron">-->
                <div class="article container">
                    <article class="main_article row jumbotron">
                        <div class="col-xs-12">
                            <h2>אודות  <small>פורסם ע"י...   דולור</small></h2>

                            <p>סחטיר בלובק. תצטנפל בלינדו למרקל אס לכימפו, דול, צוט ומעיוט - לפתיעם ברשג - ולתיעם
                                גדדיש. קוויז דומור ליאמום בלינך רוגצה. לפמעט מוסן מנת. לפרומי בלוף קינץ תתיח לרעח. לת צשחמי
                                צש בליא, מנסוטו צמלח לביקו ננבי, צמוקו בלוקריה שיצמה ברורק. נולום ארווס סאפיאן - פוסיליס
                                קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף
                                גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום
                                ארווס סאפיאן - פוסיליס קוויס, אקווזמן קוואזי במר מודוף. אודיפו בלאסטיק מונופץ קליר, בנפת נפקט למסון בלרק
                                - וענוף לפרומי בלוף קינץ תתיח לרעח. לת צשחמי ליבם סולגק. בראיט ולחת צורק מונחף, בגורמי מגמש.
                            </p>
                            <a class="btn btn-default btn-md pull-left" href="#" role="button">המשך לקרוא</a>
                        </div>
                    </article>
                </div>
            <!--</div>-->
        </div>
        <hr>
    @endsection
    @section('sidebar')
    <div class="container">
        <div class="inner_sidebar row">
            <div class="sidebar1 col-sm-6 col-md-3 panel panel-default">
                <div class="row">
                    <div class="panel-heading">
                        <h2>ריספוסיבי <small> לורם איפסום דולור</small></h2>
                    </div>
                    <div class="panel-body">
                        <p>
                            נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר
                                    מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                                    
                        </p>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-default pull-left" href="#" role="button">המשך לקרוא</a>
                    </div>
                </div>
            </div>
            <div class="sidebar1 col-sm-6 col-md-3 panel panel-default">
                <div class="row">
                    <div class="panel-heading">
                        <h2>עיצוב <small> לורם איפסום דולור</small></h2>
                    </div>
                    <div class="panel-body">
                        <p>
                            נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר
                                    מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                        </p>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-default pull-left" href="#" role="button">המשך לקרוא</a>
                    </div>
                </div>
            </div>
            <div class="sidebar1 col-sm-6 col-md-3 panel panel-default">
                <div class="row">
                    <div class="panel-heading">
                        <h2>פיתוח <small> לורם איפסום דולור</small></h2>
                    </div>
                    <div class="panel-body">
                        <p>
                            נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר
                                    מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                        </p>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-default pull-left" href="#" role="button">המשך לקרוא</a>
                    </div>
                </div>
            </div>
            <div class="sidebar1 col-sm-6 col-md-3 panel panel-default">
                <div class="row">
                    <div class="panel-heading">
                        <h2>איפיון <small> לורם איפסום דולור</small></h2>
                    </div>
                    <div class="panel-body">
                        <p>
                            נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר
                                    מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                        </p>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-default pull-left" href="#" role="button">המשך לקרוא</a>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    @endsection
    @section('section_second')
        <!--<img class="img-bg" src="images/bg2.png" alt="blue_orangeLogg1-costumer" />-->

    <div class="castom container">
        <div class="row">
            <h2>לקוחותינו</h2>
            <div class="costumers col-xs-6  col-sm-6 col-md-3">
                <div class="thumb">
                    <div class="costumers-pic">
                        <img class="img-responsive img-circle" src="images/blue_orangeLogg1.png" alt="blue_orangeLogg1-costumer" />
                        <h5>לורם איפסום <small>בעלים של חברת nwt</small></h5>
                    </div>
                    <div class="caption">
                        
                        <p>
                             לורם איפסום דולור סיט אמט
                נולום ארווס סאפיאן - פוסיליס קוויס, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט 
                        </p>
                    </div>
                </div>
            </div>
            <div class="costumers col-xs-6 col-sm-6 col-md-3">
                <div class="thumb">
                    <div class="costumers-pic"><img class="img-responsive img-circle" src="images/linux.png" alt="linux-costumer" /></div>
                    <h5>לורם איפסום <small>בעלים של חברת nwt</small></h5>
                    <div class="caption">
                        <p>
                             לורם איפסום דולור סיט אמט
                נולום ארווס סאפיאן - פוסיליס קוויס, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט 
                        </p>
                    </div>
                </div>
            </div>
            <div class="costumers col-xs-6 col-sm-6 col-md-3">
                <div class="thumb">
                    <div class="costumers-pic"><img class="img-responsive img-circle" src="images/linux.png" alt="linux-costumer" /></div>
                    <h5>לורם איפסום <small>בעלים של חברת nwt</small></h5>
                    <div class="caption">
                        <p>
                             לורם איפסום דולור סיט אמט
                נולום ארווס סאפיאן - פוסיליס קוויס, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט 
                        </p>
                    </div>
                </div>
            </div>
            <div class="costumers col-xs-6 col-sm-6 col-md-3">
                <div class="thumb">
                    <div class="costumers-pic"><img class="img-responsive img-circle" src="images/linux.png" alt="orangeLoggo150-costumer" /></div>
                    <h5>לורם איפסום <small>בעלים של חברת nwt</small></h5>
                    <div class="caption">
                        <p>
                             לורם איפסום דולור סיט אמט
                נולום ארווס סאפיאן - פוסיליס קוויס, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('section_thired')

        

    <div class="tech-icons container">
        <figure class="row">
                <h4>טכנולוגיות</h4>
            <div class="col-xs-3 col-md-3">
                <h5>Html 5</h5>
                <img class="img-responsive" src="images/icons/html5.png" alt="html5" />
            </div>
            <div class="col-xs-3 col-md-3">
                <h5>Css 3</h5>
                <img class="img-responsive"  src="images/icons/css3.png" alt="css" />
            </div>
            <div class="col-xs-3 col-md-3">
                <h5>Js</h5>
                <img class="img-responsive"  src="images/icons/js.png" alt="js" />
            </div>
            <div class="col-xs-3 col-md-3">
                <h5>Jquery</h5>
                <img class="img-responsive"  src="images/icons/jquery.png" alt="jquery" />
            </div>
            <div class="col-xs-3 col-md-3">
                <h5>Angular</h5>
                <img class="img-responsive"  src="images/icons/angular.png" alt="angular" />
            </div>
            <div class="col-xs-3 col-md-3">
                <h5>Php</h5>
                <img class="img-responsive"  src="images/icons/php.png" alt="php" />
            </div>
            <div class="col-xs-3 col-md-3">
                <h5>Mysql</h5>
                <img class="img-responsive"  src="images/icons/mysql.png" alt="mysql" />
            </div>
            <div class="col-xs-3 col-md-3">
                <h5>Laravel</h5>
                <img class="img-responsive"  src="images/icons/laravel.png" alt="laravel" />
            </div>
            
        </figure>
    </div>
    @endsection


