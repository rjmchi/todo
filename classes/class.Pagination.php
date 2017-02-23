<?php

class Pagination {
	var $data;
//$values is an array of items
	function Paginate($values, $per_page)
	{
		$total_values = count($values);
		if (isset($_GET['page']))
		{
			$current_page = $_GET['page'];
		}
		else
		{
			$current_page = 2;
		}
		$counts = ceil($total_values/ $per_page);
		$param1 = ($current_page - 1)* $per_page;
		$this->data = array_slice($values, $param1, $per_page);

		for ($x = 1;$x <=$counts;$x++)
		{
			$numbers[] = $x;
		}
		return $numbers;
	}
	
	function fetchResult(){
		$resultValues = $this->data;
		return $resultValues;
		
	}
}
