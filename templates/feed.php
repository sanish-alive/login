<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["submit"])){
		$pass=$_POST["pass"];
		$email=$_POST["email"];
	}
}

include "conn.php";

$sql = "SELECT firstname, lastname, email, pass, gender, age, bio, profileImg FROM user_tb";
mysqli_select_db($conn, 'cupid_db');
$retval = mysqli_query($conn, $sql);

if(!$retval){
	die('Error: '.mysql_error());
}

$lg = 0;

while($row = mysqli_fetch_array($retval)){
	if($email==$row['email']){
		if($pass==$row['pass']){
			echo '<h2>WELCOME</h2><br>
			<img src="uploads/'.$row['profileImg'].'"><br>
			<b>Username: '.$row['firstname'].' '.$row['lastname'].'</b><br>
			<b>Email: '.$row['email'].'</b><br>
			<b>Gender: '.$row['gender'].'</b><br>
			<b>Age: '.$row['age'].'</b><br>
			<b>Bio: '.$row['bio'].'</b><br>';
			$lg = 1;
			break;
		}
	}
}
if($lg==0){
		echo "something went wrong";
}

mysqli_close($conn);
?>