@extends('layouts.app')

@section('content')
<br><br><br>
    <h2 style="text-align:center;color:blue;font-weight:bolder;">@lang('app.role') @lang('app.management')</h2>
    <div class="well">
        <a onclick="$('#roles_view').load('{{url('/roles/create')}}');" style="color:blue;"><i class="fa fa-plus" style="cursor: pointer;font-size:20px;"> @lang('app.new')</i></a>
    </div>
    <div class="clearfix" style="margin:20px;"></div>
    <div style="padding:0px 15px;">
        <table class="table table-condensed table-hover table-bordered" id="roles_table">
            <thead>
                <th>@lang('app.id')</th>
                <th>@lang('app.role') @lang('app.name')</th>
                <th>@lang('app.action')</th>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td style="width:85px;">{{ $role -> id }}</td>
                    <td>{{ $role -> name }}</td>
                    <td style="width:85px;">
                        <a onclick="$('#roles_view').load('{{url('/roles/'. $role -> id .'/edit')}}');" title="@lang('app.edit')" style="text-decoration:none;cursor: pointer;"> <i class="far fa-edit" style="font-size:20px;"></i> </a> 
                        <a href="/roles/{{ $role -> id }}" title="@lang('app.view')" style="text-decoration:none;"> <i class="far fa-eye" style="font-size:20px;"></i> </a> 
                        {{-- <a href="/roles/{{ $role -> id }}" title="@lang('app.delete')" style="text-decoration:none;"> <i class="far fa-trash-alt" style="font-size:20px;"></i> </a>  --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="roles_view" ></div>
    <script>
        $(document).ready(function() {
            var roles_table =  $('#roles_table').DataTable({
            dom: 'Bfrtip',
            buttons:[
                        {
                            extend: 'print',
                            exportOptions: {columns: [ 0, 1 ]}
                        },
                        {
                            extend: 'excel',
                            exportOptions: {columns: [ 0, 1 ]}
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