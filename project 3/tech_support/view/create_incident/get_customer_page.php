<?php include '../view/header.php'; ?>
<main>
    <h1>Get Customer</h1> 
    <br>
    You must enter the customers email address to select the customer

    <form action="index.php" method="post" id="aligned">
        <input type="hidden" name="action" value="create_incident">
        
        <label>Email:</label>
        <input type="text" name="email" value="">
        <input type="submit" value="Get Customer" />
        <br>
    </form>
</main>
    <?php include '../view/footer.php'; ?>