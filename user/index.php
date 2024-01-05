<?php
include '../config.php'; 
session_start();
$username=   $_SESSION['username'];
$result = $con->query("SELECT * FROM `cars`");
//btnfind,btncapacity,btnmodel,btncolor,btnname,btnrent_amount
if (isset($_POST['btnsearch'])) 
{
    $title = $_POST['search'];
    $result = $con->query("SELECT * FROM `cars` where name='$title' or model='$title' or color='$title'");

}
if (isset($_POST['btnfind'])) 
{
   echo $capacity = $_POST['capacity1'];
   echo $model = $_POST['model1'];
   echo $color = $_POST['color1'];
   echo $name = $_POST['name1'];
   echo $rent_amount = $_POST['rent_amount1'];
   $result = $con->query("SELECT * FROM `cars` where `capacity`='$capacity' and `model`='$model' and `color`='$color' and `name`='$name' and `rent_amount`='$rent_amount'");
}
if (isset($_POST['btncapacity'])) 
{
  echo  $capacity = $_POST['capacity1'];
   
    $result = $con->query("SELECT * FROM `cars` where capacity='$capacity' ");
}
if (isset($_POST['btnmodel'])) 
{
    $model = $_POST['model1']; 
    $result = $con->query("SELECT * FROM `cars` where model='$model'");
}
if (isset($_POST['btncolor'])) 
{
echo "color is selected";
     $color = $_POST['color1'];
    // $result = $con->query("SELECT * FROM `cars` where `color`='$color'");
    $result = $con->query("SELECT * FROM `cars` WHERE `color`='$color'");
    var_dump($color);
  var_dump($result);  
// if (!$result) {
//     die("Error in query: " . $con->error);
// }
}
if (isset($_POST['btnname'])) 
{
    $name = $_POST['name1'];
    $result = $con->query("SELECT * FROM `cars` where name='$name'");
}
if (isset($_POST['btnrent_amount'])) 
{
    $rent_amount = $_POST['rent_amount1'];

    $result = $con->query("SELECT * FROM `cars` where rent_amount='$rent_amount'");

}
else
{

  //  $result = $con->query("SELECT * FROM `cars`"); 
  //  echo "59";
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
    <form method="post" action="index.php">
    <div>
        <table border=1>
        <tr><td>
            <select name="model1">
    <option disabled selected>-- Select Car Model--</option>
    <?php
	
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT Distinct model From cars");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['model'] ."'>" .$data['model'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
</td>

<td>
<select name="capacity1">
    <option disabled selected>-- Select Capacity--</option>
    <?php
	
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT Distinct capacity From cars");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['capacity'] ."'>" .$data['capacity'] ."</option>";  // displaying data in option menu
        }	
        //capacity,
    ?>  
  </select>  
    </td>


<td>
    <select name="color1">
    <option disabled selected>-- Select Car Colour--</option>
    <?php
	
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT Distinct color From cars");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['color'] ."'>" .$data['color'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
</td><td>
<select name="rent_amount1">
    <option disabled selected>-- Select Car Rent Amount--</option>
    <?php
	
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT Distinct rent_amount From cars");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['rent_amount'] ."'>" .$data['rent_amount'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
</td>
<td>
<select name="name1">
    <option disabled selected>-- Select Car Name--</option>
    <?php
	
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT Distinct name From cars");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['name'] ."'>" .$data['name'] ."</option>";  // displaying data in option menu
        }	
        
    ?>  
  </select>  
</td>
<td><button class="btn btn-primary" type="submit" name="btnfind"> find </button></td>
<td><button class="btn btn-dark" type="submit" name="btncapacity"> Capacity</button></td>
 <td><button class="btn btn-warning" type="submit" name="btnmodel"> Model </button></td>
 <td><button class="btn btn-info" type="submit" name="btncolor"> color </button></td>
 <td><button class="btn btn-light" type="submit" name="btnname"> Name </button></td>
 <td><button class="btn btn-secondary" type="submit" name="btnrent_amount">Amount </button></td>
</tr>
        
</table>


     </div>
     <div>
     <?php  if ($result && $result->num_rows > 0) 
  {
   
 // var_dump($result);
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
        <?php echo $row['capacity'] ?><br>
    </td>  
     

 <td><?php echo '<a  text-decoration: none;" class="btn btn-dark" href="car_details.php?id=' . $row['id'] . '">View Details</a>';?></td>
 <td> <?php echo '<a text-decoration: none;" class="btn btn-danger" href="send_request.php?id=' . $row['id'] . '">Send Request For Rent</a>';?></td>
       


    </tr>         
    

<?php
      }
    }
                        ?>


</form>
    </div>

</section> 
</main>
   