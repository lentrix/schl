
@extends('adminlte::page')

@section('title', 'View Course: ' . $course->code)

@section('content_header')
    <h1>View Course: {{$course->code}}</h1>
@stop   

@section('content')

    @include('courses._edit')

    @include('partials.error')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group pull-right">
                <button class="btn btn-success" id="btn-update"><i class="fa fa-edit"></i> Update Course</button>
            </div>

            <table class="table table-striped">
                <tr><th>Code</th><td>{{$course->code}}</td></tr>
                <tr><th>Description</th><td>{{$course->description}}</td></tr>
                <tr><th>Units</th><td>{{$course->units}}</td></tr>
                <tr><th>Type</th><td>{{$course->isAcademic()}}</td></tr>
                <tr><th>Program</th><td>{{$course->programName()}}</td></tr>
                <tr><th>Department</th><td>{{$course->deptName()}}</td></tr>
            </table>
        </div>
        <div class="col-md-6">
        
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4>Active {{$course->code}} Classes</h4>
        </div>
    </div>
@stop

@section('js')
    <script>
    $(document).ready(function(){
        $("#btn-update").click(function(){
            $("#updateModal").modal('show');
        })
    })
    </script>
@stop