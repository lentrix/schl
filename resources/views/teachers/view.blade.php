
@extends('adminlte::page')

@section('title', 'View Teacher')

@section('content_header')
    <h1>View Teacher</h1>
@stop   

@section('content')

    @include('teachers._edit')

    @include('teachers._activate')

    @include('partials.error')

    <div class="row">
        <div class="col-md-6">
            <div class="pull-right form-group">
                <button class="btn btn-info" id="edit-btn"><i class="fa fa-edit"></i> Update Teacher</button>
                @if($teacher->active)
                    <button class="btn btn-danger toggle-active"><i class="fa fa-remove"></i> Deactivate Teacher</button>
                @endif
                @if(!$teacher->active)
                    <button class="btn btn-success toggle-active"><i class="fa fa-check"></i> Activate Teacher</button>
                @endif
            </div>

            <table class="table table-striped">
                
                <tr><th>Title</th><td>{{$teacher->title}}</td></tr>
                <tr><th>Last Name</th><td>{{$teacher->lname}}</td></tr>
                <tr><th>First Name</th><td>{{$teacher->fname}}</td></tr>
                <tr><th>Middle Name</th><td>{{$teacher->mname}}</td></tr>
                <tr><th>Department</th><td>{{$teacher->department?$teacher->department->name:'none'}}</td></tr>
                <tr><th>Specialty</th><td>{{$teacher->specialty}}</td></tr>
                <tr><th>Status</th><td>{{$teacher->active?'Active':'Inactive'}}</td></tr>
                
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
        $("#edit-btn").click(function(){
            $("#updateModal").modal('show');
        })

        $(".toggle-active").click(function(){
            $("#activateModal").modal('show');
        })
    })
    </script>
@stop