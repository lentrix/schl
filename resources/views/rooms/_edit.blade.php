<!-- Modal Update Room -->
<div id="updateModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Update Room {{$room->code}}</h4>
            </div>
            {!! Form::model($room,['url'=>"/rooms/$room->id", 'method'=>'patch'])  !!}
                <div class="modal-body">
                
                    <div class='form-group'>
                        <?= Form::label('code', 'Code'); ?>
                        <?= Form::text('code',null,['class'=>'form-control']); ?>
                    </div>

                    <div class='form-group'>
                        <?= Form::label('name', 'Name'); ?>
                        <?= Form::text('name',null,['class'=>'form-control']); ?>
                    </div>

                    <div class='form-group'>
                        <?= Form::label('building', 'Building'); ?>
                        <?= Form::text('building',null,['class'=>'form-control']); ?>
                    </div>

                    <div class='form-group'>
                        <?= Form::label('floor', 'Floor'); ?>
                        <?= Form::text('floor',null,['class'=>'form-control']); ?>
                    </div>

                    <div class='form-group'>
                        <?= Form::label('capacity', 'Capacity'); ?>
                        <?= Form::text('capacity',null,['class'=>'form-control']); ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update Room</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>