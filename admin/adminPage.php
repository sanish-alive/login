<?php

session_start();


if(!isset($_SESSION['adminAuth']) && $_SESSION['admin
	']!="true" ){
	header("location: index.php");
}


require_once $_SERVER['DOCUMENT_ROOT']."/login/db_base/connect-db.php";


$query = "SELECT * FROM user_tb";
$retval = mysqli_query($conn, $query);
$data = mysqli_num_rows($retval);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styleadmin.css">
	<title>Admin</title>
</head>
<body>

<div class="navbar">
	<a id="navlogo" href="">Cupid</a>
	<a href="adminLogout.php">Logout</a>
	<a href="adminPage.php">Home</a>
</div>


<center>
<div class="usertable">
	
		<table>
			<tr>
				<th>User Id</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Gender</th>
				<th>Height</th>
				<th>Age</th>
				<th>bio</th>
				<!--<th>Edit</th>-->
				<th>Delete</th>
			</tr>

			<?php
			if($data>0){
				while($row=mysqli_fetch_array($retval)) {
					echo "<tr>";
					echo "<td>".$row['userid']."</td>";
					echo "<td>".$row['firstname']."</td>";
					echo "<td>".$row['lastname']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['gender']."</td>";
					echo "<td>".$row['height']."</td>";
					echo "<td>".$row['age']."</td>";
					echo "<td>".$row['bio']."</td>";
					#echo "<td><a href='edit.php?userid=".$row['userid']."'>Edit</a></td>";
					echo "<td><a href='delete.php?userid=".$row['userid']."'>Delete</a></td>";
					echo "</tr>";

				}
			}



			?>
		</table>
	

</div>
</center>

</body>
</html>