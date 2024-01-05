<?php 
session_start();
$username=   $_SESSION['username'];
?>
<?php include '../config.php';

// Get image data from database 
$id="";
$result = $con->query("SELECT * FROM `car_rental_requests`");

if (isset($_POST['submit'])) //save changes
{
    $id= $_GET['id'];
    $reply = $_POST['reply'];
    $status = $_POST['status'];

    $query="UPDATE `car_rental_requests` SET `replied`='$reply',`status`='$status' where `id`='$id'";

    $insert = mysqli_query($con, $query);

          
    header('Location:http://localhost/carrentals/admin/index.php');

}


?>

<?php
include("header.php");
include("nav.php")?>

<main style="">
<section >
    <h1>
        Welcome <?php echo $username?>
    </h1>
   

<div>

<?php  if ($result && $result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {


        //SELECT `id`, `carid`, `customer_id`, `reqDate`, `rentalDate`, `status`, 
        //`description`, `replied` FROM `car_rental_requests` 
        $id= $row['id'];
    ?>
<table>
    <tr>
        <td>
        <table>
        
        <tr> <td>Customer #</td><td> <?php echo $row['customer_id'] ?> </td></tr>
               
        <tr><td>Car # </td><td>  <?php echo $row['carid'] ?> </td></tr>
        <tr><td>Descriotion</td><td> <?php echo $row['description'] ?> </td></tr>
        <tr><td>Your reply</td><td> <?php echo $row['replied'] ?></td></tr>
        
        <tr><td>Status</td><td> <?php echo $row['status'] ?></td></tr>
        
        <tr> <td>#</td><td> <?php echo $id; ?></td></tr>
    
    </table>
    <td>
<td>
<form method="post" action="requests.php?id=<?php echo $id; ?>">
<label for="status">Update status:</label>

<select name="status" id="status">
  <option value="approved">Approved</option>
  <option value="rejected">Rejected</option>
  <option value="not available">Not Available</option>
  
</select>
<br>
<textarea id="reply" name="reply" rows="4" cols="50">

    </textarea>  
<br>
<button class="btn btn-success" type="submit" name="submit"> Send </button> 
    </form>

    </td>



    
       
          
    

<?php
      }
    }
                        ?>


</div>

    
</section> 
</main>
   