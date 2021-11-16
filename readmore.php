<?php include 'header.php';
if(isset($_GET['id'])&&$_GET['id']>0){
    $id = $_GET['id'];
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $sql = "delete from vehicle where id= $id";
        $query = mysqli_query($con, $sql);
        redirect('index.php');
    }


    $sql = "SELECT 
        vehicle.id, vehicle.name, vehicle.mobile, vehicle.car_no, vehicle.date, vehicle.kms,vehicle.problem, vehicle.entered_by, car_model.model, car_brand.brand 
        FROM vehicle 
        INNER JOIN car_model on vehicle.car_model_id=car_model.id 
        INNER JOIN car_brand on vehicle.car_brand_id=car_brand.id
        where vehicle.id = $id";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query)>0){

    }else{
        redirect('index.php');
    }
    $row = mysqli_fetch_assoc($query);
}else{
    redirect('index.php');
}
?>
<div class="card" id='printArea'>
            <div class="card-header">
              <h1> Customer Name: <span><b> <?php echo $row['name'] ?></b></span></h1>
              <h5>Vehicle No.: <span><b><?php echo $row['car_no'] ?></b></span></h5>
              <p>Date: <span><b><?php echo $row['date'] ?></b></span></p>
              <p>Mobile: <span><b><?php echo $row['mobile'] ?></b></span></p>
            </div>
            <div class="card-body">
              <p>Brand: <b><?php echo $row['brand'] ?></b></p>
              <p>Model: <b><?php echo $row['model'] ?></b></p>
              <p>Distance Traveled: <span><b class="distance_traveled"> <?php echo $row['kms'] ?></b> KM</span></p>
              <hr>
              <p>Problem: <?php echo $row['problem'] ?></p>

            </div>
            <div class="card-footer">
              <h6>Entry Done By: <span><b><?php echo $row['entered_by'] ?></b></span></h6>
            </div>
          </div>
          <a href="readmore.php?id=<?php echo $id ?>&action=delete" class="btn btn-danger">Delete</a>
          <button class="btn btn-primary" onclick="printDiv('printArea')">Print</button>
          <script>
            function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
          </script>
<?php include 'footer.php'?>