<?php
require('sidebar.php');
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
    #content {
        margin-left: 250px;
        /* padding: 20px; */
    }
    .card-header
    {
        background-color: #63a91f;
        background-image: linear-gradient(314deg, #63a91f 0%, #198754 74%);
    }
</style>

<body>

    <div id="content">

        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Bootstrap demo</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
                crossorigin="anonymous">
        </head>
        <style>
            .card
            {
                box-shadow: 10px 10px 31px -1px rgba(0,0,0,0.75);
            -webkit-box-shadow: 10px 10px 31px -1px rgba(0,0,0,0.75);
            -moz-box-shadow: 10px 10px 31px -1px rgba(0,0,0,0.75);
            }
        </style>

        <body>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-dark text-success text-center">
                                <h5 class="text-white">Notes Management</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                    <?php
                                     include("../connect.php");
                                     $id = $_GET['id'];
                                     $query = "SELECT * FROM tblnotes WHERE srno ='$id'";
                                     $query_run = mysqli_query($mysql,$query);
                                     if(mysqli_num_rows($query_run) > 0)
                                     {
                                        foreach($query_run as $rows)
                                        {
                                            ?>

                                        <form action="updatenotesdb.php" method="POST" enctype="multipart/form-data">

                                            <div class="form-group mt-3">
                                                <?php
                                                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) 
                                                    {
                                                        echo"<input type='text' name='uploadby' class ='form-control' value = '$_SESSION[name]'>";
                                                    } 
                                                ?>
                                            </div> 
                                            
                                            
                                            <div class="form-group mt-3">
                                            <select class="form-select " aria-label="Default select example" name="subject">
                                            <option selected disabled>Select Subject</option>

                                                <?php
                                                include("../connect.php");
                                                $query = "SELECT * FROM tblsubject";
                                                $query_run = mysqli_query($mysql, $query);

                                                if (mysqli_num_rows($query_run) > 0) {

                                                    foreach ($query_run as $row) {
                                                            echo"<option value='$row[subjectname]'>$row[subjectname]</option>";   
                                                    }
                                                }
                                                ?>
                                                <select>
                                            </div>

                                            <div class="form-group mt-3">
                                                <input type="file" class="form-control" name="notes" />
                                            </div>
                                            
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group mt-3">

                                            <select class="form-select" aria-label="Default select example"
                                                name="filetype" required>
                                                <option selected disabled>Select File-Type</option>
                                                <option value="docx">Docx</option>
                                                <option value="pdf">Pdf</option>
                                                <select>
                                        </div>
                                        <div class="form-group mt-3">
                                       
                                            <textarea name="desci" cols="20" rows="4"
                                                placeholder="Enter Note Desciption" class="form-control" required><?php echo $rows['Notes']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="submit" value="Update Notes" class="btn btn-success text-white"
                                            name="upnotes">
                                    </div>
                                    </form>
                                </div>
                                
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- <script>
        $(function () {
            $('#datepicker').datepicker();
        });
    </script> -->
</body>

</html>
</div>