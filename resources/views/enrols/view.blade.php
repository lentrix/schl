
@extends('adminlte::page')

@section('title', 'Departments')

@section('content_header')
    <h1>View Enrolment</h1>
@stop

@section('content')

    @include('partials.error')

    <h1>View Enrolment</h1>

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
