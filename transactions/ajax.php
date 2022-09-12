<?php
include '../function.php';

if (isset($_POST['keyword'])) {

    if($_POST['keyword'] == ""){
            $product_loop = '<tr>
            <td>Tidak Ditemukan</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>';

        $data = [$product_loop];
    }else{
        $count_query_keyword = querysatudata("SELECT count(products.id) as id FROM products LEFT JOIN productprices ON products.id = productprices.product_id  WHERE productprices.type = 'default' AND (  products.name_product  LIKE '%" . $_POST['keyword'] . "%' OR products.barcode LIKE '%" . $_POST['keyword'] . "%') ");
        if ($count_query_keyword['id'] > 0) {
            $query_keyword = querybanyak("SELECT products.id as product_id, products.name_product, productprices.id as price_id, productprices.umum FROM products LEFT JOIN productprices ON products.id = productprices.product_id  WHERE productprices.type = 'default' AND (  products.name_product  LIKE '%" . $_POST['keyword'] . "%' OR products.barcode LIKE '%" . $_POST['keyword'] . "%') LIMIT 5 ");
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
                    <td>' . $product['name_product'] . '</td>
                    <td><input type="number"  name="qty" min="1" value="1" id="qty" style="width: 40px;"></td>
                    <td><input type="number" " name="price_default" id="searchprice_default" style="width:75px;" value="' . $product['umum'] . '"></td>
                    <td><input type="number"  class="d-none" name="transaction_id" id="searchtransaction_id" value="' . $product['price_id'] . '">
                        <input type="button" name="addtransactions" id="addtransactions" data-name="' . $product['name_product'] . '" data-id="' . $product['price_id'] . '" value="+" onclick="at">
                    </td>
                </tr>
                    ';
            }
            $data = [$product_loop];
        } else {
            $product_loop = '<tr>
                <td>Tidak Ditemukan</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>';
            $data = [$product_loop];
        }
    }
    echo json_encode($data);
} 

//mengubah harga berdasarkan qty
elseif(isset($_POST['qty'])){

    // Menampilkan data cart
    $cart = querysatudata("SELECT * FROM carts WHERE id=".$_POST['cart_id']."   ");

    // Menampilkan data productprice
    $productprice = querysatudata("SELECT * FROM productprices LEFT JOIN products ON products.id = productprices.product_id WHERE productprices.id=".$_POST['price_id']." ");
    
    //mencari price berdasarkan qty
    $count_price = querysatudata("SELECT count(id) as id FROM productprices WHERE product_id=".$productprice['product_id']." AND awal >= ".$_POST['qty']." AND akhir <= ".$_POST['qty']." ");
    if($count_price['id'] > 0 ){
        $price = querysatudata("SELECT * FROM productprices WHERE product_id=".$productprice['product_id']." AND awal >= ".$_POST['qty']." AND akhir <= ".$_POST['qty']."  ");
    }else{
        $price = querysatudata("SELECT * FROM productprices WHERE product_id=".$productprice['product_id']." AND type='default'  ");
    }

    // Menentukan harga product berdasarkan type_
    if($_POST['type_buyer'] == 'pelanggan'){
        $cart_price =  $price['pelanggan'];
        // $cart_price =  0;
        $cart_sum_price =  $cart_price * $_POST['qty'];
    }else{
        $cart_price =  $price['umum'];
        // $cart_price =  0;
        $cart_sum_price =  $cart_price * $_POST['qty'];
    }

    // Update data cart_price and cart_sum_price
    $update_cart = "UPDATE carts SET price = ".$cart_price." , sum_price = ".$cart_sum_price.", qty = ".$_POST['qty']." WHERE id=".$_POST['cart_id']."  ";
    mysqli_query($koneksi, $update_cart);

    // Menampilkan total_sum_price
    $total_cart = querysatudata("SELECT SUM(sum_price) as total_cart FROM carts WHERE transaction_id=".$_POST['transaction_id']."   ");

    //Update data transaction total
    $update_cart = "UPDATE transactions SET total=".$total_cart['total_cart']." WHERE id=".$_POST['transaction_id']."  ";
    mysqli_query($koneksi, $update_cart);

    //output = [ price, sum_price, total  ]
    $data = [$cart_price, $cart_sum_price, $total_cart['total_cart']];

    echo json_encode($data);
}


//Edit jumlah Sum price
elseif(isset($_POST['cart_sum_price_id'])){

    // Update data cart_price and cart_sum_price
    $update_cart = "UPDATE carts SET sum_price = ".$_POST['val']." WHERE id=".$_POST['cart_sum_price_id']."  ";
    mysqli_query($koneksi, $update_cart);

    // Menampilkan total_sum_price
    $total_cart = querysatudata("SELECT SUM(sum_price) as total_cart, transaction_id FROM carts WHERE transaction_id=".$_POST['transaction_id']."   ");

    //Update data transaction total
    $update_cart = "UPDATE transactions SET total=".$total_cart['total_cart']." WHERE id=".$_POST['transaction_id']."  ";
    mysqli_query($koneksi, $update_cart);

    $data = [$total_cart['total_cart']];

    echo json_encode($data);
}

