<<<<<<< HEAD
<?php
session_start();
if(isset($_GET['logout'])){
	session_unset();
	session_destroy();
	setcookie('adminAuth', null, time()-86400, "/admin", "");
	setcookie('email', null, time()-86400, "/admin", "");
	header("location: index.php");
}


=======
<?php
session_start();
if(isset($_GET['logout'])){
	session_unset();
	session_destroy();
	setcookie('adminAuth', null, time()-86400, "/admin", "");
	setcookie('email', null, time()-86400, "/admin", "");
	header("location: index.php");
}


>>>>>>> a9f8e07c8bf223c6a07556f95deb2606d38d0358
