@extends('dashboard.layout.admin_master')
@section('title') Nwt.co.il @endsection
@section('styles')
<style>
    div.costum table{
        margin-top: 1em;
    }
    div.costum table thead,tbody{
        background:rgba(220,220,220,1);
        margin-top: 1em;
    }
    table, th, td {
     border: 1px solid black;
     }
     table th {
         text-align: center;
     }
     th, td {
        padding: 15px;
        text-align: center;
    }
 </style>
@endsection

@section('section')

<div class="col-sm-8 col-sm-offset-2 costum">
    @if(isset($users))
        <table style="width:100%" class="table-hover">
            <thead>
                <tr>
                    <th>שם</th>
                    <th>שם משפחה</th>
                    <th>תפקיד</th>
                    <th>הרשאות</th>
                </tr>
            </thead>
            <tbody>
               
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->is_admin == 1 ? 'מנהל': 'manager'}}</td>
                        <td>{{ $user->is_admin }}</td>
                        <td><a href="#" class="btn btn-default">עריכה</a></td>
                        <td><a href="#" class="btn btn-danger">מחק משתמש</a></td>
                    </tr>
                    @endforeach
               
            </tbody>
        </table>
    @endif
</div>


@endsection