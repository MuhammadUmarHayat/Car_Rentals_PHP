<?php 
session_start();
$username=   $_SESSION['username'];
$message="";
include '../config.php';

$id= $_GET['id'];
$result = $con->query("SELECT * FROM `cars` WHERE `id`='$id'");

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
	//SELECT `id`, `name`, `model`, `capacity`, `color`, `rent_amount`, `description`,
    // `photo`, `dom`, `owner`, `status` FROM `cars` 		
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
}


if (isset($_POST['save'])) //update data
{
    $id= $_GET['id'];

    


           $name = $_POST['name'];
           $model=$_POST['model'];
             $capacity =$_POST['capacity'];
           $color=$_POST['color'];
          $rent_amount=$_POST['rent_amount'];
          $description=$_POST['description'];
          $dom=$_POST['dom'];
            $status="ok";
            
            $owner=$_POST['owner'];


            $query = "UPDATE `cars` SET`name`='$name',`model`='$model',`capacity`='$capacity',`color`='$color',`rent_amount`='$rent_amount',`description`='$description',`dom`='$dom',`owner`='$owner',`status`='$status' WHERE `id`='$id'";

            $insert = mysqli_query($con, $query);



          
            header('Location:http://localhost/carrentals/admin/carmanagement.php');
       
}


include("header.php");
include("nav.php")?>

<main style="">
<section >
    <h1>
        Welcome <?php echo $username?>
    </h1>
    <div>
    <form method="post" action="edit_car.php ?id=<?php echo $id; ?>">
                    <div class="center">
                        <table>
                        <tr>
                                <td># </td>
                                <td><?php echo $id; ?></td>
                            </tr>
                            <tr>
                                <td>Title </td>
                                <td><input type="text" name="name" value="<?php echo $name; ?>"> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Description </td>
                                <td><input type="text" name="description" value="<?php echo $description; ?>"> <span class="error">*</span> </td>
                            </tr>
                            

                            <tr>
                                <td>Model </td>
                                <td><input type="text" name="model" value="<?php echo $model; ?>"> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Capacity </td>
                                <td><input type="text" name="capacity" value="<?php echo $capacity; ?>"> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Colour </td>
                                <td><input type="text" name="color" value="<?php echo $color; ?>"> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Per day rent </td>
                                <td><input type="text" name="rent_amount" value="<?php echo $rent_amount; ?>"> <span class="error">*</span> </td>
                            </tr>
                            
                            <tr>
                                <td>Date of manufacturing </td>
                                <td><input type="text" name="dom" value="<?php echo $dom; ?>"> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                            <tr>
                                <td>Owner Name </td>
                                <td><input type="text" name="owner" value="<?php echo $owner; ?>"> <span class="error">*</span> </td>
                            </tr>
                                <td> </td>
                                <td> <button type="submit" name="save"> Submit </button> </td>
                            </tr>
                        </table>
                        <?php
                        echo $message;
                        ?>
                    </div>
                </form>

    </div>




    
</section> 
</main>
   