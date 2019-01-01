<!-- Modal Filter Teacher -->
<div id="filterModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Filter Specialty</h4>
            </div>
            <form method="get" action=''>

                <div class="modal-body">
                    <label for="specialty">Specialty</label>
                    <select name="specialty" class="form-control" id="specialty">
                        @foreach(\App\Teacher::specialties() as $specialty)
                        <option value="{{$specialty}}">{{$specialty}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Filter Teacher</button>
                </div>

            </form>
        </div>
    </div>
</div>