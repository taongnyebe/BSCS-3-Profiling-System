<?php
include('connection.php');
 
$sql = "select username, email, password from users";
$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		echo "username:".$row['username']."|email:".$row['email']."|password:".$row['password'].";";
	}
}
?>