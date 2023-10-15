<?php
require('sidebar.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>viewNotes </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>
<style>
    #content {
        margin-left: 250px;
        /* padding: 20px; */
    }
    .card
            {
                box-shadow: 10px 10px 31px -1px rgba(0,0,0,0.75);
            -webkit-box-shadow: 10px 10px 31px -1px rgba(0,0,0,0.75);
            -moz-box-shadow: 10px 10px 31px -1px rgba(0,0,0,0.75);
            }
</style>

<body>

    <div id="content">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header bg-success ">
                            <h4 class="text-white text-center">NOTES</h4>
                        </div>
                        <div class="card-body">


                            <?php
                            session_start();
                            include("../connect.php");
                            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                            $query = "SELECT * FROM tblnotes WHERE UploadedBy = '$_SESSION[name]'";
                            $query_run = mysqli_query($mysql, $query);
                            ?>

                            <div class="row p-3">
                            <table class="table table-success table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Uploaded By</th>
                                                    <th scope="col">Uploaded On</th>
                                                    <th scope="col">Subject</th>
                                                    <th scope="col">Notes</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php
                                if (mysqli_num_rows($query_run) > 0) {

                                    foreach ($query_run as $row) {
                                        ?>
                                        
                                           
                                                <tr>
                                                    
                                                    <td><?php  echo $row['UploadedBy']?></td>
                                                    <td><?php  echo $row['Uploadedon']?></td>
                                                    <td><?php  echo $row['Subject']?></td>
                                                    <td><?php  echo $row['Notes']?></td>
                                                    <td><?php  echo $row['Type']?></td>
                                                    
                                                    <div class="row">
                                                <div class="col-xs-6">
                                                <form action="delnotesdb.php" method="POST" >
                                                    <input type="hidden" name="del_id" value="<?php echo $row['srno'] ?>">
                                                    <input type="hidden" name="del_notes" value="<?php echo $row['Notes'] ?>">
                                                    <td><input type="submit" class="btn btn-danger" value="Delete" name="btn-del-notes">
                                                    <!-- <span class="badge rounded-pill bg-warning text-dark">Edit</span></td> -->
                                                    <a href="<?php echo "../Faculty/uploadnotes/" . $row['Notes'] ?>" class="btn btn-success"
                                                        download>DOWNLOAD</a></td>
                                                </form>
                                                </div>
                                                <div class="col-xs-6">
                                                <!-- <form action="updatestuddb.php" method="POST" >
                                                         <a href="updateNotes.php?id=<?php //echo $row['srno']; ?>"
                                                             class="btn btn-warning mt-1">Update</a>
                                                </form> -->
                                                </div>
                                                </div>
                                            
                                                </tr>
                                              

                                                
                                        <?php

                                    }

                                }
                            }
                                 else {
                                    ?>

                                    <tr>
                                        <td>No Record Found!</td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                        </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>