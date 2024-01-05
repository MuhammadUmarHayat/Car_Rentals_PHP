<?php 
session_start();
$username=   $_SESSION['username'];
$message="";
include '../config.php';
if (isset($_POST['save'])) 
{
    

    if (!empty($_FILES["image"]["name"]))
     {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) 
        {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));


           $name = $_POST['name'];
           $model=$_POST['model'];
             $capacity =$_POST['capacity'];
           $color=$_POST['color'];
          $rent_amount=$_POST['rent_amount'];
          $description=$_POST['description'];
          $dom=$_POST['dom'];
            $status="ok";
            
            $owner=$_POST['owner'];


            $query = "INSERT INTO `cars`( `name`, `model`, `capacity`, `color`, `rent_amount`, `description`, `photo`, `dom`, `owner`, `status`) VALUES ('$name', '$model', '$capacity', '$color', '$rent_amount', '$description', '$imgContent', '$dom', '$owner', '$status')";

            $insert = mysqli_query($con, $query);



          
            header('Location:'.'admin/carmanagement.php');
        }
    }
}


include("header.php");
include("nav.php")?>

<main style="">
<section >
    <h1>
        Welcome <?php echo $username?>
    </h1>
    <div>
    <form method="post" action="newCar.php" enctype="multipart/form-data">
                    <div class="center">
                        <table>

                            <tr>
                                <td>Title </td>
                                <td><input type="text" name="name" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Description </td>
                                <td><input type="text" name="description" required> <span class="error">*</span> </td>
                            </tr>
                            

                            <tr>
                                <td>Model </td>
                                <td><input type="text" name="model" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Capacity </td>
                                <td><input type="text" name="capacity" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Colour </td>
                                <td><input type="text" name="color" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Per day rent </td>
                                <td><input type="text" name="rent_amount" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Select Car Photo:</label>
                                </td>
                                <td> <input type="file" name="image">
                                </td>
                            </tr>
                            <tr>
                                <td>Date of manufacturing </td>
                                <td><input type="text" name="dom" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                            <tr>
                                <td>Owner Name </td>
                                <td><input type="text" name="owner" required> <span class="error">*</span> </td>
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
   