@extends('layout.master-blog')
@section('title') Nwt.co.il @endsection
@section('styles')
   <link href="{{ URL::to('styles/pages.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('section')
    <div class="contant-body">
            @if(isset($articles))
                @foreach($articles as $article)
                    <article class="articles  panel panel-default">
                        
                        <div class="article-header bg-primary panel-heading">
                            <h2>{{ $article->title }}</h2>
                            <span> פורסם ע"י <a href="{{ route('getAllPost',$article->id) }}" title="הצג את כל הפוסטים של: {{ $article->user()->first()->first_name }}">
                                    {{ $article->user()->first()->first_name }} </a>בתאריך : {{ $article->published_at->format('d.m.Y h:i') }}
                            </span>
                            
                            
                        </div>
                        <div class="article-body panel-body">
                            <p class="lead">{{ $article->body }}</p>
                        </div>
                        <div class="article-footer bg-primary panel-footer">
                            <div class="castom-btn-gp btn-group pull-left">
                                @if(Auth::check())
                                    @if($article->user_id == Auth::id())
                                        <a href="{{ route('article.edit',$article->id) }}" class="btn btn-danger btn-xs">ערוך פוסט</a>
                                    @endif
                                
                                @endif
                                <a href="{{ route('getAllPost',$article->id) }}" class="btn btn-success btn-xs">הצג את הפוסטים של {{ $article->user()->first()->first_name }}</a>
                                <a href="{{ route('article.show',[$article->id]) }}" class="btn btn-warning btn-xs">המשך לקרוא</a>
                            </div>
                            @if(count($article->tags->lists('name')))
                            
                                <div class="castom-btn-gp btn-group pull-right">
                                    <h5 class="">תגיות:</h5>
                                

                                        @foreach($article->tags->lists('name') as $tag)
                                            <a href='#' class='btn btn-default btn-xs'>{{ $tag }} </a>
                                        @endforeach
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            @endif
    </div>
@endsection


@section('sidebar')
<div class="contant-aside">
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
</div>
@endsection