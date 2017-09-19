<!DOCTYPE html>

<title>Zyema Collection</title>
<html>

<!-- LOGIN FORM -->
<form action="account/" method="POST" id="login_form">
<input type="hidden" name="action" value="login"/>
<div class="modal fade" id="myLogin" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-header text-center" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2><span class="glyphicon glyphicon-lock"></span> Login</h2>
        </div> <!-- modal_header -->
        
        <div class="modal-body" style="padding:40px 50px;">
            
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="email" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" id="psw" placeholder="Enter password">
            </div>
            	
              <button type="submit" name="action" value="login" class="btn btn-success btn-block">
              	<span class="glyphicon glyphicon-off"></span> Login
              </button>
          
            <?php if(!empty($login_error)) : ?>
            	<div class="alert alert-warning"><strong>ERROR: </strong>
            		<?php echo htmlspecialchars($login_error); ?> 
            	</div> <!-- alert_warning -->
            <?php endif; ?>
        
        </div> <!-- modal_body -->
        
        <div class="modal-footer">
        
        	<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
          		<span class="glyphicon glyphicon-remove"></span> Cancel
          	</button>
          
          <p>Not a member? <a href="?action=registration">Sign Up</a></p>
          <p>Forgot <a href="?action=forgot_password">Password?</a></p>
          
        </div> <!-- modal_footer -->
        
      </div> <!-- modal_content -->
      
    </div> <!-- modal_dialog -->
</div> <!-- modal_fade -->
</form>
<!-- END_LOGIN_FORM -->


<div class="col-xs-12">
	<?php include 'view/header.php'; ?>
</div>

<body style="background-color:white;">

    
        <div class="col-xs-12">
            
        <nav class="navbar navbar-inverse" data-spy="affix-top" data-offset-top="165">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">
                    <button class="btn-link" data-toggle="modal" href="#myModal" id="tag"><b>Zyema Collection</b></button>
            </div>
            
<!-- NAVIGATION BAR -->
	<div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li><a href="#"><b>Home</b></a></li>
                <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                Womens Clothing<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">Summer Wear</li>
                                    <li><a href="catalog?category_id=1">Tops</a></li>
                                    <li><a href="#">Jackets</a></li>
                                    <li><a href="catalog?category_id=3">Pants</a></li>
                                    <li><a href="catalog?category_id=4">Leggings</a></li>
                                    <li><a href="catalog?category_id=4">Skirts</a></li>
                                    <li><a href="catalog?category_id=1">Dresses</a></li>
                                    <li><a href="#">Shorts</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Winter Wear</li>
                                    <li><a href="#">Tops</a></li>
                                    <li><a href="#">Jackets</a></li>
                                    <li><a href="#">Pants</a></li>
                                </ul>
                </li>
               	<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mens Clothing
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">Summer Wear</li>
                                    <li><a href="#">Tops</a></li>
                                    <li><a href="#">Jackets</a></li>
                                    <li><a href="catalog?category_id=3">Pants</a></li>
                                    <li><a href="#">Shorts</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Winter Wear</li>
                                    <li><a href="#">Tops</a></li>
                                    <li><a href="#">Jackets</a></li>
                                    <li><a href="#">Pants</a></li>
                                </ul>
               </li>
               <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Clothing Accessories
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">Womens</li>
                                    <li><a href="#">Hats</a></li>
                                    <li><a href="#">Scarfs/Shawls</a></li>
                                    <li><a href="#">Gloves</a></li>
                                    <li><a href="#">Sun Glasses</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Mens</li>
                                    <li><a href="#">Hats</a></li>
                                    <li><a href="#">Scarfs/Shawls</a></li>
                                    <li><a href="#">Gloves</a></li>
                                    <li><a href="#">Sun Glasses</a></li>
                                </ul>
              	</li>
                <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Jewelery
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">Womens</li>
                                    <li><a href="#">Rings</a></li>
                                    <li><a href="#">Bracelets/Anklets</a></li>
                                    <li><a href="#">Necklaces/Chokers</a></li>
                                    <li><a href="#">Watches</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Mens</li>
                                    <li><a href="#">Rings</a></li>
                                    <li><a href="#">Necklaces</a></li>
                                    <li><a href="#">Watches</a></li>
                                </ul>
                        </li>
	        	<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gifts
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">For Her</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">For Him</a></li>
                                </ul>
                        </li>
	</ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="account"><span class="glyphicon glyphicon-user"></span>  <b>Sign Up</b></a></li>
                <li><a href="#myLogin" data-toggle="modal" style="padding-right: 30px;">
                	<span class="glyphicon glyphicon-log-in"></span>   <b>Login</b></a>
                </li>
            </ul>
	</div> <!-- nav_bar_collapse -->
	</nav>
	</div> <!-- col_12 -->
