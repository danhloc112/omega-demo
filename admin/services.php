<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require '../help.php'; 

// require("../admin/services/_shopify.php");
// function getProduct() {
if(!empty($_GET['shop'])) { 
    $action = $_GET['action'];
    $shop = $_GET['shop'];
    $shopify = shopifyInit($db, $shop, $appId);
    if($action === 'count') {
        $product = getCountAllProduct($shopify);
        echo json_encode($product);
    };
    if($action === 'getProduct') {
        $limit = $_GET['limit'];
        $params = $_GET['params'];
        $since_id =  $_GET['since_id'];
        $product = getProductInPage($shopify,$since_id,$limit,$params);
        // var_dump($product);
        echo json_encode($product);
        // return $product;
    };
    
    
}
// }
?>