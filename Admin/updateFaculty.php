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
    .card-header
 {
 background-color: #972239;
 background-image: linear-gradient(315deg, #972239 0%, #db6885 74%);
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

        <body>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-dark text-danger text-center">
                                <h5>Update Faculty</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                     <?php
                                     include("../connect.php");
                                     $id = $_GET['id'];
                                     $query = "SELECT * FROM tblfaculty WHERE id ='$id'";
                                     $query_run = mysqli_query($mysql,$query);
                                     if(mysqli_num_rows($query_run) > 0)
                                     {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <form action="updatefacdb.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="fac_id" value="<?php  echo $row['id']; ?>">
                                            <div class="form-group mt-3">
                                                <input type="text" class="form-control" placeholder="Enter Student Name" required
                                                    name="fac_name"  value="<?php  echo $row['fac_name']; ?>"/>
                                                    
                                            </div>
                                            <div class="form-group mt-3">
                                                <input type="phone" class="form-control"
                                                    placeholder="Enter Student Phone" name="fac_phone" required value="<?php  echo $row['fac_phone']; ?>" />
                                            </div>
                                            <div class="form-group mt-3">
                                                <input type="email" class="form-control"
                                                    placeholder="Enter Student Email" name="fac_email" required  value="<?php  echo $row['fac_email']; ?>"/>
                                            </div>
                                            <div class="form-group mt-3">
                                                <textarea name="fac_add"  cols="80" rows="10"
                                                    placeholder="Enter Student Address" required><?php  echo $row['fac_address']; ?></textarea>
                                            </div>

                                            <div class="form-group mt-3">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Username" name="fac_username" required  value="<?php  echo $row['fac_username']; ?>" />
                                            </div>
                                            
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="fac_gender"
                                                    id="flexRadioDefault1"  value="<?php  echo $row['fac_gender']; ?>">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="fac_gender"
                                                    id="flexRadioDefault2"  value="<?php  echo $row['fac_gender']; ?>" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Female
                                                </label>
                                            </div>
                                            <div class="form-group mt-3">
                                                <input type="file" name="fac_images" id="upload_image"
                                                    class="form-control"
                                                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                                    <input type="hidden" name="fac_image_old" value="<?php  echo $row['fac_image']; ?>">   
                                            </div>
                                            
                                            <div class="form-group mt-3">
                                                <input type="submit" value="Update" class="btn btn-danger text-white"
                                                    name="update_fac_image">
                                            </div>
                                        </form>
                                            <?php
                                        }
                                     }
                                     ?>
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            style="border:1px solid black; height:150px; width:150px; background:#F5FAFF;">
                                            <!-- <img id="output" width="150" height="150"> -->
                                            <img src="<?php echo "uploadf/" . $row['fac_image'] ?>" alt="" width ="150" height="150">
                                        </div>
                                    </div>

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
</div>