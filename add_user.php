<?php
session_start();
	include 'database_info.php';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
		// // Check connection
	// if ($conn->connect_error) {
		// die("Connection failed: " . $conn->connect_error);
	// } 
	
	$stmt = $conn->prepare("INSERT INTO users(userName, password) VALUES(?, ?)");
	$stmt->bind_param("ss", $userName, $password);

	$userName = $_POST['userName'];
	$password = $_POST['password']; 
	
	if (!$stmt->execute()) {
	    // echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	    $_SESSION['errors'] = array("Name is not available.");
	}

	$stmt->close();
	mysqli_close($conn);
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	
?>