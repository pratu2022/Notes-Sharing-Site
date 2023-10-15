<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
</body>
</html>
<?php
include("../connect.php");
if (isset($_POST['update_fac_image'])) {

    $fac_id = $_POST['fac_id'];
    $name = $_POST['fac_name'];
    $phone = $_POST['fac_phone'];
    $email = $_POST['fac_email'];
    $address = $_POST['fac_add'];
    $username = $_POST['fac_username'];
    $gender = $_POST['fac_gender'];

    $new_image = $_FILES['fac_images']['name'];
    $old_image = $_POST['fac_image_old'];

    //print_r($_FILES['stud_images']['name']);

    if($new_image != '')
    {
        $update_filename = $_FILES['fac_images']['name'];
    }else
    {
        $update_filename = $old_image;
    }

    if($_FILES['fac_images']['name'] != '')
    {
        
        if(file_exists("uploadf/" . $_FILES['fac_images']['name']))
        {
            $filename = $_FILES['fac_images']['name'];
            ?>
            <script>
                swal('Warning!', "Image Already Exists!" .$filename, 'info').then((value) => {
                    window.location.href = 'viewFaculty.php';
                })
            </script>
            <?php
        }
    }
    
    
        $query = "UPDATE `tblfaculty` SET `fac_name`='$name',`fac_phone`='$phone',`fac_email`='$email',`fac_address`='$address',`fac_username`='$username',`fac_gender`='$gender',`fac_image`='$update_filename' WHERE id = '$fac_id'";
        $query_run = mysqli_query($mysql,$query);

        if($query_run)
        {
            if($_FILES['fac_images']['name'] != '')
            {
                move_uploaded_file($_FILES["fac_images"]["tmp_name"],"uploadf/" .$new_image);
                unlink("uploadf/" .$old_image);
            }
            ?>
            <script>
                swal('Good Job!', "Updated Successfully!", 'success').then((value) => {
                    window.location.href = 'viewFaculty.php';
                })
            </script>
            <?php
            //header("location: viewStudent.php");
           
        }
        else
        {
            ?>
            <script>
                swal('Error!', "Not Updated!", 'error').then((value) => {
                    window.location.href = 'viewFaculty.php';
                })
            </script>
            <?php
        }
    

}

?>