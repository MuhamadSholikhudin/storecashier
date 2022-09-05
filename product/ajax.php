<?php
include '../function.php';

if(isset($_POST['name_product']) AND isset($_POST['barcode']) AND isset($_POST['abbreviation'])){

    $created_at = date("Y-m-d H:i:s");

    $updated_at = $created_at;

    $query = "INSERT INTO products (name_product, abbreviation, barcode, created_at, updated_at) VALUES 
    (
        '".$_POST['name_product']."', '".$_POST['abbreviation']."', '".$_POST['barcode']."', '".$created_at."', '".$updated_at."'
    )";

    mysqli_query($koneksi, $query);

   echo json_encode($query);
}
