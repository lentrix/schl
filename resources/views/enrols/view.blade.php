
@extends('adminlte::page')

@section('title', 'View Enrolment')

@section('content_header')
    <div class="pull-right form-group">
        <a href="{{url('/enrols/' . $enrol->id . '/edit')}}" class="btn btn-primary">
            <i class="fa fa-edit"></i> Update Enrolment
        </a>
        <button class="btn btn-info">
            <i class="fa fa-plus"></i> Add to Section
        </button>
        <button class="btn btn-success" id="btnAddClass">
            <i class="fa fa-plus"></i> Add Class
        </button>
    </div>
    <h1>View Enrolment</h1>

@stop

@section('content')

    @include('enrols._add-class')
    @include('partials.error')

    <div class="row">
        <div class="col-md-4">

            <h4>Personal Details</h4>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Last Name</th>
                    <td>{{$enrol->student->lname}}</td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td>{{$enrol->student->fname}}</td>
                </tr>
                <tr>
                    <th>Middle Name</th>
                    <td>{{$enrol->student->mname}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{$enrol->student->fullAddress()}}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{$enrol->student->phone}}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-8">

            <h4>Enrolment Details</h4>
            <table class="table table-bordered table-striped">
                <tr><th>Period</th><td>{{$enrol->period->name}}</td></tr>
                <tr>
                    <th>Program</th>
                    <td>
                        {{$enrol->program->name}}
                        {{ $enrol->strand_id>0 ? " - " . $enrol->strand->identityString():""}}
                    </td>
                </tr>
                <tr><th>Level</th><td>{{$enrol->level->name}}</td></tr>
                <tr><th>Type</th><td>{{$enrol->type}}</td></tr>
                <tr><th>Status</th><td>{{$enrol->status}}</td></tr>

            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4>Class Schedule</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Day</th>
                        <th>Course No</th>
                        <th>Description</th>
                        <th>Venue</th>
                        <th>Teacher</th>
                    </tr>
                </thead>
            </table>
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
        $("#btnAddClass").click(function(){
            $("#modalAddClass").modal('show');
            console.log("add class.");
        })
    })
    </script>
@stop
