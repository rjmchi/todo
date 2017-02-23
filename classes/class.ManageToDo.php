<?php
include_once('class.database.php');

class ManageToDo {
	public $link;

	function __construct() {
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
	}
	function createToDo($username,$title, $description, $due_date, $file_under)
	{
		$create_date = date('Y-m-d');
		$query = $this->link->prepare("insert into todo (username, title, description, due_date, create_date, file_under) values(?,?,?,?,?,?)");
		$values = array($username, $title, $description, $due_date, $create_date, $file_under);
		$query->execute($values);
		$count = $query->rowCount();
		if ($count == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function listToDo($username, $file_under=null, $complete=true)
	{
		$where = '';
		if ($complete == false)
		{
			$where = ' and progress < 100 ';
		}
		if (isset($file_under))
		{
			$query = $this->link->query("select * from todo where username='$username' and file_under = '$file_under' $where order by due_date");
		}
		else
		{
			$query = $this->link->query("select * from todo where username='$username' $where order by due_date");
			
		}
		$count=$query->rowCount();
		if ($count > 0)
		{
			$result = $query->fetchAll(PDO::FETCH_OBJ);
		}
		else
		{
			$result = $count;
		}
		return  $result;
	}
	
	function countToDo($username, $file_under)
	{
		$query = $this->link->query("select count(*) as TOTAL_TODO from todo where username = '$username' and file_under = '$file_under'");
		$query->setFetchMode(PDO::FETCH_OBJ);
		$count = $query->fetchAll();
		return $count[0];
	}
	function editToDo($username, $id, $title, $description, $progress, $due_date, $file_under)
	{
		$values = array ($title, $description, $progress, $due_date, $file_under,$username, $id);		
		$stmt = "update todo set title=?, description=?, progress=?, due_date=?, file_under=? where username=? and id=?";
		$query = $this->link->prepare($stmt);
		if ($query->execute($values))
		{
			$rowcount = $query->rowCount();		
		}
		else
		{
			$rowcount=0;
		}
		return $rowcount;

	}
	function getToDo ($username, $id)
	{
		$query = $this->link->prepare("select * from todo where username = ? and id = ?");
		$query->execute(array($username,$id));
		$query->setFetchMode(PDO::FETCH_OBJ);
		$result = $query->fetchAll();

		$count=$query->rowCount();
		if ($count > 0)
			return $result[0];
		else
			return false;
	}
	function deleteToDo($username, $id)
	{
		$query = $this->link->query("DELETE FROM todo WHERE username='$username' AND id=$id LIMIT 1");
		$count = $query->rowCount();
		return $count;
	}
}
