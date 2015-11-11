@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Student: <small>{{$student->user->firstname.' '.$student->user->lastname}}</small></h1>
@endsection


@section('main-content')
<div class="box box-solid box-default">
    <div class="box-header"></div>
    <div class="box-body">
        <div class="row">
        	<form action="{{url('student/restore')}}" method="post">
        		{!! csrf_field() !!}
        		<!-- Single button -->
                
                     <div class="col-xs-5 col-sm-1 pull-left ">
                        <a href= "{{url('student')}}" class="btn btn-flat btn-sm btn-default ">
                            <span class="glyphicon glyphicon-arrow-left"></span>
                             Back
                        </a>
                    </div>
            		<div class="col-xs-7 col-sm-11 text-right">
            			<input type="hidden" name="_token" value="{{ csrf_token() }}">
            			<input type="hidden" name="id" id="delete_id" value="{{$student->id}}">
            			
            				
            			@if (Entrust::can('edit-student'))
            			<a href= "{{url('student/'.$student->id.'/edit')}}" class="btn btn-default btn-flat btn-sm">
            				<i class="fa fa-edit"></i>
            				Edit
            			</a>
            			@endif

            		</div>

        	</form>
        </div>
        <div class="row" style="height:10px"></div>
        <div class="row">
             <div class="col-sm-4 text-center ">
             	@if(empty($student->user->picture))
            		<img class="img-thumbnail img-student" src="{{url('/uploads/profile_pictures/default.jpg')}}" width="200" />
            	@else
            		<img class="img-thumbnail img-student" src="{{url('/uploads/profile_pictures/').'/'.$student->user->picture}}" width="200" />
            	@endif
             </div>
             <div class="row" style="height:10px"></div>
             <div class="col-xs-12 col-sm-8 pull-center">
                 <table class="table">
                     <tbody>
                         <tr>
                             <td><b>Name</b></td>
                             <td>
                                 {{ $student->user->lastname.'   '.$student->user->lastname.'  '.'('.$student->user->nickname.')'}}
                             </td>
                         </tr>
                         <tr>
                             <td><b>Tel.<b></td>
                             <td>
                                {{substr($student->student_phone,0,3)."-".substr($student->student_phone,3,3)."-".substr($student->student_phone,6)}}
                             </td>
                         </tr>
                         <tr>
                             <td><b>Parent Tel.</b></td>
                              <td>
                                {{substr($student->parent_phone,0,3)."-".substr($student->parent_phone,3,3)."-".substr($student->parent_phone,6)}}
                             </td>
                         </tr>
                         <tr>
                             <td><b>E-mail</b></td>
                             <td>{{$student->user->email}}</td>
                         </tr>
                         <tr>
                             <td><b>Date of Birth</b></td>
                             <td>{{date('j F Y' ,strtotime($student->user->date_of_birth))}}</td>
                         </tr>
                     </tbody>
                 </table>
             </div>
        </div>

    </div>
</div>

@endsection

@section('script')
@endsection