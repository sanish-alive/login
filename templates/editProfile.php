<?php
require "profile.php";
require $_SERVER['DOCUMENT_ROOT']."/login/db_base/connect-db.php";
require_once $_SERVER['DOCUMENT_ROOT']."/login/db_base/extractData.php";


if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST['submit'])){
		$firstname=$_POST["fname"];
		$lastname=$_POST["lname"];
		$email=$_POST["email"];
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

		if(!isset($gender)){
			$ginvalid = "select gender";
			$error = 1;
		}

		if(!preg_match("/^[0-9]+$/", $height)){
			$hinvalid = "Invalid Height";
			$error = 1;
		}


		if($error==0){
			$query = "UPDATE user_tb SET firstname='$firstname', lastname='$lastname', email='$email', height='$height', age='$age', bio='$bio' WHERE oldSession=session_id()";

			if(mysqli_query($conn, $quer)){
				$_SESSION['email'] = $email;
				$_SESSION['firstname'] = $firstname;
				$_SESSION['lastname'] = $lastname;
				$_SESSION['gender'] = $gender;
				$_SESSION['height'] = $height;
				$_SESSION['bio'] = $bio;
				$_SESSION['age'] = $age;

				echo "<script>alert('Edit successful')</script>";
				header("location: ../templates/myProfile.php");
			}
		}


	}
}

?>

<article>
	<div class="edit_profile">
		<h1>Edit Profile</h1>
		<img src="R.jpg" alt="Avatar"><br>
		<button style="color: #ff4584">Change profile picture</button>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<table>
				<tr>
					<td>First Name:</td>
					<td><input type="text" name="fname" value="<?php echo $_SESSION['firstname']; ?>"></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><input type="text" name="lname" value="<?php echo $_SESSION['lastname']; ?>"></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"></td>
				</tr>
				<tr>
					<td>Age:</td>
					<td><input type="text" name="age" value="<?php echo $_SESSION['age']; ?>"></td>
				</tr>
				<tr>
					<td>height:</td>
					<td><input type="text" name="height" value="<?php echo $_SESSION['height']; ?>"></td>
				</tr>
				<tr>
					<td>Bio:</td>
					<td><textarea type="text" name="bio"><?php echo $_SESSION['bio']; ?></textarea></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit">

					</td>
				</tr>
			</table>
		</form>
	</div>
</article>
</section>
</body>
</html>