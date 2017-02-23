<?php session_start();
	if (!isset($_SESSION['todo_name']))
	{
		header ("location: login.php");
	}
	$username = $_SESSION['todo_name'];