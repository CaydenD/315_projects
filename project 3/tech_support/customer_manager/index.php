<?php
require('../model/database.php');
require('../model/customers_table_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_customers';
    }
}

if ($action == 'list_customers') {
    $customers = get_customers();
    include('../view/customer_manager/customer_table_search.php');
} 

else if ($action == 'search_lastname') {
    $lastName = filter_input(INPUT_POST, 'last_name');
    $customers = get_customers_with_lastname($lastName);
    include('view/customer_table_search.php');
} 

else if ($action == 'customer_selected') {
    $customerID = filter_input(INPUT_POST, 'customer_id');
    $customer = get_customers_with_id($customerID);
    include('../view/customer_manager/edit_customer_page.php');
} 

else if ($action == 'edit_customer') {
    $customerID = filter_input(INPUT_POST, 'customer_id');
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $postal_code = filter_input(INPUT_POST, 'postalCode');
    $country_code = filter_input(INPUT_POST, 'countryCode');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    
    if ($firstName == NULL || $firstName == FALSE
            || $lastName == NULL || $lastName == FALSE
            || $address == NULL || $address == FALSE
            || $city == NULL || $city == FALSE
            || $state == NULL || $state == FALSE 
            || $postal_code == NULL || $postal_code == FALSE 
            || $country_code == NULL || $country_code == FALSE 
            || $phone == NULL || $phone == FALSE 
            || $password == NULL || $password == FALSE) {
        $error = "Invalid customer data. Try again.";
        include('../errors/error.php');
    } else {
        update_customer($customerID, $firstName, $lastName, $address, $city,$state, $postal_code, $country_code, $phone, $email, $password);
        header("Location: .");
    }
} 




//if you get a post from the table trying to delete a technician flow of controll should enter this if else and delete the given technican form table with given tech_id
else if ($action == 'delete_technician'){
    $tech_id = filter_input(INPUT_POST, 'tech_id');
    if($tech_id == null || $tech_id == false) {
        $error = "missing or incorrect tech id";
        include('../errors/error.php');
    } else {
        delete_technician($tech_id);
        header("Location: .");
    }
} 

else if($action == 'show_add_form'){
    $technicians = get_technicians();
    include('../view/customer_manager/add_technician_form.php');
}

else if ($action == 'add_technician'){
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    if ($firstName == NULL || $firstName == FALSE || $lastName == NULL || $lastName == FALSE || $phone == NULL || $phone == FALSE || $email == NULL || $email == FALSE || $password == NULL || $password == FALSE) {
        $error = "Invalid technician data. Try again.";
        include('../errors/error.php');
    } else {
        add_technician($firstName, $lastName, $phone, $email, $password);
        header("Location: .");
    }
}

?>