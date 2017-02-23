<?php require_once 'session.php' ?>
<?php 
	require_once ('classes/class.ManageToDo.php');
	$todo = new ManageToDo();
?>

<?php require_once 'libs/add_todo.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add New</title>
<?php include_once('header.php');?>
<?php include_once('sidebar-nav.php');?>
		<div class="mainContent clearfix">
			<div class="head clearfix">
			</div><!-- end head-->
			<div class="mainBody">

				<form action="add_new.php" method="post">
				<h2>Add ToDo</h2>
				
				<div class="form_elements">
					<label for="title">Title</label>
					<input type="text" name="title" id="title">
				</div>

				<div class="form_elements">
					<label for="Description">Description <small>(Optional)</small></label>
					<textarea name="description" id="description"></textarea> 
				</div>

				<div class="form_elements">
					<label for="due_date">Due Date</label>
					<input type="text" name="due_date" id="due_date">
				</div>

				<div class="form_elements">
					<label for="file_under">File Under</label>
					<select name="file_under" id="file_under">
						<option value="InBox" "selected">InBox</option>
						<option value="Read Later">Read Later</option>
						<option value="Important">Important</option>
					</select>
				</div>

				<div class="form_elements">
					<input type="submit" name="create" id="create" value="Add ToDo" class="btn btn-info">
				</div>
				</form>
			<?php 
				if (isset($error))
				{
					echo '<p class="alert alert-error">', $error, '</p>';
				}
			?>
				
					
			</div><!-- end mainBody-->
		</div><!-- end mainContent-->
		
<script>
	$(function() {
		$( "#due_date" ).datepicker({ dateFormat: "yy-mm-dd" });
	});
</script>		
</body>
</html>