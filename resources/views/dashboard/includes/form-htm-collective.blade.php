
        {!! Form::open(['method' => 'POST','route' => ['pages.store']]) !!}
        
        <div class="form-group">
            {!! Form::label('pageName', 'שם הדף') !!}
            {!! Form::text('pageName',null,['class' => 'form-control']) !!}
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
            {!! Form::label('Hierarchy', 'היררכיה') !!}

            {!! Form::select('Hierarchy', 
            [
                "ראשי: בחר מיקום הופעה של הדף" => $pageName,
                 'בחר צאצא של:' => $pageName,
            ]
            ,null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('published_at', 'תאריך יצירת הדף',['class' => 'control-label']) !!}
            {!! Form::date('published_at', \Carbon\Carbon::now(),['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('צור דף',['class' => 'form-control btn btn-success']) !!}
        
        </div>
        
        {!! Form::close() !!}