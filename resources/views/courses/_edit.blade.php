<!-- Modal Update Course -->
<div id="updateModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Update Course {{$course->code}}</h4>
            </div>
            {!! Form::model($course,['url'=>"/courses/$course->id", 'method'=>'patch'])  !!}
                <div class="modal-body">
                
                    <div class='form-group'>
                        <?= Form::label('code', 'Code'); ?>
                        <?= Form::text('code',null,['class'=>'form-control']); ?>
                    </div>

                    <div class='form-group'>
                        <?= Form::label('description', 'Description'); ?>
                        <?= Form::text('description',null,['class'=>'form-control']); ?>
                    </div>

                    <div class="form-group">
                        <?= Form::label('units', 'Units'); ?>
                        <?= Form::text('units',null,['class'=>'form-control']); ?>
                    </div>

                    <div class="form-group">
                        <?= Form::label('program_id', 'Program'); ?>
                        <?= Form::select('program_id', \App\Program::pluck('name','id'), null, ['class' => 'form-control', 'placeholder'=>'None']); ?>
                    </div>

                    <div class="form-group">
                        <?= Form::checkbox('academic',1,true); ?>
                        <?= Form::label('academic', 'Academic'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update Course</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>