@extends('layout.master')
@section('title') Nwt.co.il @endsection
@section('styles')
   <link href="{{ URL::to('styles/pages.css') }}" rel="stylesheet" type="text/css">
   <style>
       .expiriances .expiriances-header{
           background: rgba(234,236,239,1);
           border-radius: 10px;
       }
       .expiriances .progress-head{
           margin-bottom: 20px;
           overflow: hidden;
       }
       
/*       .expiriances .progress-head:before{
           display: table;
           content: "";
       }*/
       .expiriances .progress-head img{
           
           border-radius: 100%;
           background: rgba(234,236,239,1);
           border: 5px solid rgba(74,84,127,1);
           padding: 15px;
           width: 100%;
           height: 100%;
       }
       .progress-footer{
           padding-right: 0;
           /*width: 60%;*/
       }
       .expiriances .progress-body{
           padding: 40px 120px;
       }
/*       .{
           border-radius: 30%;
       }*/
       p{
           /*background: none;*/
           padding: 0px 10px;
           font-size: 1.3em;
           line-height: 1.5em;
           color: rgba(84,94,127,1);
       }
   </style>
@endsection

@section('section')
<!--    
    <div class="porfilio">
        <h2>תיק עבודות</h2>
    </div>
-->
<div class="expiriances">
    <div class="container">
        <div class="row progress-castom">
            <h2>כישורים והתמחויות</h2>
            
            <div class="expiriances-header text-center">
                <h2>HTML5</h2>
            
                <div class="progress-head col-sm-2 col-sm-pull-5">
                    <img class="img-responsive img-responsive center-block"  src="images/icons/html5.png" alt="html5" />
                </div>
                <div class="progress-body col-sm-12">
                    <p>נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                    נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                   נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                    </p>
                </div>
                <div class="progress progress-footer col-sm-8 col-sm-pull-2">
                    <div class="progress-bar progress-bar-info pull-right" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                        80%
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row progress-castom">
            <div class="expiriances-header text-center"><h2>CSS</h2></div>
            <div class="progress-head col-sm-2 col-sm-pull-5">
                <img class="img-responsive img-responsive center-block"  src="images/icons/css3.png" alt="html5" />
            </div>
            <div class="progress-body col-sm-12">
                 <p>נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
               נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                </p>
            </div>
            <div class="progress progress-footer col-sm-12">
                <div class="progress-bar progress-bar-info pull-right" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                    80%
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row progress-castom">
            <div class="expiriances-header text-center"><h2>JS</h2></div>
            <div class="progress-head col-sm-2 col-sm-pull-5">
                <img class="img-responsive img-responsive center-block"  src="images/icons/js.png" alt="html5" />
            </div>
            <div class="progress-body col-sm-12">
                 <p>נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
               נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                </p>
            </div>
            <div class="progress progress-footer col-sm-12">
                <div class="progress-bar progress-bar-info pull-right" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                    80%
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row progress-castom">
            <div class="expiriances-header text-center"><h2>PHP</h2></div>
            <div class="progress-head col-sm-2 col-sm-pull-5">
                <img class="img-responsive img-responsive center-block"  src="images/icons/php.png" alt="html5" />
            </div>
            <div class="progress-body col-sm-12">
                 <p>נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
               נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                </p>
            </div>
            <div class="progress progress-footer col-sm-12">
                <div class="progress-bar progress-bar-info pull-right" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                    80%
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row progress-castom">
            <div class="expiriances-header text-center"><h2>LINUX</h2></div>
            <div class="progress-head col-sm-2 col-sm-pull-5">
                <img class="img-responsive img-responsive center-block"  src="images/icons/linux.png" alt="html5" />
            </div>
            <div class="progress-body col-sm-12">
                 <p>נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
               נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                </p>
            </div>
            <div class="progress progress-footer col-sm-12">
                <div class="progress-bar progress-bar-info pull-right" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                    80%
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row progress-castom">
            <div class="expiriances-header text-center"><h2>MYSQL</h2></div>
            <div class="progress-head col-sm-2 col-sm-pull-5">
                <img class="img-responsive img-responsive center-block"  src="images/icons/mysql.png" alt="html5" />
            </div>
            <div class="progress-body col-sm-12">
                 <p>נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
               נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס
                </p>
            </div>
            <div class="progress progress-footer col-sm-12">
                <div class="progress-bar progress-bar-info pull-right" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                    80%
                </div>
            </div>
        </div>
    </div>
    <hr>
