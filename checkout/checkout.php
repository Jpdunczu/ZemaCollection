<?php include '../view/header2.php'; ?>
<title>Zema Collection: Checkout</title>
<html>

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


<div class="container-fluid">
    <div class="col-sm-2"></div>
        <div class="progress col-sm-8" style="margin: 30px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="50" 
                    aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                    50% Complete
            </div>
        </div>
    <div class="col-sm-2"></div>
</div>



<div class="container-fluid">
    <div class="col-sm-2"></div>
        <div class="row">    
            <h1 class="text-primary text-center">Checkout</h1>
            <p class="text-info text-center"> Please provide the following information to complete the Checkout process.</p>
        </div>
    <div class="col-sm-2"></div>
</div>


<form action="." method="POST">       
	<div class="container-fluid">
		<div class="col-sm-1"></div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a data-toggle="collapse" href="#collapse2"><h4>Billing Information: </h4></a>
				</div> <!-- panel-heading -->
			<?php if($hasAddress == TRUE) : ?>
                		<div id="collapse2" class="panel-collapse collapse in">
                    			<div class="panel-body">
                        			<div class="well">
                            				<div class="form-group">
			                                    <label for="nme">Name: <small>( Full name as it appears on your Credit Card )</small></label>
			                                    <input type="text" class="form-control" id="nme" name="name" 
			                                    value="<?php echo $customer_name; ?>" placeholder="Name" disabled>
			                                </div>
			                               	<div class="form-group">
			                                    <label for="emal">E-mail:</label>
			                                    <input type="email" class="form-control" id="emal" name="email" value="<?php echo $email; ?>" placeholder="E-mail" disabled>
			                                </div>
			                                <div class="form-group">
			                                    <label for="phne">Phone: </label>
			                                    <input type="tel" class="form-control" id="phne" name="phone" value="<?php echo $phone; ?>" 
			                                    placeholder="Phone Number" disabled>
			                                </div>
			                                <div class="form-group">
			                                
			                                    <label for="add">Address: </label>
			                                    <input type="text" class="form-control" id="add" name="line1" value="<?php echo $line1; ?>" 
			                                    placeholder="Address Line 1" disabled>
			                                    <input type="text" class="form-control" name="line2" value="<?php echo $line2; ?>" 
			                                    placeholder="Address Line 2" disabled>
			                                </div>
			                                <div class="form-group">    
			                                        <div class="col-xs-5">
			                                            <label for="city">City: </label>
			                                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $city; ?>" placeholder="City" disabled>
			                                        </div> <!-- col-xs-5 -->
			                                </div>
			                                <div class="form-group">        
			                                        <div class="col-xs-3">
			                                            <label for="state">State: </label>
			                                            <select class="form-control" name="state" id="state" placeholder="" disabled>
			                                                <option><?php echo $state; ?></option>
			                                            </select>
			                                        </div> <!-- col-xs-2 -->
			                                </div>
			                                <div class="form-group">        
			                                        <div class="col-xs-4">
			                                            <label for="zip">Zip: </label>
			                                            <input type="text" class="form-control" id="zip" name="zipCode" value="<?php echo $zip_code; ?>" 
			                                            placeholder="Zip" disabled>
			                                        </div> <!-- col-xs-4 -->
			                                </div> <!-- form-group -->
						</div> <!-- well -->   
					</div> <!-- panel-body -->
                        
                        		<div class="panel-footer">
		                        	<div class="form-group">
		                        		<a href="#edit_address" data-toggle="modal">Edit Billing Information</a>
		                        	</div>
                        	
                        			<div class="modal fade" id="edit_address" role="dialog">
        						<div class="modal-dialog img-rounded" style="background-image:url('Tie-Dye-Wallpaper.jpg'); padding:15px;">
            							<div class="modal-content">
            								<div class="modal-header">
                    								<button type="button" class="close" data-dismiss="modal">&times;</button>
                    								<h4 class="modal-title">Edit Billing Information</h4>
                							</div>
                						<div class="modal-body">
				                			<div class="well">
						                        	<div class="form-group">
						                                    <label for="nme">Name: <small>
						                                    ( Full name as it appears on your Credit Card )</small></label>
						                                    <input type="text" class="form-control" id="nme" name="editName" 
						                                    value="<?php echo $customer_name; ?>" placeholder="Name" required>
						                                </div>
						                                <div class="form-group">
						                                    <label for="emal">E-mail:</label>
						                                    <input type="email" class="form-control" id="emal" name="editEmail" 
						                                    	value="<?php echo $email; ?>" placeholder="E-mail" required>
						                                </div>
						                                <div class="form-group">
						                                    <label for="phne">Phone: </label>
						                                    <input type="tel" class="form-control" id="phne" name="editPhone" 
						                                    	value="<?php echo $phone; ?>" 
						                                    placeholder="Phone Number" required>
						                                </div>
						                                <div class="form-group">
						                                    <label for="add">Address: </label>
						                                    <input type="text" class="form-control" id="add" name="editLine1" 
						                                    	value="<?php echo $line1; ?>" 
						                                    placeholder="Address Line 1" required>
						                                   <input type="text" class="form-control" name="editLine2" value="<?php echo $line2; ?>" 
						                                    placeholder="Address Line 2" required>
						                                </div>
				                               		<div class="form-group">     
					                                        <div class="col-xs-5">
					                                            <label for="city">City: </label>
					                                            <input type="text" class="form-control" id="city" name="editCity" value="<?php echo $city; ?>" placeholder="City" required>
					                                        </div> <!-- col-xs-5 -->
				                                        	<div class="col-xs-3">
				                                            		<label for="state">State: </label>
				                                            			<select class="form-control" name="editState" id="state" placeholder="" required>
				                                                		<option><?php echo $state; ?></option>
