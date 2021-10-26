<?php
function get_products() {
    global $db;
    $query = 'SELECT * FROM products ORDER BY releaseDate';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
    
}

function delete_product($productCode) {
    global $db;
    $query = 'DELETE FROM products WHERE productCode =:productCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':productCode', $productCode);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($product_code, $name, $version, $releaseDate) {
    global $db;
    $query = 'INSERT INTO products(productCode, name, version, releaseDate)VALUES(:product_code, :name, :version, :releaseDate)';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_code', $product_code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':releaseDate', $releaseDate);
    $statement->execute();
    $statement->closeCursor();
}

?>
