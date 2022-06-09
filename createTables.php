<!doctype html>

<html>

<head lang="en">
	<meta charset="UTF-8">
	<title> </title>
</head>

<body>
	You have successfully logged in

	<?php
		include("config.php");

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 


		$sql = "CREATE TABLE users (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username VARCHAR(50), email VARCHAR(50), password VARCHAR(255) NOT NULL, usertype VARCHAR(50))";
		if ($conn->query($sql) === TRUE) {
		} else {
		//table already exists
		// Hnadle this condition
			if ($conn->query ("DESCRIBE users"  )) {
				echo "<br>"; 
				echo "Users table already exist". "<br>";
			} else {
				echo "Users table doesn't exist". "<br>";
			}
		}

		$sql2 = "CREATE TABLE prop (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, address VARCHAR(200), city VARCHAR(200), price VARCHAR(200), garage VARCHAR(200), size VARCHAR(200), year INT(10), bedrooms INT(10), bathrooms INT(10))";
		if ($conn->query($sql2) === TRUE) {
		} else {
		//table already exists
		// Hnadle this condition
			if ($conn->query ("DESCRIBE prop"  )) {
				echo "<br>"; 
				echo "prop table already exist". "<br>";
			} else {
				echo "prop table doesn't exist". "<br>";
			}
		}

		$sql3 = "CREATE TABLE wishlist (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, address VARCHAR(200), city VARCHAR(50), username VARCHAR(50))";
		if ($conn->query($sql3) === TRUE) {
		} else {
		//table already exists
		// Hnadle this condition
			if ($conn->query ("DESCRIBE wishlist"  )) {
				echo "<br>"; 
				echo "wishlist table already exist". "<br>";
			} else {
				echo "wishlist table doesn't exist". "<br>";
			}
		}

		$sql4 = "CREATE TABLE orders (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, address VARCHAR(200), buyer VARCHAR(50), city VARCHAR(200), price VARCHAR(200), seller VARCHAR(50))";
		if ($conn->query($sql4) === TRUE) {
		} else {
		//table already exists
		// Hnadle this condition
			if ($conn->query ("DESCRIBE wishlist"  )) {
				echo "<br>"; 
				echo "orders table already exist". "<br>";
			} else {
				echo "orders table doesn't exist". "<br>";
			}
		}



		$conn->close();
	?>  

</body>

</html>