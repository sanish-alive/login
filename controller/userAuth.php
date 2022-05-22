<?php
 require  $_SERVER['DOCUMENT_ROOT']."/login/db_base/connect-db.php";
 require_once  $_SERVER['DOCUMENT_ROOT']."/login/db_base/extractData.php";
 require_once  $_SERVER['DOCUMENT_ROOT']."/login/db_base/insertData.php";

class UserAuthentication{
	/*this class use for user authentication */
	function loginAuth($email, $pwd){
		/* this function is use for login authentication */
		
		$e = new ExtractData();
		$data = $e->extEmlPwd($email, $pwd);
		if(isset($data)){
			if($email==$data['email'] && $pwd==$data['pass']){
				return true;
			}
		}
		return false;
			
	}


	function sessionAuth($session_id, $email){
		/* this function authenticate user using session */
		$e = new ExtractData();
		$data = $e->extOldSession($email);
		echo $data['oldSession'];
		if($session_id == $data['oldSession']){
			return true;
			
		}
		return false;
		
	}
}



?>