<!-- Modal Update Teacher -->
<div id="createModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Create Teacher</h4>
            </div>
            {!! Form::open(['url'=>"/teachers/", 'method'=>'post'])  !!}
                <div class="modal-body">
                
                    <div class='form-group'>
                        <?= Form::label('title', 'Title'); ?>
                        <?= Form::text('title',null,['class'=>'form-control']); ?>
                    </div>

                    <div class='form-group'>
                        <?= Form::label('lname', 'Last Name'); ?>
                        <?= Form::text('lname',null,['class'=>'form-control']); ?>
                    </div>

                    <div class='form-group'>
                        <?= Form::label('fname', 'First Name'); ?>
                        <?= Form::text('fname', null, ['class' => 'form-control']); ?>
                    </div>

                    <div class='form-group'>
                        <?= Form::label('mname', 'Middle Name'); ?>
                        <?= Form::text('mname', null, ['class' => 'form-control']); ?>
                    </div>

                    <div class="form-group">
                        <?= Form::label('dept_id', 'Department'); ?>
                        <?= Form::select('dept_id', \App\Department::pluck('name','id'), null, ['class' => 'form-control', 'placeholder'=>'Select department']); ?>
                    </div>

                    <div class='form-group'>
                        <?= Form::label('specialty', 'Specialty'); ?>
                        <?= Form::text('specialty', null, ['class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Create Teacher</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>