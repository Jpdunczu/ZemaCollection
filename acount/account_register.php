<?php include '../view/header2.php'; ?>
<?php include 'login.php'; ?>

<title>Zema Collection: Registration</title>


<div class="container-fluid img-rounded" style="background-image:url('../image/Tie-Dye-Wallpaper.jpg'); padding:5px; padding-bottom:0px;">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="navbar-header">
                <div class="navbar-brand">
                <button class="btn-link" data-toggle="modal" href="#myModal">Zema Collection</button>
                </div>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href=".."><button class="btn-link"> Home</button></a></li>
            </ul>  
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#myLogin" data-toggle="modal"><button class="btn-link" style="padding-right:30px;">
                <span class="glyphicon glyphicon-log-in"></span>   Login</button></a></li>
            </ul>
        </nav>
</div> <!-- container-fluid -->

	<?php 
		if (!isset($password_message)) { $password_message = ''; } 
	?>    
<br>
<br>
<form action="." method="post" id="register_form">         
<div class="container-fluid">        
    <div class="col-sm-1"></div>
        <div class="col-sm-4 img-rounded" style="background-image:url('../image/Tie-Dye-Wallpaper.jpg'); padding:15px;">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3>Personal Information</h3>
                    <input type="hidden" name="action" value="register">
                </div> <!-- panel-heading -->
                
                <div class="panel-body">
                    	<div class="form-group">
	                    	<input type="text" class="form-control" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" 
	                    	placeholder="First Name" required>
                    	</div>
                    	<div class="form-group">
                    		<input type="text" class="form-control" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>"
                     		placeholder="Last Name" required>
                     	</div>
                </div> <!-- panel-body -->
                
                    <div class="panel-footer">
                    	<a data-toggle="collapse" href="#optional"><h3 class="text-center"><span class="glyphicon glyphicon-collapse-down"></span>  Optional Information</h3></a>
                    	<div id="optional" class="panel-collapse collapse">
                    	<div class="panel panel-default">
                    		<div class="panel-body">        
	                            <div class="form-group">
	                                <label for="phne">Phone: <p class="text-danger"><?php if(!empty($phone_error)) : ?><span class="error">
	                                <?php echo htmlspecialchars($phone_error); ?></span><?php endif; ?></p></label>
	                                
	                                <input type="tel" class="form-control" id="phne" name="ship_phone" placeholder="Phone Number">
	                            </div> <!-- form-group -->
                            
	                            	<div class="form-group">
	                                <label for="add1">Address: <p class="text-danger">
	                                	<?php if(!empty($address_error)) : ?>
	                                		<span class="error"><?php echo htmlspecialchars($address_error); ?></span>
	                                	<?php endif; ?></p>
	                                </label>
	                                
	                                <input type="text" class="form-control" id="add1" name="ship_line1" placeholder="Address">
	                                
	                           
	                        	
	                        	<label for="add2">Address 2: <p class="text-danger">
	                        		<?php if(!empty($address_error)) : ?>
	                        			<span class="error"><?php echo htmlspecialchars($address_error); ?></span>
	                        		<?php endif; ?>
	                        	</label>
	                        	
	                        	<input type="text" class="form-control" id="add2" name="ship_line2" placeholder="Address2">
	                        	
	                                    <div class="col-xs-4">
	                                        <label>City: </label>
	                                        <input type="text" class="form-control" id="city" name="ship_city" placeholder="City">
	                                    </div>
	                                    
	                                    <div class="col-xs-3">
	                                        <label>State: </label>
	                                        <select class="form-control" name="ship_state" id="state" placeholder="">
	                                        <option>
	                                        <?php echo htmlspecialchars($ship_city); ?>
	                                        </option>
	                                            
	                                            <option>AB</option><option>AE</option><option>AK</option><option>AL</option><option>AR</option><option>AS</option>
	                                            <option>AZ</option>
	                                            <option>BC</option><option>CA</option><option>CO</option><option>CT</option><option>DC</option><option>DE</option>
	                                            <option>FL</option>
	                                            <option>FM</option><option>GA</option><option>GU</option><option>HI</option><option>IA</option><option>ID</option>
	                                            <option>IL</option>
	                                            <option>IN</option><option>KS</option><option>KY</option><option>LA</option><option>MA</option><option>MB</option>
	                                            <option>MD</option>
	                                            <option>ME</option><option>MH</option><option>MI</option><option>MN</option><option>MO</option><option>MP</option>
	                                            <option>MS</option>
	                                            <option>MT</option><option>NB</option><option>NC</option><option>ND</option><option>NE</option><option>NH</option>
	                                            <option>NJ</option>
	                                            <option>NL</option><option>NM</option><option>NS</option><option>NT</option><option>NU</option><option>NV</option>
	                                            <option>NY</option>
	                                            <option>OH</option><option>OK</option><option>ON</option><option>OR</option><option>PA</option><option>PE</option>
	                                            <option>PR</option>
	                                            <option>PW</option><option>QC</option><option>RI</option><option>SC</option><option>SD</option><option>SK</option>
	                                            <option>TN</option>
	                                            <option>TX</option><option>UT</option><option>VA</option><option>VI</option><option>VT</option><option>WA</option>
	                                            <option>WI</option>
	                                            <option>WV</option><option>WY</option><option>YT</option>
	                                        </select>
	                                    </div>
	               
		                        <div class="col-xs-4">
		                            <label>Zip: </label>
		                            <input type="text" class="form-control" id="zip" name="ship_zip" placeholder="Zip">
		                        </div>
	                        
	                        	</div> <!-- form-group -->
                        	</div> <!-- panel-body -->
                        	<div class="panel-footer">
                        		
                        	</div> <!-- panel-footer -->
                    	</div> <!-- panel-dfault -->
                	</div> <!-- panel-collapse -->
            	</div> <!-- panel-footer -->
        </div> <!-- panel-dfault -->
    </div> <!-- col-sm-4 -->

<div class="col-sm-1"></div>     

<div class="col-sm-5 img-rounded" style="background-image:url('../image/Tie-Dye-Wallpaper.jpg'); padding:15px;">
    <div class="panel panel-default">
    
        <div class="panel-heading text-center">
            <h3>Account Information</h3>
        </div>
        
        <div class="panel-body">
              	<div class="form-group">
              		<input type="email" class="form-control" name="email" placeholder="E-Mail" required>
              	</div> 
                <div class="form-group">
                	<input type="password" class="form-control" name="password_1" placeholder="Password" required>
                </div>
                <div class="form-group">
                    	<input type="password" class="form-control" name="password_2" placeholder="Re-type Password" required>
                </div>
                    <dl>
                        <dt>Password</dt> 
                        <dd>- must be at least 8 characters long</dd>
                        <dd>- must contain at least one digit</dd>
                        <dd>- cannot contain your name</dd>
                        <dt>We will never ask for your password</dt>
                    </dl>
                    <?php if(!empty($password_error)) : ?>
                        <div class="alert alert-danger text-center"><?php echo htmlspecialchars($password_error); ?></div>
                    <?php endif; ?>
                    <?php if(!empty($user_exists)) : ?>
                        <div class="alert alert-warning text-center"><?php echo htmlspecialchars($user_exists); ?></div>
                    <?php endif; ?>
                    
        </div> <!-- panel-body -->
        
        <div class="panel-footer">
            <button type="submit" class="btn btn-primary btn-block" name="action" value="register">Register</button>
        </div>
        
    </div> <!-- panel-dfault -->       
</div> <!-- col-sm-5 -->
</div> <!-- container-fluid -->

</form>
<?php include '../view/footer.php'; ?>
        