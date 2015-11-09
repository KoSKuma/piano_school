@extends('app')


@section('htmlheader_title')
List of all classes
@endsection


@section('contentheader_title')
<h1>Homepage<small>Admin</small></h1>
@endsection


@section('main-content')

@include('teacherschedule.index');

@endsection

@section('script')

@endsection