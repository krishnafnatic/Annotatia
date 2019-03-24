<?php
/* Displays user information and some useful messages */
session_start();
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
ob_start();
require('connect.php');
if(isset($_GET['id']) && !empty($_GET['id'])){
	$selsql = "SELECT location FROM `upload` WHERE id=" . $_GET['id'];
	$result = mysqli_query($connection, $selsql);
	$r = mysqli_fetch_assoc($result);
	if(unlink($r['location'])){
		$delsql="DELETE FROM `upload` WHERE id=" . $_GET['id'];
		if(mysqli_query($connection, $delsql)){
			header("Location: view.php");
		}
	}
}else{
	header("Location: view.php");
}
}