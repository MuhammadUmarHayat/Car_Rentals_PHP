<?php
include '../config.php'; 
session_start();
$username=   $_SESSION['username'];
 
$result = $con->query("SELECT * FROM `payments` WHERE `remakrs`<>'paid'");
if (isset($_POST['save'])) //save payment
{
   echo $id= $_GET['id'];
////rent,days,total
$rent_per_day=$_POST['rent'];//advance
$days =$_POST['days'];

$total= $rent_per_day*$days;
$returningDate=date('d/m/y');

$status="available";
$remakrs="paid";
$query="UPDATE `payments` SET `total`='$total',`returningDate`='$returningDate',`status`='$status',`remakrs`='$remakrs' WHERE `id`='$id'";
$updated = mysqli_query($con, $query);
echo '<script type="text/javascript">alert("Your payment is completed ! ' . $customer_id . ' ' . $rent_per_day . ' ' . $days . '");</script>';
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
       
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <form method="post" action="customerpayments.php ?id=<?php echo $row['id'] ?>">
                
                    <h3 class="card-title text-danger">Customer <?php echo $row['customer_id'] ?></h3>
                    <h5 class="card-title text-danger">Cart Rent <?php echo $row['rent_per_day'] ?> /day</h5>
                    <input type="hidden" id="rent" name="rent" value=" <?php echo $row['rent_per_day'] ?>">
                    
                    <p class="card-text"><input type="number" name="days" placeholder="Enter Number of Days"></p>
                    <p class="card-text text-danger"><input type="number" name="total" placeholder="Enter remaining amount"> </p>
                   
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
   