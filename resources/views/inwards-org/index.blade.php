@extends('layouts.app')

@section('content')
<br><br><br>
    <h2 style="text-align:center;color:blue;font-weight:bolder;">@lang('app.inward') @lang('app.management')</h2>
    <div class="well">
        <a onclick="$('#inwards_view').load('{{url('/inwards/create')}}');" style="color:blue;"><i class="fa fa-plus" style="cursor: pointer;font-size:20px;"> @lang('app.new')</i></a>
    </div>
    <div class="clearfix" style="margin:20px;"></div>
    <div style="padding:0px 15px;">
        <table class="table table-condensed table-hover table-bordered" id="inwards_table">
            <thead>
                <th>@lang('app.worksheet') @lang('app.id')</th>
                <th>@lang('app.inward') @lang('app.id')</th>
                <th>From @lang('app.office') @lang('app.name')</th>
                <th>@lang('app.letter') @lang('app.id')</th>
                <th>@lang('app.letter') @lang('app.date')</th>
                <th>@lang('app.subject')</th>
                <th>TO @lang('app.office') @lang('app.name')</th>
                <th>@lang('app.inward') @lang('app.date')</th>
                <th>@lang('app.outward') @lang('app.id')</th>
                <th>@lang('app.comment')</th>
                <th>@lang('app.status')</th>
                <th>@lang('app.action')</th>
            </thead>
            <tbody>
                @foreach ($inwards as $inward)
                <tr>
                    <td style="width:85px;">{{ $inward -> worksheet_id }}</td>
                    <td style="width:85px;">{{ $inward -> id }}</td>
                    <td>{{ $inward -> Letter -> from_office }}</td>
                    <td>{{ $inward -> Letter -> id }}</td>
                    <td>{{ $inward -> Letter -> date }}</td>
                    <td>{{ $inward -> Letter -> subject }}</td>
                    <td>{{ $inward -> to_office }}</td>
                    <td>{{ $inward -> date }}</td>
                    <td>{{ $inward -> Outward -> id }}</td>
                    <td>{{ $inward -> comment }}</td>
                    <td>{{ $inward -> Letter -> status }}</td>
                    <td style="width:85px;">
                        <a href="/inwards/{{ $inward -> id }}" title="@lang('app.view')" style="text-decoration:none;"> <i class="far fa-eye" style="font-size:20px;"></i> </a> 
                        {{--<a onclick="$('#worksheets_view').load('{{url('/worksheets/'. $worksheet -> id .'/edit')}}');" title="@lang('app.edit')" style="text-decoration:none;cursor: pointer;"> <i class="far fa-edit" style="font-size:20px;"></i></a> 
                         <a href="/roles/{{ $role -> id }}" title="@lang('app.delete')" style="text-decoration:none;"> <i class="far fa-trash-alt" style="font-size:20px;"></i> </a>  --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="inwards_view" ></div>
    <script>
        $(document).ready(function() {
            var inwards_table =  $('#inwards_table').DataTable({
            dom: 'Bfrtip',
            buttons:[
                        {
                            extend: 'print',
                            exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]}
                        },
                        {
                            extend: 'excel',
                            exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]}
                        },
                        'colvis'
                    ],
            "columnDefs": [ {
                "targets": 11,
                "orderable": false,
                "searchable": false
                } ]
            });
        });
    </script>
@endsection