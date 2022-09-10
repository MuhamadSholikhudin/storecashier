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

                <input type="text"  class="form-control" name="" id="transaction_id" value="0">
                <input type="text"  class="form-control" name="" id="name_buyer" value="0">

                <select name="" id="type_buyer" class="form-control" >
                  <option value="umum">umum</option>
                  <option value="pelanggan">pelanggan</option>
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
                <table id="table_field_transactions" class="table-responsive">
                  <tr>
                    <th>Nama</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Cek</th>
                    <th>Jumlah</th>
                    <th>Action</th>
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
                      <td ><span  id="total_transactions"> </span> </td>
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