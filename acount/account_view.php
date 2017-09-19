<?php include '../view/header2.php'; ?>
<html>
<title>Zema Collection: Homepage</title>

<div class="container-fluid">

<div class="col-sm-12 img-rounded" style="background-image: url('../image/Tie-Dye-Wallpaper.jpg');">


        <nav class="navbar navbar-default navbar-fixed">
            <div class="navbar-header">
                <a class="navbar-brand" data-toggle="modal" href="#myModal" style="color: #009999;"><b>Zema Collection</b></a>
            </div>   
<!-- NAVIGATION BAR -->
            
            <ul class="nav navbar-nav">
                
                <li><a href="../catalog?category_id=1" style="color: #330066; "><b>Sales</b></a></li>
                <li><a href="../catalog?category_id=2" style="color: #330066; "><b>Featured Items</b></a></li>
                <li><a href="../catalog?category_id=3" style="color: #330066; "><b>Top Sellers</b></a></li>
                <li><a href="../catalog?category_id=4" style="color: #330066; "><b>Gifts</b></a></li>
            </ul>
          	<ul class="nav navbar-right">
                        <li>
                        	<a href="../cart?action=view" style="padding-right: 30px; color: black;">
                        	<span class="glyphicon glyphicon-shopping-cart"></span>
                        	<span class="badge"><?php if($cartCount > 0): ?><?php echo $cartCount; ?><?php endif ?></span><b> Cart</b></a>
                        </li>
                    
                </ul>
            
        </nav>
</div> <!-- background img -->
<div class="col-sm-1"></div>
</div> <!-- container-fluid -->


<main>
<div class="container-fluid">
<div class="col-sm-1"></div>
<div class="col-sm-10">

<div class="col-sm-3">
    <h1>My Account</h1>
    <p><?php echo $customer_name . ' (' . $email . ')'; ?></p>
    <form action="." method="post">
        <input type="hidden" name="action" value="view_account_edit">
        <input type="submit" class="btn btn-default" value="Edit Account">
    </form>
</div>
    
<div class="col-sm-4">
    <h2>Shipping Address</h2>
    <p><?php echo htmlspecialchars($shipping_address['line1']); ?><br>
        <?php if ( strlen($shipping_address['line2']) > 0 ) : ?>
            <?php echo htmlspecialchars($shipping_address['line2']); ?><br>
        <?php endif; ?>
        <?php echo htmlspecialchars($shipping_address['city']); ?>, <?php 
              echo htmlspecialchars($shipping_address['state']); ?>
        <?php echo htmlspecialchars($shipping_address['zipCode']); ?><br>
        <?php echo htmlspecialchars($shipping_address['phone']); ?>
    </p>
    <form action="." method="post">
        <input type="hidden" name="action" value="view_address_edit">
        <input type="hidden" name="address_type" value="shipping">
        <input type="submit" class="btn btn-default" value="Edit Shipping Address">
    </form>
</div>
    
<div class="col-sm-3">
    <h2>Billing Address</h2>
    <p><?php echo htmlspecialchars($billing_address['line1']); ?><br>
        <?php if ( strlen($billing_address['line2']) > 0 ) : ?>
            <?php echo htmlspecialchars($billing_address['line2']); ?><br>
        <?php endif; ?>
        <?php echo htmlspecialchars($billing_address['city']); ?>, <?php 
              echo htmlspecialchars($billing_address['state']); ?>
        <?php echo htmlspecialchars($billing_address['zipCode']); ?><br>
        <?php echo htmlspecialchars($billing_address['phone']); ?>
    </p>
    <form action="." method="post">
        <input type="hidden" name="action" value="view_address_edit">
        <input type="hidden" name="address_type" value="billing">
        <input type="submit" class="btn btn-default" value="Edit Billing Address">
    </form>
</div>
</div> <!-- col-sm-10 -->
<div class="col-sm-1"></div>
</div> <!-- container -->
<br>

<?php if($login === TRUE) : ?>
    <div class="container-fluid">
        <div class="col-sm-1"></div> 
            <div class="col-sm-10">
                <div class="row">
                    <h2><strong>Welcome<strong> <?php echo htmlspecialchars($customer_name); ?></h2>
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><h2>Order History</h2>
                            <form action="." method="post">
                                <button type="submit" class="btn-link" name="action" value="logout"><span class="glyphicon glyphicon-lock"></span> Logout</button>
                            </form>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Date:</td>
                                            <td>Order No:</td>
                                            <td>Status:</td>
                                            <td>Shipping:</td>
                                            <td>Total:</td>
                                        </tr>
                                    </thead>
                                    
                                <?php foreach ($orders as $order) : 
                                	$order_id = $order['orderID'];
                                	$order_date = $order['orderDate'];
                                	$order_status = $order['orderStatus'];
                                	$shipping = $order['shipAmount'];
                                	$order_total = $order['orderTotal'];
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo htmlspecialchars($order_date); ?></td>
                                            <td><button type="button" class="btn btn-link" data-toggle="modal" 
                                                        data-target="#orderNum"><?php echo htmlspecialchars($order_id); ?></button></td>
                                            <td><?php echo htmlspecialchars($order_status); ?></td>
                                            <td><?php echo htmlspecialchars($shipping); ?></td>
                                            <td><?php echo htmlspecialchars($order_total); ?></td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; ?>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-sm-1"></div>                 
    </div>
<?php endif; ?>


      <div id="orderNum" class="modal fade" role="dialog">
          <div class="modal-dialog img-rounded" style="background-image: url('../image/Tie-Dye-Wallpaper.jpg'); padding:15px;">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title text-center">Items</h4>
                  </div>
                  <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <?php foreach ($carts as $cart) :
                            	$product_count = $cart['productCount'];
                            	$product_name = $cart['productName'];
                            	$product_size = $cart['productSize'];
                            	$product_id = $cart['productID'];
                            	$product_retail = $cart['productRetail'];
                            	$cart_cost = $cart['cartTotal'];
                            ?>
                                <tbody>
                                    <tr>
                                        <td><strong><?php echo htmlspecialchars('$product_count'); ?>x </strong></td>
                                        <td><?php echo htmlsepcialchars('$product_size'); ?></td>
                                        <td><?php echo htmlspecialchars('$product_name'); ?></td>
                                        <td><?php echo htmlspecialchars('product_id'); ?></td>
                                        <td><?php echo htmlspecialchars('$product_retail'); ?></td>
                                        <td><strong>$ </strong><?php echo htmlspecialchars('$cart_cost'); ?></td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                  </div>
              </div>
          </div>
      </div>
</main>     
<?php include '../view/footer.php'; ?>

</html>
