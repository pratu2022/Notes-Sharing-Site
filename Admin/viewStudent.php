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
    
 .card-header
 {
 background-color: #972239;
 background-image: linear-gradient(315deg, #972239 0%, #db6885 74%);
 }
        
</style>

<body>

    <div id="content">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header bg-danger ">
                            <h4 class="text-white text-center">STUDENTS</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            include("../connect.php");
                            $query = "SELECT * FROM tblstudent";
                            $query_run = mysqli_query($mysql, $query);
                            ?>

                            <div class="row gap-3">
                                <?php
                                if (mysqli_num_rows($query_run) > 0) {

                                    foreach ($query_run as $row) {
                                        ?>
                                        
                                            <div class="card" style="width: 18rem;">
                                                <img src="<?php echo "uploads/" . $row['stud_image'] ?>" class="card-img-top"
                                                    alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <?php echo $row['stud_name'] ?>
                                                    </h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        <?php echo $row['regno'] ?>
                                                    </h6>
                                                    <p class="card-text">
                                                    Email:<?php echo $row['stud_email'] ?>
                                                    <br>
                                                    Gender:<?php echo $row['stud_gender'] ?>
                                                    <br>
                                                    Address:
                                                    <?php echo $row['stud_address'] ?>
                                                    </p>

                                                        <div class="card-footer">
                                                   <div class="row">
                                                    <div class="col-sm-6">
                                                        <form action="updatestuddb.php" method="POST" >
                                                         <a href="updateStudent.php?id=<?php echo $row['id']; ?>"
                                                             class="btn btn-outline-warning ">Update</a>
                                                         </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="addstuddb.php" method="POST" >
                                                            <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                                                            <input type="hidden" name="del_stud_image"
                                                                value="<?php echo $row['stud_image'] ?>">
                                                            <input type="submit" value="Delete"
                                                                    class="btn btn-outline-danger" name="delete_stud_image">
                                                            
                                                        <form>
                                                    </div>
                                                   </div>
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <?php

                                    }

                                } else {
                                    ?>

                                    <tr>
                                        <td>No Record Found!</td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                <!-- </tbody>
                        </table> -->

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