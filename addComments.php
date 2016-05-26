<?php
session_start();
	include 'database_info.php';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
		// // Check connection
	// if ($conn->connect_error) {
		// die("Connection failed: " . $conn->connect_error);
	// } 
	
	$stmt = $conn->prepare("INSERT INTO comments(userName, comment) VALUES(?, ?)");
	$stmt->bind_param("ss", $userName, $comment);

	$userName = $_SESSION['user'];
	$comment = $_POST['comment']; 
	
	if (!$stmt->execute()) {
	    // echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	    $_SESSION['errors'] = array("Name is not available.");
	}

	$stmt->close();
	mysqli_close($conn);
	
	header("location: index.php");
	
?>