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

        var html = '<tr><td><input type="number" name="awal[]" class="form-control awal" min="1" value="1" required=""></td><td><input type="number" name="akhir[]" class="form-control akhir" min="1" value="1" required=""></td><td><input type="number" name="umum[]" class="form-control umum" min="1" value="1" required=""></td><td><input type="number" name="pelanggan[]" class="form-control pelanggan" min="1" value="1" required=""><input type="text" name="type[]" class="form-control type d-none" value="extend" required=""></td><td><input type="button" id="remove" name="remove" value="-" class="btn btn-danger"></td></tr>';
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

          if (name_product == "" || abbreviation == "" || barcode == "") {
            alert("Inputan Harus Di isi !");
            return false;
          }
        }

        $("#saveproduct").click(function() {
          var name_product = document.getElementById("name_product");
          var abbreviation = document.getElementById("abbreviation");
          var barcode = document.getElementById("barcode");

          var awal = document.getElementsByClassName("awal");
          var akhir = document.getElementsByClassName("akhir");
          var umum = document.getElementsByClassName("umum");
          var pelanggan = document.getElementsByClassName("pelanggan");

          if (name_product.value == "" || abbreviation.value == "" || barcode.value == "") {
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

        var htmledit = '<tr><td><input type="number" name="product_id[]" class="form-control d-none product_id" value="0" required=""><input type="number" name="price_id[]" class="form-control d-none price_id" value="0" required=""><input type="number" name="awal[]" class="form-control awal" min="1" value="1" required=""></td><td><input type="number" name="akhir[]" class="form-control akhir" min="1" value="1" required=""></td><td><input type="number" name="umum[]" class="form-control umum" min="1" value="1" required=""></td><td><input type="number" name="pelanggan[]" class="form-control pelanggan" min="1" value="1" required=""></td><td><input type="button" id="removeedit" name="removeedit" value="-" data-id="0" class="btn btn-danger"></td></tr>';
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

        $("#editproduct").click(function() {
          var product_id = document.getElementById("product_id");
          var name_product = document.getElementById("name_product");
          var abbreviation = document.getElementById("abbreviation");
          var barcode = document.getElementById("barcode");

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
      function myFunction() {

        var keyword = document.getElementById("searchproducttransactions").value;

        if (keyword == "") {
          alert("KOSONG");
        } else {
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
        }
      }



      $("#tablesearch").on('click', '#addtransactions', function() {
        var price_id = $(this).data('id');
        var name = $(this).data('name');
        var transaction_id = document.getElementById("transaction_id").value;

      //  alert(transaction_id);
        $.ajax({
            type: "POST",
            url: "<?= Base_url('') ?>/transactions/ajax.php",
            data: {
              transaction_id: transaction_id,
              price_id: price_id
            },
            dataType: "json",
            success: function(data) {
              // $("#tablesearch").html(data);
              alert(data)
              document.getElementById("transaction_id").value = 1;
              var htmladdr = '<tr><td>'+name+'</td><td><input type="number" class="form-control qty" id="qty" data-price_id="'+price_id+'" data-transaction_id="'+transaction_id+'" min="1" min="1" value="'+name+'" required=""></td><td><input type="number" name="umum[]" class="form-control umum" min="1" value="1" required=""></td><td class="text-center"><input type="checkbox" name="check[]"  value="extend" required=""> </td><td><input type="number" name="pelanggan[]" class="form-control pelanggan" min="1" value="1" required=""><input type="text" name="type[]" class="form-control type d-none" value="extend" required=""></td><td><input type="button" id="remove" name="remove" value="-" class="btn btn-danger"></td></tr>';

              $("#table_field_transactions").append(htmladdr);
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