<?php
session_start();
include "../conn.php";
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
            $sql="DELETE FROM foods WHERE code='" . $_GET["pid"] . "'";
            $sql1="SELECT * FROM foods WHERE code ='" . $_GET["pid"] . "'";
            $result=mysqli_query($conn,$sql1);
            $row = mysqli_fetch_assoc($result);
            $image = $row['image'];
			if(!mysqli_query($conn,$sql))
                echo mysqli_error($conn);
        else{
            unlink("../".$image);
            echo "<script>alert('Product Deleted');window.history.go(-1);</script>";
        }
            break;
}
}
?>