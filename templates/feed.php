<?php

session_start();

require_once  $_SERVER['DOCUMENT_ROOT']."/login/db_base/extractData.php";
require_once  $_SERVER['DOCUMENT_ROOT']."/login/db_base/insertData.php";


if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!="true" && !isset($_COOKIE['auth']) && $_COOKIE['auth']!="true"){
	header("location: ../index.php");
}


echo $_SESSION['loggedIn'];


if($_SESSION['gender']=='Male'){
	$opgender = "Female";
}else if($_SESSION['gender']=='Female'){
	$opgender = "Male";
}else{
	echo "gender error";
}


$a = new ExtractData();
$av = $a->extAlreadyVisited($_SESSION['email']);
$alreayvisited = $av['alreadyvisited'];
$alreayvisited = (int) $alreayvisited;
$_SESSION['alreadyvisited'] = $alreayvisited; 



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/feedstyle.css">
	<title>Feed</title>
</head>
<body>

<div class="navbar">
		<a id="navlogo" href="">Cupid</a>
		<a href="feed.php">Feed</a>
		<a href="myProfile.php">Profile</a>
</div>


<div class="usercontainer">
	<?php

	for($i=0;$i<10;$i++){
		$alreayvisited++;

		$row = $a->extFeed($opgender, $alreayvisited);#mysqli_fetch_array($data);
		if(isset($row)){
			if($row['gender']==$opgender){

	?>
			
				<a href="#"><div class = "userprofile">
					<div class=usercard>
						<img src="R.jpg">
						<div class="infocontainer">
							<p><b>Name: </b><?php echo $row['firstname']." ".$row['lastname']; ?></p>
							<p><b>Age: </b><?php echo $row['age']; ?></p>
							<p><b>Height: </b><?php echo $row['height']; ?></p>
							<p><?php echo $row['bio']; ?></p></a>

							<center><button id='<?php echo $i ?>' onclick = "userliked('<?php echo $row['userid']; ?>')">	&#9829;</button><center>
						</div>
					</div>
				</div>

				<?php
					$updatevisited = $row['userid'];

					}else{
					$i--;
					}
				}else{
					echo "not found";
				}

	}

	echo $_SESSION['email'].$updatevisited;
	$b = new InsertData();

	if(isset($updatevisited)){
		$b->insertAlreadyVisited($_SESSION['email'], $updatevisited);
		echo "<center><a style='text-decoration: none; color: white; background-color: rgb(255, 69, 132, 1); padding: 10px 40px; border-radius:5px' id='nextfeed' href='".htmlspecialchars($_SERVER['PHP_SELF'])."'>Next</a><center>";
	}else{
		echo "<center><h1>Try Next Time</h1></center>";
		$b->insertAlreadyVisited($_SESSION['email'], 0);#delete this
	}

		
	


	?>	

</div>

<script>
	function userliked(likedid){
		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "feedmatcher.php?matchid="+likedid, true);
		xhttp.send("matchid="+likedid);
		
	}
</script>

</body>
</html>


