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
                                            Add Subject
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="addsubjectdb.php" method="POST"
                                                        enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <div class="form-group mt-3">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Subject Name" name="subject" required/>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <input type="submit" value="Add Subject"
                                                                class="btn btn-danger text-white" name="addsubject">
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>



                                        <?php
                            include("../connect.php");
                            $query = "SELECT * FROM tblsubject";
                            $query_run = mysqli_query($mysql, $query);
                            ?>

                            <div class="row mt-3">
                            <table class="table table-danger table-striped" >
                                            <thead>
                                                <tr>
                                                    <th scope="col">id</th>
                                                    <th scope="col">Subject Name</th>
                                                    <th scope="col">Action</th>
                                                    <!-- <th scope="col">Delete</th> -->
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php
                                if (mysqli_num_rows($query_run) > 0) {

                                    foreach ($query_run as $row) {
                                        ?>
                                                <tr>
                                                
                                                    <td><?php  echo $row['id']?></td>
                                                    <td><?php  echo $row['subjectname']?></td>
                                                <div class="row">
                                                <div class="col-xs-6">
                                                <form action="addsubjectdb.php" method="POST" >
                                                    <input type="hidden" name="del_id" value="<?php echo $row['id'] ?>">
                                                    <input type="hidden" name="del_sub" value="<?php echo $row['subjectname'] ?>">
                                                    <td><span><input type="submit" class="btn btn-danger" value="Delete" name="btn-del-sub"></span>
                                                    <!-- <span class="badge rounded-pill bg-warning text-dark">Edit</span></td> -->
                                                </form>
                                                </div>
                                                <div class="col-xs-6">
                                                <form action="updatestuddb.php" method="POST" >
                                                         <a href="updateSubject.php?id=<?php echo $row['id']; ?>"
                                                             class="btn btn-warning mt-1">Update</a>
                                                </form>
                                                </div>
                                                </div>
                                            
                                                
                                            
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