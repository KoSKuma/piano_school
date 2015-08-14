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
    			<h3 class="box-title">Student List</h3>
    		</div>
      		<div class="col-xs-12 text-right">
      			<a href= "{{url('student/create')}}" class="btn btn-default" >
				       <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
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
				          		aria-sort="ascending">First Name</th>
                    <th 
                      class="sorting_asc" 
                      tabindex="0" 
                      aria-controls="example2" 
                      rowspan="1" colspan="1" 
                      aria-label="Rendering engine: activate to sort column descending" 
                      aria-sort="ascending">Last Name</th>

				          	<th class="sorting" 
				          		tabindex="0" 
				          		aria-controls="example2" 
				          		rowspan="1" colspan="1"
				          		aria-label="Browser: activate to sort column ascending">Nick Name</th>
          

                    <th class="sorting" 
                        tabindex="0" 
                        aria-controls="example2" 
                        rowspan="1" colspan="1" 
                        aria-label="Platform(s): activate to sort column ascending">Student Phone</th>

                    <th class="sorting" 
                        tabindex="0" 
                        aria-controls="example2" 
                        rowspan="1" colspan="1" 
                        aria-label="Platform(s): activate to sort column ascending">Parent Phone</th>

                     <th class="sorting" 
                        tabindex="0" 
                        aria-controls="example2" 
                        rowspan="1" colspan="1" 
                        aria-label="Platform(s): activate to sort column ascending">Option</th>

			          	
			        	</tr>
			        </thead>
        			<tbody>

              @foreach ($studentlist as $student)
                  <tr role="row" class="odd">
                      <td class="sorting_1">{{$student->firstname}}</td>
                      <td>{{$student->lastname}}</td>
                      <td>{{$student->nickname}}</td>
                      <td>{{$student->student_phone}}</td>
                       <td>{{$student->parent_phone}}</td>
                      <td>
                           
                            <a href= "{{url('student/'.$student->id.'/edit')}}" class="btn btn-default" >
                              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                            </a>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#myModal" student_id="{{$student->id}}" student_name="{{$student->firstname}}">
                              <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"> </span> Delete
                            </button>
           
                      </td>
                    </tr>
            @endforeach
        
            <form action="{{url('student/'.$student->id)}}" method="POST" id="confirm-delete"> 
                              

              <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Delete student</h4>
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
      delete_student_id = e.relatedTarget.attributes.student_id.value;
      delete_student_name = e.relatedTarget.attributes.student_name.value;
      
      $("#delete_message").html(delete_student_name);
      $("#confirm-delete").attr("action", "{{url('student')}}"+"/"+delete_student_id);
    });

 </script>
@endsection