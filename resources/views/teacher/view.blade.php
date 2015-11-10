@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Teacher: {{ $teacher->user->firstname . ' ' . $teacher->user->lastname}} </h1>
@endsection

@section('main-content')
<div class="box box-default">
    <div class="box-body">
        <div class="row">
            <form action="{{url('teacher/restore')}}" method="post">
                    {!! csrf_field() !!}
                    <!-- Single button -->
                      <div class="col-sm-1 pull-left">
                        <a href= "{{url('teacher')}}" class="btn btn-flat btn-sm btn-default ">
                            <span class="glyphicon glyphicon-arrow-left"></span>
                             Back
                        </a>
                    </div>
                    <div class="col-sm-11 text-right " >

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" id="delete_id" value="{{$teacher->id}}">
                    
                        @if (Entrust::can('edit-teacher'))
                        <a href= "{{url('teacher/'.$teacher->id.'/edit')}}" class="btn btn-flat btn-default btn-sm">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>
                        @endif
                     
                    </div>
            </form>
        </div>
        <div class="row" style="height:10px"></div>
        <div class="row">
            <div class="col-sm-4 text-center">
                    @if(empty($teacher->user->picture))
                        <img  class="img-responsive img-thumbnail img-teacher" src="{{url('/uploads/profile_pictures/default.jpg')}}" width="200" />
                    @else
                        <img  class="img-responsive img-thumbnail img-teacher" src="{{url('/uploads/profile_pictures/').'/'.$teacher->user->picture}}" width="200" />
                    @endif
            </div>
             <div class="row" style="height:10px"></div>
             <div class="col-xs-12 col-sm-8 pull-center">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td>
                                {{$teacher->user->firstname.'   '.$teacher->user->lastname.'  '.'('.$teacher->user->nickname.')'}}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Telephone</strong></td>
                            <td>
                                {{substr($teacher->teacher_phone,0,3)."-".substr($teacher->teacher_phone,3,3)."-".substr($teacher->teacher_phone,6)}}
                            </td>
                        </tr>
                         <tr>
                            <td><strong>E-mail</strong></td>
                            <td>
                                {{$teacher->user->email}}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Experience</strong></td>
                            <td>
                                {{$teacher->experience}}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Degrees</strong></td>
                            <td>
                                {{$teacher->degrees}}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Institute</strong></td>
                            <td>
                                {{$teacher->institute}} 
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Date of Birth</strong></td>
                            <td>
                                {{date('j F Y' ,strtotime($teacher->date_of_birth))}} 
                            </td>
                        </tr>
                    </tbody>
                </table>
             </div>
            
        </div>

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
  

                   
    
                         
                        

                        

                
  



    @endsection


    @section('script')
    <!-- InputMask -->
    <script src="{{url("plugins/input-mask/jquery.inputmask.js")}}" type="text/javascript"></script>
    <script src="{{url("plugins/input-mask/jquery.inputmask.date.extensions.js")}}" type="text/javascript"></script>
    <script src="{{url("plugins/input-mask/jquery.inputmask.extensions.js")}}" type="text/javascript"></script>
    <script type="text/javascript">
    $(function () {
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        $("[data-mask]").inputmask();
    });
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
    </script>
    @endsection