<option>AB</option><option>AE</option><option>AK</option><option>AL</option><option>AR</option><option>AS</option><option>AZ</option>
<option>BC</option><option>CA</option><option>CO</option><option>CT</option><option>DC</option><option>DE</option><option>FL</option>
<option>FM</option><option>GA</option><option>GU</option><option>HI</option><option>IA</option><option>ID</option><option>IL</option>
<option>IN</option><option>KS</option><option>KY</option><option>LA</option><option>MA</option><option>MB</option><option>MD</option>
<option>ME</option><option>MH</option><option>MI</option><option>MN</option><option>MO</option><option>MP</option><option>MS</option>
<option>MT</option><option>NB</option><option>NC</option><option>ND</option><option>NE</option><option>NH</option><option>NJ</option>
<option>NL</option><option>NM</option><option>NS</option><option>NT</option><option>NU</option><option>NV</option><option>NY</option>
<option>OH</option><option>OK</option><option>ON</option><option>OR</option><option>PA</option><option>PE</option><option>PR</option>
<option>PW</option><option>QC</option><option>RI</option><option>SC</option><option>SD</option><option>SK</option><option>TN</option>
<option>TX</option><option>UT</option><option>VA</option><option>VI</option><option>VT</option><option>WA</option><option>WI</option>
<option>WV</option><option>WY</option><option>YT</option>
				                                            			</select>
				                                        	</div> <!-- col-xs-3 -->
				                                       		<div class="col-xs-4">
				                                            		<label for="zip">Zip: </label>
				                                            		<input type="text" class="form-control" id="zip" name="editZipCode" value="<?php echo $zip_code; ?>" placeholder="Zip" required>
				                                        	</div> <!-- col-xs-4 -->
				                                 	</div> <!-- form-group -->
				                			</div> <!-- well -->     
				                		</div><!-- modal-body -->
	                					<div class="modal-footer">
				                    			<button type="submit" name="action" value="editAddress" class="btn btn-default">
				                    			<span class="glyphicon glyphicon-envelope"></span> Update</button>
				                		</div> <!-- modal-footer -->
            							</div> <!-- modal-content -->
        						</div> <!-- modal-dialog -->
    						</div><!-- modal-fade -->
					</div> <!-- panel-footer -->
				</div> <!-- panel-collapse -->
			<?php endif; ?>
        		<?php if($hasAddress != TRUE) : ?>
        			<div id="collapse2" class="panel-collapse collapse in">
        				<div class="panel-body">
        					<div class="well">
			                            	<div class="form-group">
			                                    <label for="nme">Name: <small>( Full name as it appears on your Credit Card )</small></label>
			                                    <input type="text" class="form-control" id="nme" name="name" 
			                                    value="<?php echo $customer_name; ?>" placeholder="Name" required>
			                                </div>
			                                <div class="form-group">
			                                    <label for="emal">E-mail:</label>
			                                    <input type="email" class="form-control" id="emal" name="email" value="<?php echo $email; ?>" placeholder="E-mail" required>
			                                </div>
			                                <div class="form-group">
			                                    <label for="phne">Phone: </label>
			                                    <input type="tel" class="form-control" id="phne" name="phone" value="<?php echo $phone; ?>" 
			                                    placeholder="Phone Number" required>
			                                </div>
			                                <div class="form-group">
			                                	<label for="add">Address: </label>
			                                    	<input type="text" class="form-control" id="add" name="line1" value="<?php echo $line1; ?>" 
			                                    	placeholder="Address Line 1" required>
			                                    	<input type="text" class="form-control" name="line2" value="<?php echo $line2; ?>" 
			                                    	placeholder="Address Line 2" required>
			                               	</div>
                               				<div class="form-group">     
			                                        <div class="col-xs-5">
			                                            <label for="city">City: </label>
			                                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $city; ?>" placeholder="City" required>
			                                        </div> <!-- col-xs-5 -->
			                                        <div class="col-xs-3">
			                                            <label for="state">State: </label>
			                                            <select class="form-control" name="state" id="state" placeholder="" required>
			                                                <option><?php echo $state; ?></option>
