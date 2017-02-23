<?php require_once 'session.php' ?>
<?php 
	require_once ('classes/class.ManageToDo.php');
	$todo = new ManageToDo();
?>

<?php require_once 'libs/edit_todo.php'; ?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit ToDo</title>
<?php include_once('header.php');?>
<?php include_once('sidebar-nav.php');?>
		<div class="mainContent clearfix">
			<div class="head clearfix">
			</div><!-- end head-->
			<div class="mainBody">

				<form action="edit.php" method="post">
				<h2>Edit ToDo</h2>
				
				<div class="form_elements">
					<label for="title">Title</label>
					<input type="text" name="title" id="title" value="<?php echo $item->title;?>">
				</div>

				<div class="form_elements">
					<label for="Description">Description <small>(Optional)</small></label>
					<textarea name="description" id="description"><?php echo $item->description;?></textarea> 
				</div>

				<div class="form_elements">
					<label for="due_date">Due Date</label>
					<input type="text" name="due_date" id="due_date" value="<?php echo $item->due_date;?>">
				</div>
				<div class="form_elements">
					<label for="progress">Percent Complete</label>

					<div id="seekbar"></div>
					<div id="progress"><?php echo $item->progress;?>%</div>

					<input type="hidden" id="progress_value" name="progress_value" value="<?php echo $item->progress;?>">
				</div>

				<div class="form_elements">
					<label for="file_under">File Under</label>
					<select name="file_under" id="file_under">
						<option value="InBox"  <?php echo ($item->file_under=='InBox')? 'selected':  '';?>>InBox</option>
						<option value="Read Later" <?php echo ($item->file_under=='Read Later')? 'selected':  '';?>>Read Later</option>
						<option value="Important" <?php echo ($item->file_under=='Important')? 'selected':  '';?>>Important</option>
					</select>
				</div>

				<div class="form_elements">
					<input type="submit" name="update" id="update" value="Update ToDo" class="btn btn-info">
				</div>
				<input type="hidden" name="id" id="id" value="<?php echo $item->id;?>">
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
	
	$(function() {
		$( "#seekbar" ).slider({
			range: "max",
			min: 0,
			max: 100,
			value: $( "#progress_value" ).val(),
			slide: function( event, ui ) {
				$( "#progress" ).html( ui.value + '%');
				$( "#progress_value" ).val( ui.value );
			}
		});
		$( "#progress_value" ).val( $( "#seekbar" ).slider( "value" ) );
	});
</script>		
</body>
</html>