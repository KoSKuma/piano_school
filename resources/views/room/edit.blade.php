@extends('app')


@section('htmlheader_title')
Sample page
@endsection


@section('contentheader_title')

@endsection


@section('main-content')
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">

    <div class="box box-warning">
      <div class="box-header with-border">
        
      </div>

      <div class="box-body">
        <form role="form" class="form-horizontal" action="{{url("room/update/".$room->id)}}" method="post">
          

                  <div class="box-header with-border">
                    <h3 class="box-title">Edit Class Room</h3>
                  </div>
               
             
                  @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <input name="name" type="text" class="form-control" placeholder="Name ..." value="{{$room->name}}">
                      </div>
                    </div>


                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Location</label>
                      <div class="col-sm-10">
                        <input name="location" type="text" class="form-control" placeholder="Location ..." value="{{$room->location}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Description</label>
                      <div class="col-sm-10">
                        <textarea name="description" class="form-control" rows="3" placeholder="Description ..." >{{$room->description}}</textarea>
                      </div>
                    </div>
                    

                    
                  </div>
                  
        <div class="col-md-5"></div>

        <div class="col-md-2">
           <button class="btn btn-block btn-success">Update</button>
        </div> 
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
                
      </div>
  </div>
</div>

@endsection