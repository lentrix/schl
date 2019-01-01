
@extends('adminlte::page')

@section('title', 'Programs')

@section('content_header')
    <h1>Programs</h1>
@stop   

@section('content')

    @include('programs._filter')
    @include('programs._create')
    
    <div class="row">
        <div class="col-md-6">
            <div class="page-actions">
                <button id="create-btn" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Program</button>
                <button id="filter-btn" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Filter Department</button>
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

    @if($programs)

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Accronym</th>
                            <th>Name</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($programs as $program)
                        <tr class="clickable" id="{{$program->id}}">
                            <td>{{$program->accronym}}</td>
                            <td>{{$program->name}}</td>
                            <td>{{$program->department?$program->department->name:'none'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    $(document).ready(function(){
        $(".clickable").click(function(evt){
            var id = evt.currentTarget.id;
            document.location = '{{url("/programs")}}/' + id;
        })

        $("#filter-btn").click(function(){
            $("#filterModal").modal('show');
        })
        
        $("#create-btn").click(function(){
            $("#createModal").modal('show');
        })
    })
    </script>
@stop