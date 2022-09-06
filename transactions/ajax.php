<?php 
include '../function.php';

if(isset($_POST['keyword'])){

    $count_query_keyword = querysatudata("SELECT count(products.id) as id FROM products LEFT JOIN productprices ON products.id = productprices.product_id  WHERE productprices.type = 'default' AND (  products.name_product  LIKE '%".$_POST['keyword']."%' OR products.barcode LIKE '%".$_POST['keyword']."%') ");
    
    if($count_query_keyword['id'] > 0 ){

    // $query_keyword = querysatudata("SELECT products.id as product_id, productprices.id as price_id FROM products JOIN productprices ON products.id = productprices.product_id WHERE products.name_product  LIKE '%".$_POST['keyword']."%' OR products.barcode LIKE '%".$_POST['keyword']."%'  ");
    $query_keyword = querysatudata("SELECT products.id as product_id, productprices.id as price_id FROM products LEFT JOIN productprices ON products.id = productprices.product_id  WHERE productprices.type = 'default' AND (  products.name_product  LIKE '%".$_POST['keyword']."%' OR products.barcode LIKE '%".$_POST['keyword']."%') ");


        $data = [$count_query_keyword['id'], $query_keyword['product_id'], $query_keyword['price_id']];

    }else{
        $data = [0, 0, 0];

    }

    echo json_encode($data);
    // echo json_encode(1);
}