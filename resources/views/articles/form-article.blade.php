@extends('layout.master')
@section('title') Nwt.co.il @endsection
@section('section')
<div class="container">
    <div class="row">

        
        {!! Form::open(['method' => 'POST','route' => ['article.store']]) !!}
        
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
            {!! Form::label('tag_list', 'תיוג',['class' => 'control-label']) !!}
            {!! Form::select('tag_list[]',$tags,null,['multiple','class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('שלח!',['class' => 'form-control btn btn-success']) !!}
        
        </div>
        
        {!! Form::close() !!}
    </div>
    
</div>
    @include('errors.errors')

@endsection