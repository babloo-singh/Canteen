<?php
session_start();
include "../conn.php";
$cat=$_GET['cat'];
?>

<html>
    <head>
    <title>Admin - <?php echo $cat; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <style>
    .card {
    width: 250px;
        height:300px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    float: left;
    text-align: center;
        margin-right: 30px;
        margin-bottom:30px;
}

.title {
    color: grey;
    font-size: 18px;
}

button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
}

a {
    text-decoration: none;
    
    color: black;
}

button:hover, a:hover {
    opacity: 0.7;
}
body, html {
height:100%;
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
    </head>
    <body>
    <?php
include "ahead.php";
$query="select * from foods where catagory='".$cat."'";
        $query_run = mysqli_query($conn,$query);
          if($query_run){
              if(mysqli_num_rows($query_run)>0)
					{
                      while($row = $query_run->fetch_assoc()){
          
        ?> 
 <div id="featured" class="card">
     <div style="height:95%;">
         <div style="height:50%">
  <img src="../<?php echo $row['image']; ?>" alt="Product" style="width:100%;">
         </div>
         <div style="height:50%">
  <h1><?php echo $row['name'];?></h1>
  <p class="title">Desc:<?php echo $row['desp'];?> </p>
  <p class="title">Price:<?php echo $row['price'];?> </p> 
         </div>
     </div>
         <div style="height:5%;">
<a href="aadd.php?action=add&pid=<?php echo $row['code'];?>" class="btn btn-danger">Remove</a>
     </div>   
     </div>
        <?php
              }
          }
              else
                  echo "<h1>No Products!!! Add Items</h1>";
          }
          ?>
    </body>
        </html>