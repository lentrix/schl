
@extends('adminlte::page')

@section('title', 'Update Enrolment')

@section('content_header')
    <h1>Update Enrolment</h1>
@stop

@section('content')

@include('partials.error')

<?php $student = $enrol->student; ?>

    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Last Name</th>
                    <td>{{$student->lname}}</td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td>{{$student->fname}}</td>
                </tr>
                <tr>
                    <th>Middle Name</th>
                    <td>{{$student->mname}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{$student->fullAddress()}}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-8">

            {!! Form::model($enrol, ['url'=>"/enrols/$enrol->id", 'method'=>'patch'])  !!}

            @include('enrols._form')

            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    Update Enrolment
                </button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
