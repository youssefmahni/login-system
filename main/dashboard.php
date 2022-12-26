<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
</head>
<body>

<div class="header">

  <div class="inner-header flex">
  <?php
    if (isset($_SESSION["username"])) {
      echo "<h1>" . $_SESSION["username"] . "<br> welcome to Dashboard</h1>";
    }
    else{
      echo "<h1>no user connected</h1>";
    }
  ?>
  </div>
    
  <div>
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
    viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
    <defs>
    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
    </defs>
    <g class="parallax">
    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
    </g>
    </svg>
  </div>
    
</div>
    
<div class="content flex">
  <a 
  class="logout" 
  href="../includes/logout.inc.php"
  style="text-decoration: none;color: #fff;font-size: 30px;background-color: #243b55;border-radius: 20px;padding: 10px;">
  Log out</a>
</div>
</body>
</html>