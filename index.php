<?php
require('util/main.php');

require('model/database.php');
require('model/product_db.php');

/*********************************************
 * Select some products
 **********************************************/

// Sample data
$cat_id = 1;

// Get the products
$products = get_products_by_category($cat_id);

/***************************************
 * Delete a product
 ****************************************/

// Sample data
$product_name = 'Fender Telecaster';

// Delete the product and display an appropriate messge
$product_to_delete = get_product_by_name($product_name);
if ($product_to_delete) {
    $product_id = $product_to_delete['productID'];
    $row_count = delete_product($product_id);
    if ($row_count > 0) {
        $delete_message = "Deleted '$product_name' .";
    } else {
        $delete_message = "Cannot delete '$product_name'.";
    }
} else {
    $delete_message = "Cannot find '$product_name' to delete.";
}

/***************************************
 * Insert a product
 ****************************************/

// Sample data
$category_id = 1;
$code = 'tele';
$name = 'Fender Telecaster';
$description = 'NA';
$price = '949.99';

// Insert the data

// Display an appropriate message
$insert_message = "No rows were inserted.";

include 'home.php';
?>