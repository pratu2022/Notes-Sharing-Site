<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
      background-color: #63a91f;
      background-image: linear-gradient(314deg, #63a91f 0%, #198754 74%);
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
      color: #198754 !important;
      background-color: #fff;
    }

    

    .nav-item {
      margin-bottom: 4px;
    }
  </style>
</head>

<body>
  <div id="sidebar" data-aos="fade-right">
    <ul class="nav flex-column">

      <li class="nav-item">
        <a class="nav-link active text-white" href="index.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="addnotes.php">Add Notes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="viewNotes.php">View Notes</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link text-white" href="viewStudF.php">Search Student By Registration Number</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="viewProfile.php">View Profile</a>
      </li>
      
    </ul>
  </div>
  <div id="content">
   
  </div>
</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
</script>
</html>