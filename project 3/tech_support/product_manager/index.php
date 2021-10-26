<!--establish connection with data base-->

<?php
require('../model/database.php');
require('../model/product_table_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_products';
    }
}


if ($action == 'list_products') {
    $products = get_products();
    include('../view/product_manager/product_list.php');
} 
else if ($action == 'delete_product'){
    $product_code = filter_input(INPUT_POST, 'product_code');
    if($product_code == null || $product_code == false) {
        $error = "missing or incorrect product id";
        include('../errors/error.php');
    } else {
        delete_product($product_code);
        header("Location: .");
    }
} 
else if($action == 'show_add_form'){
    include('../view/product_manager/add_form_products.php');
}
else if ($action == 'add_product'){
    $product_code = filter_input(INPUT_POST, 'product_code');
    $name = filter_input(INPUT_POST, 'name');
    $version = filter_input(INPUT_POST, 'version');
    $releaseDate = filter_input(INPUT_POST, 'releaseDate');
    if ($product_code == NULL || $product_code == FALSE || $name == NULL || $version == NULL || $releaseDate == NULL || $releaseDate == FALSE) {
        $error = "Invalid product data. Try again.";
        include('../errors/error.phpS');
    } else {
        add_product($product_code, $name, $version, $releaseDate);
        header("Location: .");
    }
}
?>