<?php
include('connection.php');

$username = $_POST['editUsername'];
$email = $_POST['editEmail'];
$password = $_POST['editPassword'];

$whereField = $_POST['whereField'];
$whereCondition = $_POST['whereCondition'];

$sql = "update users set username ='".$username."',email='".$email."',password='".$password."' where ".$whereField."='".$whereCondition."'"; 
mysqli_query($connect, $sql);
?>  