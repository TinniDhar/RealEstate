<?php 
include('config.php');
include('dbregistration.php');

?>
<!DOCTYPE html>
<html>
<head>
  <title> Login </title>
  <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
<h1> WD Real Estate </h1>
  <form method="post" action="login.php">
  <?php include('error.php'); ?>
    <fieldset>
        <legend> Login: </legend> 
          <div class="input-group">
              <label>Username: </label>
              <input type="text" name="username" >
          </div>
          <div class="input-group">
              <label>Password: </label>
              <input type="password" name="password">
          </div>
          <div class="input-group">
              <button type="submit" class="btn" name="submitlogin">Login</button>
          </div>
          <p>
              Not yet a member? <a href="signup.php">Sign up</a>
          </p>
    </fieldset>
  </form>
  
</body>
</html>