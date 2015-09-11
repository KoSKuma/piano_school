@extends('app')


@section('htmlheader_title')
List of all Teachers
@endsection


@section('contentheader_title')
<h1>Teacher <small>List of all teachers</small></h1>
@endsection


@section('main-content')



<div class="box box-solid box-default">
	<div class="box-header">	
		<div class="row">
			<form action="{{url('/teacher')}}" method="GET">
				@if (Entrust::can('create-teacher'))
				<div class="col-xs-12  text-left visible-xs" >
					<a href= "{{url('teacher/create')}}" class="btn btn-primary bg-primary custom-font" >
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
					</a>
				</div>
				@endif
				<div class="row">
					<div class="col-xs-12" style="height:10px">
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4  ">
					<div class="input-group ">
					  <input type="text" class="form-control" name="search" placeholder="Search for..." value="{!! $searchResult['keyword'] !!}">
				      <span class="input-group-btn">
				        <button class="btn btn-default " type="submmit">
				        	 <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				        	Search
				        </button>
				      </span>
					</div>
				</div>
				@if (Entrust::can('create-teacher'))
				<div class="col-sm-7  text-right hidden-xs col-md-8" >
					<a href= "{{url('teacher/create')}}" class="btn btn-primary bg-primary custom-font" >
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
					</a>
				</div>
				@endif
			</form>
		</div>
	</div><!-- /.box-header -->

	<div class="box-body">
		@if (isset($searchResult))
		<div class="row">
			<div class="col-xs-2 hidden-sm"></div>
		    <div class="col-xs-8 alert bg-gray color-palette">
		        <div class="col-xs-12">
		        	Search for {{$searchResult['keyword']}}, found {{$searchResult['count']}} results
		        </div>
		    </div>
		</div>
		@endif
		<div class="row ">
			<div class="col-sm-12 col-md-11 col-md-offset-1" id="teacher_list_table">
				<div class="row hidden-xs hidden-sm" id="table_header">
						<div class="col-sm-2 col-xs-4 col-header vcenter">
							<span><strong>Profile Picture</strong></span>
						</div>
						<div class="col-sm-2 col-header vcenter">
							<span><strong>Nick Name</strong></span>
						</div>
						<div class="col-sm-3 col-header vcenter">
							<span><strong>Full name</strong></span>
						</div>
						<div class="col-sm-2 col-header vcenter">
							<span><strong>Teacher Tel.</strong></span>
						</div>
						<div class="col-sm-3 col-header vcenter">
							<span><strong>Option</strong></span>
						</div>
				</div>

				@foreach ($teachers as $teacher)
				<div class="row" >	

						<div class="col-sm-2 col-xs-4" id="profile-picture">
							@if (!empty($teacher->picture))
							<img class=" img-thumbnail table-profile-picture" src="{{url('/uploads/profile_pictures/').'/'.$teacher->picture}}"  width="70px">
							@else
							<img class=" img-thumbnail table-profile-picture" src="{{url('/uploads/profile_pictures/')}}/default.jpg" width="70px" />
							@endif       
						</div>


						<div class="col-sm-2 hidden-xs">
							ครู{{$teacher->nickname}}  
						</div>
						<div class="col-sm-3 hidden-xs">
							{{$teacher->firstname." ".$teacher->lastname}}       
						</div>
						<div class="col-sm-2 hidden-xs">
							{{ substr($teacher->teacher_phone,0,3)."-".substr($teacher->teacher_phone,3,3)."-".substr($teacher->teacher_phone,6)}}      
						</div>

						<div class="col-xs-6 visible-xs">
							ครู{{$teacher->nickname}} <br>
							{{$teacher->firstname." ".$teacher->lastname}} <br>
							{{ substr($teacher->teacher_phone,0,3)."-".substr($teacher->teacher_phone,3,3)."-".substr($teacher->teacher_phone,6)}} 

						</div>

						<form action="{{url('teacher/restore')}}" method="post">
							{!! csrf_field() !!}
							<!-- Single button -->
							<div class="col-sm-3 hidden-xs hidden-sm" >

								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="id" id="delete_id" value="{{$teacher->id}}">
								@if (Entrust::can('view-teacher'))
								<a href= "{{url('teacher/'.$teacher->id)}}" class="btn btn- btn-default btn-sm">
									<i class="fa fa-eye"></i>
									View
								</a>
								@endif
								@if (Entrust::can('edit-teacher'))
								<a href= "{{url('teacher/'.$teacher->id.'/edit')}}" class="btn btn-flat btn-default btn-sm">
									<i class="fa fa-edit"></i>
									Edit
								</a>
								@endif
								@if (Entrust::can('delete-teacher'))
								<a 
									class="btn btn-flat btn-danger btn-sm"
									data-toggle="modal" 
									data-target="#myModal" 
									teacher_id="{{$teacher->id}}" 
									teacher_name="{{$teacher->nickname . ' (' . $teacher->firstname . ' ' . $teacher->lastname . ')'}}">
									<i class="fa fa-trash"></i>
									Delete
								</a>
								@endif

							</div>
						</form>
					<div class="visible-xs visible-sm col-xs-2 " >
						<form action="{{url('teacher/restore')}}" method="post">
							{!! csrf_field() !!}
							<!-- Single button -->
							<div class="btn-group  " >
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="id" id="delete_id" value="{{$teacher->id}}">

								<button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="glyphicon glyphicon-th"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right">
									@if (Entrust::can('view-teacher'))
									<li><a href= "{{url('teacher/'.$teacher->id)}}">View</a></li>
									@endif

									@if (Entrust::can('edit-teacher'))
									<li><a href= "{{url('teacher/'.$teacher->id.'/edit')}}">Edit</a></li>
									@endif

									@if (Entrust::can('delete-teacher'))
									<li><a 
										data-toggle="modal" 
										data-target="#myModal" 
										teacher_id="{{$teacher->id}}" 
										teacher_name="{{$teacher->nickname . ' (' . $teacher->firstname . ' ' . $teacher->lastname . ')'}}">
										Delete
									</a></li>
									@endif

									
								</ul>
							</div>

						</form>

					</div>

				</div>
				<div class="row">
					<div class="col-xs-12" style="height:10px">
					</div>
				</div>
				@endforeach
			</div><!--End teacher_list_table-->

	
			<div class="row">
				<div class="col-xs-12 col-sm-12 pagination-info vcenter  text-center">
					<span>{{App\helpers\TextHelper::paginationInfo($teachers)}}</span>
				</div>
				<div class="col-xs-12 text-center">
					@if (isset($searchResult))
						{!! $teachers->appends(['search' => $searchResult['keyword']])->render() !!}
					@else
						{!! $teachers->render() !!}
					@endif
				</div>
			</div>



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
		</div>
	</div>
</div>
@endsection


@section('script')
<script type="text/javascript">

$(document).ready(function(){
	$('#myModal').on('shown.bs.modal',function(e){
		$('#myInput').focus();
		console.log(e);
		delete_teacher_id = e.relatedTarget.attributes.teacher_id.value;
		delete_teacher_name = e.relatedTarget.attributes.teacher_name.value;

		$("#delete_message").html(delete_teacher_name);
		$("#confirm-delete").attr("action", "{{url('teacher')}}"+"/"+delete_teacher_id);
	});

	$("#search-icon").click(function(){
		alert('peh');
	});
});

</script>
@endsection