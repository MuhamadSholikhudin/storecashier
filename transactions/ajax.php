<?php 
include '../function.php';

if(isset($_POST['keyword'])){

    $count_query_keyword = querysatudata("SELECT count(products.id) as id FROM products LEFT JOIN productprices ON products.id = productprices.product_id  WHERE productprices.type = 'default' AND (  products.name_product  LIKE '%".$_POST['keyword']."%' OR products.barcode LIKE '%".$_POST['keyword']."%') ");
    
    if($count_query_keyword['id'] > 0 ){

    // $query_keyword = querysatudata("SELECT products.id as product_id, productprices.id as price_id FROM products JOIN productprices ON products.id = productprices.product_id WHERE products.name_product  LIKE '%".$_POST['keyword']."%' OR products.barcode LIKE '%".$_POST['keyword']."%'  ");
    $query_keyword = querybanyak("SELECT products.id as product_id, products.name_product, productprices.id as price_id, productprices.umum FROM products LEFT JOIN productprices ON products.id = productprices.product_id  WHERE productprices.type = 'default' AND (  products.name_product  LIKE '%".$_POST['keyword']."%' OR products.barcode LIKE '%".$_POST['keyword']."%') ");



        $product_loop = '';
        $product_loop .= '
        <tr>
        <td>Nama</td>
        <td>Qty</td>
        <td>Harga</td>
        <td>Action
        </td>
      </tr>
        ';

        foreach ($query_keyword as $product) {


            $product_loop .= '
            <tr>
            <td>'.$product['name_product'].'<input type="text" class="form-control d-none" name="price_id" id="searchprice_id" value=""></td>
            <td><input type="number" class="form-control" name="qty" min="1" value="1" id="qty"></td>
            <td><input type="number" class="form-control" name="price_default" id="searchprice_default" value="'.$product['umum'].'"></td>
            <td><input type="number" class="form-control d-none" name="transaction_id" id="searchtransaction_id" value="'.$product['price_id'].'">
                <input type="button" name="addtransactions" id="addtransactions" data-name="'.$product['name_product'].'" data-id="'.$product['price_id'].'" value="+" onclick="at">
            </td>
          </tr>
            ';
        }

        // $data = [$count_query_keyword['id'], $product_loop, $query_keyword['price_id']];

        // $data = [$count_query_keyword['id'], 0, 0];
        $data = [$product_loop];


    }else{
        // $data = [$count_query_keyword['id'], 0, 0];

        $product_loop = '<tr>
        <td>Tidak Adak</td>
        <td></td>
        <td></td>
        <td></td>
        </tr>';

        $data = [$product_loop];

    }

    echo json_encode($data);
    // echo json_encode(1);
}