@extends('app')


@section('htmlheader_title')
List of all classes
@endsection


@section('contentheader_title')
<h1>Homepage<small>Student</small></h1>
@endsection


@section('main-content')

<div class="row">
	<div class="col-md-12 ">
		<div class="box box-solid box-default ">
			<div class="box-header">
				<div class="row">
					<div class="col-xs-12">
						<h3 class="box-title hidden-xs">Schedule of Student : {{Auth::user()->firstname.Auth::user()->lastname}}</h3>
	                	<h4 class="box-title visible-xs">Schedule : {{Auth::user()->firstname.Auth::user()->lastname}}
	                	</h5>
					</div>

				</div>
			</div><!-- /.box-header -->

			<div class="box-body">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>Class Date</th>
							<th>Teacher</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($scheduleList as $schedule)
						<tr>
							<td>
								{{date('j M Y G:i', strtotime($schedule->start_time))}}-{{date('G:i', strtotime($schedule->end_time))}}
							 </td>
							 <td>{{"ครู".$schedule->teacher_nickname}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
			</div>
		</div><!-- /.box-body -->
	</div>
</div>

@endsection