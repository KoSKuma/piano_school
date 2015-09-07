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
<div class="box box-solid box-info">
    <div class="box-header ">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="box-title">Teacher List</h3>
            </div>
           @if (Entrust::can('create-teacher'))
            <div class="col-xs-12 text-right">
                <a href= "{{url('teacher/create')}}" class="btn btn-primary" >
                   <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
               </a>
            </div>
            @endif
        
        </div>

    </div><!-- /.box-header -->
    <div class="box-body">

        <div class="row ">
             <div class="col-sm-12 col-md-12 " id="schedule_list_table">
                <div class="row hidden-xs hidden-sm" id="table_header">
                    
                    <div class="col-md-2">
                            <strong>Picture</strong>
                    </div>
                    <div class="col-md-2">
                            <strong>Nick Name</strong>
                    </div>
                    <div class="col-md-2">
                            <strong>Full name</strong>
                    </div>
                    <div class="col-md-2">
                            <strong>Teacher Tel.</strong>
                    </div>
                    <div class="col-md-2">
                            <strong>Option</strong>
                    </div>
                </div>
                @foreach ($teacherlist as $teacher)
                    <div class="row ">
                         <div class="col-md-2 visible-xs text-right">
                            <form action="{{url('teacher/restore')}}" method="post">
                            {!! csrf_field() !!}
                            <!-- Single button -->
                                <div class="btn-group  " >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" id="delete_id" value="{{$teacher->id}}">

                                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

                    <div class="row ">
                        <div class="col-md-2 col-xs-4 ">
                          @if (!empty($teacher->picture))
                            <img class="img-responsive img-thumbnail" src="{{url('/uploads/profile_pictures/').'/'.$teacher->picture}}"  >
                          @else
                            <img class="img-responsive img-thumbnail"  src="{{url('/uploads/profile_pictures/')}}/default.jpg"   />
                          @endif       
                        </div>

                        <div class="col-md-2 ">
                               ครู{{$teacher->nickname}}  
                        </div>
                        <div class="col-md-2 ">
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
                                <button type="button" class="btn btn-default">Select Action</button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
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
                @endforeach
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