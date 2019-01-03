
    <!-- Modal Update User -->
    <div id="updateModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Update User {{$user->username}}</h4>
                </div>
                {!! Form::model($user,['url'=>"/users/$user->id", 'method'=>'patch'])  !!}
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="modal-body">
                    
                        <div class='form-group'>
                            <?= Form::label('username', 'User Name'); ?>
                            <?= Form::text('username',null,['class'=>'form-control']); ?>
                        </div>

                        <div class='form-group'>
                            <?= Form::label('full_name', 'Full Name'); ?>
                            <?= Form::text('full_name', null, ['class' => 'form-control']); ?>
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update User</button>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
