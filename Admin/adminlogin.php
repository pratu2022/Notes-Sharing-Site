<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminlogin</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

</body>

</html>
<?php
require('../connect.php');
session_start();

if (isset($_POST['admin_login'])) {
    $query = "SELECT * FROM tbladmin WHERE username = '$_POST[admin_username]' AND password ='$_POST[admin_password]'";
    $result = mysqli_query($mysql, $query);

    if (mysqli_num_rows($result) == 1) {
        ?>
        <script>
        swal('Good Job!', "Admin Login Successfully!", 'success').then((value) => {
            window.location.href = 'index.php';
        })
    </script>
        <?php
        $result_fetch = mysqli_fetch_assoc($result);
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $result_fetch['username'];
        header("location: index.php");
    } 
    else {
        ?>
        <script>
            swal('Good Job!', "Admin Login Failed!", 'error').then((value) => {
                window.location.href = '../index.php';
            })
        </script>
        <?php
    }
}
?>

<?php
if(isset($_POST['student_login']))
{
    $query = "SELECT * FROM `tblstudent` WHERE `stud_email` = '$_POST[student_username]' OR `stud_username` = '$_POST[student_username]'";
    $result = mysqli_query($mysql,$query);

    if($result)
    {
        if(mysqli_num_rows($result) == 1)
        {
            $result_fetch = mysqli_fetch_assoc($result);
            if(password_verify($_POST['student_password'], $result_fetch['stud_password']))
            {
                //echo "right";
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $result_fetch['stud_username'];
                $_SESSION['regno'] = $result_fetch['regno'];
                $_SESSION['name'] = $result_fetch['stud_name'];
                $_SESSION['address'] = $result_fetch['stud_address'];
                $_SESSION['gender'] = $result_fetch['stud_gender'];
                $_SESSION['email'] = $result_fetch['stud_email'];
                $_SESSION['image'] = $result_fetch['stud_image'];
                
                ?>
                <script>
                    swal('Good Job!', "Student Login Successfully!", 'success').then((value) => {
                        window.location.href = '../Student/index.php';
                    })
                </script>
                <?php
            }
            else
            {
                ?>
                <script>
                    swal('Error!', "Student Login Failed!", 'error').then((value) => {
                        window.location.href='../index.php';
                    })
                </script>
                <?php
            
            }
        }
        else
        {

         ?>
         <script>
             swal('Good Job!', "Username and Email are not Registered", 'error').then((value) => {
                 window.location.href='../index.php';
             })
         </script>
         <?php
        }
    }
    else
    {

     ?>
     <script>
         swal('Good Job!', "Cannot Run Query", 'error').then((value) => {
             window.location.href='../index.php';
         })
     </script>
     <?php
    }
}
?>

<?php
if(isset($_POST['faculty_login']))
{
    $query = "SELECT * FROM `tblfaculty` WHERE `fac_email` = '$_POST[fac_username]' OR `fac_username` = '$_POST[fac_username]'";
    $result = mysqli_query($mysql,$query);

    if($result)
    {
        if(mysqli_num_rows($result) == 1)
        {
            $result_fetch = mysqli_fetch_assoc($result);
            if(password_verify($_POST['fac_password'], $result_fetch['fac_password']))
            {
                //echo "right";
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $result_fetch['fac_username'];
                $_SESSION['regno'] = $result_fetch['regno'];
                $_SESSION['name'] = $result_fetch['fac_name'];
                $_SESSION['address'] = $result_fetch['fac_address'];
                $_SESSION['gender'] = $result_fetch['fac_gender'];
                $_SESSION['email'] = $result_fetch['fac_email'];
                $_SESSION['image'] = $result_fetch['fac_image'];
                
                ?>
                <script>
                    swal('Good Job!', "Faculty Login Successfully!", 'success').then((value) => {
                        window.location.href = '../Faculty/index.php';
                    })
                </script>
                <?php
            }
            else
            {
                ?>
                <script>
                    swal('Error!', "Faculty Login Failed!", 'error').then((value) => {
                        window.location.href='../index.php';
                    })
                </script>
                <?php
            
            }
        }
        else
        {

         ?>
         <script>
             swal('Good Job!', "Username and Email are not Registered", 'error').then((value) => {
                 window.location.href='../index.php';
             })
         </script>
         <?php
        }
    }
    else
    {

     ?>
     <script>
         swal('Good Job!', "Cannot Run Query", 'error').then((value) => {
             window.location.href='../index.php';
         })
     </script>
     <?php
    }
}
?>