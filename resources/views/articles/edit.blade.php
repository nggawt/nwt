@extends('layout.master')
@section('title') Nwt.co.il @endsection
@section('section')
<div class="container">
    <div class="row">
        
        {!! Form::model($articles, ['method' => 'PATCH','route' => ['article.update',$articles->id]]) !!}
        
        <div class="form-group">
            {!! Form::label('title', 'מאמר') !!}
            {!! Form::text('title',null,['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('body', 'כתוב תוכן') !!}
            {!! Form::textarea('body',null,['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('published_at', 'תאריך לפרסום',['class' => 'control-label']) !!}
            {!! Form::date('published_at', \Carbon\Carbon::now(),['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tag_list', 'תגיות:',['class' => 'control-label']) !!}
            {!! Form::select('tag_list[]',$tags ,null,['multiple' => true,'class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('שלח!',['class' => 'form-control btn btn-success']) !!}
        
        </div>
        
        {!! Form::close() !!}
    </div>
    @if(any($errors))
        @foreach($errors as $erro)
        {{ $error }}
        
        @endforeach
    
    @endif
    {{ $articles->tag_list}}
    <br />
    {{ count($articles->tag_list) }}
    <br />
</div>
@endsection