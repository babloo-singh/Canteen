<nav class="navbar navbar-inverse" style=" margin-bottom: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Canteen</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="ahomepage.php">Welcome <?php echo $_SESSION['aname']?></a></li>
      <li ><a href="additem.php">Add Items</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Remove Items
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="aproduct.php?cat=veg">Veg Food</a></li>
          <li><a href="aproduct.php?cat=nonveg">Non-Veg Foods</a></li>
          <li><a href="aproduct.php?cat=bev">Bevrages</a></li>
        </ul>
      </li> 
      <li><a href="order.php">Orders</a></li>   
      <li><a href="feedback.php">Feedback</a></li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>