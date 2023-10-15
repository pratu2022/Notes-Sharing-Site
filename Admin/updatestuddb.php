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
if (isset($_POST['update_stud_image'])) {

    $stud_id = $_POST['stud_id'];
    $name = $_POST['stud_name'];
    $phone = $_POST['stud_phone'];
    $email = $_POST['stud_email'];
    $address = $_POST['stud_add'];
    $username = $_POST['stud_username'];
    $gender = $_POST['stud_gender'];

    $new_image = $_FILES['stud_images']['name'];
    $old_image = $_POST['stud_image_old'];

    //print_r($_FILES['stud_images']['name']);

    if($new_image != '')
    {
        $update_filename = $_FILES['stud_images']['name'];
    }else
    {
        $update_filename = $old_image;
    }

    if($_FILES['stud_images']['name'] != '')
    {
        
        if(file_exists("uploads/" . $_FILES['stud_images']['name']))
        {
            $filename = $_FILES['stud_images']['name'];
            ?>
            <script>
                swal('Warning!', "Image Already Exists!" .$filename, 'info').then((value) => {
                    window.location.href = 'viewStudent.php';
                })
            </script>
            <?php
        }
    }
    
    
        $query = "UPDATE `tblstudent` SET `stud_name`='$name',`stud_phone`='$phone',`stud_email`='$email',`stud_address`='$address',`stud_username`='$username',`stud_gender`='$gender',`stud_image`='$update_filename' WHERE id = '$stud_id'";
        $query_run = mysqli_query($mysql,$query);

        if($query_run)
        {
            if($_FILES['stud_images']['name'] != '')
            {
                move_uploaded_file($_FILES["stud_images"]["tmp_name"],"uploads/" .$new_image);
                unlink("uploads/" .$old_image);
            }
            ?>
            <script>
                swal('Good Job!', "Updated Successfully!", 'success').then((value) => {
                    window.location.href = 'viewStudent.php';
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
                    window.location.href = 'viewStudent.php';
                })
            </script>
            <?php
        }
    

}

?>