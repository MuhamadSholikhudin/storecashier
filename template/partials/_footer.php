    <!-- content-wrapper ends -->
    <!-- partial:<?= Base_url('template/') ?>partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
      </div>
    </footer>
    <!-- partial -->
    </div>

    <!-- main-panel ends -->
    </div>


    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= Base_url(
        'template/'
    ) ?>vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= Base_url(
        'template/'
    ) ?>vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= Base_url('template/') ?>js/off-canvas.js"></script>
    <script src="<?= Base_url('template/') ?>js/hoverable-collapse.js"></script>
    <script src="<?= Base_url('template/') ?>js/template.js"></script>
    <script src="<?= Base_url('template/') ?>js/settings.js"></script>
    <script src="<?= Base_url('template/') ?>js/todolist.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {

        var html = '<tr><td><input type="number" name="awal[]" class=" awal" min="1" style="width: 80px;" value="1" required=""></td><td><input type="number" name="akhir[]" class=" akhir" min="1" style="width: 80px;" style="width: 80px;" value="1" required=""></td><td><input type="number" name="umum[]" class=" umum" min="1" style="width: 100px;" value="1" required=""></td><td><input type="number" name="pelanggan[]" class=" pelanggan" min="1" style="width: 100px;" value="1" required=""><input type="text" name="type[]" class=" type d-none" value="extend" required=""></td><td><input type="button" id="remove" name="remove" value="-" class="btn btn-danger"></td></tr>';
        var x = 1;

        $("#add").click(function() {
          $("#table_field").append(html);
        });

        $("#table_field").on('click', '#remove', function() {
          $(this).closest('tr').remove();
        });


        function validateForm() {
          let name_product = document.forms["myAddProduct"]["name_product"].value;
          let abbreviation = document.forms["myAddProduct"]["abbreviation"].value;
          let barcode = document.forms["myAddProduct"]["barcode"].value;

          if (name_product == "" || abbreviation == "" || barcode == "" ) {
            alert("Inputan Harus Di isi !");
            return false;
          }
        }

        $("#saveproduct").click(function() {
          var name_product = document.getElementById("name_product");
          var abbreviation = document.getElementById("abbreviation");
          var barcode = document.getElementById("barcode");
          var price = document.getElementById("price");
          var contain = document.getElementById("contain");


          var awal = document.getElementsByClassName("awal");
          var akhir = document.getElementsByClassName("akhir");
          var umum = document.getElementsByClassName("umum");
          var pelanggan = document.getElementsByClassName("pelanggan");

          if (name_product.value == "" || abbreviation.value == "" || barcode.value == "" ) {
            alert("Inputan Harus Di isi !");
            return false;
          } else {
            $.ajax({
              type: "POST",
              url: "<?= Base_url('') ?>product/ajax.php",
              data: {
                name_product: name_product.value,
                abbreviation: abbreviation.value,
                barcode: barcode.value,
                price: price.value,
                contain: contain.value,
              },
              dataType: "json",
              success: function(data) {
                //  alert(data);
                $("#save").click();

              },
              error() {
                alert("ERROR");
              },
            });
          }
        });

        var htmledit = '<tr><td><input type="number" name="product_id[]" class=" d-none product_id" value="0" required=""><input type="number" name="price_id[]" class=" d-none price_id" value="0" required=""><input type="number" name="awal[]" class=" awal" min="1" style="width: 80px;" value="1" required=""></td><td><input type="number" name="akhir[]" class=" akhir" min="1" style="width: 80px;" value="1" required=""></td><td><input type="number" name="umum[]" class=" umum" min="1" style="width: 100px;" value="1" required=""></td><td><input type="number" name="pelanggan[]" class=" pelanggan" min="1" style="width: 100px;" value="1" required=""></td><td><input type="button" id="removeedit" name="removeedit" value="-" data-id="0" class="btn btn-danger"></td></tr>';
        $("#addedit").click(function() {
          $("#table_field").append(htmledit);
        });

        $("#table_field").on('click', '#removeedit', function() {
          var price_id = $(this).data('id');

          if (price_id == 0) {
            $(this).closest('tr').remove();
          } else {
            $.ajax({
              type: "POST",
              url: "<?= Base_url('') ?>product/ajax.php",
              data: {
                price_id: price_id
              },
              dataType: "json",
              success: function(data) {

              },
              error() {
                alert("ERROR");
              },
            });
            $(this).closest('tr').remove();

          }
        });


        $('#search_product').keyup( function () {
           var search_product = document.getElementById("search_product").value;
           $.ajax({
              type: "POST",
              url: "<?= Base_url('') ?>/product/ajax.php",
              data: {
                search_product: search_product
              },
              dataType: "json",
              success: function(data) {
                $('#tbody_product').html(data)
              },
              error() {
                alert("ERROR");
              },
            });

        });


        $('#search_product').keydown( function () {
           var search_product = document.getElementById("search_product").value;
           $.ajax({
              type: "POST",
              url: "<?= Base_url('') ?>/product/ajax.php",
              data: {
                search_product: search_product
              },
              dataType: "json",
              success: function(data) {
                $('#tbody_product').html(data)
              },
              error() {
                alert("ERROR");
              },
            });
        });

        $("#editproduct").click(function() {
          var product_id = document.getElementById("product_id");
          var name_product = document.getElementById("name_product");
          var abbreviation = document.getElementById("abbreviation");
          var barcode = document.getElementById("barcode");
          var price = document.getElementById("price");
          var contain = document.getElementById("contain");

          if (name_product.value == "" || abbreviation.value == "" || barcode.value == "") {
            alert("Inputan Harus Di isi !");
            return false;
          } else {

            // alert(product_id.value + name_product.value + )

            $.ajax({
              type: "POST",
              url: "<?= Base_url('') ?>/product/ajax.php",
              data: {
                product_id: product_id.value,
                name_product: name_product.value,
                abbreviation: abbreviation.value,
                barcode: barcode.value,
                price: price.value,
                contain: contain.value,
              },
              dataType: "json",
              success: function(data) {
                //  alert(data);
                $("#save").click();

              },
              error() {
                alert("ERROR");
              },
            });
          }
        });
      });
    </script>

    <script>
      $("#kjh").click(function() {

        var member = document.getElementById("member");
        var stateless = document.getElementById("stateless");

        var titles = $('.sdf=value').map(function(idx, elem) {
          return $(elem).val();
        }).get();

        console.log(titles);
        event.preventDefault();

        $.ajax({
          type: "POST",
          url: "<?= Base_url('') ?>/product/ajax.php",
          data: {
            tambah: member.value,
            mulai: stateless.value
          },
          dataType: "json",
          success: function(data) {
            // alert(data)
            $("#container").html(data);
            stateless.value = member.value + stateless.value
          },
          error() {
            alert("ERROR");
          },
        });

      });
    </script>

    <!-- Transaction -->
    <script>
      // function myFunction() {

      //   var keyword = document.getElementById("searchproducttransactions").value;

      //   if (keyword == "") {
      //     alert("KOSONG");
      //   } else {
      //     $.ajax({
      //       type: "POST",
      //       url: "<?= Base_url('') ?>/transactions/ajax.php",
      //       data: {
      //         keyword: keyword
      //       },
      //       dataType: "json",
      //       success: function(data) {
      //         $("#tablesearch").html(data);
      //       },
      //       error() {
      //         alert("ERROR");
      //       },
      //     });
      //   }
      // }

      $("#searchproducttransactions").keyup( function() {
        var keyword = document.getElementById("searchproducttransactions").value;
        $.ajax({
          type: "POST",
          url: "<?= Base_url('') ?>/transactions/ajax.php",
          data: {
            keyword: keyword
          },
          dataType: "json",
          success: function(data) {
            $("#tablesearch").html(data);
          },
          error() {
            alert("ERROR");
          },
        });
      });

      
      $("#searchproducttransactions").keyup( function() {
          var keyword = document.getElementById("searchproducttransactions").value;
          $.ajax({
            type: "POST",
            url: "<?= Base_url('') ?>/transactions/ajax.php",
            data: {
              keyword: keyword
            },
            dataType: "json",
            success: function(data) {
              $("#tablesearch").html(data);
            },
            error() {
              alert("ERROR");
            },
          });
      });


      $("#tablesearch").on('click', '#addtransactions', function() {

        var price_id = $(this).data('id');
        var name = $(this).data('name');

        var transaction_id = document.getElementById("transaction_id").value;
        var name_buyer = document.getElementById("name_buyer").value;
        var type_buyer = document.getElementById("type_buyer").value;

        $.ajax({
          type: "POST",
          url: "<?= Base_url('') ?>/transactions/ajax.php",
          data: {
            transaction_id: transaction_id,
            price_id: price_id,
            name_buyer: name_buyer,
            type_buyer: type_buyer
          },
          dataType: "json",
          success: function(data) {
            document.getElementById("transaction_id").value = data[0];
            document.getElementById("name_buyer").value = data[1];
            document.getElementById("type_buyer").value = data[2];
            document.getElementById("total_transactions").value = data[8];

            var htmladdr = '<tr><td>' + name + '</td><td><input type="number" class="qty" id="qty" style="width:50px;" data-cart_id="' + data[4] + '" data-price_id="' + data[5] + '" data-transaction_id="' + data[0] + '" min="1" min="1" value="' + data[5] + '" required=""></td><td><input type="number" name="price" id="cart_price_transaction" class="cart_price' + data[4] + '" min="1" style="width:60px;" value="' + data[6] + '" required=""></td><td class="text-center"><input type="checkbox" name="check[]" data-id="' +data[4] +'" id="check" class="form-check-input" required=""> </td><td><input type="number" name="" id="cart_sum_price_transaction" class="cart_sum_price' + data[4] + '" style="width: 100px;" data-id="' + data[4] + '" min="1" value="' + data[7] + '" required=""><input type="text" name="type[]" class="form-control type d-none" value="extend" required=""></td><td><input type="button" id="removeedittransaction" data-id="' + data[4] + '" name="remove" value="-" class="btn btn-danger"></td></tr>';

            $("#table_field_transactions").append(htmladdr);

            if (transaction_id == 0) {
              var urlLocation = "<?= Base_url('index.php?page=transactions_edit&transaction_id=') ?>" + data[0];
              window.location.assign(urlLocation);
            }

          },
          error() {
            alert("ERROR");
          },
        });
      });



      $("#table_field_transactions").on('change', '#qty', function() {

        var transaction_id = $(this).data('transaction_id');
        var type_buyer = document.getElementById("type_buyer").value;
        var price_id = $(this).data('price_id');
        var cart_id = $(this).data('cart_id');
        var qty = $(this).val();

        var cart_price = ".cart_price" + cart_id;
        var cart_sum_price = ".cart_sum_price" + cart_id;

        $.ajax({
          type: "POST",
          url: "<?= Base_url('') ?>/transactions/ajax.php",
          data: {
            transaction_id: transaction_id,
            type_buyer: type_buyer,
            price_id: price_id,
            cart_id: cart_id,
            qty: qty
          },
          dataType: "json",
          success: function(data) {

            $(cart_price).val(data[0])
            $(cart_sum_price).val(data[1])
            document.getElementById("total_transactions").value = data[2];
          },
          error() {
            alert("ERROR");
          },
        });
      });


      $("#table_field_transactions").on('change', '#cart_sum_price_transaction', function() {

        var cart_sum_price_id = $(this).data('id');
        var val = $(this).val();
        var transaction_id = document.getElementById("transaction_id").value;

        $.ajax({
          type: "POST",
          url: "<?= Base_url('') ?>/transactions/ajax.php",
          data: {
            cart_sum_price_id: cart_sum_price_id,
            val: val,
            transaction_id: transaction_id
          },
          dataType: "json",
          success: function(data) {
            document.getElementById("total_transactions").value = data[0];
          },
          error() {
            alert("ERROR");
          },
        });
      });

      $("#table_field_transactions").on('click', '#removeedittransaction', function() {
        var cart_delete_id = $(this).data('id');
        $.ajax({
          type: "POST",
          url: "<?= Base_url('') ?>/transactions/ajax.php",
          data: {
            cart_delete_id: cart_delete_id
          },
          dataType: "json",
          success: function(data) {
            // alert(data);
            document.getElementById("total_transactions").value = data[0];
          },
          error() {
            alert("ERROR");
          },
        });
        $(this).closest('tr').remove();
      });
     
      $('#search_transaction').keyup( function () {
           var search_transaction = document.getElementById("search_transaction").value;         
            $.ajax({
              type: "POST",
              url: "<?= Base_url('') ?>/transactions/ajax.php",
              data: {
                search_transaction: search_transaction
              },
              dataType: "json",
              success: function(data) {
                $('#tbody_transaction').html(data)
              },
              error() {
                alert("ERROR");
              },
            });

        });


        $('#search_transaction').keydown( function () {
           var search_transaction = document.getElementById("search_transaction").value;
           $.ajax({
              type: "POST",
              url: "<?= Base_url('') ?>/transactions/ajax.php",
              data: {
                search_transaction: search_transaction
              },
              dataType: "json",
              success: function(data) {
                $('#tbody_transaction').html(data)
              },
              error() {
                alert("ERROR");
              },
            });
        });

        $('#table_field_transactions').on('click', '#check', function(){
          var check = $(this).prop("checked");
          var cart_id = $(this).data("id");
          $.ajax({
              type: "POST",
              url: "<?= Base_url('') ?>/transactions/ajax.php",
              data: {
                check: check,
                cart_id:cart_id
              },
              dataType: "json",
              success: function() {
              },
              error() {
                alert("ERROR");
              },
            });
        });

        $("#type_buyer").on('change', function(){
          var val_type_buyer = document.getElementById("type_buyer").value;
          var transaction_id = document.getElementById("transaction_id").value;
          $.ajax({
              type: "POST",
              url: "<?= Base_url('') ?>/transactions/ajax.php",
              data: {
                val_type_buyer: val_type_buyer,
                transaction_id:transaction_id
              },
              dataType: "json",
              success: function() {
              },
              error() {
                alert("ERROR");
              },
            });
        });


        $("#name_buyer").on('change', function(){
          var val_name_buyer = document.getElementById("name_buyer").value;
          var transaction_id = document.getElementById("transaction_id").value;
          $.ajax({
              type: "POST",
              url: "<?= Base_url('') ?>/transactions/ajax.php",
              data: {
                val_name_buyer: val_name_buyer,
                transaction_id:transaction_id
              },
              dataType: "json",
              success: function() {
              },
              error() {
                alert("ERROR");
              },
            });
        });


        $("#cash").keydown( function(){
          var transaction_id = document.getElementById("transaction_id").value;
          var total = document.getElementById("total_transactions").value;
          var cash = document.getElementById("cash").value;

          $.ajax({
              type: "POST",
              url: "<?= Base_url('') ?>/transactions/ajax.php",
              data: {
                total: total,
                cash: cash,
                transaction_id:transaction_id
              },
              dataType: "json",
              success: function(data) {
                document.getElementById("changes").value = data[0];
              },
              error() {
                alert("ERROR");
              },
            });
   
        });
        $("#cash").keyup( function(){
          var transaction_id = document.getElementById("transaction_id").value;
          var total = document.getElementById("total_transactions").value;
          var cash = document.getElementById("cash").value;

          $.ajax({
              type: "POST",
              url: "<?= Base_url('') ?>/transactions/ajax.php",
              data: {
                total: total,
                cash: cash,
                transaction_id:transaction_id
              },
              dataType: "json",
              success: function(data) {
                document.getElementById("changes").value = data[0];
              },
              error() {
                alert("ERROR");
              },
            });
        });


    </script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
    </body>

    </html>
