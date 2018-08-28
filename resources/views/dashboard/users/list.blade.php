@extends('dashboard.layout.admin_master')
@section('title') Nwt.co.il @endsection
@section('styles')
<style>
    div.costum table{
        margin-top: 1em;
    }
    div.costum table thead,tbody{
        background: rgba(240,240,240,1);
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
                        <td><a href="{{ route('users.edit',$user->id) }}" class="btn btn-link">עריכה</a></td>
                        <td><a href="{{ route('users.destroy',$user->id) }}" class="btn btn-danger btn-xs pull-left">מחק משתמש</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>


@endsection