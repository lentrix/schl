
@extends('adminlte::page')

@section('title', 'View Course: ' . $level->name)

@section('content_header')
    <h1>View Course: {{$level->name}}</h1>
@stop   

@section('content')

    @include('admin.levels._edit')

    @include('partials.error')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group pull-right">
                <button class="btn btn-success" id="btn-update"><i class="fa fa-edit"></i> Update Course</button>
            </div>

            <table class="table table-striped">
                <tr><th>Code</th><td>{{$level->code}}</td></tr>
                <tr><th>Description</th><td>{{$level->name}}</td></tr>
                <tr><th>Units</th><td>{{$level->category}}</td></tr>
            </table>
        </div>
        <div class="col-md-6">
        
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4>Active {{$level->name}} Students</h4>
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