
@extends('adminlte::page')

@section('title', 'Departments')

@section('content_header')
    <h1>Departments</h1>
@stop   

@section('content')

    @include('partials.error')

    @include('depts._create')
    
    <div class="row">
        <div class="col-md-6">
            <div class="page-actions">
                <button id="create-btn" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Department</button>
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
    
    @if($depts)
    <div class="row">
        <div class="col-md-12">

            @if(isset($_GET['search']))
                <div class="annotation">
                    Search key "{{$_GET['search']}}" {{count($depts)}} record(s) found.
                </div>
            @endif

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Accronym</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($depts as $dept)
                        <tr class="clickable" id="{{$dept->id}}">
                            <td>{{$dept->accronym}}</td>
                            <td>{{$dept->name}}</td>
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
            document.location = "{{url('/depts')}}/" + id;
        })
        $("#create-btn").click(function(){
            $("#createModal").modal('show');
        })
    })
    </script>
@stop