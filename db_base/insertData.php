<?php

require $_SERVER['DOCUMENT_ROOT']."/login/db_base/connect-db.php";


class InsertData{
	function insertNewSession($new_session_id, $email){
		/* this function will insert new session in data*/

		global $conn;

		$query = "UPDATE user_tb SET oldSession='$new_session_id' WHERE email='$email'";
		$retval = mysqli_query($conn, $query);

	}
}


?>