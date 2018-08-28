@extends('dashboard.layout.admin_master')
@section('title') Nwt.co.il @endsection
@section('styles')
<style>
    div.costum table{
        margin-top: 1em;
    }
    div.costum table thead,tbody{
        /*background: rgba(240,240,240,1);*/
        margin-top: 1em;
    }
    table th {
        padding: 15px;
    }
    table th, table tr {
     border: 1px solid rgba(212,218,222,1);;
     }
     table th {
         text-align: center;
     }
     td {
        padding: 10px;
        text-align: center;
    }
 </style>
@endsection

@section('section')

<div class="col-sm-8 col-sm-offset-2 costum">
    @if(count($pages))
        <table style="width:100%" class="table-hover">
            <thead>
                <tr>
                    <th>דף</th>
                    <th>שם הדף</th>
                    <th>תוכן</th>
                    <th>הרשאות</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td> {{ $page->page_name }} </td>
                        <td> {{ $page->title }} </td>
                        <td> {{ $page->body }} </td>
                        
                        <td><a href="{{ route('pages.edit',$page->id) }}" class="btn btn-link">עריכה</a></td>
                        <td><a href="{{ route('pages.destroy',$page->id) }}" class="btn btn-danger">מחק משתמש</a></td> 
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>


@endsection