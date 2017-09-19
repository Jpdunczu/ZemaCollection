<?php include('../view/header2.php'); ?>
<?php if($admin === 'yes') : ?>
<form action="." method="POST">
<div class="container-fluid">
	
</div>
    <div class="container-fluid">
        <div class="text-center text-primary"><h3><b>Edit Products</b></h3></div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name:</th>
                        <th>ID:</th>
                        <th>Item:</th>
                        <th>Description:</th>
                        <th>Cost:</th>
                        <th>Retail:</th>
                        <th>Sale?</th>
                        <th>Sale Price:</th>
                        <th>Type:</th>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['products'] as $product) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['productName']); ?></td>
                        <td><?php echo htmlspecialchars($product['productID']); ?></td>
                        <td><img class="img-responsive" src="../image/<?php echo htmlspecialchars($product['productCode']); ?>.jpg" 
                            alt="<?php echo htmlspecialchars($product['productName']); ?>" style="width:80px;height:80px"></td>
                        <td><?php echo htmlspecialchars($product['description']); ?></td>
                        <td><?php echo htmlspecialchars($product['productCost']); ?></td>
                        <td><?php echo htmlspecialchars($product['listPrice']); ?></td>
                        <td><?php echo htmlspecialchars($product['isSale']); ?></td>
                        <td><?php echo htmlspecialchars($product['salePrice']); ?></td>
                        <td><?php echo htmlspecialchars($product['categoryID']); ?></td>
                        <td><button type="submit" class="btn btn-default" name="edit" 
                        	value="<?php echo htmlspecialchars($product['productID']); ?>">Edit</button></td>
                    </tr>
                    <?php endforEach; ?>
                </tbody>
            </table>
        </div>
    </div>
</form>
<?php endif; ?>