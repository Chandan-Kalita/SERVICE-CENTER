
<?php include 'header.php'; 

$sql = "SELECT 
        vehicle.id, vehicle.name, vehicle.mobile, vehicle.car_no, vehicle.date, car_model.model, car_brand.brand 
        FROM vehicle 
        INNER JOIN car_model on vehicle.car_model_id=car_model.id 
        INNER JOIN car_brand on vehicle.car_brand_id=car_brand.id";
$query = mysqli_query($con, $sql);


?>
<div class="card">
  <div class="card-body">
    <h4 class="card-title"><?php echo COMPANY; ?></h4>
    <a href="download.php?type=excel" class="btn btn-success download">Download Excel</a>
    <a href="download.php?type=pdf" class="btn btn-success download">Download PDF</a>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                <th>Order #</th>
                <th>Customer</th>
                <th>Mobile</th>
                <th>Vehicle No</th>
                <th>Car Brand</th>
                <th>Car Model</th>
                <th>Date</th>
                <th> </th>
              </tr>
            </thead>

            <tbody>
              <?php
                if(mysqli_num_rows($query)>0){
                  $i = 1;
                  while($row=mysqli_fetch_assoc($query)){
                    
              ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['mobile'] ?></td>
                <td><?php echo $row['car_no'] ?></td>
                <td><?php echo $row['brand'] ?></td>
                <td><?php echo $row['model'] ?></td>
                <td><?php echo $row['date'] ?></td>
                <td><a href="readmore.php?id=<?php echo $row['id'] ?>" class="btn-success btn">Read More</a></td>
              </tr>
              <?php
                $i++;  
                }
              }else{
                  
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php' ?>