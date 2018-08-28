@extends('layout.master')

@section('title') Nwt.co.il @endsection

@section('styles')
    <link href="{{ URL::to('styles/home.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('section')
    
   <h1>canvas</h1>
   <div id="chartContainer" style="height: 300px; width: 100%;"></div>
@endsection


