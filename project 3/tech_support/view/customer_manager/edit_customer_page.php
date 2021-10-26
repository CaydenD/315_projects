<?php include '../view/header.php'; ?>
<main>
    <h1>Update Customer</h1>
     
<!--    good way to print out the associative array to look at structure-->
   <?php //echo '<pre>'; print_r($customer); echo '</pre>';?> 

    <form action="index.php" method="post" id="aligned">
        <input type="hidden" name="action" value="edit_customer">
        <input type="hidden" name="customer_id" value="<?php echo $customerID; ?>">
        <label>First Name:</label>
        <input type="text" name="firstName" value='<?php echo $customer['firstName']; ?>' />
        <br>
        
        <label>Last Name:</label>
        <input type="text" name="lastName" value='<?php echo $customer['lastName']; ?>'/>
        <br>
        
        <label>Address:</label>
        <input type="text" name="address" value='<?php echo $customer['address']; ?>'/>
        <br>
        
        <label>City:</label>
        <input type="text" name="city" value='<?php echo $customer['city']; ?>'/> 
        <br>
        
        <label>State:</label>
        <input type="text" name="state" value='<?php echo $customer['state']; ?>'/> 
        <br>
        
        <label>Postal Code:</label>
        <input type="text" name="postalCode" value='<?php echo $customer['postalCode']; ?>'/> 
        <br>
        
        <label>Country Code:</label>
        <input type="text" name="countryCode" value='<?php echo $customer['countryCode']; ?>'/> 
        <br>
        
        <label>Phone:</label>
        <input type="text" name="phone" value='<?php echo $customer['phone']; ?>'/> 
        <br>
        
        <label>Email:</label>
        <input type="text" name="email" value='<?php echo $customer['email']; ?>'/> 
        <br>
        
        <label>Password:</label>
        <input type="text" name="password" value='<?php echo $customer['password']; ?>'/> 
        <br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Update Customer" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_customers">View Customer List</a>
    </p>
</main>
    <?php include '../view/footer.php'; ?>