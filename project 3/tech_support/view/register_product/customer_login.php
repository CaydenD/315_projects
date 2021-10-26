<?php include '../view/header.php'; ?>
<main>
    <h1>Customer Login</h1> 
    <br>
    You must login before you can register a product

    <form action="index.php" method="post" id="aligned">
        <input type="hidden" name="action" value="Login">
        
        <label>Email:</label>
        <input type="text" name="email" value="">
        <input type="submit" value="login" />
        <br>
    </form>
</main>
    <?php include '../view/footer.php'; ?>