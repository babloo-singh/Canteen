<?php
session_start();
include "../conn.php";
?>
<!DOCTYPE html>
<html>
<head>
<style>
body, html {
    height: 100%;
}

.parallax { 
    /* The image used */
    background-image: url("image/bk1.jpg");

    /* Full height */
    height: 100%; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

</style>
<title>Home Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include "ahead.php";
?>
<div class="parallax">
<br>
    <h1>Gaurav</h1>
    
    
    </div>
</body>
</html>