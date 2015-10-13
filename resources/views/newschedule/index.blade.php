@extends('app')


@section('htmlheader_title')

@endsection


@section('contentheader_title')
<h1>New Schedule <small>Schedule List</small></h1>
@endsection


@section('main-content')
<div class="box box-solid box-default">
	<div class="box-header">
	</div>
	<div class="box-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Days/Time</th>
					@foreach($time as $time_array)
					<th>
						{{$time_array}}
					</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>จันทร์</td>
				</tr>
				<tr>
					<td>อังคาร</td>
				</tr>
				<tr>
					<td>พุธ</td>
				</tr>
				<tr>
					<td>พฤหัสบดี</td>
				</tr>
				<tr>
					<td>ศุกร์</td>
				</tr>
				<tr>
					<td>เสาร์</td>
				</tr>
				<tr>
					<td>อาทิตย์</td>
				</tr>

			</tbody>
		</table>
	</div>

</div>


@endsection