@extends('layouts.app')

@section('content')
<br><br><br>
    <h2 style="text-align:center;color:blue;font-weight:bolder;">@lang('app.outward') @lang('app.management')</h2>
    {{-- <div class="well">
        <a onclick="$('#letters_view').load('{{url('/letters/create')}}');" style="color:blue;"><i class="fa fa-plus" style="cursor: pointer;font-size:20px;"> @lang('app.new')</i></a>
    </div> --}}
    <div class="clearfix" style="margin:20px;"></div>
    <div style="padding:0px 15px;">
        <table class="table table-condensed table-hover table-bordered" id="letters_table">
            <thead>
                <th>@lang('app.id')</th>
                <th>@lang('app.outward') @lang('app.id')</th>
                <th>@lang('app.outward') @lang('app.date')</th>
                <th>@lang('app.letter') @lang('app.id')</th>
                <th>@lang('app.letter') @lang('app.date')</th>
                <th>@lang('app.from') @lang('app.office')</th>
                <th>@lang('app.subject')</th>
                <th>@lang('app.type')</th>
                <th>@lang('app.status')</th>
            </thead>
            <tbody>
                {{-- @foreach ($letters as $letter)
                <tr>
                    <td style="width:85px;">{{ $letter -> id }}</td>
                    <td style="width:85px;">{{ $letter -> letter_id }}</td>
                    <td>{{ $letter -> from_office }}</td>
                    <td>{{ $letter -> date }}</td>
                    <td>{{ $letter -> subject }}</td>
                    <td>{{ $letter -> type }}</td>
                    <td><a onclick="$('#image').attr({'src':'/storage/letters/' + '{{ $letter -> file_path }}','alt':'{{ $letter -> file_path }}'});$('#img_modal').modal('show')" style="cursor:pointer;font-weight:bold;text-decoration:none;">@lang('app.view')</a></td>
                    <td>{{ $letter -> status }}</td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
    <div id="letters_view" ></div>
    <div id="img_modal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="panel panel-primary">
                <div class="panel-heading">@lang('app.letter')<a type="button"  data-dismiss="modal" style="float:right;"><i class="fa fa-times" style="font-size:25px;color:red;cursor: pointer;"></i></a></div>
                <div class="panel-body">
                <img id="image" class="img img-responsive">
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var letters_table =  $('#letters_table').DataTable({
            dom: 'Bfrtip',
            buttons:[
                        {
                            extend: 'print',
                            exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 7 ]}
                        },
                        {
                            extend: 'excel',
                            exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 7 ]}
                        },
                        'colvis'
                    ],
            "columnDefs": [ {
                "targets": 6,
                "orderable": false,
                "searchable": false
                } ]
            });
        });
    </script>
@endsection