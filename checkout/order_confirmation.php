<?php include '../view/header2.php' ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<title>Zyema Collection: Order Confirmation</title>
<html>

<div class="container-fluid">
<div class="col-sm-12 img-rounded" style="background-image: url('../image/Tie-Dye-Wallpaper.jpg');">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <button class="btn-link" data-toggle="modal" href="#myModal">Zyema Collection</button>
                </div>
            </div>
<!-- NAVIGATION BAR -->
        </nav>
</div>


    <div class="container-fluid">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="progress" style="margin: 30px;">
                <div class="progress-bar" role="progressbar" aria-valuenow="75" 
                    aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
                    75% Complete
                </div>    
            </div>
        </div> <!-- col-sm-8 -->  
        <div class="col-sm-2"></div>
    </div>


<div class="container-fluid">
    
        <h2 class="text-primary text-center">Confirmation</h2>
            <p class="text-info text-center">Please verify that the following information is accurate. 
                Click the back button to change any information. 
                </p>
    
</div>
<br>

<div class="container-fluid">
    <div class="col-sm-1"></div>
    <div class="col-sm-5 img-rounded" style="background-image:url('../image/Tie-Dye-Wallpaper.jpg'); padding:5px;">
        <div class="panel panel-default">
            <div class="panel-heading text-center"><h3>Billing Address</h3></div>
            <div class="panel-body">
                <address>
                    <?php echo htmlspecialchars($customer_name); ?><br>
                    <?php echo htmlspecialchars($email); ?><br>
                    <?php echo htmlspecialchars($phone); ?><br>
                    <?php echo htmlspecialchars($address); ?>
                </address>
            </div> <!-- panel-body -->
            
                            <div class="panel-footer "></div>
                            
        	<div class="panel-heading text-center"><h3>Shipping Address</h3></div>
                                <div class="panel-body">
                                    <address>
                                        <?php echo htmlspecialchars($shipName); ?><br>
                                        <?php echo htmlspecialchars($shipPhone); ?><br>
                                        <?php echo htmlspecialchars($shipAddress); ?><br>
                                    </address>
                                </div> <!-- panel-body -->
                            </div> <!-- panel-dfault -->
                    </div> <!-- col-sm-5 -->    
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4 img-rounded" style="background-image:url('../image/Tie-Dye-Wallpaper.jpg'); padding:5px;">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><h3>Order Information:</h3></div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <?php foreach($carts as $cart) : ?>
                                        <tbody>
                                            <tr>
                                                <td><strong><?php echo htmlspecialchars($cart['quantity']); ?>x </strong></td>
                                                <td><?php echo htmlspecialchars($cart['size']); ?></td>
                                                <td><?php echo htmlspecialchars($cart['productName']); ?></td>
                                                <td><?php echo htmlspecialchars($cart['productCode']); ?></td>
                                                <td><strong>$ </strong><?php echo htmlspecialchars($cart['price']); ?></td>
                                            </tr>
                                        </tbody>
                                    <?php endforeach; ?>
                                </table>
                            </div> <!-- table-responsive -->
                            
                            <div class="text">
                            	<h4>Special Instructions: </h4>
                            	<blockquote>
                            		<p><small><?php echo htmlspecialchars($specialInstructions); ?> </small></p>
                            	</blockquote>
                            </div> <!-- text -->
                            
                        </div> <!-- panel-body -->
                        <div class="panel-footer">
	                        <address>
		                        <strong>Subtotal: $</strong> <?php echo htmlspecialchars($subtotal); ?><br>
		                        <strong>Shipping: $</strong> <?php echo htmlspecialchars($shipping); ?><br>
		                        <strong>Tax: $</strong> <?php echo htmlspecialchars($tax); ?>
	                        </address>
	                        <div class="text-right"><h4><strong>Total: $</strong> <?php echo htmlspecialchars($total); ?></h4></div>
                        </div> <!-- panel-footer -->
                    </div> <!-- panel-dfault -->
                    </div> <!-- col-sm-4 -->           
    <div class="col-sm-1"></div>
</div>

<br>
<br>                 
<form action="." method="post">
                        <div class="container-fluid">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                            <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-danger btn-block" name="action" value="confirm"><span class="glyphicon glyphicon-remove"></span> Back</button>
                                </div>
                                
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-success btn-block" name="action" value="payment"><span class="glyphicon glyphicon-ok"></span> Confirm</button>
                                </div>
                                </div>
                            </div> <!-- panel-dfault -->
                            </div> <!-- col-sm-6 -->
                            
                            <div class="col-sm-3"></div>
                        </div>
</form>
<br>
<br>           