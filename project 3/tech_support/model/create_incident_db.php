<?php
function get_customer($email) {
    global $db;
    $query = 'SELECT * FROM customers WHERE email =:email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
    
}

function registered_product($customerID) {
    global $db;
    $query = 'SELECT productCode FROM registrations WHERE customerID =:customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $registered_products = $statement->fetchAll();
    $statement->closeCursor();
    return $registered_products;
    
    
}

function  create_incident($productCode, $customerID, $title, $description) {
    try {
// statements that might throw an exception
        global $db;

    $datetime = date('Y-m-d');
    $query = 'INSERT INTO incidents( customerID, productCode, dateOpened, title, description) VALUES(:customerID, :productCode, :dateOpened, :title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':dateOpened', $datetime);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
    } 
    catch (PDOException $e) {$error_message = $e->getMessage();echo "<p>An error occurred while connecting tothe database: $error_message </p>";}
}
?>