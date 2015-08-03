<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student</title>

    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"></link>

  
  </head>
  <body>
  	@yield('content')


  	<div class="row">
	  <div class="col-xs-12">

	    <nav class="navbar navbar-inverse ">  
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#">Project name</a>
	        </div>
	        <div id="navbar" class="collapse navbar-collapse">
	         <!--  <ul class="nav navbar-nav">
	            <li class="active"><a href="#">Home</a></li>
	            <li><a href="#about">About</a></li>
	            <li><a href="#contact">Contact</a></li>
	          </ul> -->
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>  

	  <div class="col-xs-2">
	  		@yield('divleft')
	  		<ul class="nav nav-pills nav-stacked">
  			    <li role="presentation" class="active"><a href="#">Home</a></li>
  				<li role="presentation"><a href="#">Profile</a></li>
  				<li role="presentation"><a href="#">Messages</a></li>
			</ul>
	  </div>


	  <div class="col-xs-6">
	  		@yield('divright')
	  </div>
	</div>
