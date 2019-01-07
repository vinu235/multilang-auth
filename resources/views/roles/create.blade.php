
@if(Auth::user())
<!-- Modal -->
<div class="modal fade" id="roles_create_model" role="dialog">
    <div class="modal-dialog" style="width:40vw;margin-top:10vw;">
        <div class="panel panel-primary">
            <div class="panel-heading">@lang('app.role') @lang('app.create') <a type="button"  data-dismiss="modal" style="float:right;"><i class="fa fa-times" style="font-size:25px;color:red;cursor: pointer;"></i></a></div>
            <div class="panel-body">
                {!! Form::open(['action' => ['RolesController@store'], 'method' => 'POST','id'=>'RolesCreate', 'class' => 'form-horizontal']) !!}
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('role_name') ? ' has-error' : '' }}">
                        <label for="role_name" class="col-md-4 control-label">@lang('app.role') @lang('app.name')</label>
                        <div class="col-md-6">
                            <input id="role_name" type="text" class="form-control" name="role_name" value="{{ old('role_name') }}" required autofocus>
                            @if ($errors->has('role_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                @lang('app.create')
                            </button>
                            <button type="reset" class="btn btn-danger">
                                @lang('auth.reset')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#roles_create_model').modal('show').slideToggle(2000);
        $('#add_role').click(function(){
            if($('#role_name').val() == ''){
                $('#role_name').focus();
            }else{
                var role_name = $('#role_name').val();
                var token = $('#token').val();
                $.ajax({
                    type: 'post',
                    data: {'role_name' :role_name , '_token' : token}, 
                    url : "{{ url('/roles') }}",
                    success:function(data){
                        $('#roles_msg').show();
                        $('#roles_msg').attr('class','alert alert-success');
                        $('#roles_msg').html("@lang('app.role') @lang('app.successful')");
                        $('#RolesCreate')[0].reset();
                    },
                    error: function(output){
                        $('#roles_msg').show();
                        $('#roles_msg').attr('class','alert alert-danger');
                        $('#roles_msg').html("@lang('app.role') @lang('app.unsuccessful')");
                    }
                });
            } 
        });      
    });
</script>
@endif