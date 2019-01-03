<!-- Modal Create Course -->
<div id="createModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-check"></i> Create Course</h4>
            </div>
            {!! Form::open(['url'=>"/courses/", 'method'=>'post'])  !!}
                <div class="modal-body">
                
                    <div class='form-group'>
                        <?= Form::label('code', 'Code'); ?>
                        <?= Form::text('code',null,['class'=>'form-control']); ?>
                    </div>

                    <div class='form-group'>
                        <?= Form::label('description', 'Description'); ?>
                        <?= Form::text('description',null,['class'=>'form-control']); ?>
                    </div>

                    <div class='form-group'>
                        <?= Form::label('units', 'Units'); ?>
                        <?= Form::text('units',null,['class'=>'form-control']); ?>
                    </div>

                    <div class='form-group'>
                        <?= Form::checkbox('academic',1,true); ?>
                        <?= Form::label('academic', 'Academic'); ?>
                    </div>

                    <div class="form-group">
                        <?= Form::label('program_id', 'Program'); ?>
                        <?= Form::select('program_id', \App\Program::pluck('name','id'), null, ['class' => 'form-control', 'placeholder'=>'Select program']); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Create Course</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>