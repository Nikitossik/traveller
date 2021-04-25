<? ob_start();?>

<div class="modal fade" id="sign-up-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Sign up</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form name="sign_up" id="sign_up" action="index.php" method="POST">
              <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login" id="login" aria-describedby="loginHelp" placeholder="Enter login">
              </div>
              <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
              </div>
              <button type="submit" name="sign_in_submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
  </div>
</div>

<? ob_end_flush();?>