<?php include '../view/header2.php'; ?>
<div class="container-fluid">

<div class="col-sm-12 img-rounded" style="background-image: url('../image/Tie-Dye-Wallpaper.jpg');">


        <nav class="navbar navbar-default navbar-fixed">
            <div class="navbar-header">
                <a class="navbar-brand" data-toggle="modal" href="#myModal" style="color: #009999;"><b>Zema Collection</b></a>
            </div>   
<!-- NAVIGATION BAR -->
            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="?action=view_account" style="color: black;"><b>Home</b></a></li>
                <li><a href="../catalog?category_id=1" style="color: #330066; "><b>Sales</b></a></li>
                <li><a href="../catalog?category_id=2" style="color: #330066; "><b>Featured Items</b></a></li>
                <li><a href="../catalog?category_id=3" style="color: #330066; "><b>Top Sellers</b></a></li>
                <li><a href="../catalog?category_id=4" style="color: #330066; "><b>Gifts</b></a></li>
            </ul>
                
                

            <?php if($login == false): ?>
                
                    <ul class="nav navbar-nav navbar-right">
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
                        	<span class="badge"><?php if($cartCount > 0): ?><?php echo $cartCount; ?><?php endif ?></span><b> Cart</b></a>
                        </li>
                    
                    </ul>
            </div> <!-- myNavbar -->
        </nav>
</div> <!-- background img -->
<div class="col-sm-1"></div>
</div> <!-- container-fluid -->

<main>
    <h1><?php echo $heading; ?></h1>
    <div id="edit_address_form">
    <form action="." method="post">
        <input type="hidden" name="action" value="update_address">
        <input type="hidden" name="address_type" value="<?php echo $address_type ?>">
        <label>Address:</label>
        <input type="text" name="line1" 
               value="<?php echo htmlspecialchars($line1); ?>">
        <br>
        
        <label>Line 2:</label>
        <input type="text" name="line2" 
               value="<?php echo htmlspecialchars($line2); ?>">
        <br>
        
        <label>City:</label>
        <input type="text" name="city" 
               value="<?php echo htmlspecialchars($city); ?>">
        <br>
        
        <label>State:</label>
        <input type="text" name="state" 
               value="<?php echo htmlspecialchars($state); ?>">
        <br>
        
        <label>Zip Code:</label>
        <input type="text" name="zip" 
               value="<?php echo htmlspecialchars($zip); ?>">
        <br>
        
        <label>Phone:</label>
        <input type="text" name="phone" 
               value="<?php echo htmlspecialchars($phone); ?>">
        <br>
        
        <label>&nbsp;</label>
        <input type="submit" 
               value="<?php echo htmlspecialchars($heading); ?>">
        <br>
    </form>
    <form action="." method="post">
        <label>&nbsp;</label>
        <input type="submit" value="Cancel">
    </form>
    </div>
</main>
<?php include '../view/footer.php'; ?>
