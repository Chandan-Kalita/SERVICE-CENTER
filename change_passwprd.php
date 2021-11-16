<?php
include 'header.php';
if(isset($_POST['submit'])){
    $old_password = mres($_POST['old_password']);
    $new_password = mres($_POST['new_password']);
    $username = $_SESSION['NAME'];
    $checkQuery = mysqli_query($con, "select * from admin where username= '$username' and password = '$old_password'");
    if(mysqli_num_rows($checkQuery)>0){
        $insert = mysqli_query($con, "update admin set password='$new_password' where username='$username'");
        if($insert){
            ?>
                <script>
                    alert('Password has been changes please re-login');
                </script>
            <?php
            redirect('logout.php');
        }else{
            ?>
                <script>
                    alert('Something went wrong please try again');
                </script>
            <?php
        }
    }else{
        ?>
                <script>
                    alert('Wrong old password');
                </script>
            <?php
        // redirect('logout.php');
    }
}
?>



<div class="card">
    <div class="card-header">
        <h1>Change Password</h1>
    </div>
    <div class="card-body">
        <form method="POST" class="form-sample">
            <div class="form-group">
                <label for="">Old Password</label>
                <input type="password" name="old_password" class="form-control" placeholder="Old Password">
            </div>
            <div class="form-group">
                <label for="">New Password</label>
                <input type="password" name="new_password" class="form-control" placeholder="New Password">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Change</button>
        </form>
    </div>
</div>

<?php include 'footer.php';?>