<!--        <div class="progress-castom">
            <div class="progress-head">
                <h2>CSS</h2>
                <img class="img-responsive"  src="images/icons/css3.png" alt="css3" />
            </div>
            <div class="progress-body pull-left">
                <p class="pull-left">נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס</p>
            </div>
            <div class="progress progress-footer pull-left">
                <div class="progress-bar progress-bar-info pull-right" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                    80%
                </div>
            </div>
        </div>
        <hr>
        <div class="progress-castom">
            <div class="progress-head">
                <h2>JS</h2>
                <img class="img-responsive"  src="images/icons/js.png" alt="js" />
            </div>
            <div class="progress-body pull-left">
                <p class="pull-left">נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס</p>

            </div>
            <div class="progress progress-footer pull-left">
                <div class="progress-bar progress-bar-info pull-right" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                    80%
                </div>
            </div>
        </div>
        <hr>
        <div class="progress-castom">
            <div class="progress-head">
                <h2>PHP</h2>
                <img class="img-responsive"  src="images/icons/php.png" alt="php" />
            </div>
            <div class="progress-body pull-left">
                <p class="pull-left">נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס</p>

            </div>
            <div class="progress progress-footer pull-left">
                <div class="progress-bar progress-bar-info pull-right" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                    60%
                </div>
            </div>
        </div>
        <hr>
        <div class="progress-castom">
            <div class="progress-head">
                <h2>LINUX</h2>
                <img class="img-responsive img-circle" src="images/linux.png" alt="linux-costumer" />   
            </div>
            <div class="progress-body pull-left">
                <p class="pull-left">נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס</p>

            </div>
            <div class="progress progress-footer pull-left">
                <div class="progress-bar progress-bar-info pull-right" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                    60%
                </div>
            </div>
        </div>
        <hr>
        <div class="progress-castom">
            <div class="progress-head">
                <h2>MYSQL</h2>
                <img class="img-responsive"  src="images/icons/mysql.png" alt="mysql" />
            </div>
            <div class="progress-body pull-left">
                <p class="pull-left">נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס</p>

            </div>
            <div class="progress progress-footer pull-left">
                <div class="progress-bar progress-bar-info pull-right" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                    60%
                </div>
            </div>
        </div>-->
    </div>
@endsection

@section('sidebar')
<!--
<div class="inner_sidebar">
    <div class="list-group">
        <div class="list-group-item active">
            <h4 class="list-group-item-heading"> לורם איפסום דולור סיט אמט</h4>
            <p class="list-group-item-text">נולום ארווס סאפיאן
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר
            </p>
        </div>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading"> לורם איפסום דולור סיט אמט</h4>
            <p class="list-group-item-text">נולום ארווס סאפיאן
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר

            </p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading"> לורם איפסום דולור סיט אמט</h4>
            <p class="list-group-item-text">נולום ארווס סאפיאן
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר

            </p>
        </a>
    </div>
    <div class="list-group">
        <div href="#" class="list-group-item active">
            <h4 class="list-group-item-heading"> לורם איפסום דולור סיט אמט</h4>
            <p class="list-group-item-text">נולום ארווס סאפיאן
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר
            </p>
        </div>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading"> לורם איפסום דולור סיט אמט</h4>
            <p class="list-group-item-text">נולום ארווס סאפיאן
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר

            </p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading"> לורם איפסום דולור סיט אמט</h4>
            <p class="list-group-item-text">נולום ארווס סאפיאן
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר

            </p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading"> לורם איפסום דולור סיט אמט</h4>
            <p class="list-group-item-text">נולום ארווס סאפיאן
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר

            </p>
        </a>
    </div>
</div>-->

@endsection