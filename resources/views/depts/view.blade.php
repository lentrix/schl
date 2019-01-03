
@extends('adminlte::page')

@section('title', 'View Department: ' . $dept->code)

@section('content_header')
    <h1>View Department: {{$dept->code}}</h1>
@stop   

@section('content')

    @include('depts._edit')

    @include('partials.error')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group pull-right">
                <button class="btn btn-success" id="btn-update"><i class="fa fa-edit"></i> Update Department</button>
            </div>

            <table class="table table-striped">
                <tr><th>Accronym</th><td>{{$dept->accronym}}</td></tr>
                <tr><th>Name</th><td>{{$dept->name}}</td></tr>
            </table>
        </div>
        <div class="col-md-6">
        
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