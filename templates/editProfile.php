<?php
require "profile.php";
require $_SERVER['DOCUMENT_ROOT']."/login/db_base/connect-db.php";
require_once $_SERVER['DOCUMENT_ROOT']."/login/db_base/extractData.php";

require_once $_SERVER['DOCUMENT_ROOT']."/login/db_base/insertData.php";

$finvalid = "";
$linvalid = "";
$einvalid = "";
$pinvalid = "";
$ginvalid = "";
$hinvalid = "";

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
			$finvalid = "Invalid";
			$error = 1;

		}

		if(!preg_match("/^([a-zA-Z\.' ]+)$/", $lastname)){
			$linvalid = "Invalid";
			$error = 2;
		}



		if(!preg_match("/^\\S+@\\S+\\.\\S+$/", $email)){
			$einvalid = "Invalid";
			$error = 3;
		}

		
		if($_SESSION['email']!=$email){
			$a = new ExtractData();
			if($a->extEmail($email)){
				$einvalid = "Already exist";
				$error = 4;
			}
		}
		


		if(!preg_match("/^[0-9]+$/", $height)){
			$hinvalid = "Invalid";
			$error = 6;
		}


		if($error==0){

			$tempemail = $_SESSION['email'];

			$b = new InsertData();
			

			if($b->insertEditProfile($tempemail, $firstname, $lastname, $email, $age, $height, $bio)){
				$_SESSION['email'] = $email;
				$_SESSION['firstname'] = $firstname;
				$_SESSION['lastname'] = $lastname;
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
		<img id="editimg" src="../uploads/<?php echo $_SESSION['profileImg']; ?>" alt="Avatar"><br>
		<button style="color: #ff4584">Change profile picture</button>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<table>
				<tr>
					<td>First Name:<span style="color: red"><?php echo $finvalid; ?></span></td>
					<td><input type="text" name="fname" value="<?php echo $_SESSION['firstname']; ?>"></td>
				</tr>
				<tr>
					<td>Last Name:<span style="color: red"><?php echo $linvalid; ?></span></td>
					<td><input type="text" name="lname" value="<?php echo $_SESSION['lastname']; ?>"></td>
				</tr>
				<tr>
					<td>Email:<span style="color: red"><?php echo $einvalid; ?></span></td>
					<td><input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"></td>
				</tr>
				<tr>
					<td>Age:</td>
					<td><input type="text" name="age" value="<?php echo $_SESSION['age']; ?>"></td>
				</tr>
				<tr>
					<td>height:<span style="color: red"><?php echo $hinvalid; ?></span></td>
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