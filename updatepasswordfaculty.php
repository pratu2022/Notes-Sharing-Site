<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>
    .card
    {
        box-shadow: 10px 10px 62px 0px rgba(0,0,0,0.75);
-webkit-box-shadow: 10px 10px 62px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 62px 0px rgba(0,0,0,0.75);
    }
</style>
<body class="bg-success">
    <?php
    require("connect.php");
    if (isset($_GET['faculty_email']) && isset($_GET['reset_token'])) 
    {
        date_default_timezone_set('Asia/kolkata');
        $date = date("Y-m-d");
        $query = "SELECT * from `tblfaculty` WHERE `fac_email` = '$_GET[faculty_email]' AND `resettoken` = '$_GET[reset_token]' AND `resettokenexpire` = '$date'";
        $result = mysqli_query($mysql, $query);

        if ($result)
        {
            if(mysqli_num_rows($result) == 1)
            {
                echo"
                <div class='container mt-5' style='position:absolute;
                top:15%;
                left:40%
                '>
                <div class='card' style='width: 23rem'>
                <div class='card-body'>
                <form  method='POST'>
                <h3 class = 'text-success p-2'>Create New Password</h3>
                <input type='password' class='form-control'  placeholder='Enter New Password'
                name='password'>
                <input type='password' class='mt-3 form-control'  placeholder='Confirm Password'
                name='cpassword'> 
                <input type='submit' value='UPDATE' name = 'updatepassword' class='btn btn-success text-white mt-3'>
                <input type='hidden' name='email' value='$_GET[faculty_email]'>
            </form>
            </div>
            </div>
            </div>" ;
            }
            else
            {
                echo "
                <script>
                    alert('Expired Link');
                    window.location.href='index.php';
                </script>
            ";
            }

        } 
        else {
                echo "
                <script>
                    alert('Cannot Run Query');
                    window.location.href='index.php';
                </script>
            ";

        }

    }
    ?>

    <?php
    if(isset($_POST['updatepassword']))
    {
        if($_POST['password'] == $_POST['cpassword'])
        {
            $pass = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $update = "UPDATE `tblfaculty` SET `fac_password`='$pass',`resettoken`= NULL,`resettokenexpire`= NULL WHERE `fac_email` = '$_POST[email]'";

        if(mysqli_query($mysql,$update) )
        {
        //     echo "
        //     <script>
        //         alert('Password Changed!');
        //         window.location.href='index.php';
        //     </script>
        // ";
        ?>
        <script>
             swal('Good Job!', "Password Changed!", 'success').then((value) => {
                    window.location.href = 'index.php';
                })
        </script>
        <?php
        }
        else
        {
        //     echo "
        //     <script>
        //         alert('Cannot Run Query');
        //         window.location.href='index.php';
        //     </script>
        // ";
        ?>
        <script>
             swal('Error!', "Cannot Run Query", 'error').then((value) => {
                    window.location.href = 'index.php';
                })
        </script>
        <?php
        }
        }
        else
        {
        //     echo "
        //     <script>
        //         alert('password and confirm password must be same!');
        //         window.location.href='index.php';
        //     </script>
        // ";
        ?>
        <script>
             swal('Error!', "Password And Confirm Password must be Same", 'error').then((value) => {
                    window.location.href = 'index.php';
                })
        </script>
        <?php
        }
        
    }
    ?>
</body>
</html>