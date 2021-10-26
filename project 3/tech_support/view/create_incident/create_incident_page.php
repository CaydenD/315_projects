<?php include '../view/header.php'; ?>
<main>
    <h1>Create Incident</h1> 
    <br>
    
    <?php // echo '<pre>'; print_r($registered_products); echo '</pre>';?> 

    <form action="index.php" method="post" id="aligned">
        <input type="hidden" name="action" value="add_incident_to_db">
        <input type="hidden" name="userId" value="<?php echo $user['customerID']; ?>">

        
        
        <label>Customer:</label> <?php echo $user['firstName']; ?> <?php echo $user['lastName']; ?>
        <br>
        
        <label>Product:</label>
        <select name="prodcut_type">
            <?php foreach ($registered_products as $product) : ?>
            <option value="<?php echo $product['productCode']; ?>" ><?php echo $product['productCode']; ?></option>
             <?php endforeach; ?>
        </select>
        <br>
        
<!--        what are we supposed to be using for title if its not a text area-->
        <label>Title:</label>
        <textarea name="title" rows="1" cols="50"></textarea>
        <br>
        
        <label>Description:</label>
        <textarea name="description" rows="4" cols="50"></textarea>
        <br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Create Incident" />
        <br>
    </form>
</main>
    <?php include '../view/footer.php'; ?>