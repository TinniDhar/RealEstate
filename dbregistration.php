<?php
include("config.php");
session_start();

 // initializing variables
 $username = "";
 $email    = "";
 $errors = array(); 

//SIGNUP USER
if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $usertype = mysqli_real_escape_string($db, $_POST['user_type']);

  if(empty($username)) {
      array_push($errors, "Username is required"); 
    }
  if(empty($email)) {
       array_push($errors, "Email is required"); 
    }
  if(empty($password_1)) {
       array_push($errors, "Password is required"); 
    }

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  if (count($errors) == 0) {
  	$password = md5($password_1);
 
  	$query = "INSERT INTO users (username, email, password, usertype) 
  			  VALUES('$username', '$email', '$password', '$usertype')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}

// LOGIN USER
if (isset($_POST['submitlogin'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
      $password = md5($password); 
      $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
        $logged_in_user = mysqli_fetch_assoc($results);
        if ($logged_in_user['usertype'] == 'admin') {
  
          $_SESSION['username'] = $username;
          $_SESSION['success']  = "You are now logged in";
          
          header('location: admin/index.php');		  
        }else if($logged_in_user['usertype'] == 'seller'){
          $_SESSION['username'] = $username;
          $_SESSION['success']  = "You are now logged in";
          
          header('location: seller/index.php');	
        }else if($logged_in_user['usertype'] == 'buyer'){
          $_SESSION['username'] = $username;
          $_SESSION['success']  = "You are now logged in";
  
          header('location: buyer/index.php');
        }
      }
      else {
          array_push($errors, "Wrong username/password combination");
      }
  }
}

  if (isset($_POST["add_prop"])) {
    $address = ($_POST['address']);
    $city = ($_POST['city']);
      $price = ($_POST['price']);
    $garage = ($_POST['garage']);
    $size = ($_POST['size']);
    $year = ($_POST['year']);
    $bedrooms = ($_POST['bedrooms']);
    $bathrooms = ($_POST['bathrooms']);
    $username = ($_SESSION['username']);
  
  
  
    if (count($errors) == 0) {
    $query = "INSERT INTO `prop` (username, address, city, price, garage, size, year, bedrooms, bathrooms) VALUES ('$username' ,'$address', '$city', '$price', '$garage', '$size', '$year', '$bedrooms', '$bathrooms')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }
  }

  // ADD PROPERTY

  if (isset($_POST["add_prop"])) {
    $address = ($_POST['address']);
    $city = ($_POST['city']);
      $price = ($_POST['price']);
    $garage = ($_POST['garage']);
    $size = ($_POST['size']);
    $year = ($_POST['year']);
    $bedrooms = ($_POST['bedrooms']);
    $bathrooms = ($_POST['bathrooms']);
    
  
  
  
    if (count($errors) == 0) {
    $query = "INSERT INTO `prop` (address, city, price, garage, size, year, bedrooms, bathrooms) VALUES ('$address', '$city', '$price', '$garage', '$size', '$year', '$bedrooms', '$bathrooms')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }
  }

  // BUY PROPERTY

  if (isset($_POST["buy_prop"])) {
    $address = ($_POST['address']);
    $city = ($_POST['city']);
    $price = ($_POST['price']);
    $seller = ($_POST['seller']);
    $buyer = ($_POST['buyer']);

    
  
  
  
    $query = "INSERT INTO `orders` (address, city, price, seller, buyer) VALUES ('$address', '$city', '$price', '$seller', '$buyer')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
  }

  // ADD TO WISHLIST

  if (isset($_POST["wish"])) {
    $address = ($_POST['address']);
    $city = ($_POST['city']);
    $u = ($_POST['buyer']);

    
  
  
  
    $query = "INSERT INTO `wishlist` (address, city, username) VALUES ('$address', '$city', '$u')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
  }


  
  
  ?>