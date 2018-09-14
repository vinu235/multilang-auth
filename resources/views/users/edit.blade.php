@extends('layouts.app')

@section('content')
<div class="modal fade" id="users_edit_page" role="dialog">
    <div class="modal-dialog" style="width:40vw;margin-top:10vw;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:lightblue;color:white;border-radius:5px;text-align:center;margin-bottom:1px;text-shadow: 2px 2px 2px black;">
                <a type="button"  data-dismiss="modal" style="float:right;"><i class="fa fa-times" style="font-size:45px;color:red;cursor: pointer;"></i></a>
                <h3>@lang('app.user') @lang('app.edit')</h3>
            </div>
            <div class="modal-body">
                <div id="users_msg" hidden style="font-size:16px;padding:5px;"></div>
                {!! Form::open(['action' => ['UsersController@update', $user -> id], 'method' => 'POST']) !!}
                    <input type="hidden" id="token" name="token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="id" class="form-label col-md-3">@lang('app.id') : </label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="id" name="id" disabled value="{{ $user -> id }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="name" class="form-label col-md-3">@lang('auth.username') : </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="username" name="username" value="{{ $user -> username }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7 col-md-offset-3">
                            <a class="btn btn-success" id="user_update" name="user_update" title="@lang('app.update')"><i class="fa fa-check" style="font-size:25px;margin:0px;cursor:pointer;color:white;text-shadow: 2px 2px 2px black;"></i></a>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>    
</div>
<script>
    $(document).ready(function(){
        $('#users_edit_page').modal('show').slideToggle(2000);
        
        $('#user_update').click(function(){
            var id = $('#id').val();
            var username = $('#username').val();
            
            var token = $('#token').val();
            var url1 = "{{ url('/users/') }}";
            $.ajax({
                type: 'PUT',
                data: {'id': id,'username' : username,  '_token' : token}, 
                url : url1 + "/edit" + id,
                success:function(data){
                        $('#users_msg').attr('hidden',false);
                        $('#users_msg').attr('class','alert alert-success');
                        $('#users_msg').html("@lang('app.successful')");
                    },
                error: function(output){
                        $('#users_msg').attr('hidden',false);
                        $('#users_msg').attr('class','alert alert-danger');
                        $('#users_msg').html("@lang('app.unsuccessful')");
                    }

            });
        });
        
    });
</script>
@endsection