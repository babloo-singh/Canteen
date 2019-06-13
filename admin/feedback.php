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
<title>Home Page | Feedback</title>
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
    <h1>Feedback</h1>
    <table class="table table-stripped">
        <thead>
            <th>Sl No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Comment</th>
        </thead>
        <?php
        $qry="select * from contact";
        $result = mysqli_query($conn,$qry);
        $rows = mysqli_num_rows($result);
        $no=1;
              if($rows>=1){
                while($res=mysqli_fetch_row($result))
                {
                    ?>
          <tr>
              <td><?php echo $no;?></td>
              <td><?php echo $res[1];?></td>
              <td><?php echo $res[2];?></td>
              <td><?php echo $res[3];?></td>
              <?php
                  $no++; 
                  echo"</tr>"; 
                }
            }
        ?>
    </table>
    
    </div>
</body>
</html>