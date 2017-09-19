<!DOCTYPE html>


<html>
<form action="./" method="post" id="login_form">
<input type="hidden" name="action" value="login"/>
<div class="modal fade" id="myLogin" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-header text-center" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2><span class="glyphicon glyphicon-lock"></span> Login</h2>
        </div>
        
        <div class="modal-body" style="padding:40px 50px;">
            
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="email" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" id="psw" placeholder="Enter password">
            </div>
            	
              <button type="submit" name="action" value="login" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          
            <?php if(!empty($login_error)) : ?><div class="alert alert-warning"><strong>ERROR: </strong><?php echo htmlspecialchars($login_error); ?></div>
            <?php endif; ?>
        
        </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="?action=registration">Sign Up</a></p>
          <p>Forgot <a href="?action=forgot_password">Password?</a></p>
        </div>
        
      </div>
      
    </div>
</div>   
</form>
</html>
