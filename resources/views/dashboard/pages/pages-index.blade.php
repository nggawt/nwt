@extends('dashboard.layout.admin_master')
@section('title') Nwt.co.il @endsection
@section('styles')
<style>
    div.costum table{
        margin-top: 1em;
        color: rgba(120,120,120,1);
    }
    div.costum table thead,tbody{
        /*background: rgba(242,248,252,1);*/
        /*margin-top: 1em;*/
    }
    table th {
        padding: 15px 0;
    }
    table th, table tr {
     border: 1px solid rgba(212,218,222,1);;
     }
     table th {
         text-align: center;
     }
     td , th{
        padding: 10px 0;
        /*width: 300px;*/
        text-align: center;
    }
    .table-hoverr tr:hover{
        background: rgba(242,248,252,1);
    }
 </style>
@endsection

@section('section')
<hr>
<div class="col-sm-8 col-sm-offset-2 costum">
    
    <table style="width:100%" class="table-hoverr">
    <a href="{{ route('pages.create') }}" class="btn btn-primary">צור דף חדש <bold>+</bold></a>
            
            <thead>
                <tr>
                    <th>דף</th>
                    <th>שם הדף</th>
                    <th>תוכן</th>
                    <th>בעלים</th>
                    <th>הרשאות</th>
                    <th>מיקום</th>
                    <th>היררכיה</th>
                    <th>עריכת דף</th>
                    <th>מחיקה</th>

                </tr>
                
            </thead>
            <tbody>
            @if(count($pages))
                @foreach($pages as $page)
                    <tr>
                        <td> {{ $page->page_name }} </td>
                        <td> {{ $page->title }} </td>
                        <td> {{ str_limit($page->body,5,'.....') }} </td>
                        <td> {{ $page->user->first_name }} </td>
                        <td> {{ $page->user->is_admin?"Admin" : "User" }} </td>
                        
                            <td> {{ $page->page_name === 'wellcome'? route('wellcome') : url($page->page_name) }} </td>
                        <td> {{ 'ראשי' }} </td>
                        <td><a href="{{ route('pages.edit',$page->id) }}" class="btn btn-link">עריכה</a></td>
                        <td><a href="{{ route('pages.destroy',$page->id) }}" class="btn btn-danger btn-xs pull-left">מחק משתמש</a></td> 
                    </tr>
                        
                   
            @endforeach
            </tbody>
        </table>
    @endif
</div>


@endsection