<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Edit User</h4>
            </div>
            <div class="panel-body">
                <form action="/Admin/saveUser/{player}" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <label for="player">Username</label>
                    <input class="form-control" name="player" value={player} type="text" />
                    <span class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="subject">Cash</label>
                    <input class="form-control" name="cash" value={cash} type="text" />
                    <span class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="subject">Role (admin or player)</label>
                    <input class="form-control" name="role" value={role} type="text" />
                    <span class="text-danger"></span>
                </div>
                
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-default">Save Changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
