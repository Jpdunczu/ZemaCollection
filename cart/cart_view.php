<?php include '../view/header2.php'; ?>
<title>Zema Collection: Shopping Cart</title>
<html>


<form action="../account/" method="post" id="login_form">
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
                <a class="navbar-brand" data-toggle="modal" href="#myModal" style="color: #009999;"><b>Zema Collection</b></a>
            </div>   
<!-- NAVIGATION BAR -->
            
            <ul class="nav navbar-nav">
                <li>
                	<?php if($login != TRUE) : ?>
                		<a href=".." style="color: black;"><b>Home</b></a>
                	<?php endif; ?>
                	
                	<?php if($login == TRUE) : ?>
                		<a href="../account?action=view_account" style="color:black;"><b>Home</b></a>
                	<?php endif; ?>
                	
                </li>
                <li><a href="../catalog?category_id=1" style="color: #330066; "><b>Sales</b></a></li>
                <li><a href="../catalog?category_id=2" style="color: #330066; "><b>Featured Items</b></a></li>
                <li><a href="../catalog?category_id=3" style="color: #330066; "><b>Top Sellers</b></a></li>
                <li><a href="../catalog?category_id=4" style="color: #330066; "><b>Gifts</b></a></li>
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
            
            		<?php endif ?>
                         
                        <li>
                        	<a href="../cart?action=view" style="padding-right: 30px; color: black;">
                        	<span class="glyphicon glyphicon-shopping-cart"></span>
                        	<span class="badge"><?php if($cartCount > 0): ?><?php echo $cartCount; ?>
                        	<?php endif ?></span><b> Cart</b></a>
                        </li>
                    
                    </ul>
         
        </nav>
</div> <!-- background img -->
<div class="col-sm-1"></div>
</div> <!-- container-fluid -->


<main>
   <br>
    
   
    
    <?php if($newItemAdded == TRUE): ?>
        <div class="container-fluid">
            <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="alert alert-success text-center">
                        <strong>Success!</strong> The item has been added to your shopping cart!
                    </div>
                </div>
            <div class="col-sm-4"></div>
        </div>
    <?php endif; ?>
    
    <?php if($hasItem == TRUE): ?>
        <div class="container-fluid">
            <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="alert alert-warning text-center">
                        <strong>You already have this item in your shopping cart!</strong> 
                        <p>Would you like to change the quantity?</p>
                    </div>
                </div>
            <div class="col-sm-3"></div>
        </div>
    <?php endif; ?>
    
    <?php if($update_successful == TRUE): ?>
    	<div class="container-fluid">
    		<div class="col-sm-3"></div>
    			<div class="col-sm-6">
    				<div class="alert alert-success text-center">
    					<strong> Cart successfully updated!</strong>
    				</div>
    			</div>
    		</div>
    	</div>
    <?php endif; ?>

    <?php if ($cartCount == 0) : ?>
	    <div class="container-fluid">
	    	<div class="col-sm-2"></div>
	            <div class="col-sm-8">
	                <div class="alert alert-info text-center">
	                    <strong>Sorry!</strong> Your shopping cart is currently empty!
	                </div>
	            </div>
	        <div class="col-sm-2"></div>
	    </div>
    <?php else: ?>
    
    
	    <div class="container-fluid">
	        <div class="col-sm-2"></div>
	            <div class="progress col-sm-8">
	                <div class="progress-bar" role="progressbar" aria-valuenow="25" 
	                    aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
	                    Your Order is 25% Complete.
	                </div>
	            </div>
	        <div class="col-sm-2"></div>
	    </div>
  
    
 <div class="container-fluid">
    <div class="col-sm-1"></div>   
    <div class="col-sm-10">
    
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Size</th>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Product Code</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carts as $cart) : 
                    	
                    ?>
                    <form action="." method="POST">
                    <input type="hidden" name="cart_id" value="<?php echo htmlspecialchars($cart['cartID']); ?>">
                    <tr>
                        <td>
                            <select class="form-control" name="quantity" selected="<?php echo $cart['quantity']; ?>">
                                <option><?php echo $cart['quantity']; ?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="size">
                                    <option><?php echo htmlspecialchars($cart['size']); ?></option>
                                    <option> XS </option>
                                    <option> S </option>
                                    <option> M </option>
                                    <option> L </option>
                                    <option> XL </option>
                            </select>
                        </td>
                        <td><img src="../image/<?php echo htmlspecialchars($cart['productCode']); ?>.jpg" 
                                 class="img-thumbnail" alt="<?php echo htmlspecialchars($cart['productName']); ?>" 
                                 style="width:150px;height:150px;"></td>
                        <td><div class="text-info"><?php echo htmlspecialchars($cart['description']); ?></div></td>
                        <td><input type="hidden" name="product_id" value="<?php echo htmlspecialchars($cart['productID']); ?>">
                        <?php echo htmlspecialchars($cart['productID']); ?></td>
                        <td><?php echo htmlspecialchars($cart['price']); ?></td>
                        <td>
                            
                            <div class="form-group">
                            <button type="submit" class="btn btn-danger" name="action" value="remove">Remove</button>  
                            </div>
                            
                            <div class="form-group">
                            <button type="submit" class="btn btn-success" name="action" value="update">Update</button>
                            </div>
                            </form>
                        </td>        
                    </tr>
                  
                    <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="alert alert-success">
                                    Subtotal:  <strong>$ <?php echo $subtotal; ?></strong>
                                </div>
                                <form action="../checkout/" method="POST">
                                    <button type="submit" class="btn btn-info" name="action" value="confirm">Checkout</button>
                                </form>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div> <!-- table-responsive -->
       
    </div> <!-- container-fluid -->
      <?php endif; ?>
    <div class="col-sm-1"></div>
</div>
    
</div>
</main>
<br>
<br>
</html>
<?php include '../view/footer.php'; ?>