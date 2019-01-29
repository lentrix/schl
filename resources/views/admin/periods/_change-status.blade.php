<!-- Modal Update Period     -->
<div id="changeStatusModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Change Status {{$period->accronym}}</h4>
            </div>
            <form method="post" action="<?= url('/periods/status/' . $period->id) ?>">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">Select Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" <?= $period->status=="pending"?"selected":"" ?>>Pending</option>
                            <option value="enrolment" <?= $period->status=="enrolment"?"selected":"" ?>>Enrolment</option>
                            <option value="final" <?= $period->status=="final"?"selected":"" ?>>Final</option>
                            <option value="close" <?= $period->status=="close"?"selected":"" ?>>Closed</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Change Status</button>
                </div>

            </form>
        </div>
    </div>
</div>