//check
elseif(isset($_POST['check'])){

    if($_POST['check'] == "true"){
        $checked = 1;
    }else{
        $checked = 0;
    }
    $update_check = "UPDATE carts SET checked = ".$checked." WHERE id =".$_POST['cart_id']."  ";
    mysqli_query($koneksi, $update_check);
    echo json_encode($_POST['check']);
}

//val_type_buyer
elseif(isset($_POST['val_type_buyer'])){
    $update_type_buyer = "UPDATE transactions SET type_buyer = '".$_POST['val_type_buyer']."' WHERE id =".$_POST['transaction_id']."  ";
    mysqli_query($koneksi, $update_type_buyer);
    echo json_encode($_POST['val_type_buyer']);
}

//val_name_buyer
elseif(isset($_POST['val_name_buyer'])){
    $update_name_buyer = "UPDATE transactions SET name_buyer = '".$_POST['val_name_buyer']."' WHERE id =".$_POST['transaction_id']."  ";
    mysqli_query($koneksi, $update_name_buyer);
    echo json_encode($_POST['val_name_buyer']);
}


//cash changes total
elseif(isset($_POST['cash'])){

    //changes 
    $changes = 0;
    if($_POST['cash'] == 0 OR $_POST['cash'] == ""){

    }else{
        $changes = ($_POST['cash']) - ($_POST['total']);
    }

    $update_transaction = "UPDATE transactions SET cash = ".$_POST['cash'].", changes=".$changes." WHERE id =".$_POST['transaction_id']."  ";
    mysqli_query($koneksi, $update_transaction);
    echo json_encode([$changes]);
}

//menghapus carts berdasarkan cart_id
elseif(isset($_POST['cart_delete_id'])){

    //menampilkan cart
    $cart = querysatudata("SELECT * FROM carts WHERE id=".$_POST['cart_delete_id']."   ");

    //menampilkan data transaction
    $transaction = querysatudata("SELECT * FROM transactions WHERE id=".$cart['transaction_id']."   ");

    //total transaction now
    $total_now = $transaction['total'] - $cart['sum_price'];

    //Update data transaction total
    $update_transactions = "UPDATE transactions SET total=".$total_now." WHERE id=".$cart['transaction_id']."  ";
    mysqli_query($koneksi, $update_transactions);

    //Delete cart
    $delete_cart = "DELETE FROM `carts` WHERE id=".$_POST['cart_delete_id']."  ";
    mysqli_query($koneksi, $delete_cart);

    //output
    $data = [$total_now];

    echo json_encode($data);

}

//search transaction
elseif(isset($_POST['search_transaction'])){

    $count_transaction = querysatudata(" SELECT COUNT(id) as count FROM transactions WHERE name_buyer LIKE '%".$_POST['search_transaction']."%' OR created_at LIKE '%".$_POST['search_transaction']."%' "); 
    
    $transaction_loop = '';
    
    if($count_transaction['count'] > 0){

        $transactions = querybanyak("SELECT * FROM transactions WHERE name_buyer LIKE '%".$_POST['search_transaction']."%' OR created_at LIKE '%".$_POST['search_transaction']."%'  "); 

        foreach($transactions as $transaction){
        $transaction_loop .= '
        <tr>
          <td>'.$transaction['name_buyer'] .'</td>
          <td>'.$transaction['created_at'].'</td>
          <td>'.$transaction['total'].'</td>
          <td>'.$transaction['cash'].'</td>
          <td>
            <a href="'.Base_url('index.php?page=transactions_edit&transaction_id=') . $transaction['id'] .'" class="btn btn-sm btn-success" >
              <i class="mdi mdi-grease-pencil"></i>
            </a>
          </td>
        </tr>';
        }

    }else{
          $transaction_loop = '<tr>
              <td> </td>
              <td> </td>
              <td> Tidak ada </td>
              <td> </td>
              <td> </td>
            </tr>';
    }
    echo json_encode($transaction_loop);

}

