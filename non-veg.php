<?php
session_start();
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Canteen | Foods</title>
</head>
<body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"  data-target="#myNavbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="index.php">Canteen</a>
                  </div>
                  <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                      <li ><a href="veg.php">Veg</a></li>
                      <li class="active"><a href="non-veg.php">Non-Veg</a></li>
                      <li><a href="bev.php">Beverages</a></li>
                    </ul>
                    <?php
            if(isset($_SESSION['username'])){
              echo '
              <ul class="nav navbar-nav navbar-right">
              <li data-toggle="modal" data-target="#cart"><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
              <li>
              <form action="index.php" method="post">
              <button type="submit" name="logout" style="margin-top:5px;"class="btn btn-danger">Logout</button>
              </form>
              </li>
              </ul>';
          }
          else
          {
            echo '<ul class="nav navbar-nav navbar-right">
              <li data-toggle="modal" data-target="#signUp"><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li data-toggle="modal" data-target="#login"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>';
          }
            ?>
                  </div>
                </div>
            </nav>
            <div class="container text-center" style="margin-top:70px;">
            <div class="rows">
              <?php 
                    $result = mysqli_query($conn,"SELECT * FROM foods where catagory = 'nonveg'");
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                        <form method="post" action="cart.php">
                        <input type="hidden" name="code" value="'.$row['code'].'" />
                    <div class="col-sm-4">
                          <div class="thumbnail">
                                  <img src="'.$row['image'].'" alt="Veg Food" width="400" height="300">
                                  <p><strong>'.$row['name'].'</strong></p>
                                  <p>'.$row['price'].'</p>
                                  <p>'.$row['desp'].'</p>';
                                  if(isset($_SESSION['username']))
                                  echo '<button type="submit" class="btn btn-primary">Add To Cart</button>';
                                  else
                                  echo '<p><strong>Login to Order</strong></p>';
                                  echo'
                                </div>
                    </div>
                    </form>';
                  }
                    ?>
                </div>
                <?php
    include "modal.php";
    ?>
</body>
</html>