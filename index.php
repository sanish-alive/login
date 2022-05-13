<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<section>
		<div class="imgBx">
			<img src="bg.jpg">
			<div class="text-img">
				<h1><b>Welcome To Cupid</b></h1><br>
				<p>Find Your Partner</p>
			</div>
		</div>
		<div class="contentBx">
			<div class="formBx">
				<h2>Login</h2>
				<form action="feed.php" method="post">
					<div class="inputBx">
						<span>Email</span>
						<input type="email" name="email">
					</div>
					<div class="inputBx">
						<span>Password</span>
						<input type="password" name="pass">
					</div>
					<div class="remember">
						<label><input type="checkbox" name="remember"> Remember me</label>
					</div>
					<div class="inputBx">
						<input type="submit" value="Sign In" name="submit">
					</div>
					<div class="inputBx">
						<p>Don't have an account? <a href="registrate.php">Sign up</a></p>
					</div>
				</form>
				<h3>Vist Our Social Media</h3>
				<ul class="sci">
					<li><i class="fa fa-facebook"></i></li>
					<li><i class="fa fa-twitter"></i></li>
					<li><i class="fa fa-instagram"></i></li>
				</ul>
			</div>
		</div>
		
	</section>

</body>
</html>
