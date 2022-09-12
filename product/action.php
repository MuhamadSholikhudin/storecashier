<?php
include '../function.php';
if (isset($_POST)) {

    $search_array = ['first' => 1, 'second' => 4];

    if (array_key_exists('product_id', $_POST)) {
        // echo "Ada Array Product ID";
        $created_at = date('Y-m-d H:i:s');

        $updated_at = $created_at;

        $c_awal = count($_POST['awal']);

        for ($i = 0; $i < $c_awal; $i++) {

            if($_POST['product_id'][$i] == 0){
                 $sql_insert_price = "INSERT INTO productprices (product_id, awal, akhir, umum, pelanggan, type, created_at, updated_at) VALUES
                (
                    ".$_POST['product_id'][0].", ".$_POST['awal'][$i].", ".$_POST['akhir'][$i].", ".$_POST['umum'][$i].", ".$_POST['pelanggan'][$i].", 'extend', '".$created_at."', '".$updated_at."'
                )";

                mysqli_query($koneksi, $sql_insert_price);
 

            }else{
                
                $sql_update_price = "UPDATE productprices SET 
                 
                    product_id = ".$_POST['product_id'][$i].", 
                    awal=".$_POST['awal'][$i].", 
                    akhir=".$_POST['akhir'][$i].",
                    umum = ".$_POST['umum'][$i].", 
                    pelanggan=".$_POST['pelanggan'][$i].", 
                    updated_at='".$updated_at."'

                    WHERE id = ".$_POST['price_id'][$i]."
                ";

                mysqli_query($koneksi, $sql_update_price);


            }


            //    $execute = mysqli_query($koneksi, $sql_insert_product);
        }

        header('Location: ' . Base_url('index.php?page=products') . '');
    }     
    else {
        
    // INSERT
        $created_at = date("Y-m-d H:i:s");

        $updated_at = $created_at;

        $sql_select_product = "SELECT * FROM products ORDER BY id DESC LIMIT 1";

        $product = querysatudata($sql_select_product);

        $c_awal = count($_POST['awal']);

        for($i = 0 ; $i < $c_awal; $i++){

            $sql_insert_product = "INSERT INTO productprices (product_id, awal, akhir, umum, pelanggan, type, created_at, updated_at) VALUES
            (
                ".$product['id'].", ".$_POST['awal'][$i].", ".$_POST['akhir'][$i].", ".$_POST['umum'][$i].", ".$_POST['pelanggan'][$i].", '".$_POST['type'][$i]."', '".$created_at."', '".$updated_at."'
            )";

        $execute = mysqli_query($koneksi, $sql_insert_product);
        }
    
        header("Location: ".Base_url('index.php?page=products')."");


    }
}

/*
storecashiers
root
5nB]v{#MKH=_pZS[



# HTID:20375020: DO NOT REMOVE OR MODIFY THIS LINE AND THE LINES BELOW
php_value display_errors 1
# DO NOT REMOVE OR MODIFY THIS LINE AND THE LINES ABOVE HTID:20375020:
*/