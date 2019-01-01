<div class="form-group">
    <?= Form::label('username', 'User Name'); ?>
    <?= Form::text('username',null, ['class'=>'form-control']); ?>
</div>

<div class="form-group">
    <?= Form::label('full_name', 'Full Name'); ?>
    <?= Form::text('full_name',null, ['class'=>'form-control']); ?>
</div>

<div class="form-group">
    <?= Form::label('password', 'Password'); ?>
    <?= Form::password('password',['class'=>'form-control']); ?>
</div>

<div class="form-group">
    <?= Form::label('password_confirmation', 'Password Confirmation'); ?>
    <?= Form::password('password_confirmation',['class'=>'form-control']); ?>
</div>

<div class="form-group">
    <button class="btn btn-primary btn-lg pull-right"><i class="fa fa-check"></i> Create User</button>
</div>