<?php
include '../function.php';
if(isset($_POST)){

    print("<pre>".print_r($_POST,true)."</pre>");

    $search_array = array('first' => 1, 'second' => 4);

if (array_key_exists('product_id', $_POST)) {
    // echo "Ada Array Product ID";
    $created_at = date("Y-m-d H:i:s");

    $updated_at = $created_at;

    $c_awal = count($_POST['awal']);

    for($i = 0 ; $i < $c_awal; $i++){

        $sql_update_product = "INSERT INTO productprices (product_id, awal, akhir, umum, pelanggan, created_at, updated_at) VALUES
        (
            ".$product['id'].", ".$_POST['awal'][$i].", ".$_POST['akhir'][$i].", ".$_POST['umum'][$i].", ".$_POST['pelanggan'][$i].", '".$created_at."', '".$updated_at."'
        )";

       $execute = mysqli_query($koneksi, $sql_insert_product);
    }
    
    header("Location: ".Base_url('index.php?page=product')."");

}else{
    /*
// INSERT
    $created_at = date("Y-m-d H:i:s");

    $updated_at = $created_at;

    $sql_select_product = "SELECT * FROM products ORDER BY id DESC LIMIT 1";

    $product = querysatudata($sql_select_product);

    $c_awal = count($_POST['awal']);

    for($i = 0 ; $i < $c_awal; $i++){

        $sql_insert_product = "INSERT INTO productprices (product_id, awal, akhir, umum, pelanggan, created_at, updated_at) VALUES
        (
            ".$product['id'].", ".$_POST['awal'][$i].", ".$_POST['akhir'][$i].", ".$_POST['umum'][$i].", ".$_POST['pelanggan'][$i].", '".$created_at."', '".$updated_at."'
        )";

       $execute = mysqli_query($koneksi, $sql_insert_product);
    }
    
    header("Location: ".Base_url('index.php?page=product')."");

*/

}


}
