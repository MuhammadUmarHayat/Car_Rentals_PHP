<?php
include '../config.php'; 
session_start();
$username=   $_SESSION['username'];
 // SELECT `id`, `carid`, `customer_id`, `reqDate`, `rentalDate`, `status`, `description`,
 // `replied` FROM `car_rental_requests` WHERE  
$result = $con->query("SELECT * FROM `car_rental_requests` where `customer_id`='$username'");
?>

<?php
include("header.php");
include("nav.php")?>

<main >
<section>
    <h1>
        Welcome <?php echo $username?>
    </h1>
    <form method="post" action="index.php">
    
     <div>
     <?php  if ($result && $result->num_rows > 0) 
  {
   
 // var_dump($result);
     while ($row = $result->fetch_assoc())
    {
       
    ?>
    <br>
    <div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Customer <?php echo $row['customer_id'] ?></h5>
                    <p class="card-text">Car # <?php echo $row['carid'] ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <p class="card-text">Your Request <?php echo $row['description'] ?></p>
                    <p class="card-text">Request Date <?php echo $row['reqDate'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <p class="card-text">Admin Reply <?php echo $row['replied'] ?></p>
                    <p class="card-text text-danger">Status <?php echo $row['status'] ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <p class="card-text">Date for Rent <?php echo $row['rentalDate'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
      }
    }
                        ?>


</form>
    </div>

</section> 
</main>
   