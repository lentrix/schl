
    <!-- Modal Change Password -->
    <div id="passwordModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-key"></i> Change Password for User {{$user->username}}</h4>
                </div>
                <form action='{{url("/users/$user->id/change-password")}}' method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                    
                        <div class='form-group'>
                            <label for='password'>Password</label>
                            <input type='password' name='password' class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='password_confirmation'>Password Confirmation</label>
                            <input type='password' name='password_confirmation' class='form-control' />
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-key"></i> Change Password</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
