<!-- Modal Add Class -->
<div id="modalAddClass" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Add Class</h4>
                </div>
                {!! Form::open(['url'=>"/enrols/$enrol->id/add-class", 'method'=>'post'])  !!}
                    <div class="modal-body">

                        <div class='form-group'>
                            <?= Form::label('class_id', 'Class ID#'); ?>
                            <?= Form::text('class_id',null,['class'=>'form-control']); ?>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Class</button>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