<option>AB</option><option>AE</option><option>AK</option><option>AL</option><option>AR</option><option>AS</option><option>AZ</option>
<option>BC</option><option>CA</option><option>CO</option><option>CT</option><option>DC</option><option>DE</option><option>FL</option>
<option>FM</option><option>GA</option><option>GU</option><option>HI</option><option>IA</option><option>ID</option><option>IL</option>
<option>IN</option><option>KS</option><option>KY</option><option>LA</option><option>MA</option><option>MB</option><option>MD</option>
<option>ME</option><option>MH</option><option>MI</option><option>MN</option><option>MO</option><option>MP</option><option>MS</option>
<option>MT</option><option>NB</option><option>NC</option><option>ND</option><option>NE</option><option>NH</option><option>NJ</option>
<option>NL</option><option>NM</option><option>NS</option><option>NT</option><option>NU</option><option>NV</option><option>NY</option>
<option>OH</option><option>OK</option><option>ON</option><option>OR</option><option>PA</option><option>PE</option><option>PR</option>
<option>PW</option><option>QC</option><option>RI</option><option>SC</option><option>SD</option><option>SK</option><option>TN</option>
<option>TX</option><option>UT</option><option>VA</option><option>VI</option><option>VT</option><option>WA</option><option>WI</option>
<option>WV</option><option>WY</option><option>YT</option>
			                                            </select>
			                                        </div> <!-- col-xs-3 -->
			                                        <div class="col-xs-4">
			                                            <label for="zip">Zip: </label>
			                                            <input type="text" class="form-control" id="zip" name="zipCode" value="<?php echo $zip_code; ?>" 
			                                            placeholder="Zip" required>
			                                        </div> <!-- col-xs-4 -->
                                			</div> <!-- form-group -->
                                		</div> <!-- well -->       
                        		</div> <!-- panel-body -->
                   		</div> <!-- panel-collapse -->
                   	<?php endif; ?>
           	</div> <!-- panel-dfault -->
            
            	<?php if(!empty($shipAlert)) : ?>
	            <div class="alert alert-danger"><strong><?php echo htmlspecialchars($shipError); ?> </strong></div>
	     	<?php endif; ?>
	     
	        <div class="panel panel-default">
           		<div class="panel-heading">
                    		<h4><a data-toggle="collapse" href="#collapse1">Shipping Address <span class="glyphicon glyphicon-chevron-down"></span></a></h4>
                	</div> <!-- panel-heading -->
               			<div class="form-group">
               				<div class="checkbox">
               					<label><input type="checkbox" name="shipDiff" value="">Ship to address different then billing?</label>
               				</div><!-- checkbox -->
               			</div><!-- form-group -->
			<div id="collapse1" class="panel-collapse collapse">
				<div class="panel-body">
					<div class="form-group">
						<label for="name">Name: <?php echo $errorName; ?></label>
						<input type="text" class="form-control" id="name" name="shipName" value="<?php echo $shippingName; ?>" placeholder="Name">
					</div>
					<div class="form-group">
						<label for="phone">Phone: <?php echo $errorPhone; ?></label>
						<input type="tel" class="form-control" id="phone" name="shipPhone" value="<?php echo $shippingPhone; ?>" placeholder="Phone Number">
					</div>
					<div class="form-group">
						<label for="address">Address: <?php echo $errorLine1; ?></label>
						<input type="text" class="form-control" id="address" name="shipLine1" value="<?php echo $shippingLine1; ?>" placeholder="Line 1">
					</div>    
					<div class="form-group">
						<input type="text" class="form-control" name="shipLine2" value="<?php echo $shippingLine2; ?>" placeholder="Line 2">
					</div>  
					<div class="form-group">
						<label for="sCity">City: <?php echo $errorCity; ?></label>
						<input type="text" class="form-control" id="sCity" name="shipCity" value="<?php echo $shippingCity; ?>" placeholder="City">
					</div>
					<div class="form-group">
						<label for="sState">State: <?php echo $errorState; ?></label>
						<select class="form-control" id="sState" name="shipState" placeholder="">
							<option><?php echo $shippingState; ?></option>
