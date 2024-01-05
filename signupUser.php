<!-- php scritp  -->

<?php 
include 'config.php';
$message="";

if(isset($_POST['signup']))
{
//register now	
	
	 $data = $_POST;
	
	
	
if ($data['password'] !== $data['retypePassword']) 
{
   die('Password and Confirm password should match!');   
}

//email,name,cnic,password,retypePassword,address,phoneNo
        //country,town,city,region,zip
	
        $email = $_POST['email'];
	 $name = $_POST['name'];
	
		 $cnic = $_POST['cnic'];
		 	
                  $address = $_POST['address'];
                  $password = $_POST['password'];
			 	 $retypepassword = $_POST['retypePassword'];
                  $phoneNo = $_POST['phoneNo'];
                 
                  $country = $_POST['country'];
                  $town= $_POST['town'];
                  $city= $_POST['city'];
                  $region= $_POST['region'];
                  $zip= $_POST['zip'];

	

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////INSERT INTO `users`( `name`, `cnic`, `address`, `password`, `email`, `phone`, `town`, `city`, `region`, `zipcode`, `country`) 

		
		$query="INSERT INTO `users`( `name`, `cnic`, `address`, `password`, `email`, `phone`, `town`, `city`, `region`, `zipcode`, `country`) VALUES ('$name','$cnic','$address','$password','$email','$phoneNo','$town','$city','$region','$zip','$country')";
	
	$insert = mysqli_query($con,$query);
	
 
 
    $message="You are registered successfully";

	
	
}



include "header.php";
include "nav.php";
 ?>

<main>

            <div id="right">
               
            <form method="post" action="signupUser.php">
    <div class="center">
        
<table>
<tr> <td><h2> User Registration </h2> </td> <td></td>   </tr>
<tr> <td>Email </td> <td><input type="email" name="email" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Full Name </td> <td><input type="text" name="name" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>CNIC </td> <td><input type="text" name="cnic" required> <span class="error" >*</span >   </td>   </tr>
<tr><td> Password </td> <td><input type="password" name="password" required><span class="error" >*</span > </td>   </tr>
<tr><td> Retype Password </td> <td><input type="password" name="retypePassword" required> <span class="error" >*</span ></td>   </tr>
<tr> <td>Address</td> <td><input type="text" name="address" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Phone Number</td> <td><input type="text" name="phoneNo" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>   </td>
<tr> <td>Country</td> <td><input type="text" name="country" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Town</td> <td><input type="text" name="town" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>City </td> <td><input type="text" name="city" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Region </td> <td><input type="text" name="region" required>   <span class="error" >*</span > </td>   </tr>
 
<tr> <td>Zip Code</td> <td><input type="text" name="zip" required>   <span class="error" >*</span > </td>   </tr>
<tr><td></td><td> <button type="submit" class="btn btn-success" name="signup"> Register Now </button>  </td>   </tr>
</table>
<?php
echo $message;
?>
</div>
</form>

            </div>

</main>