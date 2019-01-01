@extends('adminlte::page')

@section('title', 'New Student')

@section('content_header')
    <h1>New Student</h1>

@stop   

@section('content')
    
{!! Form::open(['url'=>'/students']) !!}

    @include('students._form')

{!! Form::close() !!}

@stop
