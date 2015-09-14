@extends('app')


@section('htmlheader_title')
List of all classes
@endsection


@section('contentheader_title')
<h1>Topup<small>List of all topup</small></h1>
@endsection


@section('main-content')

<div class="box box-solid box-default">
    <div class="box-header">
        <div class="row">
            <form action="{{url('/student')}}" method="GET">
            
                <div class="col-xs-12  text-left visible-xs" >
                    <a href= "{{url('payment/create')}}" class="btn btn-primary  custom-font" >
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
                    </a>
                </div>
               
                <div class="row">
                    <div class="col-xs-12" style="height:10px">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4  ">
                    <!-- <div class="input-group ">
                      <input type="text" class="form-control" name="search" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-default " type="submmit">
                             <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            Search
                        </button>
                      </span>
                    </div> -->
                </div>
                @if (Entrust::can('create-student'))
                <div class="col-sm-7  text-right hidden-xs col-md-8" >
                    <a href= "{{url('payment/create')}}" class="btn btn-primary custom-font" >
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
        
            <div class="row">
                
               <div class="col-sm-12 col-md-11 col-md-offset-1 " id="schedule_list_table">

                    <div class="row hidden-xs hidden-sm" id="table_header">
                        
                             <div class="col-sm-2 col-header vcenter">
                                <strong>Date</strong>
                            </div>

                             <div class="col-sm-3 col-header vcenter">
                                <strong>Student</strong>
                            </div>

                            <div class="col-sm-3 col-header vcenter">
                                <strong>Teacher</strong>
                            </div>
                           
                            <div class="col-sm-2 col-header vcenter">
                                <strong>Topup Hours</strong>
                            </div>
                  
                         <div class="col-sm-2 col-header vcenter">
                            <strong>Action</strong>
                        </div>
                      
                          
                    </div>
                    
                        @foreach($payments as $payment)
                            <div class="row">
                              
                                    <div class="col-sm-2 hidden-xs">
                                        {{date('j M Y G:i',strtotime($payment->created_at))}}
                                    </div>

                                     <div class="col-sm-3 hidden-xs">
                                        {{ $payment->students_firstname.' ' .$payment->students_lastname.' '.'('.$payment->students_nickname.')'}}         
                                    </div>
                                    
                                     <div class="col-sm-3 hidden-xs">
                                        {{ $payment->teachers_firstname. ' ' .$payment->teachers_lastname.' '.'('.'ครู'.$payment->teachers_nickname.')' }}
                                    </div>
                                 
                                     <div class="col-sm-2 hidden-xs">
                                      
                                        {{App\models\TimeHelper::calculateTimeFromMinutes($payment->topup_time)['hours'].' '}}
                                       
                                    </div>
                                    <div class="col-xs-10 visible-xs" >
                                        <span><b>Date :</b></span>
                                        {{date('j M Y G:i',strtotime($payment->created_at))}}<br>
                                        <span><b>Student :</b></span>
                                        {{$payment->students_firstname.' ' .$payment->students_lastname.' '.'('.$payment->students_nickname.')'}} <br>
                                        <span><b>Teacher :</b></span>
                                        {{ $payment->teachers_firstname. ' ' .$payment->teachers_lastname.' '.'('.'ครู'.$payment->teachers_nickname.')' }}<br>
                                        <span><b>Top Up :</b></span>
                                        {{App\models\TimeHelper::calculateTimeFromMinutes($payment->topup_time)['hours']." "}}
                                        <span>Hours</span>
                                        <br>
                                    </div>
                               

                                    <div class="col-sm-2 hidden-xs">     
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a class="btn btn-default btn-flat btn-sm"  href="{{url('payment/'.$payment->id.'/edit')}}">
                                                <i class="fa fa-edit"></i> Edit 
                                            </a>
                                    </div>

                                      <div class="col-xs-2 visible-xs">
                                        <div class="btn-group ">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a class="btn btn-default btn-flat btn-xs" href="{{url('payment/'.$payment->id.'/edit')}}" >
                                                 <i class="fa fa-edit"></i>
                                            </a>
                                              
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12" style="height:24px">
                                </div>
                            </div>
                        @endforeach
                      
                 


                 


                    <form action="" method="POST" id="confirm-delete"> 


                        <div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Delete Teacher</h4>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this class? (id: <span id="delete_id_message"></span>) <br />
                                        <span id="will_be_deleted_text">
                                        </span>
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
    </div>
</div><!-- /.box-body -->
</div>
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