<!-- Modal Filter by Building -->
<div id="filterModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-search"></i> Filter by Building</h4>
            </div>

            <form method="get" action="">

                <div class="modal-body">
                
                    <div class="form-group">
                        <label for="building">Select Building</label>
                        <select name="building" id="building" class="form-control">
                            @foreach(\App\Room::buildings() as $building)
                            <option value="{{$building}}">{{$building}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filter Rooms</button>
                </div>

            </form>

        </div>
    </div>
</div>