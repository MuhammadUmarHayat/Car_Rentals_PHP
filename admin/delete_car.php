<?php include '../config.php';
 

 $id= $_GET['id'];


 $insert = $con->query("DELETE FROM `cars` WHERE `id`='$id'"); 
              
   //http://localhost/carrentals/admin/index.php#             
   header('Location:http://localhost/carrentals/admin/carmanagement.php');
 
 

?>