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
$uploadby = $_POST['uploadby'];
$subject = $_POST['subject'];
$filetype = $_POST['filetype'];
$desci = $_POST['desci'];
date_default_timezone_set('Asia/kolkata');
$date = date("Y-m-d");

$notes = $_FILES['notes']['name'];

$allowed_extension = array('pdf', 'docx');
$filename = $_FILES['notes']['name'];
$file_extension = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($file_extension,$allowed_extension))
{
    ?>
        
    <script>
        swal('Error!', "You are allowed only Pdf,Docx Only", 'error').then((value) => {
            window.location.href = 'addNotes.php';
        })
    </script>
    <?php
}
else
{
    if (file_exists("uploadnotes/" . $_FILES['notes']['name'])) {
        $filename = $_FILES['notes']['name'];
        ?>
        <script>
            swal('Error!', "Already Notes are added!" .$filename, 'error').then((value) => {
                window.location.href = 'addNotes.php';
            })
        </script>
        <?php
    }
    else
    {
        $query = "INSERT INTO `tblnotes`(`srno`, `UploadedBy`, `Uploadedon`, `Subject`, `Notes`, `Type`, `Description`) VALUES (null,'$uploadby','$date','$subject','$notes','$filetype','$desci')";
        $query_run = mysqli_query($mysql,$query);

            if($query_run)
            {
                move_uploaded_file($_FILES["notes"]["tmp_name"],"uploadnotes/".$notes);
                
                ?>
                 <script>
                    swal('Good Job!', "Notes Successfully Uploaded!!", 'success').then((value) => {
                        window.location.href = 'viewNotes.php';
                    });
                </script>
                <?php
            }

    }
}



?>
</body>
</html>