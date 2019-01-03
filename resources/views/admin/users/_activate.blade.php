<!-- Modal Activate -->
<div id="activateModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-check"></i> Activate {{$user->username}}</h4>
            </div>
            <form method="post" action='{{url("/users/$user->id/set-active")}}'>
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="active" value="1">
                    Are you sure you want to activate {{$user->full_name}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> No - Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Yes - Activate User</button>
                </div>
            </form>
        </div>
    </div>
</div>