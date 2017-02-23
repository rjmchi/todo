<?php
include_once 'classes/class.ManageUsers.php';
$user = new ManageUsers();
if (isset($_POST['login']))
{
	session_start();
	$username = $_POST['login_username'];
	$password = $_POST['login_password'];
	if ($user->loginUser($username, $password))
	{
		$_SESSION['todo_name'] = $username;	
		if (isset($_SESSION['todo_name']))
		{
			header ("location: index.php");
		}
		else
		{
			echo "cant create session";
		}
	}
	else
	{
		$error = "Invalid login information";
	}
}
else if (isset($_POST['submit']))
{
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$email = $_POST['email'];
	$ip_address = $_SERVER['REMOTE_ADDR'];
	$date = date('d:m:Y');
	$time = date("H:i:s");
	
	if (empty($username) || empty($email) || empty($password) || empty($repassword))
	{
		$error = 'All fields are required';
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$error = 'email is not valid';
	}
	elseif ($password != $repassword)
	{
		$error = 'Passwords do not match';
	}
	else
	{
		$check_availability = $user->GetUserInfo($username);
		if ($check_availability == 0)
		{
			$register_user = $user->registerUser($username, $password, $email, $ip_address, $date, $time);
			if ($register_user == 1)
			{
				$user_session = $user->GetUserInfo($username);	
				$_SESSION['todo_name'] = $user_session['username'];	
				if (isset($_SESSION['todo_name']))
				{
					header ("location: index.php");
				}
				else
				{
					echo "cant create session";
				}
			}
		}
		else
		{
			$error = 'Username already exists';
		}
	}
}
else
{
	if (isset($_SESSION['todo_name']))
	{
		session_destroy();
	}
}

