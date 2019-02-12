        <?= Form::hidden('student_id', $student->id); ?>
            <?= Form::hidden('status', 'active'); ?>

            <div class="form-group">
                <?= Form::label('program_id', 'Program'); ?>
                <?= Form::select('program_id',
                    \App\Program::pluck('name','id'),
                    null,['class'=>'form-control', 'placeholder'=>'Select a program']); ?>
            </div>

            <div class="form-group">
                <?= Form::label('strand_id', 'Track/Strand (for SHS) only'); ?>
                <?= Form::select('strand_id',
                    \App\Strand::list(),
                    null,['class'=>'form-control', 'placeholder'=>'Select a strand']); ?>
            </div>

            <div class="form-group">
                <?= Form::label('level_id', 'Level'); ?>
                <?= Form::select('level_id',
                    \App\Level::pluck('name','id'),
                    null,['class'=>'form-control', 'placeholder'=>'Select a level']); ?>
            </div>

            <div class="form-group">
                <?= Form::label('type', 'Type'); ?>
                <?= Form::select('type', [
                    'old' => 'Old Student',
                    'new' => 'New Student',
                    'transferee' => "Transferee"
            ],null, ['class'=>'form-control', 'placeholder'=>'Select type']); ?>
            </div>

            <div class="form-group">
                <?= Form::label('period_id', 'Period'); ?>
                <?= Form::select('period_id',
                    \App\Period::listEnrolment(),
                    null, ['class'=>'form-control', 'placeholder'=>'Select period']); ?>
            </div>
