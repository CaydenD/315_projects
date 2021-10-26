<?php include '../view/header.php';?>
<main>
    <section>
        <!-- display a table of products -->
        <h1>Customer Search</h1>
        
        <form action="index.php" method="post" id="aligned">
            <input type="hidden" name="action" value="search_lastname">
            <label>Last Name</label>
            <input type="text" name="last_name" />
            <input type="submit" value="Search" />
            <br>
            <br>
        </form>
        
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>City</th>
                <th>&nbsp;</th>
            </tr>
                <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer['firstName']; ?> <?php echo $customer['lastName']; ?></td>
                <td><?php echo $customer['email']; ?></td>
                <td><?php echo $customer['city']; ?></td>
                <td><form action="." method="post">
                        <input type="hidden" name="action"value="customer_selected">
                        <input type="hidden" name="customer_id"value="<?php echo $customer['customerID']; ?>">
                        <input type="submit" value="Select">
                    </form>
                </td>
            </tr>
                <?php endforeach; ?>
        </table>
    </section>
</main>
<?php include '../view/footer.php'; ?>