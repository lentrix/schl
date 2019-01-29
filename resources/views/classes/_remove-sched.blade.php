<!-- Modal Remove Schedule  -->
<div id="removeSchedModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-question"></i> Remove Schedule</h4>
            </div>

            <form method="post" action='{{url("/schedules")}}'>
                {{csrf_field()}}
                {{method_field('delete')}}
                <div class="modal-body">
                    <input type="hidden" name="schedule_id" id="schedule_id">
                    Are you sure to remove this schedule?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> No - Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Yes - Remove Schedule</button>
                </div>

            </form>

        </div>
    </div>
</div>