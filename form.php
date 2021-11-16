<?php include 'header.php';
$msg = '';
if (isset($_POST['submit'])) {
  $name = mres($_POST['name']);
  $mobile = mres($_POST['mobile']);
  $car_no = mres($_POST['car_no']);
  $car_brand_id = mres($_POST['brand']);
  $car_model_id = mres($_POST['car_model']);
  $kms = mres($_POST['kms']);
  $problem = mres($_POST['problem']);


  $date = getCurrentDate();
  $entered_by = $_SESSION['NAME'];
  $sql = "insert into vehicle
          (name, mobile, car_no, kms, problem, date, entered_by, car_brand_id, car_model_id) 
          values 
          ('$name','$mobile','$car_no','$kms','$problem', '$date', '$entered_by', $car_brand_id, $car_model_id)";
  $query = mysqli_query($con, $sql);
  if ($query) {
    $msg = 'Customer Added Succesfully';
  } else {
    $msg = 'Something went wrong, Please Try Again';
  }
}


?>
<div class="row">
  <h1 class="card-title ml10"><?php echo COMPANY ?></h1>
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="msg"><?php echo $msg ?></p>
        <form class="forms-sample" method="POST">
          <div class="form-group">
            <label for="exampleInputName1">Customer Name</label>
            <input required name="name" type="text" class="form-control" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Customer Mobile</label>
            <input required name="mobile" type="tel" class="form-control" placeholder="Mobile">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Vehicle No</label>
            <input required name="car_no" type="text" class="form-control" placeholder="Vehicle No">
          </div>

          <div class="form-group">
            <label for="brand">Brand</label>
            <select class="form-control" name="brand" id="brand">
              <?php
              $GetQuery = mysqli_query($con, "select * from car_brand");
              if (mysqli_num_rows($GetQuery) > 0) {
                while ($dataRow = mysqli_fetch_assoc($GetQuery)) {
                  echo "<option value='" . $dataRow['id'] . "'>" . $dataRow['brand'] . "</option>";
                }
              } else {
                echo '<option>No Brand Found</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="car">Car Model</label>
            <select class="form-control" name="car_model" id="car">
              <option value="">Select Car</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Distance Traveled (In Km)</label>
            <input required name="kms" type="number" class="form-control" placeholder="Distance Traveled">
          </div>


          <div class="form-group">
            <label for="exampleTextarea1">Problems</label>
            <textarea required name="problem" class="form-control" id="exampleTextarea1" placeholder="Problems" rows="4"></textarea>
          </div>
          <button name="submit" type="submit" class="btn btn-primary mr-2">Add</button>
          <a class="btn btn-light" href="index.php">Cancel</a>
          <button class="btn btn-danger mr-2" type="reset">Reset</button>
        </form>
      </div>
    </div>
  </div>

</div>



<script src="assets/js/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#brand").on("change",function(){
      var brandId = $(this).val();
      $.ajax({
        url :"action.php",
        type:"POST",
        cache:false,
        data:{brandId:brandId},
        success:function(data){
          $("#car").html(data);
        }
      });
    });
  });
</script>
<?php include 'footer.php'; ?>