<?php
require('../model/database.php');
require('../model/technician_table_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_technician';
    }
}

//display the list of technicans
if ($action == 'list_technician') {
    $technicians = get_technicians();
    include('../view/tech_manager/technician_list.php');
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
    include('../view/tech_manager/add_technician_form.php');
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

