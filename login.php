<?php include_once 'libs/login_user.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ToDo Maker</title>
<?php include_once ('header.php');?>
			<div class="login_form">
					<form action="login.php" method="post">
						<h2>Login Here</h2>			
						<div class="form_elements">
							<label for="username">UserName:</label>
							<input type="text" name="login_username" id="login_username">
						</div> <!-- end form_elelemts-->
						<div class="form_elements">
							<label for="password">Password:</label>
							<input type="password" name="login_password" id="login_password">
						</div> <!-- end form_elelemts-->
					
						<div class="form_elements">
							<input type="submit" name="login" id="login" value="Login">
						</div> <!-- end form_elelemts-->
						<div class="form_elements"><a href="#" id="show_register">Don't have an account?  Register Here!</a></div>
						
					</form>
					
				</div> <!-- login_form -->
	   
	   
			<div class="register_form">
					<form action="login.php" method="post">
						<h2>Register Here</h2>			
						<div class="form_elements">
							<label for="username">UserName:</label>
							<input type="text" name="username" id="username">
						</div> <!-- end form_elelemts-->
						<div class="form_elements">
							<label for="password">Password:</label>
							<input type="password" name="password" id="password">
						</div> <!-- end form_elelemts-->
						<div class="form_elements">
							<label for="repassword">Re-enter Password:</label>
							<input type="password" name="repassword" id="repassword">
						</div> <!-- end form_elelemts-->
					
						<div class="form_elements">
							<label for="email">e-mail:</label>
							<input type="text" name="email" id="email">
						</div> <!-- end form_elelemts-->
						<div class="form_elements">
							<input type="submit" name="submit" id="submit" value="Register">
						</div> <!-- end form_elelemts-->

					<div class="form_elements"><a href="#" id="show_login">Already have an account?  LogIn Here!</a></div>
						
					</form>
					
			</div>		<!-- end register_form-->		
			<?php 
				if (isset($error))
				{
					echo '<p class="alert alert-error">', $error, '</p>';
				}
			?>
		</div><!-- end td_container -->
		<?php require_once('footer.php');?>
	</div> <!-- end mainWrapper -->
	
	<script type="text/javascript">
$(function(){
	$('#show_register').click(function(){
		$('.login_form').hide();
		$('.register_form').show();
		return false;
	});
	$('#show_login').click(function(){
		$('.login_form').show();
		$('.register_form').hide();
		return false;
	});
	
	
});
</script>

</body>
</html>