
@extends('adminlte::page')

@section('title', 'Teachers')

@section('content_header')
    <h1>Teachers</h1>
@stop   

@section('content')
    
    @include('partials.error')

    @include('teachers._create')

    @include('teachers._filter')

    <div class="row">
        <div class="col-md-6">
            <div class="page-actions">
                <button id="create-btn" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Teacher</button>
                <button id="filter-btn" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Filter Specialty</button>
            </div>
        </div>
        <div class="col-md-6">
            <form action="" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    @if($teachers)
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Specialty</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                        <tr class="clickable" id="{{$teacher->id}}">
                            <td>{{$teacher->lname}}</td>
                            <td>{{$teacher->fname}}</td>
                            <td>{{$teacher->mname}}</td>
                            <td>{{$teacher->specialty}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

@stop

@section('css')
@stop

@section('js')
    <script>
    $(document).ready(function(){
        $(".clickable").click(function(evt){
            var id = evt.currentTarget.id;
            document.location = '{{url("/teachers")}}/' + id;
        })

        $("#create-btn").click(function(){
            $("#createModal").modal('show');
            console.log('create');
        })

        $("#filter-btn").click(function(){
            $("#filterModal").modal('show');
        })
    })
    </script>
@stop