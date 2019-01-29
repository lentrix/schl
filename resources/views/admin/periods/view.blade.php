
@extends('adminlte::page')

@section('title', 'View Period: ' . $period->accronym)

@section('content_header')
    <h1>View Period: {{$period->accronym}}</h1>
@stop

@section('content')

    @include('admin.periods._edit')

    @include('admin.periods._change-status')

    @include('partials.error')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group pull-right">
                <button class="btn btn-success" id="btn-update"><i class="fa fa-edit"></i> Update Period</button>
                <button class="btn btn-info" id="btn-change-status">
                    <i class="fa fa-edit"></i> Change Status
                </button>
            </div>

            <table class="table table-striped">
                <tr><th>Accronym</th><td>{{$period->accronym}}</td></tr>
                <tr><th>Name</th><td>{{$period->name}}</td></tr>
                <tr><th>Date Start</th><td>{{$period->start}}</td></tr>
                <tr><th>Date End</th><td>{{$period->end}}</td></tr>
                <tr><th>Type</th><td>{{$period->type}}</td></tr>
                <tr><th>Status</th><td>{{$period->status}}</td></tr>
                <tr>
                    <th>Figures</th>
                    <td>
                        <div>Classes <span class="badge pull-right">{{count($period->classes)}}</span></div>
                        <div>Students <span class="badge pull-right">1893<!-- temp --></span></div>
                    </td>
                </tr>
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
        $("#btn-change-status").click(function(){
            $("#changeStatusModal").modal('show');
        })
    })
    </script>
@stop
