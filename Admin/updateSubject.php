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
</head>
<style>
    #content {
        margin-left: 250px;
        /* padding: 20px; */
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
        
            .card-header
            {
                background-color: #972239;
                background-image: linear-gradient(315deg, #972239 0%, #db6885 74%);
            }
        
        </style>

        <body>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-white text-center">
                                <h5>Subject Management</h5>
                            </div>
                            <div class="card-body">
                                <div class="row p-5">
                                    <div class="col-md-12">

                                        <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Update Subject
                                        </button>
                                        <?php
                                     include("../connect.php");
                                     $id = $_GET['id'];
                                     $query = "SELECT * FROM tblsubject WHERE id ='$id'";
                                     $query_run = mysqli_query($mysql,$query);
                                     if(mysqli_num_rows($query_run) > 0)
                                     {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Subject</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="addsubjectdb.php" method="POST"
                                                        enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                        <input type="hidden" name="sub_id" value="<?php  echo $row['id']; ?>">
                                                            <div class="form-group mt-3">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Subject Name" name="sub_name" value="<?php  echo $row['subjectname']; ?>" required/>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <input type="submit" value="Update Subject"
                                                                class="btn btn-danger text-white" name="upsubject">
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
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