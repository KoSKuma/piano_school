@extends('app')


@section('htmlheader_title')
Sample page
@endsection


@section('contentheader_title')
<h1>Teacher <small>List</small></h1>
@endsection


@section('main-content')

<div class="box box-solid box-custom-info">
	<div class="box-header">
		<div class="row">
			<div class="col-xs-6 col-md-12 vtop">
				<h3 class="box-title">Teacher List</h3>
				<span class="visible-xs">{{ (($teachers->currentPage() - 1) * $teachers->perPage() + 1) }}-{{ (($teachers->currentPage() - 1) * $teachers->perPage() + 1) + ($teachers->count() - 1)}} of {{$teachers->total()}}</span>
			</div>
			<div class="col-xs-2 pull-right visible-xs">
				@if (Entrust::can('create-teacher'))
				<div class="pull-right">
					<a href= "{{url('teacher/create')}}" class="btn btn-primary" >
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
					</a>
				</div>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 pagination-info vcenter hidden-xs">
				<span>{{ (($teachers->currentPage() - 1) * $teachers->perPage() + 1) }}-{{ (($teachers->currentPage() - 1) * $teachers->perPage() + 1) + ($teachers->count() - 1)}} of {{$teachers->total()}}</span>
			</div>
			<div class="col-xs-12 col-sm-1 pull-right hidden-xs">
				@if (Entrust::can('create-teacher'))
				<div class="pull-right">
					<a href= "{{url('teacher/create')}}" class="btn btn-primary" >
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
					</a>
				</div>
				@endif
			</div>
			<div class="col-xs-12 col-sm-4 box-tools pull-right">
				<form action="{{url('/teacher')}}" method="GET">
					<div class="has-feedback">
						<input class="form-control input-sm" name="search" placeholder="Search..." type="text">
						<span class="glyphicon glyphicon-search form-control-feedback with-white-bg" id="search-icon"></span>
					</div>
				</form>
			</div>
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
			<div class="col-sm-12 col-md-12" id="teacher_list_table">
				<div class="row hidden-xs hidden-sm" id="table_header">
					<div class="col-md-2 col-xs-3">
						<div class="col-md-2 col-header vcenter">
							<span><strong>Picture</strong></span>
						</div>
					</div>
					<div class="col-md-10 col-xs-7">
						<div class="col-md-2 col-header vcenter">
							<span><strong>Nick Name</strong></span>
						</div>
						<div class="col-md-3 col-header vcenter">
							<span><strong>Full name</strong></span>
						</div>
						<div class="col-md-2 col-header vcenter">
							<span><strong>Teacher Tel.</strong></span>
						</div>
						<div class="col-md-2 col-header vcenter">
							<span><strong>Option</strong></span>
						</div>
					</div>
				</div>

				@foreach ($teachers as $teacher)
				<div class="row ">
					<div class="col-md-2 col-xs-3">
						<div class="col-xs-12 visible-xs">
							@if (!empty($teacher->picture))
							<img class="img-responsive img-thumbnail img-teacher" style="min-width:52px; left:-10px; position:relative;" src="{{url('/uploads/profile_pictures/').'/'.$teacher->picture}}"  >
							@else
							<img class="img-responsive img-thumbnail img-teacher" style="min-width:52px; left:-10px; position:relative;" src="{{url('/uploads/profile_pictures/')}}/default.jpg"   />
							@endif       
						</div>

						<div class="col-sm-12 hidden-xs">
							@if (!empty($teacher->picture))
							<img class="img-responsive img-thumbnail img-teacher" src="{{url('/uploads/profile_pictures/').'/'.$teacher->picture}}"  >
							@else
							<img class="img-responsive img-thumbnail img-teacher" src="{{url('/uploads/profile_pictures/')}}/default.jpg" />
							@endif       
						</div>
					</div>
					<div class="col-md-10 col-xs-7">


						<div class="col-md-2 ">
							ครู{{$teacher->nickname}}  
						</div>
						<div class="col-md-3 ">
							{{$teacher->firstname." ".$teacher->lastname}}       
						</div>
						<div class="col-md-2 ">
							{{ substr($teacher->teacher_phone,0,3)."-".substr($teacher->teacher_phone,3,3)."-".substr($teacher->teacher_phone,6)}}      
						</div>

						<form action="{{url('teacher/restore')}}" method="post">
							{!! csrf_field() !!}
							<!-- Single button -->
							<div class="col-md-2 hidden-xs">
								<div class="btn-group ">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="id" id="delete_id" value="{{$teacher->id}}">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Select Action&nbsp;&nbsp;
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									</button>


									<ul class="dropdown-menu">
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
							</div>
						</form>
					</div>
					<div class="visible-xs col-xs-2 ">
						<form action="{{url('teacher/restore')}}" method="post">
							{!! csrf_field() !!}
							<!-- Single button -->
							<div class="btn-group  " >
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="id" id="delete_id" value="{{$teacher->id}}">

								<button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
					<div class="col-xs-12" style="height:24px">
					</div>
				</div>
				@endforeach
			</div><!--End teacher_list_table-->

			<div class="row">
				<div class="col-xs-12 text-center">
					{!! $teachers->render() !!}
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