<?php
require $_SERVER['DOCUMENT_ROOT']."/login/db_base/connect-db.php";
require_once $_SERVER['DOCUMENT_ROOT']."/login/db_base/extractData.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST["submit"])){
		$firstname=$_POST["firstname"];
		$lastname=$_POST["lastname"];
		$email=$_POST["email"];
		$pwd=$_POST["pass"];
		$cpwd = $_POST["cpass"];
		$gender=$_POST["gender"];
		$height=$_POST["height"];
		$age=$_POST["age"];
		$bio=$_POST["bio"];
		$error = 0;



		if(!preg_match("/^([a-zA-Z' ]+)$/", $firstname)){
			$finvalid = "Invalid First name";
			$error = 1;

		}

		if(!preg_match("/^([a-zA-Z\.' ]+)$/", $lastname)){
			$linvalid = "Invalid Last name";
			$error = 1;
		}



		if(!preg_match("/^\\S+@\\S+\\.\\S+$/", $email)){
			$einvalid = "Invalid Email";
			$error = 1;
		}

		$a = new ExtractData();
		if($a->extEmail($email)){
			$einvalid = "Already exist";
			$error = 1;
		}

		if($pwd!=$cpwd){
			$pinvalid = "password invalid";
			$error = 1;
		}

		if(!isset($gender)){
			$ginvalid = "select gender";
			$error = 1;
		}

		if(!preg_match("/^[0-9]+$/", $height)){
			$hinvalid = "Invalid Height";
			$error = 1;
		}


		if($error==0){
			$temp = explode(".", $_FILES["file"]["name"]);
		$newfilename = round(microtime(true)).".".end($temp);
		move_uploaded_file($_FILES["file"]["tmp_name"], "../uploads/" . $newfilename);

		$query = "INSERT INTO user_tb (firstname, lastname, email, pass, gender, height, age, bio, profileImg) VALUES ('$firstname', '$lastname', '$email', '$pwd', '$gender', '$height', '$age', '$bio', '$newfilename')";

		if(mysqli_query($conn, $query)){
			header("location: ../index.php");
		}
		else{
			echo "account not created";
		}

		mysqli_close($conn);
		}


	}
}



?>