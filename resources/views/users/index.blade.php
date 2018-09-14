@extends('layouts.app')

@section('content')
<br><br><br>
    <h2 style="text-align:center;color:blue;font-weight:bolder;">@lang('app.user') @lang('app.management')</h2>
    <div class="clearfix" style="margin:20px;"></div>
    <div style="padding:0px 15px;">
        <table class="table table-condensed table-hover table-bordered" id="users_table">
            <thead>
                <th>@lang('app.id')</th>
                <th>@lang('app.user') @lang('app.name')</th>
                <th>@lang('auth.email')</th>
                <th>@lang('app.action')</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td style="width:85px;">{{ $user -> id }}</td>
                    <td>{{ $user -> username }}</td>
                    <td>{{ $user -> email }}</td>
                    <td style="width:85px;">
                        <a onclick="$('#users_view').load('{{url('/users/'. $user -> id .'/edit')}}');" title="@lang('app.edit')" style="text-decoration:none;cursor: pointer;"> <i class="far fa-edit" style="font-size:20px;"></i> </a> 
                        {{--<a href="/users/{{ $user -> id }}" title="@lang('app.view')" style="text-decoration:none;"> <i class="far fa-eye" style="font-size:20px;"></i> </a> 
                         <a href="/roles/{{ $role -> id }}" title="@lang('app.delete')" style="text-decoration:none;"> <i class="far fa-trash-alt" style="font-size:20px;"></i> </a>  --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="users_view" ></div>
    <script>
        $(document).ready(function() {
            var users_table =  $('#users_table').DataTable({
            dom: 'Bfrtip',
            buttons:[
                        {
                            extend: 'print',
                            exportOptions: {columns: [ 0, 1, 2 ]}
                        },
                        {
                            extend: 'excel',
                            exportOptions: {columns: [ 0, 1, 2 ]}
                        },
                        'colvis'
                    ],
            "columnDefs": [ {
                "targets": 2,
                "orderable": false,
                "searchable": false
                } ]
            });
        });
    </script>
@endsection