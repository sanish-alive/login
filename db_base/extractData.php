<?php

require_once $_SERVER['DOCUMENT_ROOT']."/login/db_base/connect-db.php";



class ExtractData{
	/*This class will extract data from database.*/

	function extAll($email){
		/* this function all data stored in database*/

		global $conn;

		$query = "SELECT * FROM user_tb WHERE email='$email'";
		$retval = mysqli_query($conn, $query);
		$data = mysqli_fetch_array($retval);
		return $data;
	}

	function extEmlPwd($email, $pwd){
		/*it will extract email and password form database*/

		global $conn;

		$query = "SELECT email, pass FROM user_tb WHERE email='$email' AND pass='$pwd'";
		$retval = mysqli_query($conn, $query);
		$data = mysqli_fetch_array($retval);
		return $data;
	}


	function extOldSession($email){
		/* this function will extract old session id from database*/

		global $conn;

		$query = "SELECT oldSession FROM user_tb WHERE email='$email'";

		$retval = mysqli_query($conn, $query);
		$data = mysqli_fetch_array($retval);
		if($data){
			return $data;
		}
	}

	function extEmail($email){
		/* this function extract email from database*/

		global $conn;

		$query = "SELECT email FROM user_tb WHERE email='$email'";
		$retval = mysqli_query($conn, $query);
		$data = mysqli_fetch_array($retval);
		if($data){
			return true;
		}else{
			return false;
		}

	}

}





?>