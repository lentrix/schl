
@extends('adminlte::page')

@section('title', 'View Program')

@section('content_header')
    <h1>View Program</h1>
@stop   

@section('content')

    @include('programs._edit')

    <div class="row">
        <div class="col-md-6">
            <div class="pull-right form-group">
                <button class="btn btn-success btn-sm" id="update-btn"><i class="fa fa-edit"></i> Update Program</button>
            </div>

            <table class="table-striped table">
                <tr><th>Accronym</th><td>{{$program->accronym}}</td></tr>
                <tr><th>Name</th><td>{{$program->name}}</td></tr>
                <tr><th>Department</th><td>{{$program->department?$program->department->name:'none'}}</td></tr>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    $(document).ready(function(){
        $("#update-btn").click(function(){
            $("#updateModal").modal('show');
        })
    })
    </script>
@stop