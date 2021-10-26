<?php
require('../model/database.php');
require('../model/register_product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'customer_login';
    }
}

switch ($action) {
    case 'customer_login':
        include('../view/register_product/customer_login.php');
        break;
    case 'Login':
        $email = filter_input(INPUT_POST, 'email');
        
        if ($email == NULL || $email == FALSE) {
            $error = "Invalid email. Try again.";
            include('../errors/error.phpS');
        } else {
            //theres no check to see if the email is wrong or write in the data base do we need this feature or not
           $user = login($email);
           $productcodes = get_products();
           
           //this a way to print $user object
//           echo '<pre>';
//           print_r($user);
//           echo '</pre>';
           
           include('../view/register_product/register_product.php');
           
        }
        break;
    case "register_product":
        $productCode = filter_input(INPUT_POST, 'prodcut_type');
        $customerID = filter_input(INPUT_POST, 'userId');
        
        
        if ($productCode == NULL || $productCode == FALSE || $customerID == NULL || $customerID == FALSE) {
            $error = "Invalid product code and or customerID. Try again.";
            include('../errors/error.php');
        } else {
            //not sure if i am actually adding this to the register table ask prof how to add date times in php
            register_product($productCode, $customerID);
           include('../view/register_product/product_registered.php');
          
        }
        break;
}

?>