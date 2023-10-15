<?php
require('sidebar.php');
require("../connect.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>
<style>
    #content {
        margin-left: 250px;
        /* padding: 20px; */
    }
</style>

<body>
<div id="content">
<form method="post">
    <div class="col-sm-4">
        <div class="form-group mt-3">
            <input type="text" class="form-control" placeholder="Enter Faculty Registration Number" name="studDrego" />
            <input type="submit" value="Search by Registration No" class="btn btn-outline-danger mt-3" id="search"
                name="search_by_id">
        </div>

    </div>

</form>
<?php


if (isset($_POST['search_by_id'])) {
    $id = $_POST['studDrego'];
    $query = "SELECT * FROM tblfaculty WHERE regno = '$id'";
    $query_run = mysqli_query($mysql, $query);

    if (mysqli_num_rows($query_run) > 0) {

        foreach ($query_run as $row) {
            ?>
            <div class="col-sm-4 mt-3">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo "uploadf/" . $row['fac_image'] ?>" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row['fac_name'] ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?php echo $row['regno'] ?>
                        </h6>
                        <p class="card-text">Some quick example text to build on the card title and
                            make
                            up the bulk of the card's content.</p>
                        <!-- <a href="#" class="btn btn-outline-warning">Update</a>
                        <a href="#" class="btn btn-outline-danger">Delete</a> -->
                    </div>
                </div>
            </div>
           

            <?php

        }

    } 
    else 
    {
        echo "No Data Available";
    }

    
}
?>
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>




