@extends('layout.master-blog')
@section('title') Nwt.co.il @endsection
@section('styles')
   <link href="{{ URL::to('styles/pages.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('section')
<h1>This is single article page</h1>
<div class="inner_sec">
    <div class="articles">
        <article class="main_article row">
            @if(isset($articles))
                
                    <div class="articles col-xs-12">
                        <h2>{{ $articles->title }}</h2>
                        <div class="bgcol">
                            <small> {{'פורסם ע"י ' . $articles->user()->first()->first_name . ' בתאריך' . $articles->published_at->format('d:m:Y h:i') }} </small>
                            <p>{{ $articles->body }}</p>
                            <div class="btn-group">
                                <a href="{{ route('article.edit',$articles->id) }}" class="btn btn-danger">ערוך פוסט</a>
                                <a href="{{ route('getAllPost',$articles->id) }}" class="btn btn-success">הצג את הפוסטים של  {{ $articles->user()->first()->first_name }}</a>
                                <a href="{{ route('article.index') }}" class="btn btn-success">חזור לכל הפוסטים</a>
                            </div>
                            @if(isset($tags))
                            <h5>תיוג</h5>
                            <div class="btn-group">
                                    @foreach($tags as $tag)
                                        <a href='#' class='btn btn-default btn-xs'>{{ $tag }} </a>
                                    @endforeach
                            </div>
                            @endif
                        </div>
                        {!! Form::open(['method' => 'POST','route' => ['article.store']]) !!}

                            <div class="form-group">
                                {!! Form::label('body', 'כתוב תגובה') !!}
                                {!! Form::textarea('body',null,['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('הגב!',['class' => 'form-control btn btn-success']) !!}

                            </div>          

                        {!! Form::close() !!}
                    </div>
            @endif
        </article>
    </div>
</div>
@endsection

@section('sidebar')
<div class="contant-aside">
    <div class="inner_sidebar ">
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