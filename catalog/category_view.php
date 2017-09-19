<!DOCTYPE html>

<title>Zema Collection: <?php echo htmlspecialchars($category_name); ?></title>
<html>
    
<?php include '../view/header2.php'; ?>
<form action="../account/" method="POST" id="login_form">
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
<div class="container-fluid">

<div class="col-sm-12 img-rounded" style="background-image: url('../image/Tie-Dye-Wallpaper.jpg');">


        <nav class="navbar navbar-default navbar-fixed">
            <div class="navbar-header">
                <a class="navbar-brand" data-toggle="modal" href="#myModal" style="color: #009999;"><b>Zyema Collection</b></a>
            </div>   
<!-- NAVIGATION BAR -->
            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li>
                	<?php if($login != TRUE) : ?>
                		<a href=".." style="color: black;">
                	<?php endif; ?>
                	
                	<?php if($login === TRUE) : ?>
                		<a href="../account?action=view_account" style="color:black;">
                	<?php endif; ?>
                	<b>Home</b></a>
                </li>
                <li><a href="?category_id=1" style="color: #330066; "><b>Sales</b></a></li>
                <li><a href="?category_id=2" style="color: #330066; "><b>Featured Items</b></a></li>
                <li><a href="?category_id=3" style="color: #330066; "><b>Top Sellers</b></a></li>
                <li><a href="?category_id=4" style="color: #330066; "><b>Gifts</b></a></li>
            </ul>
                
                

            
                
                    <ul class="nav navbar-nav navbar-right">
            <?php if($login != TRUE): ?>
	                    <li>
	                    	<a href="../account?action=registration" style="color: #330066; ">
	                    	<span class="glyphicon glyphicon-user"></span>  <b>Sign Up</b></a>
	                    </li>
	                    <li>
	                    	<a href="#myLogin" data-toggle="modal" style="padding-right: 30px; color: #330066; ">
	                    	<span class="glyphicon glyphicon-log-in"></span>   <b>Login</b></a>
	                    </li>
            
            <?php endif; ?>
                        
                        <li>
                        	<a href="../cart?action=view" style="padding-right: 30px; color: black;">
                        	<span class="glyphicon glyphicon-shopping-cart"></span>
                        	<span class="badge"><?php if($cartCount > 0): ?><?php echo $cartCount; ?><?php endif ?></span><b> Cart</b></a>
                        </li>
                    
                    </ul>
            </div> <!-- myNavbar -->
        </nav>
</div> <!-- background img -->
<div class="col-sm-1"></div>
</div> <!-- container-fluid -->

<body>        
    <div class="container-fluid">
    <div class="col-sm-1"></div>
        
                    <div class="row">
                   <?php foreach ($products as $product): 
                    	// Get the product data
                    	$list_price = $product['listPrice'];
                    	$discount_percent = $product['discountPercent'];
                    	$description = $product['description'];
                    	
                    	// Calculate unit price
                    	$discount_amount = round($list_price * ($discount_percent / 100.0), 2);
                    	$unit_price = $list_price - $discount_amount;
                    	
                    	// Get first paragraph of description
                    	//$description_with_tags = add_tags($description);
                    	//$i = strpos($description_with_tags, "</p>");
                    	//$first_paragraph = substr($description_with_tags, 3, $i-3);
                    ?>
                    	
                        <div class="col-sm-2">
                            <h4><?php echo htmlspecialchars($product['productName']); ?></h4>
                            <a href="#<?php echo htmlspecialchars($product['productCode']); ?>" 
                            value="<?php echo htmlspecialchars($product['productCode']); ?>" class="thumbnail" data-toggle="modal">
                            <img class="img-responsive" src="../image/<?php echo htmlspecialchars($product['productCode']); ?>.jpg" 
                            alt="<?php echo htmlspecialchars($product['productName']); ?>" style="height:350px">
                            </a>
                        </div>
                            
<!-- Start Modal -->
      <div class="modal fade" id="<?php echo htmlspecialchars($product['productCode']); ?>" role="dialog">
      
	<div class="modal-dialog img-rounded" style="background-image:url('../image/Tie-Dye-Wallpaper.jpg'); padding:15px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><?php echo htmlspecialchars($product['productName']); ?></h4>
			</div> <!-- header -->
                                <div class="modal-body">
                             <div class="row">   
                                <div class="col-sm-6">
                                    <img class="img-responsive img-rounded" src="../image/<?php echo htmlspecialchars($product['productCode']); ?>.jpg" 
                                    alt="<?php echo htmlspecialchars($product['productName']); ?>" style="width: 300px;height: 350px;"> 
                                </div>
                                
                                <div class="col-sm-6">    
                                        <div class="well well-lg">
                                            <label>Description: </label>
                                            <p><?php echo htmlspecialchars($description); ?></p>
                                            <label>Product Code: </label>
                                            <p><?php echo htmlspecialchars($product['productCode']); ?></p> 
                                        </div>
                                        
	                               	<?php if ($login != TRUE): ?> 
	                                   <div class="alert alert-info"><strong>Price: </strong>
	                                   Login or create an account to see the special members only price.</div>
	                               	<?php endif; ?>         
	                            
	                            	<?php if ($login === TRUE): ?> 
	                                	<label>Price: <?php echo htmlspecialchars($list_price); ?></label>
	                                	
		                        <?php endif; ?>
		                </div> <!-- col-sm-3 -->
	                        </div> <!-- body -->
	                        </div> <!-- row -->
                        <div class="modal-footer">
                        
                            <form action='../cart/' method='POST'>
                            <input type='hidden' name='action' value='add'/>
                                    <?php if ($login === TRUE): ?>
                                    	
                                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['productID']); ?>"/>
                                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($list_price); ?>"/>
                                        	<div class="form-group">
                                                	<div class="col-xs-4">
                                                    		<label for="qty">Quantity: </label>
                                                        		<select class="form-control" id="qty" name="quantity">
                                                            		<option>1</option>
                                                            		<option>2</option>
                                                            		<option>3</option>
                                                            		<option>4</option>
                                                            		<option>5</option>
                                                        		</select>
                                                    			Please Contact Us for quantity greater than 5.
                                                	</div> <!--  col-xs-4 -->
                                            	</div> <!--  form-group -->
                                            	
                                        <div class="form-group">
                                            <div class="col-xs-4">
                                                <label for="size">Size: </label>
                                                    <select class="form-control" id="size" name="size">
                                                        <option>XS</option>
                                                        <option>S</option>
                                                        <option>M</option>
                                                        <option>L</option>
                                                        <option>XL</option>
                                                        <option>2XL</option>
                                                    </select>
                                            </div> <!-- col-xs-4 -->
                                        </div> <!-- form-group -->
                                        
                                        	<button type="submit" class="btn btn-primary btn-block" style="padding:10px;" 
                                        	name='action' value='add'>Add to Cart</button>
                                        	
                                   <?php endif; ?>
                            </form>
                        </div> <!-- footer -->
                        
                    </div> <!-- content -->
                </div> <!-- dialog -->
                
            </div> <!-- modal fade -->
<?php endforeach; ?>       
			
		</div>	<!-- container-fluid -->
	
	


</body>


<?php include '../view/footer2.php'; ?>
	

</html>
