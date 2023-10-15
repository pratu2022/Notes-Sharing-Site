<?php
session_start();
require("sidebar.php");
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <title>Hello, index</title>
</head>
<style>
  #content {
    margin-left: 250px;
    padding: 15px;
  }

  .card {
    background-color: #972239;
    background-image: linear-gradient(315deg, #972239 0%, #db6885 74%);
    box-shadow: 10px 10px 31px -1px rgba(0,0,0,0.75);
    -webkit-box-shadow: 10px 10px 31px -1px rgba(0,0,0,0.75);
    -moz-box-shadow: 10px 10px 31px -1px rgba(0,0,0,0.75);
  }
</style>

<body>

  <div id="content">
    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
      echo "
            <div style = 'display: flex;justify-content: right;'>
             <a href='logout.php' class='btn btn-danger text-white mr-5 mb-3'> $_SESSION[username] - Logout</a>
            </div>";
    }
    ?>
    <div class="container ">

      <!-- 1st -->
      <div class="row">
        <div class="col-sm-4">
          <div class="card text-white" style="width: 18rem;" data-aos="fade-down" data-aos-easing="linear"
            data-aos-duration="1500">
            <div class="card-body ">
              <h5 class="card-title">Faculty</h5>
              <h2>Total Faculty</h2>
              <?php

              require("../connect.php");
              $qs = "SELECT id FROM tblfaculty ORDER BY id";
              $ttlfac = mysqli_query($mysql, $qs);

              $rows = mysqli_num_rows($ttlfac);
              echo $rows;

              ?>
              <!-- <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a> -->
            </div>
          </div>
        </div>
        <!-- 2nd -->
        <div class="col-sm-4">
          <div class="card bg-danger text-white" style="width: 18rem;" data-aos="fade-down" data-aos-easing="linear"
            data-aos-duration="1500">
            <div class="card-body">
              <h5 class="card-title">Student</h5>
              <h2>Total Student</h2>
              <h5>
                <?php
                require("../connect.php");
                $qs = "SELECT regno FROM tblstudent ORDER BY regno";
                $ttlstud = mysqli_query($mysql, $qs);

                $rows = mysqli_num_rows($ttlstud);
                echo $rows
                  ?>
              </h5>
              <!-- <a href="#" class="card-link">Card link</a> -->
              <!-- <a href="#" class="card-link">Another link</a> -->
            </div>
          </div>
        </div>
        <!-- 3rd -->
        <div class="col-sm-4">
          <div class="card bg-danger text-white" style="width: 18rem;" data-aos="fade-down" data-aos-easing="linear"
            data-aos-duration="1500">
            <div class="card-body">
              <h5 class="card-title">Admin</h5>
              <h2>Total Admin</h2>
              <h5>
                <?php

                require("../connect.php");
                $qs = "SELECT id FROM tbladmin ORDER BY id";
                $ttladmin = mysqli_query($mysql, $qs);

                $rows = mysqli_num_rows($ttladmin);
                echo $rows;

                ?>
              </h5>
              <!-- <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</html>