<?php include('../view/header2.php'); ?>
<?php if($admin === 'yes') : ?>
<form action="." method="POST" enctype="multipart/form-data">
<div class="container-fluid">
    <?php if ($_SESSION['']) ?>
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
</div>
    <div class="container-fluid">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="text-center"><h3>Add/Edit Items</h3></div>
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3>Add new item</h3>
                </div>
                <div class="panel-body">
	                
                <div class="container-fluid">
                    <div class="text text-center text-primary"><h4><b>Product Details</b></h4></div>
                    	<div class="container-fluid">
	                    	<div class="form-group">
	                    	    <div class="col-xs-4">
	                    	    <label for="gender">Gender:</label>
		                    	<select class="form-control" name="gender" required>
			                    	<option data-toggle="collapse" data-target="#female" name="women">Womens</option>
			                    	<option data-toggle="collapse" data-target="#male" name="men">Mens</option>
		                    	</select>
		                    </div>
		                    <div class="col-xs-4">
		                    <label for="type">Type:</label>
		                    	<select class="form-control" name="type" required>
		                    		<option data-toggle="collapse" data-target="#mSummer" name="1">Summer</option>
		                    		<option data-toggle="collapse" data-target="#winter" name="2">Winter</option>
		                    		<option data-toggle="collapse" data-target="#accessories" name="3">Accessories</option>
		                    		<option data-toggle="collapse" data-target="#jewelry" name="4">Jewelry</option>
		                    	</select>
		                    </div>
		                    <div class="col-xs-4">
		                    <label for="category">Category:</label>
		                    	<select class="form-control" name="category" required>
		                    		<option name="1">Tops</option>
		                    		<option name="2">Jackets</option>
		                    		<option name="3">Pants</option>
		                    		<option name="4">Leggings</option>
		                    		<option name="5">Skirts</option>
		                    		<option name="6">Dresses</option>
		                    		<option name="7">Shorts</option>
		                    		<option name="8">Hats</option>
		                    		<option name="9">Scarfs</option>
		                    		<option name="10">Gloves</option>
		                    		<option name="11">Sun Glasses</option>
		                    		<option name="12">Rings</option>
		                    		<option name="13">Bracelet</option>
		                    		<option name="14">Necklace</option>
		                    		<option name="15">Watches</option>
		                    	</select>
		                    </div>
		            	</div> <!-- form_group -->
		        </div> <!-- container_fluid -->    
	            </div> <!-- container_fluid -->
	            <br>
                    <div class="container-fluid">
	                    <div class="form-group col-xs-4">
	                        <label for="productName">Name:</label>
	                        <input type="text" class="form-control" name="productName" id="productName" placeholder="Product Name" required/>
	                    </div>
                   
	                    <div class="form-group col-xs-6">
	                        <label for="description">Description:</label>
	                        <textarea class="form-control" name="description" 
	                                  rows="3" id="description" placeholder="Short description of the product..." required></textarea>
	                    </div>
                    </div> <!-- container_fluid -->
                    
                    <div class="container-fluid">
	                    <div class="form-group col-xs-2">
	                        <label for="cost">Cost:</label>
	                        <input type="text" class="form-control" name="productCost" id="cost" placeholder="0.00" required/>
	                    </div>
	                    
	                    <div class="form-group col-xs-2">
	                        <label for="retail">Retail:</label>
	                        <input type="text" class="form-control" name="listPrice" id="retail" placeholder="0.00" required/>
	                    </div>
                    <!-- 
	                    <div class="form-group col-xs-3">
	                        <label for="type">Type:</label>
	                        <select class="form-control" name="productType" id="type" required>
	                            <option value="gift">gift</option>
	                            <option value="top">top seller</option>
	                            <option value="feat">featured item</option>
	                        </select>
	                    </div>
	            -->
	                    <div class="form-group col-xs-2">
	                        <label for="sale">on Sale?</label>
	                        <select class="form-control" name="sale" required>
	                            <option>NO</option>
	                            <option data-toggle="collapse" data-target="#sale">YES</option>
	                        </select>
	                    </div>
	                    
	                    <div class="collapse" id="sale">
		                    <div class="form-group col-xs-2">
		                        <label for="salePrice">Sale price:</label>
		                        <input type="text" class="form-control" name="salePrice" placeholder="0.00"/>
		                    </div>
	                    </div>
                    </div> <!-- container_fluid -->
                
                
	                <div class="container-fluid">
		        	<div class="form-group">
		        		<label for="file">Choose Item photo:</label>
		        		<input type="file" name="file" id="file" required/>
		        	</div>
		        </div> <!-- img_container_fluid -->
	        </div> <!-- panel_body --> 
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary btn-block" name="action" value="newItem">Add New Item</button>
                </div>
                
            </div> <!-- panel_default -->
        </div> <!-- col-sm-8 -->
        <div class="col-sm-2"></div>
    </div> <!-- container_fluid -->
</form>
<?php endif; ?>