<!-- END_NAVIGATION_BAR -->

<div class="container-fluid">
	<img class="img-responsive" src="image/zc_bestSellers.png">
</div>
        
<div class="container-fluid">
    <div class="col-sm-1"></div>
    
      
                
       <div class="col-xs-10">
        
        <div class="row">
        
                   <?php foreach ($products as $product): ?>
                    	
                        <div class="col-sm-3 text-center">
                            
                            <a href="<?php echo htmlspecialchars('catalog?product_id=' . $product['productID']); ?>" 
                             class="thumbnail img-rounded" data-toggle="modal" style="background-image:url('image/Tie-Dye-Wallpaper.jpg'); padding:10px;">
                            <img class="img-responsive" src="image/<?php echo htmlspecialchars($product['productCode']); ?>.jpg" 
                            alt="<?php echo htmlspecialchars($product['productName']); ?>" style="width:300px;height:350px">
                            </a>
                            
                            <a href="<?php echo htmlspecialchars('catalog?product_id=' . $product['productID']); ?>">
                            <b><?php echo htmlspecialchars($product['productName']); ?><b></a>
                        </div>
                   <?php endforeach; ?>
                   
         </div> <!-- ROW -->            
   </div> <!-- col_xs10 -->
    <div class="col-sm-1"></div>
</div> <!-- container_fluid -->

<div class="container-fluid">
	<img class="img-responsive" src="image/zc_topPicks.png">
</div>
<div class="container-fluid">
    <div class="col-sm-1"></div>
    
      
                
       <div class="col-xs-10">
        
        <div class="row">
        
                   <?php foreach ($products as $product): ?>
                    	
                        <div class="col-sm-3 text-center">
                            
                            <a href="<?php echo htmlspecialchars('catalog?product_id=' . $product['productID']); ?>" 
                             class="thumbnail img-rounded" data-toggle="modal" style="background-image:url('image/Tie-Dye-Wallpaper.jpg'); padding:10px;">
                            <img class="img-responsive" src="image/<?php echo htmlspecialchars($product['productCode']); ?>.jpg" 
                            alt="<?php echo htmlspecialchars($product['productName']); ?>" style="width:300px;height:350px">
                            </a>
                            
                            <a href="<?php echo htmlspecialchars('catalog?product_id=' . $product['productID']); ?>">
                            <b><?php echo htmlspecialchars($product['productName']); ?><b></a>
                        </div>
                   <?php endforeach; ?>
                   
         </div> <!-- ROW -->            
   </div> <!-- col_xs10 -->
    <div class="col-sm-1"></div>
</div> <!-- container_fluid -->
<div class="container-fluid">
	<img class="img-responsive" src="image/zc_featuredItems.png">
</div>
<div class="container-fluid">
    <div class="col-sm-1"></div>
    
      
                
       <div class="col-xs-10">
        
        <div class="row">
        
                   <?php foreach ($products as $product): ?>
                    	
                        <div class="col-sm-3 text-center">
                            
                            <a href="<?php echo htmlspecialchars('catalog?product_id=' . $product['productID']); ?>" 
                             class="thumbnail img-rounded" data-toggle="modal" style="background-image:url('image/Tie-Dye-Wallpaper.jpg'); padding:10px;">
                            <img class="img-responsive" src="image/<?php echo htmlspecialchars($product['productCode']); ?>.jpg" 
                            alt="<?php echo htmlspecialchars($product['productName']); ?>" style="width:300px;height:350px">
                            </a>
                            
                            <a href="<?php echo htmlspecialchars('catalog?product_id=' . $product['productID']); ?>">
                            <b><?php echo htmlspecialchars($product['productName']); ?><b></a>
                        </div>
                   <?php endforeach; ?>
                   
         </div> <!-- ROW -->            
   </div> <!-- col_xs10 -->
    <div class="col-sm-1"></div>
</div> <!-- container_fluid -->
</body>

    
</html>
<div class="container-fluid col-xs-12" style="margin-top:35px;">
	<?php include 'view/footer.php'; ?>
</div>
    