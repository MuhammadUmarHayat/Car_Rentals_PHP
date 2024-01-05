<?php 
session_start();
$username=   $_SESSION['username'];
?>
<?php include '../config.php';
//customerQueries.php
// Get image data from database 
$id="";
$result = $con->query("SELECT * FROM `contactus`");
//save changes
if (isset($_POST['submit'])) //send button
{
    $id= $_GET['id'];
    $reply = $_POST['reply'];
    $query="UPDATE `contactus` SET `reply`='$reply',`replyedBy`='admin' where `id`='$id'";

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
        $id= $row['id'];
    ?>
<table>
    <tr>
        <td>
        <table>
        
        <tr> <td>User Name</td><td> <?php echo $row['username'] ?> </td></tr>
               
        <tr><td> Email</td><td>  <?php echo $row['email'] ?> </td></tr>
        <tr><td>Query</td><td> <?php echo $row['message'] ?> </td></tr>
        <tr><td>Date</td><td> <?php echo $row['msgDate'] ?></td></tr>
        
        <tr><td>Reply</td><td> <?php echo $row['reply'] ?></td></tr>
        <tr><td>Replied By</td> <td> <?php echo $row['replyedBy'] ?></td></tr>
        <tr> <td>#</td><td> <?php echo $id; ?></td></tr>
    
    </table>
    <td>
<td>
<form method="post" action="customerQueries.php?id=<?php echo $id; ?>">

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
   