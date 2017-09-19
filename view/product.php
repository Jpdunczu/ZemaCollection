<!DOCTYPE html>


<title>Zema Collection: <?php echo htmlspecialchars($product['productName']); ?></title>


<form action="../account/" method="post" id="login_form">
<input type="hidden" name="action" value="login">
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


<html>
    <body style="background-color: azure;">
     
<div class="container-fluid">
    <div class="col-sm-1"></div>
    <div class="panel panel-default" style="background-color: white; padding: 15px;">
        <div class="container-fluid">
            
        <nav class="navbar navbar-inverse navbar-fixed">
            
            <div class="navbar-header">
                <div class="navbar-brand">
                    <button class="btn-link" data-toggle="modal" href="#myModal" id="tag"><b>Zyema Collection</b></button>
                </div>
            </div>
<!-- NAVIGATION BAR -->
            <ul class="nav navbar-nav">
                <li><a href=".."><b>Home</b></a></li>
                <li><a href="?category_id=1"><b>Sales</b></a></li>
                <li><a href="?category_id=2"><b>Featured Items</b></a></li>
                <li><a href="?category_id=3"><b>Top Sellers</b></a></li>
                <li><a href="?category_id=4"><b>Gifts</b></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="../account?action=registration"><span class="glyphicon glyphicon-user"></span>  <b>Sign Up</b></a></li>
                <li><a href="#myLogin" data-toggle="modal" style="padding-right: 30px;"><span class="glyphicon glyphicon-log-in"></span>   <b>Login</b></a></li>
            </ul>

        </nav>
<div class="col-sm-1"></div>
</div>
<!-- NAV BAR -->



<body>
	<div class="container-fluid">
		<div class="col-sm-6 img-rounded">
			<img src="../image/<?php echo htmlspecialchars($product['productCode']); ?>.jpg"  
			alt="<?php echo $image_alt; ?>" class="img-rounded" style="height:712" />
		</div> <!-- col-sm-6 -->
		
		
		<div class="col-sm-6">
			<div class="panel panel-default img-rounded" style="background-image:url('../image/Tie-Dye-Wallpaper.jpg'); padding:15px;">
				<div class="panel-heading">
					<h3 class="text-primary text-center"><?php echo htmlspecialchars($product_name); ?></h3>
					
						<div class="alert alert-info">
							<p><strong><a href="#myLogin" data-toggle="modal">Login</a> or 
							<a href="../account?action=registration">SignUp</a>
							</strong> to see our special <strong>MEMBERS ONLY</strong> prices!<p>
						</div>
				</div> <!-- heading -->
	                </div> <!-- Panel -->
		</div> <!-- col-sm-6 -->
	</div> <!-- container-fluid -->
</body>
</html>
