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
    if(isset($_POST['btn-del-notes']))
    {
        $id = $_POST['del_id'];
        $notes = $_POST['del_notes'];
        
        $query = "DELETE FROM tblnotes WHERE srno = '$id'";
        $query_run = mysqli_query($mysql, $query);
    
        if ($query_run) {
            unlink("uploadnotes/". $notes);
            ?>
            <script>
                swal('Good Job!', "Deleted Successfully!", 'success').then((value) => {
                    window.location.href = 'viewNotes.php';
                })
            </script>
            <?php
        } else {
            ?>
            <script>
                swal('Error!', "Couldn't", 'error').then((value) => {
                    window.location.href = 'viewNotes.php';
                })
            </script>
            <?php
        }
    
    }
    ?>
</body>
</html>