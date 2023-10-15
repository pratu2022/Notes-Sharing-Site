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
require("../connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendMail($student_email,$reset_token)
{
    require('../PHPMailer/PHPMailer.php');
    require('../PHPMailer/SMTP.php');
    require('../PHPMailer/Exception.php');

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'bendrepratiksha747@gmail.com';                     //SMTP username
        $mail->Password   = 'rfjnrbnlbtttqwiv';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('bendrepratiksha747@gmail.com', 'Bendre Pratiksha');
        $mail->addAddress($student_email);     //Add a recipient
       
    
        
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset Link From NoteSwap';
        $mail->Body    = "We got request from you to reset your password! <br> Click the link below: <br>
        <a href = 'http://localhost:8080/NoteSwap/Student/updatechangepassword.php?student_email=$student_email&reset_token=$reset_token'>Change Password</a>";
        
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        return true;

        } catch (Exception $e) {
            return false;
        }

}

if(isset($_POST['stud-send-reset-link']))
{
    $query = "SELECT * FROM tblstudent WHERE `stud_email` = '$_POST[student_email]'";
    $result = mysqli_query($mysql,$query);

    if($result)
    {
        if(mysqli_num_rows($result) == 1)
        {
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/kolkata');
            $date = date("Y-m-d");
            $query = "UPDATE `tblstudent` SET `resettoken` = '$reset_token', `resettokenexpire` ='$date' WHERE `stud_email` = '$_POST[student_email]'";

            if(mysqli_query($mysql,$query) && sendMail($_POST['student_email'], $reset_token))
            {
                ?>
                <script>
                    // alert("Password Sent Link Sended");
                    // window.location.href = 'index.php';
                    swal('Good Job!', "Password Sent Link Sended", 'success').then((value) => {
                    window.location.href = 'index.php';
                })
                </script>
                <?php
            }
            else
            {
                ?>
                <script>
                    // alert("Server Down");
                    // window.location.href = 'index.php';
                    swal('Error!', "Server Down", 'error').then((value) => {
                    window.location.href = 'index.php';
                })
                </script>
                <?php
            }
            
        }
        else
        {
            ?>
            <script>
                // alert("Invalid email enter");
                // window.location.href = 'index.php';
                swal('Error!', "Invalid email enter", 'error').then((value) => {
                    window.location.href = 'index.php';
                })
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            // alert("connot run query");
            // window.location.href = 'index.php';
            swal('Error!', "Invalid email enter", 'error').then((value) => {
                    window.location.href = 'index.php';
                })
        </script>
        <?php
    }
}
?>
</body>
</html>