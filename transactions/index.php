  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Transaksi
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;

              <a href="<?= Base_url("index.php?page=transactions_add") ?>" class="btn btn-sm btn-outline-secondary">
                  <i class="mdi mdi-library-plus"></i>
                  Tambah
              </a>

              </h4>
              <p class="card-description">
                <!-- Cari Produk -->
                
                <!-- <code> -->
                  
                <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Cari Produk" aria-label="Recipient's username">
                      <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="button">Search</button>
                      </div>
                    </div>
                  </div>

                <!-- </code> -->
              </p>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Nama Produk</th>
                      <th>Nama Singkat</th>
                      <th>Barcode</th>
                      <th>Harga</th>
                      <th> Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $products = querybanyak("SELECT products.id as id, products.name_product as name_product, products.abbreviation as abbreviation, products.barcode as barcode, productprices.umum as umum  FROM products 
                    LEFT JOIN productprices ON products.id = productprices.product_id 
                    WHERE productprices.type = 'default'
                    LIMIT 20");

                    foreach($products as $product){
                    ?>
                    <tr>
                      <td><?= $product['name_product'] ?></td>
                      <td><?= $product['abbreviation'] ?></td>
                      <td><?= $product['barcode'] ?></td>
                      <td><?= $product['umum'] ?></td>
                      <td>
                        <a href="<?= Base_url("index.php?page=products_edit&product_id=") ?><?= $product['id'] ?>" class="btn btn-sm btn-success" >
                          <i class="mdi mdi-grease-pencil"></i>
                        </a>

                        <a href="" class="btn btn-sm btn-success" >
                          <i class="mdi mdi-eye"></i>
                        </a>
                      </td>
                    </tr>
                    <?php
                    }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


   
      </div>
    </div>





  