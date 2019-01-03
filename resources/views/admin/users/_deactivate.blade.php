
    <!-- Modal Deactivate -->
    <div id="deactivateModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-ban"></i> Deactivate {{$user->username}}</h4>
                </div>
                <form method="post" action='{{url("/users/$user->id/set-active")}}'>
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" name="active" value="0">
                        Are you sure you want to deactivate {{$user->full_name}}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> No - Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Yes - Deactivate User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
