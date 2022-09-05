  <?php 
  if(isset($_GET['product_id'])){
    $product = querysatudata("SELECT * FROM products WHERE id = ".$_GET['product_id']."");
  }

?>
  
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Produk Form Edit</h4>
              <p class="card-description">
                Isi Data Produk Dengan Benar
              </p>
                <div class="form-group">
                  <label for="name_product">Nama Produk</label>
                  <input type="text" class="form-control" id="name_product" name="name_product" value="<?= $product['name_product'] ?>" placeholder="Nama Produk" required>
                </div>
                <div class="form-group">
                  <label for="abbreviation">Nama Singkat </label>
                  <input type="text" class="form-control" name="abbreviation" id="abbreviation" value="<?= $product['abbreviation'] ?>" placeholder="Nama Singkat" required>
                </div>
                <div class="form-group">
                  <label for="barcode">Barcode </label>
                  <input type="text" class="form-control" name="barcode" id="barcode" value="<?= $product['barcode'] ?>" placeholder="Barcode" required>
                </div>

            </div>
          </div>
        </div>



        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Harga Produk form</h4>
              <p class="card-description">

              <form name="myAddProduct" class="forms-sample" action="<?= Base_url(
                  'product/action.php'
              ) ?>" method="POST" enctype="multipart/form-data">
              <table  id="table_field">
                <tr>
                  <th>Awal</th>
                  <th>Akhir</th>
                  <th>Umum</th>
                  <th>Pelanggan</th>
                  <th>Action</th>
                </tr>
                <?php  
                  $prices = querybanyak("SELECT * FROM productprices WHERE product_id = ".$_GET['product_id']."");
                  foreach($prices as $price){
                ?>
                <tr>
                  <td>
                    <input type="number" name="product_id[]" class="form-control product_id d-none" min="1" value="<?= $price['product_id'] ?>" required="">
                    <input type="number" name="awal[]" class="form-control awal" min="1" value="<?= $price['awal'] ?>" required="">
                  </td>
                  <td><input type="number" name="akhir[]" class="form-control akhir" min="1" value="<?= $price['akhir'] ?>" required=""></td>
                  <td><input type="number" name="umum[]" class="form-control umum" min="1" value="<?= $price['umum'] ?>" required=""></td>
                  <td><input type="number" name="pelanggan[]" class="form-control pelanggan" min="1" value="<?= $price['pelanggan'] ?>" required=""></td>
                  <td>
                    <?php if($price['type'] == 'default'){ ?>
                      <input type="button" id="addedit" name="addedit" value="+" class="btn btn-success">
                    <?php }else{ ?>
                      <input type="button" id="removeedit" name="removeedit" value="-" class="btn btn-danger">
                    <?php }?>
                  </td>
                </tr>
                <?php
                  }
                ?>
              </table>
              <input class="btn btn-warning d-none" type="submit" name="save" id="save" value="Save Data">

              </form>

              <center>
                <button id="saveproduct" class="btn btn-light">Save</button>
              </center>

              <div id="container">

              </div>
              
            </div>
          </div>
        </div>



      </div>
    </div>