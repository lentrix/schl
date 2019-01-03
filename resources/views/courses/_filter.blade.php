<!-- Modal Filter Course by Program -->
<div id="filterModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-search"></i> Filter by Program</h4>
            </div>

            <form method="get" action="">

                <div class="modal-body">
                
                    <div class="form-group">
                        <label for="dept_id">Select Department</label>
                        <select name="program_id" id="program_id" class="form-control">
                            @foreach(\App\Program::orderBy('accronym')->get() as $program)
                            <option value="{{$program->id}}">{{$program->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filter Course</button>
                </div>

            </form>

        </div>
    </div>
</div>