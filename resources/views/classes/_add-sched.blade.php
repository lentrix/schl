<!-- Modal Add Schedule -->
<div id="addSchedModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-search"></i> Add Schedule</h4>
            </div>

            {!! Form::open(['url'=>"/schedules/", 'method'=>'post'])  !!}
                
                <div class="modal-body">

                    <?= Form::hidden('classes_id', $class->id); ?>
                
                    <div class="form-group">
                        <?= Form::label('start', 'Start Time'); ?>
                        <?= Form::time('start', null, ['class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('end', 'End Time'); ?>
                        <?= Form::time('end', null, ['class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('days', 'Days'); ?>
                        <?= Form::text('days', null, ['class'=>'form-control','placeholder'=>'M,T,W,H,F,S,N']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('room_id', 'Room'); ?>
                        <?= Form::select('room_id',\App\Room::list(), 
                            null, ['class'=>'form-control','placeholder'=>'Select room']); ?>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Add Schedule</button>
                </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>