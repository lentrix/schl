<!-- Modal Update Program -->
<div id="updateModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Update Program {{$program->accronym}}</h4>
            </div>
            {!! Form::model($program,['url'=>"/programs/$program->id", 'method'=>'patch'])  !!}
                <div class="modal-body">
                
                    <div class='form-group'>
                        <?= Form::label('accronym', 'Accronym'); ?>
                        <?= Form::text('accronym',null,['class'=>'form-control']); ?>
                    </div>

                    <div class='form-group'>
                        <?= Form::label('name', 'Name'); ?>
                        <?= Form::text('name',null,['class'=>'form-control']); ?>
                    </div>

                    <div class="form-group">
                        <?= Form::label('dept_id', 'Department'); ?>
                        <?= Form::select('dept_id', \App\Department::pluck('name','id'), null, ['class' => 'form-control', 'placeholder'=>'Select department']); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update Program</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>