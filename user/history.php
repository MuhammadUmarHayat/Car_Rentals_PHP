<?php
include '../config.php'; 
session_start();
$username=   $_SESSION['username'];
 
$result = $con->query("SELECT * FROM `payments` WHERE  `customer_id`='$username'");




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
     <?php  if ($result && $result->num_rows > 0) 
  {
   
 // var_dump($result);
     while ($row = $result->fetch_assoc())
    {
       //deliveryDate,returningDate
    ?>
    <br>
    <div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title">Customer <?php echo $row['customer_id'] ?></h5>
                    <p class="card-text">Car # <?php echo $row['car_id'] ?></p>
                    <p class="card-text">Rent <?php echo $row['rent_per_day'] ?></p>
                    <p class="card-text">Number of Days <?php echo $row['days'] ?></p>
                    <p class="card-text">Advance<?php echo $row['advance'] ?></p>
                    <p class="card-text text-danger">Status <?php echo $row['status'] ?></p>
                    <p class="card-text">Total <?php echo $row['total'] ?></p>
                    <p class="card-text">Date of Rent <?php echo $row['deliveryDate'] ?></p>
                    <p class="card-text">Returning Date<?php echo $row['returningDate'] ?></p>
                    <p class="card-text text-success">Remarks <?php echo $row['status'] ?></p>

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
   