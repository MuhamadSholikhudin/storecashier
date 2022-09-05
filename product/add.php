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

            </div>
          </div>
        </div>



        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Harga Produk form</h4>
              <p class="card-description">
              <!-- <form action="<?= Base_url('product/add.php') ?>" method="post">

                <input type="number" id="member" name="countextend" value="0" placeholder="Tambahkan harga Produk">
                <button type="submit" name="forinput" class="btn btn-sm btn-primary" id="filldetails" >+</button>
                <input type="number" id="stateless" name="memberx"  value="0" />

              </form>


              </p>
              <div>
                <input type="text" class="sdf" style="width:70px;" value="awal" disabled>
                <input type="text" class="sdf" style="width:70px;" value="akhir" disabled>
                <input type="text" class="sdf" style="width:100px;" value="umum" disabled>
                <input type="text" class="sdf" style="width:100px;" value="pelanggan" disabled>

              </div>

              <div>
                <input type="number" name="awal[]" style="width:70px;" required>
                <input type="number" name="akhir[]" style="width:70px;" required>
                <input type="number" name="umum[]" style="width:100px;" required>
                <input type="number" name="pelanggan[]" style="width:100px;" required>
                
                <span id="kjh">Default</span>
              </div>

              <br> -->

              <form name="myAddProduct" class="forms-sample" action="<?= Base_url("product/action.php") ?>" method="POST" enctype="multipart/form-data">
              <table  id="table_field">
                <tr>
                  <th>Awal</th>
                  <th>Akhir</th>
                  <th>Umum</th>
                  <th>Pelanggan</th>
                  <th>Action</th>
                </tr>
                <tr>
                  <td><input type="text" name="awal[]" class="form-control awal" min="1" value="1" required=""></td>
                  <td><input type="number" name="akhir[]" class="form-control akhir" min="1" value="1" required=""></td>
                  <td><input type="number" name="umum[]" class="form-control umum" min="1" value="1" required=""></td>
                  <td><input type="number" name="pelanggan[]" class="form-control pelanggan" min="1" value="1" required=""></td>
                  <td><input type="button" id="add" name="add" value="+" class="btn btn-success"></td>
                </tr>
              </table>
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