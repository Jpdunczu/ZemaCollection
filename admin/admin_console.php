<?php include('../view/header2.php'); ?>

<title>Admin Console</title>

<form action="../admin/index.php" method="POST">
<div class="container-fluid">
    <div class="col-sm-3"></div>
    <div class="col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h3><strong>Admin Console</strong></h3>
            </div>
            <div class="panel-body">
                <button type="submit" class="btn btn-default btn-block" name="action" value="users"><span class="glyphicon glyphicon-user"></span>Users </button>
                <button type="submit" class="btn btn-primary btn-block" name="action" value="customers"><span class="glyphicon glyphicon-list-alt"></span> Customers</button>
                <button type="submit" class="btn btn-primary btn-block" name="action" value="orders"><span class="glyphicon glyphicon-barcode"></span> Orders</button>
                <button type="submit" class="btn btn-info btn-block" name="action" value="addItem"><span class="glyphicon glyphicon-tag"></span> Add Item</button>
                <button type="submit" class="btn btn-info btn-block" name="action" value="edit"><span class="glyphicon glyphicon-tag"></span> Edit Products</button>
            </div>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>
</form>