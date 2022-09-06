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
  $(document).ready(function(){

    var html = '<tr><td><input type="number" name="awal[]" class="form-control awal" min="1" value="1" required=""></td><td><input type="number" name="akhir[]" class="form-control akhir" min="1" value="1" required=""></td><td><input type="number" name="umum[]" class="form-control umum" min="1" value="1" required=""></td><td><input type="number" name="pelanggan[]" class="form-control pelanggan" min="1" value="1" required=""><input type="text" name="type[]" class="form-control type d-none" value="extend" required=""></td><td><input type="button" id="remove" name="remove" value="-" class="btn btn-danger"></td></tr>';
    var x = 1;

    $("#add").click(function(){
      $("#table_field").append(html);
    });

    $("#table_field").on('click', '#remove', function(){
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

    $("#saveproduct").click(function(){
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
      }else{
        $.ajax({
          type: "POST",
          url: "http://localhost/storecashier/product/ajax.php",
          data: {
            name_product: name_product.value,
            abbreviation : abbreviation.value,
            barcode: barcode.value,
          },
          dataType: "json",
          success: function (data) {
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
    $("#addedit").click(function(){
      $("#table_field").append(htmledit);
    });

    $("#table_field").on('click', '#removeedit', function(){
      var price_id = $(this).data('id');

      if(price_id == 0){
        $(this).closest('tr').remove();
      }else{
        $.ajax({
          type: "POST",
          url: "http://localhost/storecashier/product/ajax.php",
          data: {
            price_id: price_id
          },
          dataType: "json",
          success: function (data) {

          },
          error() {
            alert("ERROR");
          },
        });
        $(this).closest('tr').remove();

      }
    });

    $("#editproduct").click(function(){
      var product_id = document.getElementById("product_id");
      var name_product = document.getElementById("name_product");
      var abbreviation = document.getElementById("abbreviation");
      var barcode = document.getElementById("barcode");

      if (name_product.value == "" || abbreviation.value == "" || barcode.value == "") {
        alert("Inputan Harus Di isi !");
        return false;
      }else{

        // alert(product_id.value + name_product.value + )
        
        $.ajax({
          type: "POST",
          url: "http://localhost/storecashier/product/ajax.php",
          data: {
            product_id: product_id.value,
            name_product: name_product.value,
            abbreviation : abbreviation.value,
            barcode: barcode.value,
          },
          dataType: "json",
          success: function (data) {
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


<!--
              <script type='text/javascript'>

                function addFields() {

                  // Generate a dynamic number of inputs
                  var number = document.getElementById("member").value;

                  var stateless = document.getElementById("stateless").value;

                  // Get the element where the inputs will be added to
                  var container = document.getElementById("container");
                  // Remove every children it had before
                  // while (container.hasChildNodes()) {
                  //     container.removeChild(container.lastChild);
                  // }

                  // var i = stateless;

                  var stateplus = parseInt(stateless) + parseInt(number);

                  document.getElementById("stateless").value = stateplus;

                  for (i = stateless; i < stateplus; i++) {
                    // Append a node with a random text
                    // container.appendChild(document.createTextNode("Member " + (i+1)));
                    // Create an <input> element, set its type and name attributes


                    var input = document.createElement("input");
                    input.type = "number";
                    input.name = "awal[]";
                    // input.id =  i;
                    input.class = i;
                    input.style.width = '70px';
                    // input.required = true;
                    input.setAttribute("required", true);


                    input.min = "1";
                    container.appendChild(input);

                    container.appendChild(document.createTextNode(" "));
                    container.appendChild(document.createTextNode(" "));

                    var input2 = document.createElement("input");
                    input2.type = "number";
                    input2.name = "akhir[]";
                    // input2.id = i;
                    input2.class = i;
                    input2.style.width = '70px';
                    // input2.required = true;
                    input2.setAttribute("required", true);

                    input2.min = "1";
                    container.appendChild(input2);

                    container.appendChild(document.createTextNode(" "));
                    container.appendChild(document.createTextNode(" "));

                    var input3 = document.createElement("input");
                    input3.type = "number";
                    input3.name = "umum[]";
                    // input3.id =  i;
                    input3.class = i;
                    input3.style.width = '100px';
                    // input3.required = true;
                    input3.setAttribute("required", true);

                    input3.min = "1";
                    container.appendChild(input3);

                    container.appendChild(document.createTextNode(" "));
                    container.appendChild(document.createTextNode(" "));

                    var input4 = document.createElement("input");
                    input4.type = "number";
                    input4.name = "pelanggan[]";
                    // input4.id =  i;
                    input4.class = i;
                    input4.style.width = '100px';
                    // input4.required = true;
                    input4.setAttribute("required", true);
                    input4.min = "1";
                    container.appendChild(input4);


                    var butn = document.createElement("button");
                    butn.innerHTML = "X";
                    // butn.id =  i;
                    butn.setAttribute("data-id", i);
                    butn.setAttribute("class", i);

                    container.appendChild(butn);

                    // Append a line break 

                    var p = document.createElement("p");
                    // p.id =  i;

                    container.appendChild(p);

                  }



                  const boxes = document.querySelectorAll('button');


                  // Event click
                  boxes.forEach(box => {
                    box.addEventListener('click', function handleClick(event) {
                      // console.log('box clicked', event);

                      // alert("OKE");

                      console.log(box.getAttribute('data-id'));

                      var idremove = box.getAttribute('data-id');

                      for (let i = 0; i < 6; i++) {
                        const element = document.getElementById(idremove);
                        element.remove();
                      }

                    });
                  });


                }


                // let btnGoods = document.querySelectorAll('.js_buy');

                // for (var i = 0; i < btnGoods.length; i++) {
                //     btnGoods[i].addEventListener('click', e => {
                //         var clickedButton = e.target || e.srcElement;
                //         // console.log(clickedButton.parentNode.getAttribute('data-id'));
                //         console.log(clickedButton.getAttribute('data-id'));
                //     });
                // }
              </script>
-->


<script>



  $("#kjh").click(function(){

    var member = document.getElementById("member");
    var stateless = document.getElementById("stateless");

    var titles = $('.sdf=value').map(function(idx, elem) {
      return $(elem).val();
    }).get();

    console.log(titles);
    event.preventDefault();

    $.ajax({
        type: "POST",
        url: "http://localhost/storecashier/product/ajax.php",
        data: {
          tambah : member.value,
          mulai : stateless.value
        },
        dataType: "json",
        success: function (data) {
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
<!-- endinject -->
<!-- Custom js for this page-->
<!-- End custom js for this page-->
</body>

</html>