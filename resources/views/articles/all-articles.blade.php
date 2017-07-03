@extends('layout.master-blog')
@section('title') Nwt.co.il @endsection
@section('styles')
   <link href="{{ URL::to('styles/pages.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('section')
<h1>This is all posts by user article page</h1>
<div class="inner_sec">
    <div class="articles">
        <article class="main_article">
            @if(isset($articles))
                @foreach($articles as $article)
                   
                    <div class="articles col-xs-12">
                        <h2>{{ $article->title }}</h2>
                        <div class="bgcol">
                            <small>{{'פורסם ע"י ' . $article->user()->first()->first_name . ' בתאריך' . $article->published_at->format('d:m:Y h:i') }}</small>
                            <p>{{ $article->body }}</p>
                            <div class="btn-group">
                                <a href="{{ route('article.edit',$article->id) }}" class="btn btn-danger">ערוך פוסט</a>
                                <a href="{{ route('article.index') }}" class="btn btn-success">חזור לכל הפוסטים</a>
                                <a href="{{ route('article.show',[$article->id]) }}" class="btn btn-warning">המשך לקרוא</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </article>
    </div>
</div>
@endsection

@section('sidebar')
<div class="contant-aside">
    <div class="inner_sidebar">
        <div class="sidebar1">
            <h2> לורם איפסום <small>דולור סיט אמט</small></h2>
            <p>
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר
                        מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס

            </p>
        </div>
        <div class="sidebar1">
            <h2> לורם איפסום <small>דולור סיט אמט</small></h2>
            <p>
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר
                        מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס

            </p>
        </div>
        <div class="sidebar1">
            <h2> לורם איפסום <small>דולור סיט אמט</small></h2>
            <p>
                נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף גולר
                        מונפרר סוברט  שבצק יהול, לכנוץ בעריר גק ליץ, נולום ארווס

            </p>
        </div>
    </div>
</div>
@endsection