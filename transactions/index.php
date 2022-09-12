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
                      <input type="text" class="form-control" id="search_transaction" placeholder="Cari Transaction" aria-label="Recipient's username">
                      <!-- <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="button">Search</button>
                      </div> -->
                    </div>
                  </div>

                <!-- </code> -->
              </p>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Nama </th>
                      <th>Tanggal</th>
                      <th>Total</th>
                      <th>Tunai</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="tbody_transaction">
                    <?php 
                    $transactions = querybanyak("SELECT * FROM transactions
                    LIMIT 20");

                    foreach($transactions as $transaction){
                    ?>
                    <tr>
                      <td><?= $transaction['name_buyer'] ?></td>
                      <td><?= $transaction['created_at'] ?></td>
                      <td><?= $transaction['total'] ?></td>
                      <td><?= $transaction['cash'] ?></td>
                      <td>
                        <a href="<?= Base_url("index.php?page=transactions_edit&transaction_id=") ?><?= $transaction['id'] ?>" class="btn btn-sm btn-success" >
                          <i class="mdi mdi-grease-pencil"></i>
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





  