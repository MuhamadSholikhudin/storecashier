  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Produk form</h4>
              <p class="card-description">
                Isi Data Transaksi Dengan Benar
              </p>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" id="searchproducttransactions" placeholder="Cari Produk" aria-label="Recipient's username">
                  <div class="input-group-append">
                    <button class="btn btn-sm btn-primary" onclick="myFunction()" type="button">Search</button>
                  </div>
                </div>
              </div>

              <table >
                <tr>
                  <td><input type="number" class="form-control" name="price_id" id="searchprice_id"></td>
                  <td><input type="number" class="form-control" name="qty" min="1" id="search"></td>
                  <td><input type="number" class="form-control" name="price_default" id="searchprice_default"></td>
                  <td><input type="number" class="form-control d-none" name="transaction_id" id="searchtransaction_id">
                      <input type="button" name="addtransactions" id="addtransactions" value="+">
                  </td>
                </tr>
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
                <table id="table_field">
                  <tr>
                    <th>Nama</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                  <tr>
                    <td><input type="text" name="awal[]" class="form-control awal" min="1" value="1" required=""></td>
                    <td><input type="number" name="akhir[]" class="form-control akhir" min="1" value="1" required=""></td>
                    <td><input type="number" name="umum[]" class="form-control umum" min="1" value="1" required=""></td>
                    <td>
                      <input type="number" name="pelanggan[]" class="form-control pelanggan" min="1" value="1" required="">
                      <input type="text" name="type[]" class="form-control type d-none" value="default" required="">
                    </td>
                    <td><input type="button" id="add" name="add" value="X"></td>
                  </tr>


                  <tfoot>
                    <tr>
                      <td>
                      </td>
                      <td>
                      </td>

                      <td>
                        Total
                      </td>
                      <td> Rp 1000,00</td>
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