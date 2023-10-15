<?php
require('sidebar.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add Faculity</title>
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
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-danger">
                            <h4 class="text-white text-center">RESGISTRATION FOR FACULTY</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="addfacdb.php" method="POST" enctype="multipart/form-data">
                                           
                                            <div class="form-group mt-3">
                                                <input type="text" class="form-control" placeholder="Enter Faculty Name"
                                                    name="fac_name" required/>
                                            </div>
                                            <div class="form-group mt-3">
                                                <input type="phone" class="form-control"
                                                    placeholder="Enter Faculty Phone" name="fac_phone" required />
                                            </div>
                                            <div class="form-group mt-3">
                                                <input type="email" class="form-control"
                                                    placeholder="Enter Faculty Email" name="fac_email" required />
                                            </div>
                                            <div class="form-group mt-3">
                                                <textarea name="fac_add" id="" cols="80" rows="10"
                                                    placeholder="Enter Faulty Address" required></textarea>
                                            </div>

                                            <div class="form-group mt-3">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Faculty Username" name="fac_username"required />
                                            </div>

                                            <div class="form-group mt-3">
                                                <input type="password" class="form-control"
                                                    placeholder="Enter Faculty Password" name="fac_password" required />
                                            </div>
                                            
                                            
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="fac_gender"
                                                    id="flexRadioDefault1" value = "Male">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="fac_gender"
                                                    id="flexRadioDefault2" value = "Female" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Female
                                                </label>
                                            </div>
                                            <div class="form-group mt-3">
                                                <input type="file" name="fac_image" id="upload_image" required
                                                    class="form-control"
                                                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            
                                            <div class="form-group mt-3">
                                                <input type="submit" value="Submit" class="btn btn-danger text-white"
                                                    name="save_fac_image">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            style="border:1px solid black; height:150px; width:150px; background:#F5FAFF;">
                                            <img id="output" width="150" height="150">
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