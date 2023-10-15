<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
<?php
include("../connect.php");
if(isset($_POST['save_fac_image']))
{
        $regno = 'FS' .rand(99,10) .time();
        $fac_name = $_POST['fac_name'];
        $fac_phone = $_POST['fac_phone'];
        $fac_email = $_POST['fac_email'];
        $fac_add = $_POST['fac_add'];
        $fac_username = $_POST['fac_username'];
        $fac_password = $_POST['fac_password'];
        $fac_gender = $_POST['fac_gender'];
        $fac_image = $_FILES['fac_image']['name'];

        print_r($regno);
        print_r($fac_name);
        //print_r($fac_phone);

        $allowed_extension = array('png', 'jpeg', 'jpg');
        $filename = $_FILES['fac_image']['name'];
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

        if(!in_array($file_extension,$allowed_extension))
        {
            ?>
            <script>
                swal('Error!', "You are allowed only jpg png jpeg Only", 'error').then((value) => {
                    window.location.href = 'addFaculty.php';
                })
            </script>
            <?php
        }
        else
        {
            if (file_exists("uploadf/" . $_FILES['fac_image']['name']))
             {
                $filename = $_FILES['fac_image']['name'];
                ?>
                <script>
                    swal('Error!', "Image already Exists".$filename, 'error').then((value) => {
                        window.location.href = 'addFaculty.php';
                    })
                </script>
                <?php
            } 
           
                $password = password_hash($fac_password, PASSWORD_BCRYPT);
                $query = "INSERT INTO `tblfaculty`(`id`, `regno`, `fac_name`, `fac_phone`, `fac_email`, `fac_address`, `fac_username`, `fac_password`, `fac_gender`, `fac_image`) VALUES (null,'$regno','$fac_name','$fac_phone','$fac_email','$fac_add','$fac_username','$password','$fac_gender','$fac_image')";
                $query_run = mysqli_query($mysql, $query);

                if($query_run)
                {
                    move_uploaded_file($_FILES["fac_image"]["tmp_name"],"uploadf/" .$fac_image);
                    ?>
                    <script>
                        swal('Good Job!', "Record Insert", 'success').then((value) => {
                            window.location.href = 'viewFaculty.php';
                        })
                    </script>
                    <?php
                }
            
        }
}

if (isset($_POST['delete_fac_image'])) {
    $id = $_POST['delete_id'];
    $fac_img = $_POST['del_fac_image'];

    $query = "DELETE FROM tblfaculty WHERE id = '$id'";
    $query_run = mysqli_query($mysql, $query);

    if ($query_run) {
        unlink("uploadf/". $fac_img);

        ?>
        <script>
            swal('Good Job!', "Deleted Successfully!", 'success').then((value) => {
                window.location.href = 'viewFaculty.php';
            })
        </script>
        <?php
    } else {
        ?>
        <script>
            swal('Error!', "Couldn't", 'error').then((value) => {
                window.location.href = 'viewFaculty.php';
            })
        </script>
        <?php
    }

}

?>
</body>
</html>