<option>AB</option><option>AE</option><option>AK</option><option>AL</option><option>AR</option><option>AS</option><option>AZ</option>
<option>BC</option><option>CA</option><option>CO</option><option>CT</option><option>DC</option><option>DE</option><option>FL</option>
<option>FM</option><option>GA</option><option>GU</option><option>HI</option><option>IA</option><option>ID</option><option>IL</option>
<option>IN</option><option>KS</option><option>KY</option><option>LA</option><option>MA</option><option>MB</option><option>MD</option>
<option>ME</option><option>MH</option><option>MI</option><option>MN</option><option>MO</option><option>MP</option><option>MS</option>
<option>MT</option><option>NB</option><option>NC</option><option>ND</option><option>NE</option><option>NH</option><option>NJ</option>
<option>NL</option><option>NM</option><option>NS</option><option>NT</option><option>NU</option><option>NV</option><option>NY</option>
<option>OH</option><option>OK</option><option>ON</option><option>OR</option><option>PA</option><option>PE</option><option>PR</option>
<option>PW</option><option>QC</option><option>RI</option><option>SC</option><option>SD</option><option>SK</option><option>TN</option>
<option>TX</option><option>UT</option><option>VA</option><option>VI</option><option>VT</option><option>WA</option><option>WI</option>
<option>WV</option><option>WY</option><option>YT</option>
						</select>
					</div> <!-- form-group -->
					<div class="form-group">
						<label for="sZipCode">Zip: <?php echo $errorZip; ?></label>
						<input type="text" class="form-control" id="sZipCode" name="shipZip" value="<?php echo $shippingZipCode; ?>" placeholder="zip code">
					</div>
				</div> <!-- panel-body -->
			</div> <!-- collapse -->
		</div><!-- panel-dfault -->
	</div><!-- col-sm-6 -->
        <div class="col-sm-4">
        	<div class="panel panel-default">
            		<div class="panel-heading text-center">
	                    <h4>Shipping Options: </h4>
	                </div>
                <div class="panel-body">
                	<div class="well">
	                        <select class="form-control" id="shippingOption" name="shipping" onchange="shippingFunction()">
	                            <option>Select Shipping Method</option>
	                            <option value="0.00">Standard ( 7 - 10 business days ) FREE</option>
	                            <option value="5.99">Expedited ( 3 - 5 business days ) $ 5.99</option>
	                            <option value="12.99">Rush ( 2 business days ) $ 12.99</option>
	                            <option value="24.99">Overnight ( < 2 business days ) $ 24.99</option>
	                        </select>
	                 </div>
                </div> <!-- panel-body -->
            </div> <!-- panel-dfault -->
            <div class="well">
                <div class="panel panel-default">
                
                    <div class="panel-heading text-center">
                        <h4><a data-toggle="collapse" href="#cart">Shopping Cart Quick View</h4></a>
                    </div>
                    
                    <div id="cart" class="panel-collapse collapse">
                        <div class="panel-body">
                        
                            <div class="well">
                            
                                <table class="table">
                                    <thead>
                                        <th>Qty</th><th>Item</th><th>Price</th>
                                    </thead>
                                        <?php foreach ($carts as $cart) : 
                    	
                    			?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong><?php echo htmlspecialchars($cart['quantity']); ?>x </strong>
                                            </td>
                                            <td>
                                                <div class="form-group"><?php echo htmlspecialchars($cart['productName']); ?></div>
                                            </td>
                                            <td>
                                                <p><strong>$ </strong> <?php echo htmlspecialchars($cart['price']); ?></p></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                        <?php endforeach; ?>
                                </table>
                                
                            </div> <!-- well -->
                            
                        </div> <!-- panel-body -->
                    </div> <!-- collapse -->
                    
                    <div class="panel-footer">
                        <table class="table">
                            <thead>
                                <th></th><th></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Subtotal: </td>
                                    <td><strong>$ </strong></td> 
                                    <td><p><?php echo $subtotal; ?></p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- panel-footer -->
                    
                    <div class="well">
                    	<div class="form-group">
  				<label for="comment">Special Instructions: <small>(limit 300 characters)</small></label>
  				<textarea class="form-control" rows="5" id="comment" name="specialInstructions"></textarea>
			</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="col-sm-1"></div>
</div>
<br>
<br>
<br>
<div class="container-fluid">
<nav class="navbar navbar-default navbar-fixed-bottom" style="margin-top: 30px; padding-bottom: 30px;" >
<div class="col-sm-3"></div>
<div class="col-sm-6">
                <label for="bttn">&nbsp;</label>
                <input type="hidden" name="action" value="continue"> 
                <button type="submit" class="btn btn-info form-control" id="bttn" name="action" value="continue">Continue Checkout</button>
           
</div>
<div class="col-sm-3"></div>
</nav>
</div>
</form>
<br>
</html>