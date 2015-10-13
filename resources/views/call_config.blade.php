@extends('app')
@section('main-content')
<table class="table table-hover " >
	<thead>
		<tr>
			<th>
				Days/Time
			</th>
			@foreach ($class_time as $time)

			<th>
				{{$time}}

			</th>
			@endforeach
	
		</tr>
	</thead>
	<tbody>
		<tr>
			<td></td>
		</tr>
	</tbody>
</table>
@endsection