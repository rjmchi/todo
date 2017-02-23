<?php

if (isset($_GET['action']) && ($_GET['action'] == 'delete') && isset($_GET['id']))
{
	$id= $_GET['id'];

	$todo->deleteToDo($username, $id);	
}