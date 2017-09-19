<?php include '../view/header2.php' ?>
<title>Zyema Collection: Order Success</title>
<html>

<div class="container-fluid">
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
            <div class="progress col-sm-8">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" 
                    aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                    100% Complete
                </div>    
            </div>
        <div class="col-sm-2"></div>
    </div>

<div class="container-fluid">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <h1 class="text-center">Thank you!</h1>
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="container-fluid">
    <div class="alert alert-success text-center">
        <strong>Order Success!</strong> Your payment has been processed and your order has been placed!</strong>
    </div>
</div>

<div class="container-fluid">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading text-center"><h3>Order Information: </h3></div>
            <div class="panel-body">
                <div class="text-primary>"<h4><strong>Order Number: </strong></h4> <mark><?php echo htmlspecialchars($order_id); ?></mark></div>
                <div class="text-info"><strong>Thank you for shopping with us! </strong>an e-mail containing your receipt and order information has been sent.</div>
                <br>
                
                    <div class="text-primary">
                        <strong>Billing Address</strong>
                    </div>
		        <address>
			        <?php echo htmlspecialchars($billing_address); ?><br>
	                </address>
                
                    
                        <div class="text-primary">
                        <strong>Shipping Address</strong>
                    	</div>
                    	<address>
	                        <?php echo htmlspecialchars($shipAddress); ?><br>
                        </address>
                
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
                </div>
                <ul class="list-inline">
                    <li><div class="text-primary"><strong>Shipping: </strong> <?php echo htmlspecialchars($shipping); ?></div></li>
                    <li><div class="text-primary"><strong>Total: </strong> <?php echo htmlspecialchars($total); ?></div></li>
                </ul>
            </div>
                <form action="." method="post">
                    <div class="panel-footer">
                        <a href="../account?action=view_account" class="btn btn-primary btn-block">
                        <span class="glyphicon glyphicon-home"></span> Home Page</a>
                    </div>
                </form>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>
</html>