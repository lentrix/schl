<!-- Modal Create Period -->
<div id="createModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-check"></i> Create Period</h4>
            </div>
            {!! Form::open(['url'=>"/periods/", 'method'=>'post'])  !!}
                <div class="modal-body">
                
                    <div class='form-group'>
                        <?= Form::label('accronym', 'Accronym'); ?>
                        <?= Form::text('accronym',null,['class'=>'form-control']); ?>
                    </div>

                    <div class='form-group'>
                        <?= Form::label('name', 'Name'); ?>
                        <?= Form::text('name',null,['class'=>'form-control']); ?>
                    </div>
                    
                    <div class='form-group'>
                        <?= Form::label('start', 'Date Start'); ?>
                        <?= Form::date('start',null,['class'=>'form-control']); ?>
                    </div>
                    
                    <div class='form-group'>
                        <?= Form::label('end', 'Date End'); ?>
                        <?= Form::date('end',null,['class'=>'form-control']); ?>
                    </div>
                    
                    <div class='form-group'>
                        <?= Form::label('type', 'Type'); ?>
                        <?= Form::select('type', ['annual'=>'Annual','semestral'=>'Semestral','trimestral'=>'Trimestral'], null, ['class'=>'form-control']); ?>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Create Period</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>