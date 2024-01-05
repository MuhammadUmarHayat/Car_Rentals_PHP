<?php 
include '../config.php'; 
session_start();
$username=   $_SESSION['username'];
$id= $_GET['id'];//carid

$name="";
$model="";
$capacity="";
$color="";
$rent_amount="";
$dom="";
$owner="";
$status="";
$description="";
$message="";
$result = $con->query("SELECT * FROM `cars` WHERE `id`='$id'");
if ($result && $result->num_rows > 0) 
  {
   
 // var_dump($result);
    $row = $result->fetch_assoc();//get a single row;
    
      $name=  $row['name'];
	  $model= $row['model'];
      $capacity=  $row['capacity'];
	  $color= $row['color'];
      $rent_amount=  $row['rent_amount'];
	  $dom= $row['dom'];
      $owner=  $row['owner'];
	  $status= $row['status'];
      $description= $row['description'];
    
}
if(isset($_POST['submit']))// is clicked?
{
   $msg = $_POST['msg'];//rentalDate
   $carid=$id;
   $customer_id=$username;
   $reqDate= date('d/m/Y');
   $rentalDate= $_POST['rentalDate'];
   $status="pending";
   $description=$msg;
   $replied="";
   $query="INSERT INTO `car_rental_requests`( `carid`, `customer_id`, `reqDate`, `rentalDate`, `status`, `description`, `replied`) VALUES ('$carid','$customer_id','$reqDate','$rentalDate','$status','$description','$replied')";

   $insert = mysqli_query($con,$query);
	
 
 
   $message="Your request is submitted to admin successfully";


}
?>

<?php
include("header.php");
include("nav.php")?>

<main style="">
<section >
    <h1>
        Customer  <?php echo $username?>
    </h1>
    <form method="post" action="send_request.php ?id=<?php echo $id; ?>">
    <table>
    <tr>
        <td>
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>"width=300px; height=150px; />
    </td>
<td>

<?php echo $id; ?>	
<table >
    <tr> <td> Name </td><td><?php echo $name ?> </td><td> Model</td><td> <?php echo $model ?></td></tr>

    <tr> <td> Description </td><td><?php echo $description ?> </td><td> Rent</td><td> <?php echo $rent_amount ?></td></tr>
    <tr> <td> Color </td><td><?php echo $color ?> </td><td> Capacity</td><td> <?php echo $capacity ?></td></tr>
    <tr> <td> Manufacturing Date </td><td><?php echo $dom ?> </td><td> Status</td><td> <?php echo $status ?></td></tr>
</table>

    </td>  
     

 
 <td>
 <textarea id="msg" name="msg" rows="4" cols="50">
Enter your message here!
</textarea>
<br>
Rental Date<input type="date" id="rentalDate" name="rentalDate">
<button class="btn btn-success" type="submit" name="submit"> Send Request </button> 
<br><?php

echo $message;
?>
</td>
       


    </tr>         
    </table>



</form>
</section> 
</main>
   
