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
$discount_percent = 0;

// Insert the data
$existing_product = get_product_by_name($name); 

if ($existing_product) {
    $insert_message = "Cannot insert '$name'. It already exists.";
} else {
    
    $product_id = add_product($category_id, $code, $name, $description, $price, $discount_percent);
    if ($product_id) {
        $insert_message = "'$name' has been added successfully with ID: $product_id.";
    } else {
        $insert_message = "Cannot insert '$name'.";
    }
}


include 'home.php';
?>