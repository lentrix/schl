
@extends('adminlte::page')

@section('title', 'Courses')

@section('content_header')
    <h1>Courses</h1>
@stop   

@section('content')

    @include('partials.error')

    @include('courses._create')

    @include('courses._filter')
    
    <div class="row">
        <div class="col-md-6">
            <div class="page-actions">
                <button id="create-btn" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Course</button>
                <button id="filter-btn" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Filter by Program</button>
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
    
    @if($courses)
    <div class="row">
        <div class="col-md-12">

            @if(isset($_GET['search']))
                <div class="annotation">
                    Search key "{{$_GET['search']}}" {{count($courses)}} record(s) found.
                </div>
            @endif

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Units</th>
                        <th>Academic</th>
                        <th>Program</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr class="clickable" id="{{$course->id}}">
                            <td>{{$course->code}}</td>
                            <td>{{$course->description}}</td>
                            <td>{{$course->units}}</td>
                            <td>{{$course->isAcademic()}}</td>
                            <td>{{$course->programName()}}</td>
                            <td>{{$course->deptName()}}</td>
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
            document.location = "{{url('/courses')}}/" + id;
        })
        $("#create-btn").click(function(){
            $("#createModal").modal('show');
        })
        $("#filter-btn").click(function(){
            $("#filterModal").modal('show');
        })
    })
    </script>
@stop