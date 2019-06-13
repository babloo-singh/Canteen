<?php
session_start();
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Payment</title>
</head>
<body>
    <?php		
    $name=""; 
    $amount=0;
    if(isset($_SESSION["shopping_cart"])){
foreach ($_SESSION["shopping_cart"] as $food){
$item=$food["name"];
//echo"$item";
$quantity=$food["quantity"];
$name=$name.$item." (".$quantity.")";

$amount=$amount+($food["price"]*$quantity);
}
//echo "$name $amount";
echo"<div class='jumbotron'><h1>Canteen</h1></div>";
echo"<h2 style='color:red;'>Go Back to change your order, once paid the money won't be refunded   </h2>";
echo"<form method='post' action='payment.php'><input type='hidden' name='order' value='$name'/><input type='hidden'name='amount' value='$amount'/><button type='submit' name='submit' class='btn btn-success'>Pay Rs.$amount</button></form>";
echo"<a href='index.php'><button class='btn btn-danger' >Go Back</button></a>";
if(isset($_POST["submit"])){
    $product=$_POST['order'];
    $amount=$_POST['amount'];
    $email=$_SESSION['email'];
    $phone=$_SESSION['phone'];
    //echo"$product $amount $email $phone";
    $qry="insert into canteenorder (name,amount,uid,phone)values('$name',$amount,'$email',$phone)";
    //echo"$qry";
  $result = mysqli_query($conn,$qry);
if($result)
echo "<script>alert('You will receive your order shortly');</script>";
$_SESSION["shopping_cart"]=null;
echo "<script>window.location.href='index.php';</script>";
}

    }
    else{
        //
    }

?>

</body>
</html>