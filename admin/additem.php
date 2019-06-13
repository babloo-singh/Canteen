<?php
session_start();
include "../conn.php";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/nstyle.css">
<style>
    .rcontainer {
    position: absolute;
	top: 0px;
    right: 500px;
    margin: 20px;
    max-width: 400px;
    padding: 16px;
    background-color: white;
	opacity:0.7;
}
    </style><title>Admin | Add Foods</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include "ahead.php";
?>
    <div class="bg-img" style="background-image: url('image/rbk.jpg');">
  <form action="additem.php" method="post" class="rcontainer" enctype="multipart/form-data">
    <h1>Add Items</h1>

    <label for="name"><b>Item Name</b></label>
    <input type="text" placeholder="Enter Item Name" name="pname" required>
      
    <label for="price"><b>Price</b></label>
    <input type="number" placeholder="Enter price" name="price" style="width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;"required>

    <label for="desc"><b>Description</b></label>
    <input type="text" placeholder="Enter Description" name="desc" required>
      
    <label for="image"><b>Image</b></label>
    <input type="file"  name="file" required>
    <br/>
      <label for="category"><b>Category</b></label>
      <select name="cat" required>
  <option value="veg">Veg</option>
  <option value="nonveg">Non-Veg</option>
  <option value="bev">Bevrages</option>
     </select>
      <br/>
      <button type="submit" name="add" class="btn">Add</button>
  </form>
</div>
    </body>
    <?php 
if(isset($_POST['add'])){

   $name = $_FILES['file']['name'];
   $target_dir = "../img/";
   $target_file = $target_dir . basename($_FILES['file']['name']);
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   $extensions_arr = array("jpg","jpeg","png","gif");
   if( in_array($imageFileType,$extensions_arr) ){
       $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
       $image = 'data:img/'.$imageFileType.';base64,'.$image_base64;
     
   move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
      
   }
$pname=$_POST['pname'];  
     $price=$_POST['price'];  
     $desc=$_POST['desc'];  
     $cat=$_POST['cat'];  
     $img="img/".$name;
    $query = "insert into foods values(NULL,'$pname','$img','$cat',$price,'$desc')";
    $result=mysqli_query($conn,$query);
     if(!$result)
           echo("Error description: " . mysqli_error($conn));
       else
           echo "<script>alert('Item Added');</script>";
  }

?>
</html>
