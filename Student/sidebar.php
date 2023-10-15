<?php
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Sidebar Dashboard</title>
  <style>
    body {
      overflow-x: hidden;
    }

    #sidebar {
      height: 100vh;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      /* background-color: #198754; */
      background-color: #ef5734;
      background-image: linear-gradient(315deg, #ef5734 0%, #ffcc2f 74%);
      border-top-right-radius: 6%;
      border-bottom-right-radius: 6%;
      padding-top: 20px;
    }

    #content {
      margin-left: 250px;
      /* padding: 20px; */
    }

    .nav-link {
      text-decoration: none !important;
      color: #fff;
      padding: 10px 20px 0px 10px;
      transition: background-color 0.3s;
    }

    .nav-link:hover {
      color: #ffcc2f !important;
      background-color: #fff;
    }

   
    .nav-item {
      margin-bottom: 4px;
    }
   
  </style>
</head>

<body>
  <div id="sidebar">
    <ul class="nav flex-column">

      <li class="nav-item">
        <a class="nav-link active text-white" href="index.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="viewNotes.php" >View Notes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="viewProfile.php" >View Profile
        
        </a>
      </li>
    </ul>
  </div>
  <div id="content">
   
  </div>
</body>

</html>