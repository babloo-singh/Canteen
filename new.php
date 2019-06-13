<?php
 error_reporting(0);
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
    <title>My Canteen | Welcome</title>
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
            <a class="navbar-brand" href="#">Canteen</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="foods.php">Foods</a></li>
              <li><a href="#contact">Contact Us</a></li>
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
          <div class="parallax">
              <div class="container text-center">
                  <div class="header">
                <h1 >My Canteen</h1>
                <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum aut provident, consequuntur pariatur nesciunt rerum?</p>
            </div>
        </div>
            </div>
            <div id="band" class="container text-center">
                    <h3>OUR FOODS</h3>
                    <p><em>We love food!</em></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <br>
                    <div class="row">
                      <div class="col-sm-4">
                        <p class="text-center"><strong>Vegetarian</strong></p><br>
                        <a href="#demo" >
                          <img src="./img/veg.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
                        </a>
                        <div id="demo" >
                          <p>about veg</p>
                          <p>about veg</p>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <p class="text-center"><strong>Non-Vegetarian</strong></p><br>
                        <a href="#demo2" >
                          <img src="./img/non-veg.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
                        </a>
                        <div id="demo2" >
                          <p>about non-veg</p>
                          <p>about non-veg</p>
                          
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <p class="text-center"><strong>Beverages</strong></p><br>
                        <a href="#demo3" >
                          <img src="./img/bev.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
                        </a>
                        <div id="demo3" >
                          <p>about beverages</p>
                          <p>about beverages</p>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  
                      <div class="container-fluid text-center">
                      <h1>Foods Available NOW!!!</h1>
                      <div class="rows">
                          

                      <?php 
                    $result = mysqli_query($conn,"SELECT * FROM foods ORDER BY RAND() LIMIT 3");
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                        
                    <div class="col-sm-4">
                          <div class="thumbnail">
                          <form method="post" action="cart.php">
                        <input type="hidden" name="code" value="'.$row['code'].'" />
                                  <img src="'.$row['image'].'" alt="'.$row['catagory'].'" width="400" height="300">
                                  <p><strong>'.$row['name'].'</strong></p>
                                  <p>'.$row['price'].'</p>
                                  <p>'.$row['desp'].'</p>';
                                  if(isset($_SESSION['username']))
                                  echo '<button type="submit" class="btn">Add To Cart</button>';
                                  else
                                  echo '<p><strong>Login to Order</strong></p>
                                  </form>
                                </div>
                    </div>
                    ';
                  }
                    ?>




                    </div>

                  
                  <div class="container" id="contact">
                        <h2 class="text-center">CONTACT</h2>
                        <div class="row">
                          <div class="col-sm-5">
                            <p>Contact us and we'll get back to you within 24 hours.</p>
                            <p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
                            <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
                            <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
                          </div>
                          <div class="col-sm-7 slideanim">
                            <div class="row">
                              <div class="col-sm-6 form-group">
                                <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                              </div>
                              <div class="col-sm-6 form-group">
                                <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                              </div>
                            </div>
                            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                            <div class="row">
                              <div class="col-sm-12 form-group">
                                <button class="btn btn-default pull-right" type="submit">Send</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  <footer class="foot text-center">&copy; Copyright</footer>
    <?php
    include "modal.php";
    if(isset($_POST["submit1"])){
    $name=$_POST['name1'];
    $email=$_POST['email1'];
    $comments=$_POST['comments'];
    $qry="INSERT INTO contact VALUES(null,'$name','$email','$comments')";
    $result = mysqli_query($conn,$qry);
    if($result)
      echo "<script>alert('You will be contacted thru mail, regrading your feedback');</script>";
      }
    ?>
</body>
</html>