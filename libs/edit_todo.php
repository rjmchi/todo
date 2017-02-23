<?php
if ((isset($_GET['id'])) && (isset($_GET['action'])) && ($_GET['action'] == 'edit'))
{
	$id = $_GET['id'];
	$item = $todo->getToDo($username,  $id);
}
else if (isset($_POST['id']) && isset($_POST['update']))
{
	$id = $_POST['id'];
	$title=$_POST['title'];
	$description=$_POST['description'];
	$due_date=$_POST['due_date'];
	$progress=$_POST['progress_value'];
	$file_under=$_POST['file_under'];

	$x = $todo->editToDo($username, $id, $title, $description, $progress, $due_date, $file_under);
	if ($x > 0)
	{
		$error = $x . " Rows Changed";
	}
	$item = $todo->getToDo($username, $id);
}
else
{
	header ("location: index.php");
}