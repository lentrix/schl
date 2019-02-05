<!-- Modal Update Class -->
<div id="updateModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Update Class {{$class->id}}</h4>
            </div>
            {!! Form::model($class,['url'=>"/classes/$class->id", 'method'=>'patch'])  !!}
                <div class="modal-body">

                <div class="form-group">
                        <?= Form::label('course_id', 'Course'); ?>
                        <?= Form::select('course_id',
                            \App\Course::orderBy('description')->pluck('description','id'),
                            null,['class'=>'form-control', 'placeholder'=>'Select a course']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('period_id', 'School Period'); ?>
                        <?= Form::select('period_id', \App\Period::listEnrolment(),
                            null,['class'=>'form-control','placeholder'=>'Select a period']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('teacher_id', 'Teacher'); ?>
                        <?= Form::select('teacher_id', \App\Teacher::list(),
                            null,['class'=>'form-control', 'placeholder'=>'Select a teacher']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('credit_units', 'Credit Units'); ?>
                        <?= Form::text('credit_units',null,['class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('pay_units', 'Pay Units'); ?>
                        <?= Form::text('pay_units',null,['class'=>'form-control']); ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update Class</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
