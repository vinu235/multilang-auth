
@if(Auth::user())
<!-- Modal -->
<div class="modal fade" id="letters_create_model" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="panel panel-primary">
            <div class="panel-heading">@lang('app.letter') @lang('app.create') <a type="button"  data-dismiss="modal" style="float:right;"><i class="fa fa-times" style="font-size:25px;color:red;cursor: pointer;"></i></a></div>
            <div class="panel-body">
                <div id="letters_msg" hidden></div> 
                {!! Form::open(array('action'=>'LettersController@store','method'=>'post','id'=>'LettersCreate', 'class' => 'form-horizontal','enctype' => 'multipart/form-data')) !!}
                    {{ csrf_field() }}
                    <input type="hidden" value="{{csrf_token()}}" id='token'>
                    <div class="form-group">
                        <label for="id" class="col-md-2 control-label">@lang('app.sr') @lang('app.id')</label>
                        <div class="col-md-2">
                        <input id="id" type="text" disabled class="form-control" name="id" value="{{ $letters_cnt + 1 }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="letter_id" class="col-md-2 control-label">@lang('app.letter') @lang('app.id')</label>
                        <div class="col-md-4">
                        <input id="letter_id" data-toggle="tooltip" title="@lang('app.required')" data-placement="right" type="text" class="form-control" name="letter_id" required>
                        </div>
                
                        <label for="date" class="col-md-2  control-label">@lang('app.letter') @lang('app.date')</label>
                        <div class="col-md-4">
                        <input id="date" data-toggle="tooltip" title="@lang('app.required')" data-placement="right" type="date" class="form-control" name="date"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="from_office" class="col-md-2 control-label">FROM @lang('app.office') @lang('app.name')</label>
                        <div class="col-md-4">
                        <input id="from_office" data-toggle="tooltip" title="@lang('app.required')" data-placement="right" type="text" class="form-control" name="from_office"  required>
                        </div>

                        <label for="type" class="col-md-2 control-label">@lang('app.type')</label>
                        <div class="col-md-4">
                        <input id="type" data-toggle="tooltip" title="@lang('app.required')" data-placement="right" type="text" class="form-control" name="type"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject" class="col-md-2 control-label">@lang('app.subject')</label>
                        <div class="col-md-8">
                        <input id="subject" data-toggle="tooltip" title="@lang('app.required')" data-placement="right" type="text" class="form-control" name="subject"  required>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label for="file_path" class="col-md-2 control-label">@lang('app.file')</label>
                        <div class="col-md-4">
                        <input id="file_path" data-toggle="tooltip" title="@lang('app.required')" data-placement="right" type="file" class="form-control" name="file_path" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" id="add_letter" class="btn btn-primary">
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
        $('#letters_create_model').modal('show');
        $('[data-toggle="tooltip"]').tooltip();
        function checkBlank(){
            var i = 0,file = 'notPresent';
            //console.log(document.forms['LettersCreate'].elements[2].value);
            for(i=3;i<document.forms['LettersCreate'].elements.length-3;i++){
                if(document.forms['LettersCreate'].elements['file_path'].files.length == 0)
                    document.forms['LettersCreate'].elements['file_path'].focus();
                else
                    file = 'present';
                if(document.forms['LettersCreate'].elements[i].value.trim() === ''){
                    document.forms['LettersCreate'].elements[i].focus();
                    i=document.forms['LettersCreate'].elements.length;
                }
            }
            if(i === document.forms['LettersCreate'].elements.length - 3 && file === 'present')
                return 'done';
            else
                return 'undone';
        }
        
        /* $('#add_letter').on('click',function(e){
            e.preventDefault();
            if(checkBlank() === 'done'){
                var data = {
                    'letter_id' : $('#letter_id').val(),
                    'from_office' : $('#from_office').val(),
                    'date' : $('#date').val(),
                    'subject' : $('#subject').val(),
                    'type' : $('#type').val(),
                    'file_path' : document.forms['LettersCreate'].elements['file_path'].files[0],
                    '_token' : $('#token').val(),
                }; 
                $.ajax({
                    url : "{{ url('/letters') }}",
                    type: 'post',  
                    data: data,
                    processData: false,
                    mimeType: 'multipart/form-data',
                    success:function(data){
                        console.log(data);
                        $('#letters_msg').show();
                        $('#letters_msg').attr('class','alert alert-success');
                        $('#letters_msg').html("@lang('app.letter') @lang('app.successful')");
                        for(var i=4;i<document.forms['LettersCreate'].elements.length-2;i++){
                            document.forms['LettersCreate'].elements[i].value = '';
                        }
                        document.forms['LettersCreate'].elements[3].value = Number(document.forms['LettersCreate'].elements[3].value) + 1;
                    },
                    error: function(output){
                        console.log(output);
                        $('#letters_msg').show();
                        $('#letters_msg').attr('class','alert alert-danger');
                        $('#letters_msg').html("@lang('app.letter') @lang('app.unsuccessful')");
                    }
                });
            }  
        });       */
    });
</script>
@endif