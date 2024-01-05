<?php
include '../config.php'; 
session_start();
$username=   $_SESSION['username'];
$id= $_GET['id'];
$result = $con->query("SELECT * FROM `cars` WHERE `id`='$id'");

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
        


     </div>
     <div>
     <?php  if ($result && $result->num_rows > 0) 
  {
   
 // var_dump($result);
     while ($row = $result->fetch_assoc())
    {
        $name=  $row['name'];
	  $model= $row['model'];
      $capacity=  $row['capacity'];
	  $color= $row['color'];
      $rent_amount=  $row['rent_amount'];
	  $dom= $row['dom'];
      $owner=  $row['owner'];
	  $status= $row['status'];
      $description= $row['description'];
         
    ?>
<table>
    <tr>
        <td>
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>"width=300px; height=150px; />
    </td>
<td>

		
<table >
    <tr> <td> Name </td><td><?php echo $name ?> </td><td> Model</td><td> <?php echo $model ?></td></tr>

    <tr> <td> Description </td><td><?php echo $description ?> </td><td> Rent</td><td> <?php echo $rent_amount ?></td></tr>
    <tr> <td> Color </td><td><?php echo $color ?> </td><td> Capacity</td><td> <?php echo $capacity ?></td></tr>
    <tr> <td> Manufacturing Date </td><td><?php echo $dom ?> </td><td> Status</td><td> <?php echo $status ?></td></tr>
</table>

    </td>  
     

 
 <td> <?php echo '<a text-decoration: none;" class="btn btn-danger" href="send_request.php?id=' . $row['id'] . '">Send Request For Rent</a>';?></td>
       


    </tr>         
    </table>

<?php
      }
    }
                        ?>


</form>
    </div>

</section> 
</main>
   