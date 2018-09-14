
@if(Auth::user())
<!-- Modal -->
<div class="modal fade" id="categorycreatemodal" role="dialog">
   <div class="modal-dialog" style="width:40vw;margin-top:10vw;">
   
       <!-- Modal content-->
       <div class="modal-content">
           <div class="modal-header" style="background-color:lightblue;color:white;border-radius:5px;text-align:center;margin-bottom:1px;text-shadow: 2px 2px 2px black;">
           <a type="button"  data-dismiss="modal" style="float:right;"><i class="fa fa-times" style="font-size:45px;color:red;cursor: pointer;"></i></a>

           <h2>वर्गवारी तयार करा</h2>
       </div>
   <div class="modal-body" style="border-radius:5px;margin:1px;">
   <div id="categorymsg" hidden style="font-size:16px;padding:5px;"></div>
           {!! Form::open(['action' => ['CategoriesController@store'], 'method' => 'POST','id'=>'CategoriesCreate']) !!}
           <input type="hidden" id="token" name="token" value="{{ csrf_token() }}">
               <div class="form-group">
                   <h5>{!! Form::label('category_name','वर्गवारीचे नाव :') !!}</h5>
                   {!! Form::text('category_name', '',['class' => 'form-control','id'=> 'category_name','style'=> 'width:250px;']) !!}
               
               </div>
               
           <a class="btn btn-success" id="addcategory" name="addcategory"><i class="fa fa-check" style="font-size:25px;margin:0px;cursor:pointer;color:white;text-shadow: 2px 2px 2px black;"></i></a>
           {!! Form::close() !!}
           </div>
       </div>
  
   </div>

   <script>
       $(document).ready(function(){
           $('#categorycreatemodal').modal('show').slideToggle(2000);
           
           $('#addcategory').click(function(){
              if($('#category_name').val() == ''){
                  $('#category_name').focus();
               }else{
                   var category_name = $('#category_name').val();
                   
                   var token = $('#token').val();
                   $.ajax({
                       type: 'post',
                       data: {'category_name' :category_name , '_token' : token}, 
                       url : "{{ url('/categories') }}",
                       success:function(data){
                           $('#categorymsg').show();
                           $('#categorymsg').attr('class','alert alert-success');
                           $('#categorymsg').html("वर्गवारी यशस्वीरीत्या तयार झाली");
                           $('#CategoriesCreate')[0].reset();
                       },
                       error: function(output){
                           $('#categorymsg').show();
                           $('#categorymsg').attr('class','alert alert-danger');
                           $('#categorymsg').html("वर्गवारी तयार करण्यास समस्या");
                       }

                   });
               }
               
               
           });
           
               
       });
   </script>
@endif