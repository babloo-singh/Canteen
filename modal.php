
<!-- Modal -->
<div class="modal fade" id="signUp" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">×</button>
              <h4><span class="glyphicon glyphicon-lock"></span> Sign Up</h4>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="index.php">
                <div class="form-group">
                  <label for="Name"><span class="glyphicon glyphicon-user"></span> Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="email"><span class="glyphicon glyphicon-user"></span> Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="phone"><span class="glyphicon glyphicon-user"></span> Phone</label>
                  <input type="tel" class="form-control" name="phone" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                        <label for="clgid"><span class="glyphicon glyphicon-user"></span> College ID</label>
                        <input type="text" class="form-control" name="sid" placeholder="Enter ID">
                      </div>
                <div class="form-group">
                        <label for="course"><span class="glyphicon glyphicon-user"></span> Course</label>
                        <input type="text" class="form-control" name="course" placeholder="Enter course">
                      </div>
                      <div class="form-group">
                            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Password</label>
                            <input type="password" class="form-control" name="pass" placeholder="Enter password">
                          </div>
                  <button type="submit" name="signup" class="btn btn-block">Sign Up 
                    <span class="glyphicon glyphicon-ok"></span>
                  </button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                <span class="glyphicon glyphicon-remove"></span> Cancel
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal -->
  <div class="modal fade" id="login" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <form role="form" method="post" action="index.php">
                <div class="form-group">
                  <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                  <input type="text" class="form-control" id="usrname" name="user" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                  <input type="password" class="form-control" id="psw" name="passw" placeholder="Enter password">
                </div>
                  <button type="submit" name="login" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-default pull-left"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
          </div>
          
        </div>
      </div> 
    </div>





    <!-- Modal -->
  <div class="modal fade" id="cart" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4><span class="glyphicon glyphicon-lock"></span> My Cart</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
            <div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $key=>$food){
?>
<tr>
<td>
<img src='<?php echo $food["image"]; ?>' width="50" height="40" />
</td>
<td><?php echo $food["name"]; ?><br />
<form method='post' action='cart.php'>
<input type='hidden' name='rmcode' value="<?php echo $food["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='btn btn-warning'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action='cart.php'>
<input type='hidden' name='qcode' value="<?php echo $food["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option value="1" <?php if($_SESSION["shopping_cart"][$key]['quantity']==1) echo " selected"; else echo "";?>>1</option>
<option value="2" <?php if($_SESSION["shopping_cart"][$key]['quantity']==2) echo " selected"; else echo "";?>>2</option>
<option value="3" <?php if($_SESSION["shopping_cart"][$key]['quantity']==3) echo " selected"; else echo "";?>>3</option>
<option value="4" <?php if($_SESSION["shopping_cart"][$key]['quantity']==4) echo " selected"; else echo "";?>>4</option>
<option value="5" <?php if($_SESSION["shopping_cart"][$key]['quantity']==5) echo " selected"; else echo "";?>>5</option>

</select>
</form>
</td>
<td><?php echo "Rs. ".$food["price"]; ?></td>
<td><?php echo "Rs. ".$food["price"]*$food["quantity"]; ?></td>
</tr>
<?php
$total_price += ($food["price"]*$food["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "Rs. ".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>
<form method='post' action='payment.php'>
<input type='hidden' name='code' value="<?php echo $total_price; ?>" />
<button type='submit' class='btn btn-primary'>Check Out</button>
</form>	
<form method='post' action='cart.php'>
<input type='hidden' name='clear' />
<button type='submit' class='btn btn-danger'>Clear All</button>
</form>
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-default pull-left"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
          </div>
          
        </div>
      </div> 
    </div>



    <?php

if (isset($_POST["login"])) {
  $user=$_POST['user'];
  $pass=$_POST['passw'];
  $qry="select * from user where email='$user' and password='$pass'";
  $result = mysqli_query($conn,$qry);
  $rows = mysqli_num_rows($result);
        if($rows>=1){
          while($res=mysqli_fetch_row($result))
          {
            $_SESSION['phone']=$res[2];
            $_SESSION['email']=$res[1];
          }
  $_SESSION['username']=$user;
  echo "<script>window.location.href='index.php';</script>";
        }
        else{
          echo "<script>alert('Invalid Email or Password');</script>";
        }
}
if (isset($_POST["signup"])) {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $sid=$_POST['sid'];
  $course=$_POST['course'];
  $pass=$_POST['pass'];
  $qry="insert into user values('$name','$email','$phone','$sid','$course','$pass')";
  $result = mysqli_query($conn,$qry);
if($result)
echo "<script>alert('Registration Successful..Login to  Continue');</script>";
}
if (isset($_POST["logout"])) {
    unset($_SESSION['username']);
    session_destroy(); //destroy the session
    echo "<script>window.location.href='index.php';</script>";
}
?>