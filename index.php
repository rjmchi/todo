<?php require_once('session.php');?>
<?php 
	require_once ('classes/class.ManageToDo.php');
	$todo = new ManageToDo();

	include_once 'libs/delete.php';
	
	if (isset ($_GET['type']))
	{
		$type = $_GET['type'];
	}
	else
	{
		$type = null;
	}
	
	if (isset($_GET['complete']) && ($_GET['complete'] == 'n'))
	{
		$complete = false;
	}
	else
	{
		$complete = true;
	}
	$list = $todo->listToDo($username, $type, $complete);
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ToDo Maker</title>
<?php include_once('header.php');?>
<?php include_once('sidebar-nav.php');?>

		<div class="mainContent clearfix">
			<div class="head clearfix">
				<h2>Manage ToDo <span>Welcome <?php echo $_SESSION['todo_name'];?></span></h2>

			</div><!-- end head-->
				<div class="mainBody">
					<div class="add_more">
						<a href="add_new.php" class="btn btn-success">+ Add New</a> 
					</div><!-- end add_more-->
				
			    <table class="table table-striped">
					<thead>
						<tr>
							<th>Title</th>
							<th>Description</th>
							<th>Due Date</th>
							<th>Time Left</th>
							<th>Progress</th>
							<th>Actions</th>		
						</tr>
					</thead>
					<tbody>
					<?php $today = strtotime("now");?>
					<?php if ($list) { ?>
						<?php  foreach ($list as $item){ ?>
						<?php 
							$due_date = strtotime($item->due_date);
							if ($due_date > $today)
							{
								$hours = $due_date-$today;
								$hours = $hours/3600;
								$time_left = $hours / 24;
								if ($time_left < 1)
								{
									$time_left= 'Less than 1 day';
								}
								else
								{
									$time_left = round($time_left) . ' days';
								}
							}
							else
							{
								$time_left = 'Past Due!!';
							}
							if ($item->progress == 100)
							{
								$time_left = 'Complete!';
							}
						?>
							<tr>
								<td><?php echo $item->title;?></td>
								<td><?php echo $item->description;?></td>
								<td><?php echo $item->due_date;?></td>
								<td><?php echo $time_left;?></td>
								<td>   
									 <div class="progress progress-striped">
									    <div class="bar" style="width: <?php echo $item->progress;?>%;">
										</div>
								    </div>
									</td>
								<td><a href="edit.php?action=edit&id=<?php echo $item->id;?>">Edit</a> | <a href="index.php?action=delete&id=<?php echo $item->id;?><?php echo $type?'&type='.$type:'';?>">Delete</a></td>
							</tr>
						<?php } ?>	<!-- end foreach -->					
					<?php 
						} 
						else
						{
							echo '<tr><td colspan="6">Nothing to see here</td></tr>';
						}
					?>
					</tbody>
			    </table>
				</div>
		</div><!-- end mainContent-->
	
	</div><!-- end td_container-->

<?php require_once('footer.php');?> 
	
</div><!-- end mainWrapper-->
</body>
</html>