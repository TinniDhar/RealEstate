<?php 
include('config.php');
include('dbregistration.php'); 
?>
<!DOCTYPE html>
<html>
<head>
  <title> Signup </title>
  <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
<h1> WD Real Estate </h1>
  <form method="post" action="signup.php">
  <?php include('error.php'); ?>
  <fieldset>
		<legend> Sign Up: </legend> 
		<div class="input-group">
		<label>Username: </label>
		<input type="text" name="username" >
		</div>
		<div class="input-group">
		<label>Email: </label>
		<input type="email" name="email">
		</div>
		<div class="input-group">
		<label>Password: </label>
		<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>User Type: </label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="seller">Seller</option>
				<option value="buyer">Buyer</option>
			</select>
		</div>
		<div class="input-group">
		<button type="submit" class="btn" name="submit">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	  </fieldset>
  </form>

</body>
</html>