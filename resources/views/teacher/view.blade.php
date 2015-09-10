@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Teacher: {{ $teacher->firstname . ' ' . $teacher->lastname}}</h1>
@endsection

@section('main-content')

<div class="row">
        <div class="col-md-3 col-sm-5 ">
        </div>

        <div class="col-md-2 col-sm-2 hidden-xs ">
                @if(empty($teacher->picture))
                     <img  class="img-responsive img-thumbnail img-teacher" src="{{url('/uploads/profile_pictures/default.jpg')}}" height="200" />
                @else
                     <img  class="img-responsive img-thumbnail img-teacher" src="{{url('/uploads/profile_pictures/').'/'.$teacher->picture}}" height="200" />
                @endif
        </div>

        <div class="col-md-1 col-sm-4 hidden-xs ">
                <br/>
                <div class="row">
                    <b>Name</b>
                </div>
                <div class="row">
                    <b>Telephone</b>
                </div>
                <div class="row">
                    <b>Experience</b>
                </div>
                <div class="row">
                    <b>Degrees</b>
                </div>
                <div class="row">
                    <b>Institute:</b>
                </div>
                <div class="row">
                    <b>DateofBirth</b>
                </div>
        </div>

        <div class="col-md-3 col-sm-7 hidden-xs ">
            <div class="row">
                <br/>
                {{$teacher->firstname.'   '.$teacher->lastname.'  '.'('.$teacher->nickname.')'}}
            </div>
            <div class="row hidden-xs">
                {{substr($teacher->teacher_phone,0,3)."-".substr($teacher->teacher_phone,3,3)."-".substr($teacher->teacher_phone,6)}}
            </div>
            <div class="row">
                {{$teacher->experience}}
            </div>
            <div class="row">
                {{$teacher->degrees}}
            </div>
            <div class="row">
                {{$teacher->institute}} 
            </div>
             <div class="row">
                {{date('j F Y' ,strtotime($teacher->date_of_birth))}} 
            </div>
        </div>


        <div class="visible-xs   col-xs-12 " >
            <div class="visible-xs visible-sm  col-xs-3">
            </div>
            <div class="visible-xs   col-xs-6">
                @if(empty($teacher->picture))
                     <img  class="img-responsive img-thumbnail img-teacher" src="{{url('/uploads/profile_pictures/default.jpg')}}" height="200" />
                @else
                     <img  class="img-responsive img-thumbnail img-teacher" src="{{url('/uploads/profile_pictures/').'/'.$teacher->picture}}" height="200" />
                @endif
            </div>
            <div class="visible-xs  col-xs-3">
            </div>
        </div>

       <div class="visible-xs  col-xs-1">
    </div>

        <div class="visible-xs  col-xs-4" >
            <br/>
               <div class="row">
                    <b>Name</b>
                </div>
                <div class="row">
                    <b>Experience</b>
                </div>
                <div class="row">
                    <b>Degrees</b>
                </div>
                <div class="row">
                    <b>Institute:</b>
                </div>
                <div class="row">
                    <b>DateofBirth</b>
                </div>
        </div>  

        <div class="visible-xs   col-xs-6" >  
                <div class="row">
                <br/>
               {{'ครู'.$teacher->nickname}}
            </div>
            <div class="row">
                {{$teacher->experience}}
            </div>
            <div class="row">
                {{$teacher->degrees}}
            </div>
            <div class="row">
                {{$teacher->institute}} 
            </div>
             <div class="row">
                {{date('j F Y' ,strtotime($teacher->date_of_birth))}} 
            </div>
        </div>
</div>
<div class="row">
    </br>
    </div>


<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Schedule</h3>
            </div>
            <div class="box-body">
                <div class="col-md-6 hidden-xs">
                    Teacher
                </div>
                <div class="col-md-6 hidden-xs">
                    Remaining Time (Hour)
                </div>
               @foreach ($scheduleList as $schedule)
                    <div class="col-md-6">
                     {{date('j M y G:i', strtotime($schedule->start_time))}}
                    </div>
                    <div class="col-md-6">
                        ..............
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


  

                   
    
                         
                        

                        

                
  



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
    </script>
    @endsection