
@extends('adminlte::page')

@section('title', 'Create Enrolment')

@section('content_header')
    <h1>Create Enrolment</h1>
@stop

@section('content')

    @include('partials.error')

    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Last Name</th>
                    <td>{{$student->lname}}</td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td>{{$student->fname}}</td>
                </tr>
                <tr>
                    <th>Middle Name</th>
                    <td>{{$student->mname}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{$student->fullAddress()}}</td>
                </tr>
            </table>
            <div class="alert alert-warning">
                Not yet enrolled.
            </div>
        </div>
        <div class="col-md-8">

            {!! Form::open(['url'=>"/enrol/", 'method'=>'post'])  !!}

            <?= Form::hidden('student_id', $student->id); ?>
            <?= Form::hidden('status', 'active'); ?>

            <div class="form-group">
                <?= Form::label('program_id', 'Program'); ?>
                <?= Form::select('program_id',
                    \App\Program::pluck('name','id'),
                    null,['class'=>'form-control', 'placeholder'=>'Select a program']); ?>
            </div>

            <div class="form-group">
                <?= Form::label('level_id', 'Level'); ?>
                <?= Form::select('level_id',
                    \App\Level::pluck('name','id'),
                    null,['class'=>'form-control', 'placeholder'=>'Select a level']); ?>
            </div>

            <div class="form-group">
                <?= Form::label('type', 'Type'); ?>
                <?= Form::select('type', [
                    'old' => 'Old Student',
                    'new' => 'New Student',
                    'transferee' => "Transferee"
            ],null, ['class'=>'form-control', 'placeholder'=>'Select type']); ?>
            </div>

            <div class="form-group">
                <?= Form::label('period_id', 'Period'); ?>
                <?= Form::select('period_id',
                    \App\Period::listEnrolment(),
                    null, ['class'=>'form-control', 'placeholder'=>'Select period']); ?>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    New Enrolment
                </button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

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
