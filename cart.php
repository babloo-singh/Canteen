<?php
session_start();
include('conn.php');
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$conn,
"SELECT * FROM `foods` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
 
$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);
 $found=false;
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
}else{
    // $array_key = array_keys($_SESSION["shopping_cart"]);
    // echo "<script>alert('$array_key');</script>";in_array($code,$array_key)

foreach($_SESSION["shopping_cart"] as $a=>$b)
if($b['code']==$code){
echo "<script>alert('Product is already added to your cart!');</script>";
$found=true;
break;
} 
if(!$found)
$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
    // if(array_key_exists($code,$_SESSION["shopping_cart"])) {
	// echo "<script>alert('Product is already added to your cart!');</script>";	
    // } else {
    // $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	// }
 
	}
}
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["rmcode"] == $value['code']){
      unset($_SESSION["shopping_cart"][$key]);
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
}
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as  $key =>$value){
    if($value['code'] == $_POST["qcode"]){
        $_SESSION["shopping_cart"][$key]['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
      }
      if(isset($_POST['clear']))
unset($_SESSION["shopping_cart"]);

echo"<script>window.history.go(-1);</script>";

?>
