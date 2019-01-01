<!-- Modal Activate Teacher -->
<div id="activateModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> {{$teacher->active?'Deactivate':'Activate'}} Teacher</h4>
            </div>
            <form method="post" action='{{url("/teachers/$teacher->id/set-active")}}'>
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="active" value="{{$teacher->active?0:1}}">
                    Are you sure you want to {{$teacher->active?'Deactivate':'Activate'}} {{$teacher->fullName()}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    @if($teacher->active)
                    <button type="submit" class="btn btn-danger"><i class="fa fa-remove"></i> Deactivate Teacher</button>
                    @else
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Activate Teacher</button>
                    @endif
                </div>

            </form>
        </div>
    </div>
</div>