@extends('layouts.app')

@section('content')
<div class="modal fade" id="roles_edit_page" role="dialog">
    <div class="modal-dialog" style="width:40vw;margin-top:10vw;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:lightblue;color:white;border-radius:5px;text-align:center;margin-bottom:1px;text-shadow: 2px 2px 2px black;">
                <a type="button"  data-dismiss="modal" style="float:right;"><i class="fa fa-times" style="font-size:45px;color:red;cursor: pointer;"></i></a>
                <h3>@lang('app.role') @lang('app.edit')</h3>
            </div>
            <div class="modal-body">
                <div id="roles_msg" hidden style="font-size:16px;padding:5px;"></div>
                {!! Form::open(['action' => ['RolesController@update', $role -> id], 'method' => 'POST']) !!}
                    <input type="hidden" id="token" name="token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="id" class="form-label col-md-3">@lang('app.id') : </label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="id" name="id" disabled value="{{ $role -> id }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="name" class="form-label col-md-3">@lang('app.role') : </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $role -> name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7 col-md-offset-3">
                            <a class="btn btn-success" id="role_update" name="role_update" title="@lang('app.update')"><i class="fa fa-check" style="font-size:25px;margin:0px;cursor:pointer;color:white;text-shadow: 2px 2px 2px black;"></i></a>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>    
</div>
<script>
    $(document).ready(function(){
        $('#roles_edit_page').modal('show').slideToggle(2000);
        
        $('#role_update').click(function(){
            var id = $('#id').val();
            var name = $('#name').val();
            
            var token = $('#token').val();
            var url1 = "{{ url('/roles/') }}";
            $.ajax({
                type: 'PUT',
                data: {'id': id,'name' : name,  '_token' : token}, 
                url : url1 + "/edit" + id,
                success:function(data){
                        $('#roles_msg').attr('hidden',false);
                        $('#roles_msg').attr('class','alert alert-success');
                        $('#roles_msg').html("@lang('app.successful')");
                    },
                error: function(output){
                        $('#roles_msg').attr('hidden',false);
                        $('#roles_msg').attr('class','alert alert-danger');
                        $('#roles_msg').html("@lang('app.unsuccessful')");
                    }

            });
        });
        
    });
</script>
@endsection