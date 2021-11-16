<?php
include 'header.php';
$msg = '';
$Carmsg = '';
if (isset($_POST['brand_submit'])) {
    $brand_name = mres($_POST['brand_name']);
    $checkQuery = mysqli_query($con, "select * from car_brand where brand = '$brand_name'");
    if (mysqli_num_rows($checkQuery) > 0) {
        $msg = 'Brand Already Added';
    } else {
        $insertQuery = mysqli_query($con, "insert into car_brand(brand) values ('$brand_name')");
        if ($insertQuery) {
            $msg = 'Brand Added';
        } else {
            $msg = 'Something Went Wrong';
        }
    }
}elseif(isset($_POST['car_model_submit'])){
    $car_model = mres($_POST['car_name']);
    $brand_id = mres($_POST['brand']);
    $checkQuery = mysqli_query($con, "select * from car_model where model = '$car_model' and brand_id = $brand_id");
    if (mysqli_num_rows($checkQuery) > 0) {
        $Carmsg = 'Car Already Added';
    } else {
        $insertQuery = mysqli_query($con, "insert into car_model(brand_id, model) values ($brand_id, '$car_model')");
        if ($insertQuery) {
            $Carmsg = 'Car Added';
        } else {
            $Carmsg = 'Something Went Wrong';
        }
    }
}

?>
<div class="card">
    <div class="card-header">
        <h1>Add Brand</h1>
        <p class="msg"><?php echo $msg; ?></p>
        <form class="forms-sample" method="POST">
            <div class="form-group">
                <label>Brand Name</label>
                <input required name="brand_name" type="text" class="form-control" placeholder="Brand Name">
            </div>
            <button name="brand_submit" type="submit" class="btn btn-primary mr-2">Add</button>
        </form>
    </div>
    <div class="card-body">
        <h2>Add Model</h2>
        <p class="msg"><?php echo $Carmsg; ?></p>
        <form method="POST" class="form-sample">
            <div class="form-group">
                <label for="exampleSelectBrand">Brand</label>
                <select class="form-control" name="brand" id="exampleSelectBrand">
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
                <label>Car Name</label>
                <input required name="car_name" type="text" class="form-control" placeholder="Car Name">
            </div>
            <button name="car_model_submit" type="submit" class="btn btn-primary mr-2">Add</button>
        </form>
    </div>
</div>


<?php include 'footer.php'; ?>