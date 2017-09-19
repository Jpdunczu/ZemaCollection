<?php include '../view/header2.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<main>
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
<br>
<div class="container-fluid">
	<div class="text text-center text-primary">
		<h1> Secure Payment </h1>
	</div>
	
	<div class="text text-center text-danger">
		<h4> Do not click the process payment button more than once to avoid multiple charges.</h4>
	</div>
</div>
<br>
<form action="." method="post">
                        <div class="container-fluid">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6 img-rounded" style="background-image:url('../image/Tie-Dye-Wallpaper.jpg'); padding:5px;">
                            <div class="panel panel-default">
                                <div class="panel-heading"></div>
                                <div class="panel-body">
                                    
                                        <label class="radio-inline"><input type="radio" name="ccType" value="2"> <i class="fa fa-cc-visa" style="font-size:36px"></i></label>
                                        <label class="radio-inline"><input type="radio" name="ccType" value="1"> <i class="fa fa-cc-mastercard" style="font-size:36px"></i></label>
                                        <label class="radio-inline"><input type="radio" name="ccType" value="4"> <i class="fa fa-cc-amex" style="font-size:36px"></i></label>
                                        <label class="radio-inline"><input type="radio" name="ccType" value="3"> <i class="fa fa-cc-discover" style="font-size:36px"></i></label><br>
                                        <p class="text-danger"><?php echo htmlspecialchars($errorMessageCC); ?></p>

                                        <div class="col-xs-6">
                                            <label for="CC">CC: </label>
                                            <input type="text" class="form-control" id="CC" name="ccNumber" placeholder="1234-5678-1011-1213" required>        
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="expDate">EXP: </label>
                                            <input type="text" class="form-control" id="expDate" name="exp" placeholder="Expiration Date" required>
                                        </div>
                                        <div class="col-xs-2">
                                            <label for="crv">CVV: </label>
                                            <input type="text" class="form-control" id="crv" name="cvv" placeholder="123" required>
                                        </div>
                                    
                                </div>
                                <div class="panel-footer">
                                    <button type="submit" class="btn btn-success btn-block" name="action" value="process"><span class="glyphicon glyphicon-ok"></span> Process Payment</button>
                                </div>
                            </div> <!-- panel-dfault -->
                            </div> <!-- col-sm-6 -->
                            
                            <div class="col-sm-3"></div>
                        </div>
</form>
    <form action="../cart" method="post" >
        <input type="submit" value="Cancel Payment Entry">
    </form>
</main>
<?php include '../view/footer.php'; ?>