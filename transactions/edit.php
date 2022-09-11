  <!-- partial -->
  <?php
  if (isset($_GET['transaction_id'])) {
    $transaction = querysatudata("SELECT * FROM transactions WHERE id=" . $_GET['transaction_id'] . "    ");
  }
  ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Produk edit form</h4>
              <p class="card-description">
                Isi Data Transaksi Dengan Benar

                <input type="text" class="form-control" name="" id="transaction_id" value="<?= $transaction['id'] ?>">
                <input type="text" class="form-control" name="" id="name_buyer" value="<?= $transaction['name_buyer'] ?>">

                <?php
                $type_buyers = ['umum', 'pelanggan'];

                ?>
                <select name="" id="type_buyer" class="form-control">
                  <?php foreach ($type_buyers as $type_buyer) { ?>
                    <?php if ($type_buyer == $transaction['type_buyer']) { ?>
                      <option value="<?= $type_buyer ?>" selected><?= $type_buyer ?></option>
                    <?php } else { ?>
                      <option value="<?= $type_buyer ?>"><?= $type_buyer ?></option>
                    <?php  } ?>
                  <?php } ?>
                </select>
              </p>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" id="searchproducttransactions" placeholder="Cari Produk" aria-label="Recipient's username">
                  <div class="input-group-append">
                    <button class="btn btn-sm btn-primary" onclick="myFunction()" type="button">Search</button>
                  </div>
                </div>
              </div>

              <table id="tablesearch">
                <!-- <tr>
                  <td><input type="number" class="form-control" name="price_id" id="searchprice_id"></td>
                  <td><input type="number" class="form-control" name="qty" min="1" id="search"></td>
                  <td><input type="number" class="form-control" name="price_default" id="searchprice_default"></td>
                  <td><input type="number" class="form-control d-none" name="transaction_id" id="searchtransaction_id">
                      <input type="button" name="addtransactions" id="addtransactions" value="+">
                  </td>
                </tr> -->
              </table>

            </div>
          </div>
        </div>



        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">List Belanja</h4>
              <p class="card-description">
              <form name="myAddProduct" class="forms-sample" action="<?= Base_url("product/action.php") ?>" method="POST" enctype="multipart/form-data">
                <table id="table_field_transactions" >
                  <tr>
                    <th>Nama</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Cek</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                  <?php 
                  $carts = querybanyak("SELECT * FROM carts WHERE transaction_id = ".$_GET['transaction_id']."  ");

                  foreach($carts as $cart){ 
                    $productprice = querysatudata("SELECT * FROM productprices LEFT JOIN products ON productprices.product_id = products.id WHERE productprices.id = ".$cart['productprice_id']." ");
                  ?>
                      <tr>
                        <td><?= $productprice['name_product'] ?></td>
                        <td><input type="number" class="form-control qty" id="qty" data-cart_id="<?= $cart['id'] ?>" data-price_id="<?= $cart['productprice_id'] ?>" data-transaction_id="<?= $_GET['transaction_id'] ?>" min="1" min="1" value="<?= $cart['qty'] ?>" required=""></td>
                        <td><input type="number" name="price" id="cart_price_transaction" class="form-control cart_price<?= $cart['id'] ?>" min="1" value="<?= $cart['price'] ?>" required=""></td>
                        <td class="text-center"><input type="checkbox" name="check[]"  class="form-check-input" required=""> </td>
                        <td><input type="number" id="cart_sum_price_transaction" class="form-control cart_sum_price<?= $cart['id'] ?>" data-id="<?= $cart['id'] ?>" min="1" value="<?= $cart['sum_price'] ?>" required=""></td>
                        <td ><input type="button" id="removeedittransaction" data-id="<?= $cart['id'] ?>" name="remove" value="-" class="btn btn-danger"></td>
                      </tr>

                  <?php
                  }
                  ?>
                  <tfoot>
                    <tr>
                      <td>
                      </td>
                      <td>
                      </td>
                      <td>
                        Total
                      </td>
                      <td><span id="total_transactions"><?= $transaction['total'] ?> </span> </td>
                      <td>
                      </td>
                    </tr>

                  </tfoot>

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