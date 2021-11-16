<?php

include 'inc.php';
if(isset($_POST['brandId']) && $_POST['brandId']!=''){
    $brand_id = $_POST['brandId'];
    echo $brand_id;
    $GetQuery = mysqli_query($con, "select * from car_model where brand_id=$brand_id");
    if(mysqli_num_rows($GetQuery)>0){
        while($row = mysqli_fetch_assoc($GetQuery)){
        echo '<option value="'.$row['id'].'">'.$row['model'].'</option>';
        }
    }else{
        echo '<option>No Car found</option>';
    }
}