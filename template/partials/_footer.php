    <!-- content-wrapper ends -->
    <!-- partial:<?= Base_url("template/") ?>partials/_footer.html -->
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
<script src="<?= Base_url("template/") ?>vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?= Base_url("template/") ?>vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= Base_url("template/") ?>js/off-canvas.js"></script>
<script src="<?= Base_url("template/") ?>js/hoverable-collapse.js"></script>
<script src="<?= Base_url("template/") ?>js/template.js"></script>
<script src="<?= Base_url("template/") ?>js/settings.js"></script>
<script src="<?= Base_url("template/") ?>js/todolist.js"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var html = '<tr><td><input type="text" name="txtFullname[]" class="form-control" required=""></td><td><input type="text" name="txtEmail[]" class="form-control" required=""></td><td><input type="text" name="txtPhone[]" class="form-control" required=""></td><td><input type="text" name="txtAddress[]" class="form-control" required=""></td><td><input type="button" id="remove" name="remove" value="remove" class="btn btn-danger"></td></tr>';
  
    var x = 1;

    $("#add").click(function(){
      $("#table_field").append(html);
    });

    $("#table_field").on('click', '#remove', function(){
      $(this).closest('tr').remove();
    });

  });

</script>

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