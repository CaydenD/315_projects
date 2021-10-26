<?php
require('../model/database.php');
require('../model/create_incident_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'get_customer';
    }
}

switch ($action) {
    case 'get_customer':
        include('../view/create_incident/get_customer_page.php');
        break;
    case 'create_incident':
        
        
        $email = filter_input(INPUT_POST, 'email');
        
        if ($email == NULL || $email == FALSE) {
            $error = "Invalid email. Try again.";
            include('../errors/error.phpS');
        } else {
            //theres no check to see if the email is wrong or write in the data base do we need this feature or not
           $user = get_customer($email);
           $registered_products = registered_product($user['customerID']);


           
           include('../view/create_incident/create_incident_page.php');
           
        }
        break;
    case "add_incident_to_db":
        $productCode = filter_input(INPUT_POST, 'prodcut_type');
        $customerID = filter_input(INPUT_POST, 'userId');
        $title = filter_input(INPUT_POST, 'title');
        $description = filter_input(INPUT_POST, 'description');
        
        
        if ($productCode == NULL || $productCode == FALSE || $customerID == NULL || $customerID == FALSE || $title == NULL || $title == FALSE || $description == NULL || $description == FALSE) {
            $error = "Invalid product code and or customerID. Try again.";
            include('../errors/error.php');
        } else {
            //not sure if i am actually adding this to the incident tables ask prof how to add date times in php
            create_incident($productCode, $customerID, $title, $description);
           include('../view/create_incident/incident_created.php');
          
        }
        break;
}

?>