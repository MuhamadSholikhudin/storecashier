<?php
include '../function.php';

if (isset($_POST['product_id'])) {

    $updated_at = date("Y-m-d H:i:s");

    $query = "UPDATE  products SET
    name_product = '" . $_POST['name_product'] . "', 
    abbreviation = '" . $_POST['abbreviation'] . "', 
    barcode = '" . $_POST['barcode'] . "', 
    updated_at= '" . $updated_at . "'
    WHERE id = ".$_POST['product_id']."
    ";

    mysqli_query($koneksi, $query);
    echo json_encode($query);
}
elseif(isset($_POST['price_id'])){

    $query = "DELETE FROM productprices WHERE id = ".$_POST['price_id']."";
    mysqli_query($koneksi, $query);
    echo json_encode($query);
        
}elseif (isset($_POST['name_product']) && isset($_POST['barcode']) && isset($_POST['abbreviation'])) {

    $created_at = date("Y-m-d H:i:s");

    $updated_at = $created_at;

    $query = "INSERT INTO products (name_product, abbreviation, barcode, created_at, updated_at) VALUES 
    (
        '" . $_POST['name_product'] . "', '" . $_POST['abbreviation'] . "', '" . $_POST['barcode'] . "', '" . $created_at . "', '" . $updated_at . "'
    )";

    mysqli_query($koneksi, $query);

    echo json_encode($query);
} 
