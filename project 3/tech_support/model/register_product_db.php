<?php
function login($email) {
    global $db;
    $query = 'SELECT * FROM customers WHERE email =:email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
    
}

function get_products() {
    global $db;
    $query = 'SELECT productCode FROM products ORDER BY releaseDate';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
    
}

function register_product($prodcutCode, $customerID) {
    global $db;
    $datetime = date('Y-m-d');
    $query = 'INSERT INTO registrations(customerID, productCode, registrationDate) VALUES(:customerID, :productCode, :registrationDate)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->bindValue(':productCode', $prodcutCode);
    $statement->bindValue(':registrationDate', $datetime);
    $statement->execute();
    $statement->closeCursor();
    
}

?>