@extends('layouts.app')

@section('content')
<br><br><br>
    <h2 style="text-align:center;color:blue;font-weight:bolder;">@lang('app.worksheet') @lang('app.management')</h2>
    <div class="clearfix" style="margin:20px;"></div>
    <div style="padding:0px 15px;">
        <table class="table table-condensed table-hover table-bordered" id="worksheets_table">
            <thead>
                <th>@lang('app.worksheet') @lang('app.id')</th>
                <th>@lang('app.user') @lang('app.id')</th>
                <th>@lang('app.user') @lang('app.name')</th>
                <th>@lang('app.total') @lang('app.inward') @lang('app.letters')</th>
                <th>@lang('app.total') @lang('app.outward') @lang('app.letters')</th>
                <th>@lang('app.total') @lang('app.accepted') @lang('app.letters')</th>
                <th>@lang('app.total') @lang('app.awaiting') @lang('app.letters')</th>
                <th>@lang('app.total') @lang('app.rejected') @lang('app.letters')</th>
                <th>@lang('app.action')</th>
            </thead>
            <tbody>
                @foreach ($worksheets as $worksheet)
                <tr>
                    <td style="width:85px;">{{ $worksheet -> id }}</td>
                    <td style="width:85px;">{{ $worksheet -> user_id }}</td>
                    <td>{{ $worksheet -> user -> username }}</td>
                    <td>{{ $worksheet -> total_inward }}</td>
                    <td>{{ $worksheet -> total_outward }}</td>
                    <td>{{ $worksheet -> total_accepted }}</td>
                    <td>{{ $worksheet -> total_awaiting }}</td>
                    <td>{{ $worksheet -> total_rejected }}</td>
                    <td style="width:85px;">
                        <a href="/worksheets/{{ $worksheet -> id }}" title="@lang('app.view')" style="text-decoration:none;"> <i class="far fa-eye" style="font-size:20px;"></i> </a> 
                        {{--<a onclick="$('#worksheets_view').load('{{url('/worksheets/'. $worksheet -> id .'/edit')}}');" title="@lang('app.edit')" style="text-decoration:none;cursor: pointer;"> <i class="far fa-edit" style="font-size:20px;"></i></a> 
                         <a href="/roles/{{ $role -> id }}" title="@lang('app.delete')" style="text-decoration:none;"> <i class="far fa-trash-alt" style="font-size:20px;"></i> </a>  --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="worksheets_view" ></div>
    <script>
        $(document).ready(function() {
            var worksheets_table =  $('#worksheets_table').DataTable({
            dom: 'Bfrtip',
            buttons:[
                        {
                            extend: 'print',
                            exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]}
                        },
                        {
                            extend: 'excel',
                            exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6, 7]}
                        },
                        'colvis'
                    ],
            "columnDefs": [ {
                "targets": 8,
                "orderable": false,
                "searchable": false
                } ]
            });
        });
    </script>
@endsection