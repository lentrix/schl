
@extends('adminlte::page')

@section('title', 'Create User')

@section('content_header')
    <h1>Create User</h1>
@stop   

@section('content')

@include('partials.error')

<div class="row">
    <div class="col-md-6">
        {!! Form::open(['url'=>'/users']) !!}

        @include('admin.users._form')

        {!! Form::close() !!}
    </div>
</div>

@stop

@section('css')
    
@stop

@section('js')
    
@stop