
@extends('adminlte::page')

@section('title', 'Levels')

@section('content_header')
    <h1>Levels</h1>
@stop   

@section('content')

    @include('partials.error')

    @include('admin.levels._create')
    
    <div class="row">
        <div class="col-md-6">
            <div class="page-actions">
                <button id="create-btn" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Level</button>
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
    
    @if($levels)
    <div class="row">
        <div class="col-md-12">

            @if(isset($_GET['search']))
                <div class="annotation">
                    Search key "{{$_GET['search']}}" {{count($levels)}} record(s) found.
                </div>
            @endif

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($levels as $level)
                        <tr class="clickable" id="{{$level->id}}">
                            <td>{{$level->code}}</td>
                            <td>{{$level->name}}</td>
                            <td>{{$level->category}}</td>
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
            document.location = "{{url('/levels')}}/" + id;
        })
        $("#create-btn").click(function(){
            $("#createModal").modal('show');
        })
    })
    </script>
@stop