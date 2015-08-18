@extends('app')


@section('htmlheader_title')
Sample page
@endsection


@section('contentheader_title')

@endsection


@section('main-content')
    <style>
      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }
      .example-modal .modal {
        background: transparent!important;
      }
    </style>
<div class="box">
    <div class="box-header">
    	<div class="row">
    		<div class="col-xs-6">
    			<h3 class="box-title">Schedule List</h3>
    		</div>
      		<div class="col-xs-12 text-right">
      			<a href= "{{url('schedule/create')}}" class="btn btn-default" >
				       <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>Booking
				    </a>
      			<!-- <button type="button" class="btn btn-default" >
				  <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
				</button> -->
      		</div>
      	</div>
      
    </div><!-- /.box-header -->
    <div class="box-body">
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      	<div class="row">
      		<div class="col-sm-12">
      			<table 
      				id="example2" 
      				class="table table-bordered table-hover dataTable" 
      				role="grid" aria-describedby="example2_info">
			        <thead>
				         <tr role="row">
				          	<th 
				          		class="sorting_asc" 
				          		tabindex="0" 
				          		aria-controls="example2" 
				          		rowspan="1" colspan="1" 
				          		aria-label="Rendering engine: activate to sort column descending" 
				          		aria-sort="ascending">Teacher</th>
                    <th 
                      class="sorting_asc" 
                      tabindex="0" 
                      aria-controls="example2" 
                      rowspan="1" colspan="1" 
                      aria-label="Rendering engine: activate to sort column descending" 
                      aria-sort="ascending">Student</th>

				          	<th class="sorting" 
				          		tabindex="0" 
				          		aria-controls="example2" 
				          		rowspan="1" colspan="1"
				          		aria-label="Browser: activate to sort column ascending">Start Time</th>
          

                    <th class="sorting" 
                        tabindex="0" 
                        aria-controls="example2" 
                        rowspan="1" colspan="1" 
                        aria-label="Platform(s): activate to sort column ascending">End Time</th>

                     <th class="sorting" 
                        tabindex="0" 
                        aria-controls="example2" 
                        rowspan="1" colspan="1" 
                        aria-label="Platform(s): activate to sort column ascending">Location</th>

			          	
			        	</tr>
			        </thead>
        			<tbody>
        


            <form action="" method="POST" id="confirm-delete"> 
                              

              <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Delete Teacher</h4>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete <span id="delete_message"></span>? 
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button class="btn btn-danger" >
                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"> </span> Delete
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
         
          </form>

    
 
				      
      				</tbody>
       
      			</table>

      		</div>
      	</div>
   
      	</div>
      </div>
    </div><!-- /.box-body -->
 </div>
 <script type="text/javascript">
 
    $('#myModal').on('shown.bs.modal',function(e){
      $('#myInput').focus();
      console.log(e);
      delete_teacher_id = e.relatedTarget.attributes.teacher_id.value;
      delete_teacher_name = e.relatedTarget.attributes.teacher_name.value;
      
      $("#delete_message").html(delete_teacher_name);
      $("#confirm-delete").attr("action", "{{url('teacher')}}"+"/"+delete_teacher_id);
    });


    


 </script>
@endsection