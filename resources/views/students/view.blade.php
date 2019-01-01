
@extends('adminlte::page')

@section('title', 'View Student')

@section('content_header')
    <div class="pull-right">
        <a href="{{url('/students/')}}/{{$student->id}}/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Update</a>
    </div>
    <h1>View Student: {{$student->fullName()}}</h1>
@stop   

@section('content')
    
    <div class="row">
        <div class="col-md-3 col-sm-5">
            <img src="{{asset('images/pic1.jpg')}}" class="profile-pic" alt="profile picture">
        </div>
        <div class="col-md-9 col-sm-7">
            <table class="table table-striped">
                <tr><th>ID</th><td>{{$student->id}}</td></tr>
                <tr><th>LRN</th><td>{{$student->lrn}}</td></tr>
                <tr><th>Name</th><td>{{$student->lname}}, {{$student->fname}} {{$student->mname}}</td></tr>
                <tr><th>Address</th><td>{{$student->fullAddress()}}</td></tr>
                <tr><th>Phone</th><td>{{$student->phone}}</td></tr>
                <tr><th>Gender</th><td>{{$student->gender}}</td></tr>
                <tr><th>Birth Date</th><td>{{$student->bdate}}</td></tr>
                <tr><th>Citizenship</th><td>{{$student->citizenship}}</td></tr>
                <tr><th>Mother</th><td>{{$student->mother}} | Tel.No. {{$student->mphone}}</td></tr>
                <tr><th>Father</th><td>{{$student->father}} | Tel.No. {{$student->fphone}}</td></tr>
                <tr><th>Parents' Address:</th><td>{{$student->pr_address}}</td></tr>
            </table>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <h3>Educational Records</h3>
        </div>
    </div>

@stop

@section('css')
    
@stop

@section('js')
    
@stop