<?php

?>
<!DOCTYPE html>

<title>Zema Collection: Error!</title>
<html>
    
<?php include '../view/header2.php'; ?>
<?php include '../account/login.php'; ?>
<div class="container-fluid">
<div class="col-sm-1"></div>
<div class="col-sm-10" style="background-image: url('../image/Tie-Dye-Wallpaper.jpg');">


        <nav class="navbar navbar-default navbar-fixed">
            <div class="navbar-header">
                <a class="navbar-brand" data-toggle="modal" href="#myModal" style="color: #009999;"><b>Zema Collection</b></a>
            </div>   
<!-- NAVIGATION BAR -->
            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="../" style="color: black;"><b>Home</b></a></li>
                <li><a href="../catalog?category_id=1" style="color: #330066; "><b>Sales</b></a></li>
                <li><a href="../catalog?category_id=2" style="color: #330066; "><b>Featured Items</b></a></li>
                <li><a href="../catalog?category_id=3" style="color: #330066; "><b>Top Sellers</b></a></li>
                <li><a href="../catalog?category_id=4" style="color: #330066; "><b>Gifts</b></a></li>
            </ul>
            </div> <!-- myNavbar -->
        </nav>
</div> <!-- background img -->
<div class="col-sm-1"></div>
</div> <!-- container-fluid -->


<div class="container-fluid">
    <h1>Oops!</h1>
    <h3>We apologize, there appears to have been an Error</h3>
    <p>Please use the navigation bar or your browsers "back" button.</p>
    <p><?php $error_message; ?></p>
</div>
</main>
<?php include '../view/footer.php'; ?>