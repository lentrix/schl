
@extends('adminlte::page')

@section('title', 'Classes')

@section('content_header')
    <h1>Classes</h1>
@stop   

@section('content')

    @include('classes._create')

    @include('partials.error')

    <div class="row">
        <div class="col-md-6">
            <div class="page-actions">
                <button class="btn btn-primary btn-sm" id="btn-create"><i class="fa fa-plus"></i> Add Class</button>
                <button class="btn btn-default btn-sm" id="btn-find-lrn"><i class="fa fa-search"></i> Schedule</button>
                <button class="btn btn-default btn-sm" id="btn-find-id"><i class="fa fa-search"></i> Teacher</button>
                <button class="btn btn-default btn-sm" id="btn-find-id"><i class="fa fa-search"></i> Room</button>
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

    @if($classes)

        <div class="row">
            <div class="col-xs-12">
                <span class="annotation">Search key {{$_GET['search']}} {{count($classes)}} record(s) found.</span>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Class ID</th>
                    <th>Course Code</th>
                    <th>Course Description</th>
                    <th>Teacher</th>
                    <th>Schedule</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classes as $class)

                <tr class="clickable" id="{{$class->id}}">
                    <td>{{$class->id}}</td>
                    <td>{{$class->course->code}}</td>
                    <td>{{$class->course->description}}</td>
                    <td>{{$class->teacher->fullName()}}</td>
                    <td>{{$class->scheduleText}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>

    @endif

@stop

@section('css')

@stop

@section('js')
    <script>
    $(document).ready(function(){
        $("#btn-create").click(function(){
            $("#createModal").modal('show');
        })

        $(".clickable").click(function(evt){
            var id = evt.currentTarget.id;
            document.location = '{{url("/classes/")}}/' + id;
        })
    })
    </script>
@stop