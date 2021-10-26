<?php
function get_customers() {
    global $db;
    $query = 'SELECT * FROM customers ORDER BY firstName';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
    
}

function get_customers_with_lastname($lastname) {
    global $db;
    $query = 'SELECT * FROM customers WHERE lastName =:lastName';
    $statement = $db->prepare($query);
    $statement->bindValue(':lastName', $lastname);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
    
}

function get_customers_with_id($customerID) {
    global $db;
    $query = 'SELECT * FROM customers WHERE customerID =:customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $categories = $statement->fetch();
    $statement->closeCursor();
    return $categories;
    
}


function update_customer($customerID, $firstName, $lastName, $address, $city, $state, $postal_code, $country_code, $phone, $email, $password){
    global $db;
    $query = 'UPDATE customers '
            . 'SET firstName = :firstName, lastName = :lastName, address = :address, city = :city, state = :state, postalCode = :postal_code, countryCode = :country_code, phone = :phone, email = :email, password = :password'
            . ' WHERE customerID = :customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':postal_code', $postal_code);
    $statement->bindValue(':country_code', $country_code);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $execute = $statement->execute();
    echo $execute;
    $statement->closeCursor();
}

?>