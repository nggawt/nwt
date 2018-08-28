@extends('dashboard.layout.admin_master')
@section('title')
   Edit Page 
@endsection
@section('styles')
	<link href="{{ URL::to('styles/datepickr.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('section')
   <div class="container">
       <div class="row">
       	<hr>
           <h1 style="color: rgba(180,180,220,1);text-align: center;">ערוך דף</h1>
           <div style="text-align: left;"><span><a class="btn btn-primary" href="{{ route('page.editor',$page->id) }}">עורך דף מתקדם</a></span></div>
           {!! Form::model($page, ['method' => 'PATCH','route' => ['pages.update',$page->id]]) !!}
           
           <div class="form-group">
               {!! Form::label('page_name', 'שם הדף') !!}
               {!! Form::text('page_name',null,['class' => 'form-control']) !!}
           </div>

           <div class="form-group">
               {!! Form::label('title', 'כותרת') !!}
               {!! Form::text('title',null,['class' => 'form-control']) !!}
           </div>
           
           <div class="form-group">
               {!! Form::label('body', 'כתוב תוכן או קוד') !!}
               {!! Form::textarea('body',null,['class' => 'form-control']) !!}
           </div>

           <div class="form-group">

               <label for="Hierarchy">היררכיה</label>
               <select id="Hierarchy" name="ancestor" class="form-control">
                   <option selected="true" disabled="disabled">ראשי</option>
                   <optgroup name="main" label="&nbsp;&nbsp;&nbsp;&nbsp;היררכיה ראשי: בחר מיקום הופעה של הדף">
                          
                       @if(count($pageName))
                           @foreach($pageName as $key => $page)
                               <option style="padding: 5px 0;" value="{{$key}}">&nbsp;&nbsp;&nbsp;&nbsp; {{ $page }} </option>
                           @endforeach
                       @endif
                   </optgroup>
               </select>
           </div>
           <div class="form-group">
               <select id="Hierarchy" name="descendant" class="form-control">
                   <option selected="true" disabled="disabled">משני</option>
                   <optgroup name="main" label="&nbsp;&nbsp;&nbsp;&nbsp;היררכיה צאצא: בחר יורש הדף">
                          
                       @if(count($pageName))
                           @foreach($pageName as $key => $page)
                               <option style="padding: 5px 0;" value="{{$key}}">&nbsp;&nbsp;&nbsp;&nbsp; {{ $page }} </option>
                           @endforeach
                       @endif
                   </optgroup>
               </select>    
           </div>
           <div class="form-group">
               <label for="published_at">תאריך יצירת הדף</label>
               <input class="form-control" id="published_at" name="published_at" onclick="runDateCalendar(this)" value="{{ date('d-m-Y') }}">
           </div>
           <div class="form-group">
                <input class="form-control btn btn-success" type="submit" value="עדכן">
           </div>
           
           {!! Form::close() !!}

           @include('errors.createPaeErrors')
       </div>
      
   </div>
@endsection
@section('scripts')
        <script src="{{ URL::to('script/datepickr.js') }}"></script>
	

@endsection
