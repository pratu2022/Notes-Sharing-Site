
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

    if (isset($_POST['save_stud_image'])) {
        $regno = 'TS' . rand(99, 10) . time();
        $stud_name = $_POST['stud_name'];
        $stud_phone = $_POST['stud_phone'];
        $stud_email = $_POST['stud_email'];
        $stud_add = $_POST['stud_add'];
        $stud_username = $_POST['stud_username'];
        $stud_password = $_POST['stud_password'];
        $stud_gender = $_POST['stud_gender'];
        $stud_image = $_FILES['stud_image']['name'];

        $allowed_extension = array('png', 'jpeg', 'jpg');
        $filename = $_FILES['stud_image']['name'];
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($file_extension, $allowed_extension)) {
            ?>

            <script>
                swal('Error!', "You are allowed only jpg png jpeg Only", 'error').then((value) => {
                    window.location.href = 'addStudent.php';
                })
            </script>
            <?php
        }
         else 
         {
            if (file_exists("uploads/" . $_FILES['stud_image']['name'])) {
                $filename = $_FILES['stud_image']['name'];
                ?>
                <script>
                    // swal('Error!', "Image already Exists".$filename, 'error').then((value) => {
                    //     window.location.href = 'addStudent.php';
                    // })
                    alert("image already exists");
                    window.location.href = 'addStudent.php';
                </script>
                <?php
            } 
            else 
            {

                $password = password_hash($stud_password, PASSWORD_BCRYPT);
                $query = "INSERT INTO `tblstudent`(`id`, `regno`, `stud_name`, `stud_phone`, `stud_email`, `stud_address`,`stud_username`,`stud_password` ,`stud_gender`, `stud_image`) VALUES (null,'$regno','$stud_name','$stud_phone','$stud_email','$stud_add','$stud_username','$password','$stud_gender','$stud_image')";
                $query_run = mysqli_query($mysql, $query);

                if ($query_run) {

                    move_uploaded_file($_FILES["stud_image"]["tmp_name"], "uploads/" . $stud_image);

                    ?>
                    <script>
                        swal('Good Job!', "Record Insert", 'success').then((value) => {
                            window.location.href = 'viewStudent.php';
                        })
                    </script>
                    <?php
                }
            }
        }
    }




    if (isset($_POST['delete_stud_image'])) {
        $id = $_POST['delete_id'];
        $stud_img = $_POST['del_stud_image'];

        $query = "DELETE FROM tblstudent WHERE id = '$id'";
        $query_run = mysqli_query($mysql, $query);

        if ($query_run) {
            unlink("uploads/". $stud_img);

            ?>
            <script>
                swal('Good Job!', "Deleted Successfully!", 'success').then((value) => {
                    window.location.href = 'viewStudent.php';
                })
            </script>
            <?php
        } else {
            ?>
            <script>
                swal('Error!', "Couldn't", 'error').then((value) => {
                    window.location.href = 'viewStudent.php';
                })
            </script>
            <?php
        }

    }

    ?>
</body>

</html>