<?php
include('connection.php');

$username = $_POST['addUsername'];
$email = $_POST['addEmail'];
$password = $_POST['addPassword'];

$sql = "insert into users (username, email, password) values ('".$username."','".$email."','".$password."')";
$result = mysqli_query($connect, $sql);


?>