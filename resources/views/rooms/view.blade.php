
@extends('adminlte::page')

@section('title', 'View Room: ' . $room->code)

@section('content_header')
    <h1>View Room: {{$room->code}}</h1>
@stop   

@section('content')

    @include('rooms._edit')

    @include('partials.error')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group pull-right">
                <button class="btn btn-success" id="btn-update"><i class="fa fa-edit"></i> Update Room</button>
            </div>

            <table class="table table-striped">
                <tr><th>Code</th><td>{{$room->code}}</td></tr>
                <tr><th>Name</th><td>{{$room->name}}</td></tr>
                <tr><th>Building</th><td>{{$room->building}}</td></tr>
                <tr><th>Floor</th><td>{{$room->floor}}</td></tr>
                <tr><th>Capacity</th><td>{{$room->capacity}}</td></tr>
            </table>
        </div>
        <div class="col-md-6">
        
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4>Active {{$room->code}} Classes</h4>
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