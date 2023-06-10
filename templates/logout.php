<?php
require "profile.php";


if(isset($_POST['logout'])){
	session_unset();
	session_destroy();
	setcookie("auth", null, time()-86400, "/login", "");
	setcookie('email', null, time()-86400, "/login", "");
	setcookie('oldSession', null, time()-86400, "/login", "");
	header("location: ../index.php");
}


?>


<article>
	<h1>Logout</h1>
	<div class="edit_profile">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<table>
				<tr>
					<td>Are you sure you want logout?</td>
				
					<td rowspan="2"><input type="submit" name="logout" value="Logout">
					</td>
				</tr>
			</table>
		</form>
	</div>
</article>