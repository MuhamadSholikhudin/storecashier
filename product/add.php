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
                  <label for="name">Nama Produk</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" required>
                </div>
                <div class="form-group">
                  <label for="abbreviation">Nama Singkat </label>
                  <input type="text" class="form-control" name="abbreviation" id="abbreviation" placeholder="Nama Singkat" required>
                </div>

            </div>
          </div>
        </div>



        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Harga Produk form</h4>
              <p class="card-description">
              <!-- <form action="<?= Base_url('product/add.php') ?>" method="post"> -->

                <input type="number" id="member" name="countextend" value="0" placeholder="Tambahkan harga Produk">
                <button type="submit" name="forinput" class="btn btn-sm btn-primary" id="filldetails" >+</button>
                <input type="number" id="stateless" name="memberx"  value="0" />

              <!-- </form> -->


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
              <br>
              <form class="forms-sample" action="<?= Base_url("product/action.php") ?>" method="POST" enctype="multipart/form-data">


              <table class="table table-bordered" id="table_field">
                <tr>
                  <th>Full nama</th>
                  <th>Email</th>
                  <th>Phone </th>
                  <th>Address</th>
                  <th>Add or Remove</th>
                </tr>
                <tr>
                  <td><input type="text" name="txtFullname[]" class="form-control" required=""></td>
                  <td><input type="text" name="txtEmail[]" class="form-control" required=""></td>
                  <td><input type="text" name="txtPhone[]" class="form-control" required=""></td>
                  <td><input type="text" name="txtAddress[]" class="form-control" required=""></td>
                  <td><input type="button" id="add" name="add" value="add" class="btn btn-success"></td>
                </tr>
              </table>
              <center>
                <input class="btn btn-warning" type="submit" name="save" id="save" value="Save Data">
              </center>
              </form>


              <?php
              if (isset($_POST['forinput'])) {
                $countextend = $_POST['countextend'];
                for ($y = 0; $y < $countextend; $y++) {
              ?>

              <div>
                <input type="number" name="awal[]" style="width:70px;" required>
                <input type="number" name="akhir[]" style="width:70px;" required>
                <input type="number" name="umum[]" style="width:100px;" required>
                <input type="number" name="pelanggan[]" style="width:100px;" required>
                Default
              </div>
              <br>



              <?php
                }
              } else {
                
              } ?>




              <div id="container">

              </div>

              <table>
                <tr>
                  <td></td>
                </tr>
              </table>
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


              <button type="submit" value="btnADDPRODUCT" class="btn btn-primary me-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </div>
          </div>
        </div>

        <div class="product" data-id="1">
          <div class="product_pic" style="background: url('static/img/product-2.jpg') no-repeat; background-size: auto 100%; background-position: center"></div>
          <span class="product_name">Воздушные шары</span>
          <span class="product_price">100 руб.</span>
          <button class="js_buy" data-id="100">Buy</button>
        </div>







      </div>
    </div>