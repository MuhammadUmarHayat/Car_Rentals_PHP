<?php
include '../config.php'; 
session_start();
$username=   $_SESSION['username'];
 

if (isset($_POST['save'])) //update password
{
   
   // oldPw
$oldPw=$_POST['oldPw'];//advance
$newPw1 =$_POST['newPw1'];
$newPw2 =$_POST['newPw2'];

if($newPw1==$newPw2)
{
    $result = $con->query("SELECT * FROM `users` WHERE `email`='$username' and `password`='$oldPw'");

    if ($result->num_rows > 0)//old password is correct
    {

    $query="UPDATE `users` SET `password`='$newPw1' WHERE `email`='$username'";
    $updated = mysqli_query($con, $query);
    echo '<script type="text/javascript">alert("Password has been changed successfully ! ");</script>';
    }
    else
{
    echo '<script type="text/javascript">alert("Old Password is not correct ! ");</script>';
}
}
else
{
    echo '<script type="text/javascript">alert("New Password dosenot match ! ");</script>';
}

}

?>

<?php
include("header.php");
include("nav.php")?>

<main >
<section>
    <h1>
        Hi <?php echo $username?>
    </h1>
   
    
     <div>
     <?php  
       //deliveryDate,returningDate
    ?>
    <br>
   
    <div class="container mt-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="changepassword.php">
                        <h3>Change Password </h3>
                        <p class="card-text text-danger"><?php echo $username?></p>
                        <p class="card-text"><input type="password" name="oldPw" placeholder="Enter old password"></p>
                        <p class="card-text"><input type="password" name="newPw1" placeholder="Enter new password"></p>
                        <p class="card-text"><input type="password" name="newPw2" placeholder="Enter new password again"></p>
                        <button class="btn btn-success" type="submit" name="save">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>






</form>
    </div>

</section> 
</main>
   