///menambahkan keranjang
elseif (isset($_POST['transaction_id']) and isset($_POST['price_id']) and isset($_POST['type_buyer'])  ) {

    if ($_POST['transaction_id'] == 0) {

        $created_at = date("Y-m-d H:i:s");

        $name_buyer =  strtotime('now');
        

        //menambah data transactions
        $query_insert_transaction = "INSERT INTO `transactions`( `transaction_date`, `name_buyer`, `type_buyer`, `total`, `cash`, `changes`, `created_at`, `updated_at`) VALUES 
            ('" . date('Y-m-d') . "','" . $name_buyer . "','" . $_POST['type_buyer'] . "',0,0,0,'" . $created_at . "','" . $created_at . "')";
        mysqli_query($koneksi, $query_insert_transaction);
        //menambah data transactions


        //Menampilkan data productprice berdasarkan productprice_id 
        $select_transaction = querysatudata("SELECT * FROM transactions WHERE created_at = '" . $created_at . "'  ");

        //menampilkan data productprices
        $select_price = querysatudata("SELECT * FROM productprices WHERE id = ". $_POST['price_id'] ." AND type='default'   ");

        //Menambah data carts berdasartkan transaction created_at
        $query_insert_carts = "INSERT INTO `carts`( `transaction_id`, `productprice_id`, `qty`, `type_buyer`, `price`, `sum_price`, `checked`, `created_at`, `updated_at`) VALUES 
            (" . $select_transaction['id'] . ", " . $_POST['price_id'] . ",1,'" . $_POST['type_buyer'] . "',".$select_price['umum'] .",".$select_price['umum'] .",0,'" . $created_at . "','" . $created_at . "')";
        mysqli_query($koneksi, $query_insert_carts);
        //Menambah data carts berdasartkan transaction created_at

        // Menampilkan data SUM(carts_sum_price) berdasarkan transaction_id
        $select_carts = querysatudata("SELECT * FROM carts WHERE created_at = '".$created_at."'   ");

        // Update data transaction pada kolom total 
        $query_update_transaction = "UPDATE transactions SET total=".$select_carts['price']."  WHERE id=".$select_transaction['id'] ." ";
        mysqli_query($koneksi, $query_update_transaction);
        // Update data transaction pada kolom total 

        $transaction_id = $select_transaction['id'];
        $name_buyer = $_POST['name_buyer'];
        $type_buyer = $_POST['type_buyer'];
        $price_id = $select_price['id'];
        $cart_id = $select_carts['id'];
        $cart_qty = $select_carts['qty'];
        $cart_price = $select_carts['price'];
        $cart_sum_price = $select_carts['sum_price'];

        // $data = [$transaction_id, $name_buyer, $type_buyer, $price_id, $select_carts['id'], $select_carts['qty'], $select_carts['price'], $price];
        // $data = [0, "umam", "pelanggan", 3, 4, 5, 6, 7, 8, $query_insert_transaction];

        $data = [$transaction_id, $name_buyer, $type_buyer, $price_id, $cart_id, $cart_qty, $cart_price, $cart_sum_price, $cart_sum_price];

    } else {

        $created_at = date("Y-m-d H:i:s");

        //Menampilkan data productprice berdasarkan productprice_id 
        $select_transaction = querysatudata("SELECT * FROM transactions WHERE id = " . $_POST['transaction_id'] . "  ");

        //menampilkan data productprices
        $select_price = querysatudata("SELECT * FROM productprices WHERE id = ". $_POST['price_id'] ." AND type='default'   ");

        //Menambah data carts berdasartkan transaction created_at
        $query_insert_carts = "INSERT INTO `carts`( `transaction_id`, `productprice_id`, `qty`, `type_buyer`, `price`, `sum_price`, `checked`, `created_at`, `updated_at`) VALUES 
            (" . $select_transaction['id'] . ", " . $_POST['price_id'] . ",1,'" . $_POST['type_buyer'] . "',".$select_price['umum'] .",".$select_price['umum'] .",0,'" . $created_at . "','" . $created_at . "')";
        mysqli_query($koneksi, $query_insert_carts);
        //Menambah data carts berdasartkan transaction created_at

        // Menampilkan data SUM(carts_sum_price) berdasarkan transaction_id
        $select_carts = querysatudata("SELECT * FROM carts WHERE transaction_id = ".$select_transaction['id'] ." AND created_at='". $created_at ."' ");

        $stotal_carts = querysatudata("SELECT SUM(sum_price) as total FROM carts WHERE transaction_id = ".$select_transaction['id'] ."  ");


        // Update data transaction pada kolom total 
        $query_update_transaction = "UPDATE transactions SET total=".$stotal_carts['total']." WHERE id=".$select_transaction['id'] ."    ";
        mysqli_query($koneksi, $query_update_transaction);
        // Update data transaction pada kolom total 

        $transaction_id = $_POST['transaction_id'];
        $name_buyer = $_POST['name_buyer'];
        $type_buyer = $_POST['type_buyer'];
        $price_id = $select_price['id'];
        $cart_id = $select_carts['id'];
        $cart_qty = $select_carts['qty'];
        $cart_price = $select_carts['price'];
        $cart_sum_price = $select_carts['sum_price'];

        $data = [$transaction_id, $name_buyer, $type_buyer, $price_id, $cart_id, $cart_qty, $cart_price, $cart_sum_price, $stotal_carts['total']];
    }

    // $data = [transaction_id, name_buyer, type_buyer, price_id, carts_id, carts_qty, carts_price, carts_sum_price]
    echo json_encode($data);
}


