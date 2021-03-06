
@extends('adminlte::page')

@section('title', 'Create Enrolment')

@section('content_header')
    <h1>Create Enrolment</h1>
@stop

@section('content')

    @include('partials.error')

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
            <div class="alert alert-warning">
                Not yet enrolled.
            </div>
        </div>
        <div class="col-md-8">

            {!! Form::open(['url'=>'/enrols', 'method'=>'post'])  !!}

            @include('enrols._form')

            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    New Enrolment
                </button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
    <script>
    $(document).ready(function(){
        $(".clickable").click(function(evt){
            var id = evt.currentTarget.id;
            document.location = "{{url('/depts')}}/" + id;
        })
        $("#create-btn").click(function(){
            $("#createModal").modal('show');
        })
    })
    </script>
@stop
