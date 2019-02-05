
@extends('adminlte::page')

@section('title', 'View Enrolment')

@section('content_header')
    <h1>View Enrolment</h1>
@stop

@section('content')

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
