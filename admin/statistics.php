<?php 
session_start();
$username=   $_SESSION['username'];
?>
<?php
include '../config.php';

$result = mysqli_query($con, "SELECT count(`id`) AS value_sum FROM users"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];//fetch single value
$totalCustomers=$sum;

$result = mysqli_query($con, "SELECT count(`id`) AS value_sum FROM cars"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];//fetch single value
$totalCars=$sum;

$result = mysqli_query($con, "SELECT count(`id`) AS value_sum FROM `car_rental_requests`"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];//fetch single value
$totalRequests=$sum;

$result = mysqli_query($con, "SELECT count(`id`) AS value_sum FROM `contactus`"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];//fetch single value
$totalQueries=$sum;



$result = mysqli_query($con, "SELECT sum(`total`) AS value_sum FROM `payments`"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];//fetch single value
$totalPayments=$sum;

$result = mysqli_query($con, "SELECT COUNT(id) FROM `car_rental_requests` WHERE `status`='approved'"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];//fetch single value
$totalApprovedReq=$sum;


?>



<?php
include("header.php");
include("nav.php")?>

<main style="">
<section >
    <h1>
        Welcome <?php echo $username?>
    </h1>
</section> 
<div class="container mt-4">
    <div class="row">
      <div class="col-md-3">
        <div class="card bg-primary text-white">
          <div class="card-body">
            <h5 class="card-title">Total Customers</h5>
            <p class="card-text"><?php echo $totalCustomers ?></p>
          </div>
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="card bg-success text-white">
          <div class="card-body">
            <h5 class="card-title">Total Available Cars</h5>
            <p class="card-text"><?php echo $totalCars ?></p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card bg-warning text-white">
          <div class="card-body">
            <h5 class="card-title">Total Requests</h5>
            <p class="card-text"><?php echo $totalRequests ?></p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card bg-info text-white">
          <div class="card-body">
            <h5 class="card-title">Total Cars on Rent</h5>
            <p class="card-text"><?php echo $totalApprovedReq ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card bg-danger text-white">
          <div class="card-body">
            <h5 class="card-title">Total Revenue</h5>
            <p class="card-text"><?php echo $totalPayments ?></p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card bg-secondary text-white">
          <div class="card-body">
            <h5 class="card-title">Total Queries</h5>
            <p class="card-text"><?php echo $totalQueries ?></p>
            
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
   