 <?php
include '../function.php';

if (isset($_POST['product_id'])) {

    $updated_at = date("Y-m-d H:i:s");

    $query = "UPDATE  products SET
          name_product = '" . $_POST['name_product'] . "', 
          abbreviation = '" . $_POST['abbreviation'] . "', 
          barcode = '" . $_POST['barcode'] . "', 
          price = " . $_POST['price'] . ", 
          contain = '" . $_POST['contain'] . "', 
          updated_at= '" . $updated_at . "'
          WHERE id = ".$_POST['product_id']."
        ";

    mysqli_query($koneksi, $query);
    echo json_encode($query);
}
// Search product
elseif(isset($_POST['search_product'])){

    $count_product = querysatudata(" SELECT COUNT(id) as count FROM products WHERE name_product LIKE '%".$_POST['search_product']."%' OR barcode LIKE '%".$_POST['search_product']."%' "); 
    
    $product_loop = '';
    
    if($count_product['count'] > 0){

        $products = querybanyak("SELECT * FROM products WHERE name_product LIKE '%".$_POST['search_product']."%' OR barcode LIKE '%".$_POST['search_product']."%'  "); 

        foreach($products as $product){
        $product_loop .= '
        <tr>
          <td>'.$product['name_product'] .'</td>
          <td>'.$product['price'].'</td>
          <td>'.$product['contain'].'</td>
          <td>'.$product['abbreviation'].'</td>
          <td>'.$product['barcode'].'</td>
          <td>
            <a href="'.Base_url('index.php?page=products_edit&product_id=') . $product['id'] .'" class="btn btn-sm btn-success" >
              <i class="mdi mdi-grease-pencil"></i>
            </a>
          </td>
        </tr>';
        }

    }else{
          $product_loop = '<tr>
              <td> </td>
              <td> </td>
              <td> Tidak ada </td>
              <td> </td>
              <td> </td>
              <td> </td>
            </tr>';
    }

    echo json_encode($product_loop);
}


elseif(isset($_POST['price_id'])){

    $query = "DELETE FROM productprices WHERE id = ".$_POST['price_id']."";
    mysqli_query($koneksi, $query);
    echo json_encode($query);
        
}elseif (isset($_POST['name_product']) && isset($_POST['barcode']) && isset($_POST['abbreviation']) && isset($_POST['price'])) {

    $created_at = date("Y-m-d H:i:s");

    $updated_at = $created_at;

    $query = "INSERT INTO products (name_product, abbreviation, barcode, price, contain, created_at, updated_at) VALUES 
    (
        '" . $_POST['name_product'] . "', '" . $_POST['abbreviation'] . "', '" . $_POST['barcode'] . "', ".$_POST['price']." , '" . $_POST['contain'] . "', '" . $created_at . "', '" . $updated_at . "'
    )";

    mysqli_query($koneksi, $query);

    echo json_encode($query);
} 
