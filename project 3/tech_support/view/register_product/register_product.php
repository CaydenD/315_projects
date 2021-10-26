<?php include '../view/header.php'; ?>
<main>
    <h1>Register Product</h1> 
    <br>
    
    <?php // echo '<pre>'; print_r($productcodes); echo '</pre>';?> 

    <form action="index.php" method="post" id="aligned">
        <input type="hidden" name="action" value="register_product">
        <input type="hidden" name="userId" value="<?php echo $user['customerID']; ?>">

        
        
        <label>Customer:</label> <?php echo $user['firstName']; ?> <?php echo $user['lastName']; ?>
        <br>
        
        <label>Product:</label>
        <select name="prodcut_type">
            <?php foreach ($productcodes as $product) : ?>
            <option value="<?php echo $product['productCode']; ?>" ><?php echo $product['productCode']; ?></option>
             <?php endforeach; ?>
        </select>
        <br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Register Producct" />
        <br>
    </form>
</main>
    <?php include '../view/footer.php'; ?>