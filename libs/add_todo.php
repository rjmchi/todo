<?php
require_once('classes/class.ManageToDo.php');

if (isset($_POST['create']))
{
	$title = mysql_real_escape_string($_POST['title']);
	$description = mysql_real_escape_string($_POST['description']);
	$due_date = strip_tags($_POST['due_date']);
	$file_under = strip_tags($_POST['file_under']);
	
	if (empty($title) || empty($due_date) || empty($file_under))
	{
		$error = 'Title, Due Date and File Under are required fields';
	}
	else
	{
		if ($todo->createToDo($username, $title, $description, $due_date, $file_under))
		{
			$error = "Item Created";
		}
		else
		{
			$error = "Error creating item";
		}
	}
}
