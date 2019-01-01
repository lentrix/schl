@extends('adminlte::page')

@section('title', 'Edit Student')

@section('content_header')
    <h1>Edit Student</h1>
@stop   

@section('content')
    
{!! Form::model($student, ['url'=>"/students/$student->id",'method'=>'put']) !!}

@include('students._form')

{!! Form::close() !!}

@stop
