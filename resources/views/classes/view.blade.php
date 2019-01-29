
@extends('adminlte::page')

@section('title', 'View Class: ' . $class->id)

@section('content_header')
    <h1>View Course: {{$class->id}}</h1>
@stop   

@section('content')

    @include('classes._edit')
    @include('classes._add-sched')
    @include('classes._remove-sched')

    @include('partials.error')

    @if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="form-group pull-right">
                <button class="btn btn-success" id="btn-update"><i class="fa fa-edit"></i> Update Class</button>
            </div>

            <table class="table table-striped">
                <tr><th>Class ID</th><td>{{$class->id}}</td></tr>
                <tr><th>Course Code</th><td>{{$class->course->code}}</td></tr>
                <tr><th>Course Description</th><td>{{$class->course->description}}</td></tr>
                <tr><th>Credit Units</th><td>{{$class->credit_units}}</td></tr>
                <tr><th>Pay Units</th><td>{{$class->pay_units}}</td></tr>
                <tr><th>Teacher</th><td>{{$class->teacher->fullname}}</td></tr>
                <tr><th>School Period</th><td>{{$class->period->name}}</td></tr>
            </table>
            <hr>
            <div class="form-group">
            <div class="pull-right">
                <button title="Add a schedule" 
                        class="btn btn-primary btn-sm" 
                        id="btn-add-schedule">
                    <i class="fa fa-plus"></i> Add Schedule
                </button>
            </div>
            <h4>Schedule</h4>
            </div>
            @if(count($class->schedules) == 0)
                <div class="alert alert-warning">
                    <strong>Warning!</strong> This class do not have a schedule.
                </div>
            @else 
                <table class="table table-striped">
                    <thead>
                        <th>Start</th>
                        <th>End</th>
                        <th>Days</th>
                        <th>Room</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        @foreach($class->schedules as $sched)
                        <tr>
                            <td>{{$sched->start}}</td>
                            <td>{{$sched->end}}</td>
                            <td>{{$sched->days}}</td>
                            <td>{{$sched->room->name}}</td>
                            <td>
                                <button class="btn btn-danger btn-xs pull-right btn-remove-sched" 
                                        title="Remove Schedule" id="{{$sched->id}}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="col-md-6">
            <h4>Students List</h4>

            <ul class="list-group">
                <li class="list-group-item">1. Asopague, John Dexter K.</li>
                <li class="list-group-item">2. Reyes, Berndt Krissha L.</li>
                <li class="list-group-item">3. Salpocial, Eric Helm B.</li>
                <li class="list-group-item">4. Teringtering, Albert Par T.</li>
            </ul>
        </div>
    </div>
@stop

@section('js')
    <script>
    $(document).ready(function(){
        $("#btn-update").click(function(){
            $("#updateModal").modal('show');
        })
        $("#btn-add-schedule").click(function() {
            $("#addSchedModal").modal('show');
        })
        $(".btn-remove-sched").click(function(evt) {
            var id = evt.currentTarget.id;
            $("#schedule_id").val(id);
            $("#removeSchedModal").modal('show');
        })
    })
    </script>
@stop