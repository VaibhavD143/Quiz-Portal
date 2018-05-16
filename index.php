<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

<<<<<<< HEAD
	require_once('authenticate.php');

	if(isLoggedIn()){
		header('location: quiz.php');
		exit();
	}
	else{
		include_once('quiz_list.php');
	}
=======
<!--<html>
<?php
$title = "Home";
include("./header.php");
?>

<body>
<?php
$heading = "Hii";
$menu = array("Abc"=>"Pqr");
include("./dashboard.php");
>>>>>>> ef1ebcc93ec350ef8f95c7dc4716c7aa24cbf191
?>
