
@if(Auth::user())
<!-- Modal -->
<div class="modal fade" id="inwards_create_model" role="dialog">
    <div class="modal-dialog" style="width:90vw;margin-top:2vw;">
        <div class="panel panel-primary">
            <div class="panel-heading">@lang('app.inward') @lang('app.create') <a type="button"  data-dismiss="modal" style="float:right;"><i class="fa fa-times" style="font-size:25px;color:red;cursor: pointer;"></i></a></div>
            <div class="panel-body">
                {!! Form::open(['action' => ['InwardsController@store'], 'method' => 'POST','id'=>'InwardsCreate', 'class' => 'form-horizontal']) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inward_id" class="col-md-2 control-label">@lang('app.inward') @lang('app.id')</label>
                        <div class="col-md-2">
                        <input id="inward_id" type="text" disabled class="form-control" name="inward_id" value="{{ $inward_cnt + 1 }}" required>
                        </div>
                
                        <label for="inward_date" class="col-md-2 control-label">@lang('app.inward') @lang('app.date')</label>
                        <div class="col-md-2">
                        <input id="inward_date" type="date" class="form-control" name="inward_date"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="letter_id" class="col-md-2 control-label">@lang('app.letter') @lang('app.id')</label>
                        <div class="col-md-2">
                        <input id="letter_id" type="text" class="form-control" name="letter_id"  required>
                        </div>
                        <label for="letter_date" class="col-md-2 control-label">@lang('app.letter') @lang('app.date')</label>
                        <div class="col-md-2">
                        <input id="letter_date" type="date" class="form-control" name="letter_date"  required>
                        </div>
                        <label for="from_office" class="col-md-2 control-label">FROM @lang('app.office') @lang('app.name')</label>
                        <div class="col-md-2">
                        <input id="from_office" type="text" class="form-control" name="from_office" required>
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
        $('#inwards_create_model').modal('show').slideToggle(2000);
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