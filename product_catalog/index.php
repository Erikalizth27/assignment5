<?php
require('../model/database.php');
require('../model/product_db.php');
require('../model/category_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}  
if ($action == 'list_products') {
        $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $products = get_products_by_category($category_id);
    
    include('product_list.php');

}else if ($action == 'show_add_form') {
    $categories = get_categories();
    include('category_add.php'); 


}else if ($action == 'add_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    
    $category_name = filter_input(INPUT_POST, 'category_name');
    
    if ( $category_name == NULL) {
        $error = "Invalid category data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_categories($category_id, $category_name);
        header("Location: .?category_id=$category_id");
    }


} else if ($action == 'view_product') {
    $product_id = filter_input(INPUT_GET, 'product_id', 
            FILTER_VALIDATE_INT);   
    if ($product_id == NULL || $product_id == FALSE) {
        $error = 'Missing or incorrect product id.';
        include('../errors/error.php');
    } else {
        $categories = get_categories();
        $product = get_product($product_id);
        // Get product data
        $code = $product['productCode'];
        $name = $product['productName'];
        $list_price = $product['listPrice'];
        // Calculate discounts
        $discount_percent = 30;  // 30% off for all web orders
        $discount_amount = round($list_price * ($discount_percent/100.0), 2);
        $unit_price = $list_price - $discount_amount;
        // Format the calculations
        $discount_amount_f = number_format($discount_amount, 2);
        $unit_price_f = number_format($unit_price, 2);
        // Get image URL and alternate text
        $image_filename = '../images/' . $code . '.png';
        $image_alt = 'Image: ' . $code . '.png';
        include('product_view.php');
    }
}else if ($action == 'delete_category') {
    
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
    } else { 
        delete_categories($category_id);
        header("Location: .?category_id=$category_id");
    }
}
?>