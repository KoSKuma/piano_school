@extends('app')


@section('htmlheader_title')
List of all classes
@endsection


@section('contentheader_title')
<h1>Homepage<small>Admin</small></h1>
@endsection


@section('main-content')

<h1>Comming Soon.....</h1>


@endsection

@section('script')
<script type="text/javascript">

$('#deleteModal').on('shown.bs.modal',function(e){
	delete_schedule_id = e.relatedTarget.attributes.schedule_id.value;
	delete_schedule_text = "<br />" + $("#attr_schedule_"+delete_schedule_id).attr("class_time") + "<br />" + $("#attr_schedule_"+delete_schedule_id).attr("teacher_nickname") + "<br />" + $("#attr_schedule_"+delete_schedule_id).attr("student_nickname");

	$("#delete_id_message").html(delete_schedule_id);
	$("#will_be_deleted_text").html(delete_schedule_text);
	$("#confirm-delete").attr("action", "{{url('schedule')}}"+"/"+delete_schedule_id);
});

</script>
@endsection