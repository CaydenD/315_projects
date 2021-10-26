<?php
function get_technicians() {
    global $db;
    $query = 'SELECT * FROM technicians ORDER BY techID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
    
}

function delete_technician($tech_id) {
    global $db;
    $query = 'DELETE FROM technicians WHERE techID =:tech_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':tech_id', $tech_id);
    $statement->execute();
    $statement->closeCursor();
}
//need to add somehting that tells the db what the priamry key will be for this new user
function add_technician($firstName, $lastName, $phone, $email, $password) {
    global $db;
    $query = 'INSERT INTO technicians(firstName, lastName, phone, email, password) VALUES(:firstName, :lastName, :phone, :email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

?>