<?php 
session_start();
$username=   $_SESSION['username'];
?>
<?php include '../config.php';
// Get image data from database 
$result = $con->query("SELECT * FROM `cars`");

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
    <a class="nav-link" href="newCar.php">New Car</a>
    </div>


<div>

<?php  if ($result && $result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
        
    ?>
<table>
    <tr>
        <td>
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>"width=300px; height=150px; />
    </td>
<td>


<?php echo $row['name'] ?> $ <?php echo $row['rent_amount'] ?><br>
        
       
        <?php echo $row['description'] ?><br>
        
        <?php echo $row['model'] ?> <?php echo $row['color'] ?><br>
        <?php echo $row['capacity'] ?> Persons<br>
       
        <?php echo '<a  text-decoration: none;"  href="edit_car.php?id=' . $row['id'] . '">Edit Details</a>';?>
         <?php echo '<a text-decoration: none;"  href="delete_car.php?id=' . $row['id'] . '">Remove Details</a>';?>
         </td>   
    

<?php
      }
    }
                        ?>


</div>

    
</section> 
</main>
   