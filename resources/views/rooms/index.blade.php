
@extends('adminlte::page')

@section('title', 'Rooms')

@section('content_header')
    <h1>Rooms</h1>
@stop   

@section('content')

    @include('partials.error')

    @include('rooms._create')

    @include('rooms._filter')
    
    <div class="row">
        <div class="col-md-6">
            <div class="page-actions">
                <button id="create-btn" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Rooms</button>
                <button id="filter-btn" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Filter by Building</button>
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
    
    @if($rooms)
    <div class="row">
        <div class="col-md-12">

            @if(isset($_GET['search']))
                <div class="annotation">
                    Search key "{{$_GET['search']}}" {{count($rooms)}} record(s) found.
                </div>
            @endif

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Building</th>
                        <th>Floor</th>
                        <th>Capacity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                        <tr class="clickable" id="{{$room->id}}">
                            <td>{{$room->code}}</td>
                            <td>{{$room->name}}</td>
                            <td>{{$room->building}}</td>
                            <td>{{$room->floor}}</td>
                            <td>{{$room->capacity}}</td>
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
            document.location = "{{url('/rooms')}}/" + id;
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