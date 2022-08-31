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
              <form class="forms-sample">
                <div class="form-group">
                  <label for="name">Nama Produk</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" required>
                </div>
                <div class="form-group">
                  <label for="abbreviation">Nama Singkat </label>
                  <input type="text" class="form-control" id="abbreviation" placeholder="Nama Singkat" required>
                </div>

            </div>
          </div>
        </div>



        <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Harga Produk form</h4>
                  <p class="card-description">


                    <input type="text" id="member" name="member" value="" placeholder="Tambahkan harga Produk">
                    <a href="#" class="btn btn-sm btn-primary" id="filldetails" onclick="addFields()">+</a>

                  </p>

                  <div id="container"/>

                  </div>

                    <table>
                      <tr>
                        <td></td>
                      </tr>
                    </table>
                  



                    
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>




    <script type='text/javascript'>
        function addFields(){
            // Generate a dynamic number of inputs
            var number = document.getElementById("member").value;
            // Get the element where the inputs will be added to
            var container = document.getElementById("container");
            // Remove every children it had before
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                // Append a node with a random text
                // container.appendChild(document.createTextNode("Member " + (i+1)));
                // Create an <input> element, set its type and name attributes


                var input = document.createElement("input");
                input.type = "text";
                input.name = "awal" + i;
                input.id = "awal" + i;
                input.class = i;
                input.placeholder = i;
                input.style.width = '70px';


                container.appendChild(input);


                var input2 = document.createElement("input");
                input2.type = "text";
                input2.name = "akhir" + i;
                input2.id = "akhir" + i;
                input2.class = i;
                input2.style.width = '70px';

                container.appendChild(input2);

                var input3 = document.createElement("input");
                input3.type = "text";
                input3.name = "akhir" + i;
                input3.id = "akhir" + i;
                input3.class = i;
                container.appendChild(input3);

                var input4 = document.createElement("input");
                input4.type = "text";
                input4.name = "akhir" + i;
                input4.id = "akhir" + i;
                input4.class = i;
                container.appendChild(input4);

                // container.appendChild(document.createElement("&nbsp"));

                // Append a line break 
                container.appendChild(document.createElement("br"));
            }
        }
    </script>



      </div>
    </div>