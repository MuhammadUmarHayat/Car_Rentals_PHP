

<?php
include 'config.php';

if(isset($_POST['submit']))//login button
{
    $userType=$_POST['userType'];
$email=$_POST['email'];
$password=$_POST['password'];

if($userType=="admin")
{

    $result = $con->query("SELECT * FROM `admins` WHERE `email`='$email' and `password`='$password'");

    if ($result->num_rows > 0)
    {
        //id password is correct
        session_start();// start the session
        $_SESSION['username'] = $email;
        header('Location:'.'admin/index.php');//go to admin panel
    }
    else
    {
        echo "Please enter correct userid and password";
    }

}
else if ($userType=="customer")
{
    $result = $con->query("SELECT * FROM `users` WHERE `email`='$email' and `password`='$password'");

    if ($result->num_rows > 0)
    {
        //id password is correct
        session_start();// start the session
        $_SESSION['username'] = $email;
        header('Location:'.'user/index.php');

    }
    else
    {
        echo "Please enter correct userid and password";
    }
}
else
{
echo "Please enter correct userid and password";
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online Plant Store</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<?php  include("header.php")?>
<?php  include("nav.php")?>
<br><br><br><br>
<div class="login-form">
    <form action="login.php" method="post">
        <h2 class="text-center">Log in</h2>
        <div class="form-group" class="text-center" >
        <select  name="userType" id="userType">
  <option  value="admin">Admin</option>
  <option  value="customer">Customer</option>
  
</select>
        </div>       
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit"  class="btn btn-primary btn-block">Log in</button>
        </div>
               
    </form>
    <p class="text-center"><a href="signupUser.php">Create an Account</a></p>
</div>
</body>
</html>                                		