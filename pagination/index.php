<?php
include_once('../classes/class.Pagination.php');

mysql_connect('localhost', 'root', 'kether1330');
mysql_select_db('rjmpot_pottery');
$sql = mysql_query("SELECT * FROM piece");
while ($row = mysql_fetch_array($sql))
{
	$result[]=$row;
}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Pagination</title>
</head>

<body>
<?php

$pag = new Pagination();
$numbers = $pag->Paginate($result, 20);
$data = $pag->fetchResult();
foreach ($data as $d)
{
?>
	<div class="item">
	<h2><?php echo $d['pceTitle'];?></h2>
	<h3><?php echo $d['pceDescription'];?></h3>
	<p><?php echo $d['pcePrice'];?></p>
	<p><?php echo $d['pceDecoration'];?></p>
	</div>
<?php
}

echo '<a href="index.php?page=1">First</a> ';
$separator = ' ';

foreach($numbers as $num)
{
	echo $separator.'<a href="index.php?page='.$num.'">'.$num.'</a>';
	$separator = ' - ';
}
echo ' <a href="index.php?page='.$num.'">'.'Last'.'</a>';

?>
</body>
</html>