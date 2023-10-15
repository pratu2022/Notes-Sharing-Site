<?php
require('sidebar.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
</style>

<body>

    <div id="content">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header bg-warning ">
                            <h4 class="text-white text-center">ALL NOTES</h4>
                        </div>
                        <div class="card-body">


                            <?php
                            include("../connect.php");
                            $query = "SELECT * FROM tblnotes";
                            $query_run = mysqli_query($mysql, $query);
                            ?>

                            <div class="row">
                            <table class="table table-warning table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Uploaded By</th>
                                                    <th scope="col">Uploaded On</th>
                                                    <th scope="col">Subject</th>
                                                    <th scope="col">Notes</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Download</th>
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
                                                    <td><a href="<?php echo "../Faculty/uploadnotes/" . $row['Notes'] ?>" class="btn btn-success"
                                                        download>DOWNLOAD</a></td>
                                                </tr>
                                              

                                        <?php

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