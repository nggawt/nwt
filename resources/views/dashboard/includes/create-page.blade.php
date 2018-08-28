@extends('dashboard.layout.admin_master')
@section('title') Nwt.co.il @endsection
@section('section')
<div class="container">
    <div class="row">
        <h1 style="color: rgba(180,180,200,1);">צור דף חדש</h1>
        <form action="{{ route('pages.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="pageName">שם הדף</label>
                <input id="pageName" type="text" name="pageName" class="form-control">
            </div>

            <div class="form-group">
                <label for="title">כותרת הדף</label>
                <input id="title" type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="body">כתוב תוכן או קוד</label>
                <textarea style="height: 300px;direction:ltr;" id="body" name="body" class="form-control"></textarea>
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
            <!-- datepickr-calendar pull-right -->
            <div class="form-group">
                <label for="published_at">תאריך יצירת הדף</label>
                <input class="form-control" id="published_at" name="published_at" onclick="runDateCalendar(this)" value="{{ date('d-m-Y') }}">
            </div>
            <div class="form-group">
                 <input class="form-control btn btn-success" type="submit" value="צור דף חדש">
            </div>

        </form>
        @include('errors.createPaeErrors')
    </div>
   
</div>
    

@endsection