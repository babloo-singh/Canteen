<?php
error_reporting();
$conn = new mysqli('localhost:3307', 'root', '', 'canteen');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>