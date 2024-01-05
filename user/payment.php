<?php
include '../config.php'; 
session_start();
$username=   $_SESSION['username'];
 
$result = $con->query("SELECT car_rental_requests.*,car_rental_requests.id As rentalid, cars.* FROM car_rental_requests JOIN cars ON car_rental_requests.carid = cars.id WHERE car_rental_requests.status = 'approved' and `customer_id`='$username'");


if (isset($_POST['save'])) //save payment
{
   echo $id= $_GET['id'];

    //carid,caramount


         

             $customer_id=$username;
             $car_id=$_POST['carid'];

             $rent_per_day=$_POST['caramount'];//advance
             $days =$_POST['days'];
             $advance=$_POST['advance'];
             $total= $rent_per_day*$days;
             $deliveryDate=date('d/m/y');
             $returningDate="";
             $status="not returned";
             $remakrs="advance";

           //  advance`, `total`, `deliveryDate`, `returningDate`, `status`, `remakrs`

             $query="INSERT INTO `payments`( `customer_id`, `car_id`, `rent_per_day`, `days`, `advance`, `total`, `deliveryDate`, `returningDate`, `status`, `remakrs`) VALUES ('$customer_id','$car_id','$rent_per_day','$days','$advance','$total','$deliveryDate','$returningDate','$status','$remakrs')";

             $insert = mysqli_query($con, $query);
             echo '<script type="text/javascript">alert("Your payment is completed ! ' . $customer_id . ' ' . $rent_per_day . ' ' . $days . '");</script>';
}


?>

<?php
include("header.php");
include("nav.php")?>

<main >
<section>
    <h1>
        Welcome <?php echo $username?>
    </h1>
   
    
     <div>
     <?php  if ($result && $result->num_rows > 0) 
  {
   
 // var_dump($result);
     while ($row = $result->fetch_assoc())
    {
       $rentalid= $row['rentalid'];
    ?>
    <br>
    <div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title">Customer <?php echo $row['customer_id'] ?></h5>
                    <p class="card-text">Car # <?php echo $row['carid'] ?></p>
                    <p class="card-text">Your Request <?php echo $row['description'] ?></p>
                    <p class="card-text">Request Date <?php echo $row['reqDate'] ?></p>
                    <p class="card-text">Admin Reply <?php echo $row['replied'] ?></p>
                    <p class="card-text text-danger">Status <?php echo $row['status'] ?></p>
                    <p class="card-text">Date for Rent <?php echo $row['rentalDate'] ?></p>

                </div>
            </div>
        </div>
       
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <form method="post" action="payment.php ?id=<?php echo $rentalid; ?>">
                <p class="card-text">Car name <?php echo $row['name'] ?></p>
                    <h5 class="card-title text-danger">Car Rent <?php echo $row['rent_amount'] ?> /day</h5>
                    
                    <p class="card-text">Your Request # <?php echo $rentalid ?></p>
                    <input type="hidden" id="carid" name="carid" value="<?php echo $row['id'] ?>">
                    <input type="hidden" id="caramount" name="caramount" value="<?php echo $row['rent_amount'] ?>">
                    <p class="card-text"><input type="number" name="days" placeholder="Enter Number of Days"></p>
                    <p class="card-text"><input type="number" name="advance" placeholder="Enter advance amount"></p>
                    <button class="btn btn-success" type="submit" name="save"> Submit </button>
    </form>
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
   