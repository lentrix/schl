
@extends('adminlte::page')

@section('title', 'Students')

@section('content_header')
    <h1>Students</h1>

    @if($search)
    <p class="annotation">Search key "{{$search}}" {{count($students)}} record(s) found.</p>
    @endif
@stop   

@section('content')

    <!-- Modal Find LRN -->
    <div id="lrnModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Find LRN</h4>
                </div>
                <form action="{{url('students/find/lrn')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                    
                        <div class='form-group'>
                            <label for='lrn'>Enter LRN</label>
                            <input type='text' name='lrn' class='form-control' />
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Find LRN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Modal Find ID -->
    <div id="idModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Find ID Number</h4>
                </div>
                <form action="{{url('students/find/id')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class='form-group'>
                        <label for='id'>Enter ID Number</label>
                        <input type='text' name='id' class='form-control' />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Find ID</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @include('partials.error')

    <div class="row">
        <div class="col-md-6">
            <div class="page-actions">
                <a href="{{url('/students/create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Student</a>
                <button class="btn btn-default btn-sm" id="btn-find-lrn"><i class="fa fa-search"></i> Find LRN</button>
                <button class="btn btn-default btn-sm" id="btn-find-id"><i class="fa fa-search"></i> Find ID</button>
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
   
    
   
    @if($search)
        @if(count($students) > 0)
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>LRN</th>
                        <th>Name</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($students as $student)

                    <tr class="clickable" id="{{$student->id}}">
                        <td>{{$student->id}}</td>
                        <td>{{$student->lrn}}</td>
                        <td>{{$student->fullName()}}</td>
                        <td>{{$student->fullAddress()}}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        @else
            <p class="alert alert-info">No records found.</p>
        @endif
    @else
    <p class="alert alert-info">Use the search bar to display students.</p>
    @endif

@stop

@section('css')
    
@stop

@section('js')
    <script>
        $(document).ready(function(){
            $('.clickable').click(function(evt){
                document.location="{{url('/students/')}}/" + evt.currentTarget.id;
            })

            $('#btn-find-lrn').click(function(){
                $('#lrnModal').modal('show');
            })

            $('#btn-find-id').click(function(){
                $('#idModal').modal('show');
            })
        });
    </script>
@stop