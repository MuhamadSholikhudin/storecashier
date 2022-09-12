  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Produk form</h4>
              <p class="card-description">
                Isi Data Produk Dengan Benar
              </p>
                <div class="form-group">
                  <label for="name_product">Nama Produk</label>
                  <input type="text" class="form-control" id="name_product" name="name_product" placeholder="Nama Produk" required>
                </div>
                <div class="form-group">
                  <label for="abbreviation">Nama Singkat </label>
                  <input type="text" class="form-control" name="abbreviation" id="abbreviation" placeholder="Nama Singkat" required>
                </div>
                <div class="form-group">
                  <label for="barcode">Barcode </label>
                  <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode" required>
                </div>
                <div class="form-group">
                  <label for="price">Harga</label>
                  <input type="number" class="form-control" name="price" id="price" min="1" value="1" placeholder="Price" required>
                </div>
                <div class="form-group">
                  <label for="price">Ket</label>
                  <input type="text" class="form-control" name="contain" id="contain" min="1" value="1" placeholder="Ketearang" required>
                </div>

            </div>
          </div>
        </div>



        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Harga Produk form</h4>
             

              <form name="myAddProduct" class="forms-sample" action="<?= Base_url("product/action.php") ?>" method="POST" enctype="multipart/form-data">
              <div class="table-responsive">

              <table class="table table-striped" id="table_field">
                <tr>
                  <th>Awal</th>
                  <th>Akhir</th>
                  <th>Umum</th>
                  <th>Pelanggan</th>
                  <th>Action</th>
                </tr>
                <tr>
                  <td><input type="text" name="awal[]" class=" awal" min="1" style="width: 80px;" value="1" required=""></td>
                  <td><input type="number" name="akhir[]" class=" akhir" min="1" value="1" style="width: 80px;" required=""></td>
                  <td><input type="number" name="umum[]" class=" umum" min="1" value="1" style="width: 100px;" required=""></td>
                  <td>
                    <input type="number" name="pelanggan[]" class=" pelanggan"  min="1" style="width: 100px;" value="1" required="">
                    <input type="text" name="type[]" class=" type d-none" value="default" required="">
                  </td>
                  <td><input type="button" id="add" name="add" value="+" class="btn btn-success"></td>
                </tr>
              </table>
              </div>
              <br>

              <input class="btn btn-warning d-none" type="submit" name="save" id="save" value="Save Data">

              </form>

              <center>
                <button id="saveproduct" class="btn btn-light">Save</button>
              </center>

              <div id="container">

              </div>

              <!-- <button type="submit" value="btnADDPRODUCT" class="btn btn-primary me-2">Submit</button> -->
              
            </div>
          </div>
        </div>



      </div>
    </div>
