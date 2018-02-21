<?php
if(isset($msg)){
    echo '<div class="alert alert-dismissible alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$msg.'</div>';
}?>

<form action="?route=login/login/login">

    <div class="modal login">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                </div>
                <div class="modal-body">
                    <label for="exampleInputEmail1">User name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="User name">
                    <label for="exampleInputEmail1">Pass</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Login" class="btn btn-primary"/>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</form>