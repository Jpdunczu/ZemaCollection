<?php include '../view/header2.php'; ?>
<?php include 'login.php'; ?>
<html>
<title>Zema Collection: Login</title>


<div class="container-fluid">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="navbar-header">
                <div class="navbar-brand">
                <button class="btn-link" data-toggle="modal" href="#myModal">Zema Collection</button>
                </div>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href=".."><button class="btn-link"> Home</button></a></li>
            </ul>  
           
        </nav>
</div> <!-- container-fluid -->


    <form action="." method="post" id="login_form">
<input type="hidden" name="action" value="login">

    	<?php if(!empty($user_exists)) : ?>
        	<div class="alert alert-warning text-center"><?php echo htmlspecialchars($user_exists); ?></div>
   	<?php endif; ?>
 <div class="col-sm-3"></div>     
      <div class="panel col-sm-6">
      
        <div class="panel-header text-center" style="padding:35px 50px;">
          <h2><span class="glyphicon glyphicon-lock"></span> Login</h2>
        </div>
        
        <div class="panel-body" style="padding:40px 50px;">
            
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="email" id="usrname" placeholder="Enter email">
            </div>
            
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" id="psw" placeholder="Enter password">
            </div>
            
            <button type="submit" value="login" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          
            <?php if(!empty($login_error)) : ?>
            	<div class="alert alert-warning">
	            	<strong>ERROR: </strong><?php echo htmlspecialchars($login_error); ?>
            	</div>
            <?php endif; ?>
        
        </div> <!-- panel-body -->
        
        <div class="panel-footer">
          <p>Not a member? <a href="?action=registration"> Sign Up</a></p>
          <p>Forgot <a href="?action=forgot_password"> Password?</a></p>
        </div>
        
      </div> <!-- panel -->
      
    
</form>
</html>