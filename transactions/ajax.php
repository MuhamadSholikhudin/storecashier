<?php
include '../function.php';

if (isset($_POST['keyword'])) {

    $count_query_keyword = querysatudata("SELECT count(products.id) as id FROM products LEFT JOIN productprices ON products.id = productprices.product_id  WHERE productprices.type = 'default' AND (  products.name_product  LIKE '%" . $_POST['keyword'] . "%' OR products.barcode LIKE '%" . $_POST['keyword'] . "%') ");

    if ($count_query_keyword['id'] > 0) {

        // $query_keyword = querysatudata("SELECT products.id as product_id, productprices.id as price_id FROM products JOIN productprices ON products.id = productprices.product_id WHERE products.name_product  LIKE '%".$_POST['keyword']."%' OR products.barcode LIKE '%".$_POST['keyword']."%'  ");
        $query_keyword = querybanyak("SELECT products.id as product_id, products.name_product, productprices.id as price_id, productprices.umum FROM products LEFT JOIN productprices ON products.id = productprices.product_id  WHERE productprices.type = 'default' AND (  products.name_product  LIKE '%" . $_POST['keyword'] . "%' OR products.barcode LIKE '%" . $_POST['keyword'] . "%') ");



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
            <td>' . $product['name_product'] . '<input type="text" class="form-control d-none" name="price_id" id="searchprice_id" value=""></td>
            <td><input type="number" class="form-control" name="qty" min="1" value="1" id="qty"></td>
            <td><input type="number" class="form-control" name="price_default" id="searchprice_default" value="' . $product['umum'] . '"></td>
            <td><input type="number" class="form-control d-none" name="transaction_id" id="searchtransaction_id" value="' . $product['price_id'] . '">
                <input type="button" name="addtransactions" id="addtransactions" data-name="' . $product['name_product'] . '" data-id="' . $product['price_id'] . '" value="+" onclick="at">
            </td>
          </tr>
            ';
        }

        // $data = [$count_query_keyword['id'], $product_loop, $query_keyword['price_id']];

        // $data = [$count_query_keyword['id'], 0, 0];
        $data = [$product_loop];
    } else {
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
} elseif (isset($_POST['transaction_id']) and isset($_POST['price_id']) and isset($_POST['type_buyer'])  ) {

    if ($_POST['transaction_id'] == 0) {

        $created_at = date("Y-m-d H:i:s");

        $name_buyer =  strtotime('now');
        

        $query_insert_transaction = "INSERT INTO `transactions`( `transaction_date`, `name_buyer`, `type_buyer`, `total`, `cash`, `change`, `created_at`, `updated_at`) VALUES 
            ('" . date('Y-m-d') . "','" . $name_buyer . "','" . $_POST['type_buyer'] . "',0,0,0,'" . $created_at . "','" . $created_at . "')";
       /*
        mysqli_query($koneksi, $query_insert_transaction);

        $select_transaction = querysatudata("SELECT * FROM transactions WHERE created_at = '" . $created_at . "'");

        //cari product prices
        $select_price = querysatudata("SELECT * FROM productprices WHERE id = ". $_POST['price_id'] ." AND type='default'   ");

        if($_POST['type_buyer'] == "pelanggan"){
            $price = $select_price['pelanggan'];
        }else{
            $price = $select_price['umum'];
        }

        $query_insert_carts = "INSERT INTO `carts`( `transaction_id`, `productprice_id`, `qty`, `type_buyer`, `price`, `sum_price`, `checked`, `created_at`, `updated_at`) VALUES 
            (" . $select_transaction['id'] . ", " . $_POST['price_id'] . ",1,'" . $_POST['type_buyer'] . "',".$price .",".$price .",0,'" . $created_at . "','" . $created_at . "')";

        mysqli_query($koneksi, $query_insert_carts);

        $select_carts = querysatudata("SELECT * FROM carts WHERE created_at = '".$created_at."'   ");


        $query_update_transaction = "UPDATE transactions SET total=".$price." ";

        mysqli_query($koneksi, $query_update_transaction);

        $transaction_id = $_POST['transaction_id'];
        $type_buyer = $_POST['type_buyer'];

        $price_id = $_POST['price_id'];

        */
        
        // $data = [$transaction_id, $name_buyer, $type_buyer, $price_id, $select_carts['id'], $select_carts['qty'], $select_carts['price'], $price];
        $data = [0, "umam", "pelanggan", 3, 4, 5, 6, 7, 8, $query_insert_transaction];

    } else {

        $transaction_id = $_POST['transaction_id'];

        $query_update = "UPDATE `transactions` SET `id`='[value-1]',`transaction_date`='[value-2]',`name_buyer`='[value-3]',`type_buyer`='[value-4]',`total`='[value-5]',`cash`='[value-6]',`change`='[value-7]',`created_at`='[value-8]',`updated_at`='[value-9]' WHERE 1";

        $data =  $query_update;
    }

    // $data = [transaction_id, name_buyer, type_buyer, price_id, carts_id, carts_qty, carts_price, carts_sum_price]
    echo json_encode($data);
}
