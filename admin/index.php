<?php
session_start();
include "../conn.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>My Canteen | Admin</title>

<style>

</style>
</head>
<body style="background-image: url('../img/abk.jpg');">
	<div class="container" >
  <form action="index.php" method="post" class="form">
    <h1>Admin Login</h1>

    <label  for="email"><b>Admin Username</b></label>
    <input type="text" placeholder="Enter Email" name="username" class="form-control"required>

    <label for="psw"><b>Password</b></label>
    <input class="form-control"type="password" placeholder="Enter Password" name="password" required>
<br>
    <button style="align:center;" type="submit" name="login" class="btn btn-primary">Login</button>
        
  </form>
</div>
	<?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				$query = "select * from admin where admin='$username' and password='$password'";
				//echo $query;
				$query_run = mysqli_query($conn,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					$_SESSION['aname'] = $row['admin'];
					header( "Location: ahomepage.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
		
	
</body>
</html>